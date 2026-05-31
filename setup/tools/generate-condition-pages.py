#!/usr/bin/env python3
"""Generate condition subpage TSX files from docx sources."""
import zipfile
import xml.etree.ElementTree as ET
import re
import json
from pathlib import Path

base = Path("/Users/gimhaseong/Downloads/2층")
out_base = Path(__file__).resolve().parents[2] / "_BUILDER_INPUT/app/src/pages"
W = "{http://schemas.openxmlformats.org/wordprocessingml/2006/main}"

MAPPING = {
    "2층서브메뉴-두통-경추성 두통.docx": ("Headache/CervicogenicHeadache.tsx", "CervicogenicHeadache", "두통", "/headache", "경추성 두통"),
    "2층서브메뉴-두통-군발두통.docx": ("Headache/ClusterHeadache.tsx", "ClusterHeadache", "두통", "/headache", "군발두통"),
    "2층서브메뉴-두통-긴장형 두통.docx": ("Headache/TensionHeadache.tsx", "TensionHeadache", "두통", "/headache", "긴장형 두통"),
    "2층서브메뉴-두통-생리 두통.docx": ("Headache/MenstrualHeadache.tsx", "MenstrualHeadache", "두통", "/headache", "생리 두통"),
    "2층서브메뉴-두통-편두통.docx": ("Headache/Migraine.tsx", "Migraine", "두통", "/headache", "편두통"),
    "2층서브메뉴-소아편두통.docx": ("Headache/PediatricMigraine.tsx", "PediatricMigraine", "두통", "/headache", "소아 편두통"),
    "2층서브메뉴-수험생 두통.docx": ("Headache/StudentHeadache.tsx", "StudentHeadache", "두통", "/headache", "수험생 두통"),
    "2층서브메뉴-어지럼증-경추성 어지럼증.docx": ("Dizziness/CervicogenicDizziness.tsx", "CervicogenicDizziness", "어지럼증", "/dizziness", "경추성 어지럼증"),
    "2층서브메뉴-어지럼증-메니에르병.docx": ("Dizziness/MenieresDisease.tsx", "MenieresDisease", "어지럼증", "/dizziness", "메니에르병"),
    "2층서브메뉴-어지럼증-이석증(BPPV, 양성 돌발성 체위성 현훈).docx": ("Dizziness/BPPV.tsx", "BPPV", "어지럼증", "/dizziness", "이석증(BPPV)"),
    "2층서브메뉴-어지럼증-전정신경염.docx": ("Dizziness/VestibularNeuritis.tsx", "VestibularNeuritis", "어지럼증", "/dizziness", "전정신경염"),
    "2층서브메뉴-자율신경-기립성 저혈압.docx": ("Autonomic/OrthostaticHypotension.tsx", "OrthostaticHypotension", "자율신경", "/autonomic", "기립성 저혈압"),
    "2층서브메뉴-자율신경-자율신경실조증.docx": ("Autonomic/Dysautonomia.tsx", "Dysautonomia", "자율신경", "/autonomic", "자율신경실조증"),
}

SKIP_PREFIXES = (
    "2층 —", "예)", "✍", "☑", "원장님이", "AI가", "AI 인용", "이런 증상", "왜 생기는",
    "한의원에서", "실제 치료", "자주 묻는", "위아래 연결", "←", "→", "페이지당",
    "완성된", "홈페이지", "1층", "2층 서브", "FAQ 스키마", "환자 신뢰", "짧은 사례",
    "침 치료", "치료 기간", "(원장님", '"진통제', "맥락한의원만의", "기존 치료",
    "치료 방법", "작용 방식", "한계", "이석 정복술", "전정억제제", "전정 재활",
    "근육 불균형", "양방 검사에서", "이 부분이 타", "써주시면", "교과서",
)

META_PATTERNS = (
    r"써주시면 됩니다",
    r"원장님의 진단",
    r"차별화되는 영역",
    r"등$",
    r"^\".*\" 등$",
)


