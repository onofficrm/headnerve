export function AboutCaseStrip() {
  const cases = [
    {
      id: 1,
      tag: "케이스 01 · 40대 남성 · 두통",
      summary: "신경외과 교수에게 1년 치료 후 수술 권유를 받고 12월 수술 예약까지 잡아두고 내원. 한방 치료 10회 만에 증상 80% 감소, 수술 없이 치료 지속.",
      result: "치료 결과 · 수술 취소 후 호전 유지 중"
    },
    {
      id: 2,
      tag: "케이스 02 · 30대 남성 · 경추성 어지럼증",
      summary: "증상이 심해질 때마다 응급실 내원. MRI·MRA 정상 판정에도 어지럼·호흡곤란 반복. 신경과 처방약은 복용 중에만 효과. 맥락한의원 치료 후 증상 90% 감소.",
      result: "치료 결과 · 현재 치료 지속 중"
    },
    {
      id: 3,
      tag: "케이스 03 · 50대 남성 · 편두통",
      summary: "대기업 임원. 유명 신경과 주사 치료 후 일시 호전되었다가 재악화. 목 가동 범위 제한 동반. 블로그를 보고 30~40분 거리에서 매 회 내원. 현재 편두통·목 통증 모두 소실.",
      result: "치료 결과 · 치료 종결 후 건강 유지 중"
    }
  ];

  return (
    <div className="bg-maekrak-navy py-16 px-6 md:px-12 lg:px-24">
      <div className="max-w-7xl mx-auto">
        <h3 className="font-serif text-[17.5px] font-medium text-white/85 mb-10 break-keep">
          실제 치료 사례 — 다른 병원에서 낫지 않아 찾아오신 분들
        </h3>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          {cases.map((c) => (
            <div key={c.id} className="bg-white/5 border border-white/10 p-7">
              <div className="text-[11px] tracking-[0.12em] font-medium uppercase text-[#7ec8e0] mb-3">
                {c.tag}
              </div>
              <p className="text-[13.5px] text-white/80 leading-[1.8] font-light break-keep mb-4 flex-1">
                {c.summary}
              </p>
              <div className="mt-2 text-[12.5px] text-white/50 border-t border-white/10 pt-3 flex items-center justify-between">
                <span>{c.result}</span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