def extract_lines(path: Path) -> list[str]:
    with zipfile.ZipFile(path) as z:
        root = ET.fromstring(z.read("word/document.xml"))
    lines = []
    for p in root.iter(f"{W}p"):
        texts = [t.text for t in p.iter(f"{W}t") if t.text]
        line = "".join(texts).strip()
        if line:
            lines.append(line)
    return lines


def should_skip(line: str) -> bool:
    if line in {"1", "2", "3", "4", "5", "6", "7", "."}:
        return True
    for p in SKIP_PREFIXES:
        if line.startswith(p):
            return True
    for pat in META_PATTERNS:
        if re.search(pat, line):
            return True
    return False


def find_section(lines: list[str], num: str) -> int:
    for i, l in enumerate(lines):
        if l == num:
            return i
    return -1


def parse_faqs(lines: list[str], s6: int) -> list[dict]:
    faqs = []
    block = []
    for i in range(s6 + 1, len(lines)):
        l = lines[i]
        if l.startswith("원장님이 직접") or l.startswith("←") or l == "7":
            break
        if should_skip(l):
            continue
        block.append(l)

    i = 0
    while i < len(block):
        line = block[i]
        if "?" in line:
            q_end = line.index("?") + 1
            q = line[:q_end].strip()
            rest = line[q_end:].strip()
            if rest:
                faqs.append({"q": q, "a": rest})
            elif i + 1 < len(block):
                faqs.append({"q": q, "a": block[i + 1].strip()})
                i += 1
        elif line.endswith("?") or line.endswith("?"):
            q = line
            if i + 1 < len(block) and "?" not in block[i + 1]:
                faqs.append({"q": q, "a": block[i + 1].strip()})
                i += 1
        i += 1
    return faqs


def parse_docx(lines: list[str]) -> dict:
    data: dict = {}
    s1 = find_section(lines, "1")
    anchor = ""
    for i in range(s1 + 1, len(lines)):
        if lines[i].startswith("(맥락"):
            break
        if not should_skip(lines[i]) and len(lines[i]) > 20 and not lines[i].startswith('"'):
            anchor = lines[i]
            break
    data["anchor"] = anchor

    persp = []
    in_p = False
    for l in lines:
        if l.startswith("(맥락"):
            in_p = True
            continue
        if in_p:
            if l.startswith("원장님이 직접"):
                in_p = False
                continue
            if not should_skip(l) and len(l) > 15:
                persp.append(l)
    data["perspective"] = persp

    s2, s3, s4, s5, s6 = (find_section(lines, x) for x in ("2", "3", "4", "5", "6"))

    symptoms = []
    for i in range(s2 + 1, s3):
        l = re.sub(r"^\d+\.\s*", "", lines[i])
        if should_skip(l) or len(l) <= 8:
            continue
        symptoms.append(l)
    data["symptoms"] = symptoms

    cause = []
    for i in range(s3 + 1, s4):
        l = lines[i]
        if should_skip(l) or l.startswith(("목표:", "효과 시점:")):
            continue
        if len(l) > 10:
            cause.append(l)
    data["cause"] = cause

    treatments = []
    prognosis = []
    current = None
    for i in range(s4 + 1, s5):
        l = lines[i]
        if should_skip(l):
            continue
        if l.startswith(("증상이 호전", "첫 4주", "생리 연관")):
            prognosis.append(l)
            continue
        m = re.match(r"^(두맥탕|약침|추나|심맥탕|산소|자율신경검사)\s*[—\-:：]\s*(.*)$", l)
        m2 = re.match(r"^(두맥탕|약침|추나|심맥탕)\s*:\s*(.*)$", l)
        if m or m2:
            if current:
                treatments.append(current)
            g = (m or m2)
            current = {"title": g.group(1), "description": g.group(2).strip()}
        elif current and not l.startswith(("목표:", "효과 시점:")):
            if l in {"기존 치료와 무엇이 다른가", "맥락한의원"}:
                continue
            if l.startswith(
                (
                    "반고리관",
                    "전정억제",
                    "전정 재활",
                    "어지럼증 신호",
                    "경추 고유수용성 감각 문제",
                    "경추 긴장 해소 +",
                    "잔여 어지럼증",
                )
            ):
                break
            sep = "\n" if current["description"] else ""
            current["description"] += sep + l
    if current:
        treatments.append(current)
    data["treatments"] = treatments
    data["prognosis"] = "\n\n".join(prognosis)

    cases = []
    for i in range(s5 + 1, s6):
        l = lines[i]
        if should_skip(l) or len(l) <= 40:
            continue
        cases.append({"body": l})
    data["cases"] = cases[:2]
    data["faqs"] = parse_faqs(lines, s6)
    return data


def jsx_str(s: str) -> str:
    return json.dumps(s, ensure_ascii=False)


def gen_cause_jsx(cause_lines: list[str]) -> str:
    parts = []
    for l in cause_lines:
        is_heading = (
            len(l) < 45
            and not l.endswith(".")
            and not l.endswith("다")
            and not l.endswith("습니다")
            and not l.endswith("다.")
            and not l.endswith("입니다.")
        )
        if is_heading:
            parts.append(f'            <p className="font-medium text-gray-800 mt-6">{l}</p>')
        else:
            parts.append(f"            <p>{l}</p>")
    return "\n".join(parts)


def gen_tsx(comp: str, parent_label: str, parent_href: str, title: str, data: dict) -> str:
    persp = data["perspective"]
    if len(persp) == 1:
        persp_prop = f"perspective={{{jsx_str(persp[0])}}}"
    else:
        persp_js = ",\n        ".join(jsx_str(p) for p in persp)
        persp_prop = f"perspective={{[\n        {persp_js}\n      ]}}"

    symptoms_js = ",\n        ".join(jsx_str(s) for s in data["symptoms"])
    treatments_js = ",\n        ".join(
        f'{{ title: {jsx_str(t["title"])}, description: {jsx_str(t["description"])} }}'
        for t in data["treatments"]
    )
    cases_js = ",\n        ".join(
        f'{{ title: "사례 {i + 1}", body: {jsx_str(c["body"])} }}'
        for i, c in enumerate(data["cases"])
    )
    faqs_js = ",\n        ".join(
        f'{{ q: {jsx_str(f["q"])}, a: {jsx_str(f["a"])} }}' for f in data["faqs"]
    )

    cause_jsx = gen_cause_jsx(data["cause"])

    prognosis_line = ""
    if data.get("prognosis"):
        prognosis_line = f"\n      prognosis={{{jsx_str(data['prognosis'])}}}"

    return f"""import {{ useEffect }} from 'react';
import {{ ConditionSubPage }} from '../../components/condition/ConditionSubPage';

export function {comp}() {{
  useEffect(() => {{
    window.scrollTo(0, 0);
  }}, []);

  return (
    <ConditionSubPage
      parentLabel={jsx_str(parent_label)}
      parentHref={jsx_str(parent_href)}
      title={jsx_str(title)}
      anchorQuote={jsx_str(data['anchor'])}
      {persp_prop}
      symptoms={{[
        {symptoms_js}
      ]}}
      cause={{
        <>
{cause_jsx}
        </>
      }}
      treatments={{[
        {treatments_js}
      ]}}{prognosis_line}
      cases={{[
        {cases_js}
      ]}}
      faqs={{[
        {faqs_js}
      ]}}
    />
  );
}}
"""


def main():
    for fname, (relpath, comp, parent_label, parent_href, title) in MAPPING.items():
        path = base / fname
        data = parse_docx(extract_lines(path))
        tsx = gen_tsx(comp, parent_label, parent_href, title, data)
        out_path = out_base / relpath
        out_path.write_text(tsx, encoding="utf-8")
        print(
            f"OK {title}: sym={len(data['symptoms'])} treat={len(data['treatments'])} "
            f"faq={len(data['faqs'])} cases={len(data['cases'])}"
        )


if __name__ == "__main__":
    main()
