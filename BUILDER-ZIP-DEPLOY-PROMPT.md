# 빌더 ZIP → 그누보드 배포 — Cursor 프롬프트 모음

구글 스튜디오(AI Studio) 등에서 받은 React/Vite ZIP을 **onoff-builder-bridge**로 올릴 때, Cursor에 **복사·붙여넣기**할 프롬프트입니다.

**전체 흐름 (한 줄)**  
빌더 ZIP 다운로드 → `npm install` → `npm run build` → **dist만** ZIP → 관리자 업로드 → URL·메뉴 연결

---

## headnerve (맥락한의원) 빠른 참조

| 항목 | 값 |
|------|-----|
| 운영 URL | https://headnerve.iwinv.net |
| 빌더 소스 폴더 | `_BUILDER_INPUT/app/` (로컬: `/Volumes/onoff/cursor/headnerve/_BUILDER_INPUT/app`) |
| 프로젝트 ID (제안) | `headnerve-main` |
| ZIP 업로드 | `/plugin/onoff-builder-bridge/admin/upload.php` |
| 공개 미리보기 | `/plugin/onoff-builder-bridge/page.php?id=headnerve-main` |
| PHP·스킨 배포 | `git push` → GitHub Actions FTP (`data/`, `_BUILDER_INPUT/**` 제외 권장) |
| 홈 UI 반영 | **관리자 ZIP 업로드 필수** (FTP만으로 React `dist` 미반영) |

**현재 상태:** `_BUILDER_INPUT/app/` 에는 `.gitkeep`만 있음 → 구글 스튜디오 ZIP을 풀어 넣은 뒤 **프롬프트 ①** 실행.

**프롬프트 ① (headnerve — 복사용)**

```
구글 스튜디오에서 받은 빌더 ZIP을 _BUILDER_INPUT/app/ 에 넣었습니다.
onoff-builder-bridge 방식으로 headnerve(맥락한의원) 그누보드에 배포할 예정입니다.

【프로젝트 정보】
- 사이트/고객명: 맥락한의원
- 빌더 소스 경로: /Volumes/onoff/cursor/headnerve/_BUILDER_INPUT/app
- 업로드용 프로젝트 ID: headnerve-main
- 관리용 표시 이름: 맥락한의원 메인
- 공개 URL 예정: /plugin/onoff-builder-bridge/page.php?id=headnerve-main
- 홈(/) 연결 여부: 루트 홈으로 쓸 예정 (index.php 또는 테마 index 연동 검토)

【요청】
1. package.json 확인 후 npm install, npm run build 실행
2. dist/index.html, dist/assets/ 존재 확인
3. dist 내용만 담은 ZIP 생성 (파일명: headnerve-main.zip, 루트에 index.html + assets/)
4. 업로드 전 체크리스트 표로 정리
5. _site.config.php·index.php 에서 빌더 홈 연결 방법 제안 (onlycebu 패턴 참고)

【금지】
- src/, node_modules/, package.json 을 ZIP에 넣지 말 것
- data/dbconfig.php 등 비밀번호 파일 커밋 금지
- git commit/push는 내가 요청할 때만
```

---

## 사전 준비 (직접 수행)

| 단계 | 작업 |
|------|------|
| 1 | 빌더에서 프로젝트 ZIP 다운로드·압축 해제 |
| 2 | 프로젝트 루트에 `package.json`, `src/`, `vite.config.ts` 확인 |
| 3 | 작업 폴더에 배치 (예: `_BUILDER_INPUT/app/`) |
| 4 | 터미널: `npm install` → `npm run build` → `dist/` 확인 |
| 5 | **dist 안** `index.html` + `assets/` 만 ZIP (루트에 `dist/` 폴더명 없이) |
| 6 | 관리자 `upload.php` 업로드 → `page.php?id=프로젝트ID` 확인 |

**올바른 ZIP 구조**

```
index.html
assets/
  index-xxxxxxxx.js
  index-xxxxxxxx.css
```

**잘못된 ZIP:** `src/`, `package.json`, `node_modules/`, `dist/` 폴더만 통째로 압축

---

## 프롬프트 ① — ZIP 넣은 직후 (빌드·ZIP·ID 정리)

아래 `[...]` 를 실제 값으로 바꾼 뒤 Cursor에 붙여넣습니다.

```
구글 스튜디오에서 받은 빌더 ZIP을 _BUILDER_INPUT/app/ 에 넣었습니다.
onoff-builder-bridge 방식으로 그누보드에 배포할 예정입니다.

【프로젝트 정보】
- 사이트/고객명: [예: OO컴퍼니]
- 빌더 소스 경로: [예: /Volumes/onoff/cursor/onlycebu/_BUILDER_INPUT/app]
- 업로드용 프로젝트 ID: [예: oo-main] (영문 소문자·숫자·-_ 만)
- 관리용 표시 이름: [예: OO 메인 랜딩]
- 공개 URL 예정: /plugin/onoff-builder-bridge/page.php?id=[프로젝트ID]
- 홈(/) 연결 여부: [예: 루트 홈으로 쓸 예정 / 메뉴 1번만 연결]

【요청】
1. package.json 확인 후 npm install, npm run build 실행
2. dist/index.html, dist/assets/ 존재 확인
3. dist 내용만 담은 ZIP 생성 (파일명: [예: oo-main.zip], 루트에 index.html + assets/)
4. 업로드 전 체크리스트 표로 정리
5. onlycebu 참고 시 _site.config.php 의 home_builder_bridge_id 연결 방법도 짧게 안내

【금지】
- src/, node_modules/, package.json 을 ZIP에 넣지 말 것
- data/dbconfig.php 등 비밀번호 파일 커밋 금지
- git commit/push는 내가 요청할 때만
```

---

## 프롬프트 ② — 빌드만 다시 (디자인 수정 후)

```
_BUILDER_INPUT/app/ React 소스를 수정했습니다.
배포용 ZIP만 다시 만들어 주세요.

1. cd "[빌더 소스 경로]" 후 npm run build
2. dist/index.html, dist/assets/ 확인
3. dist 내용만 [프로젝트ID].zip 으로 압축 (Archive.zip 이름 변경 포함)
4. 서버에 같은 ID가 있으면: 목록에서 삭제 후 재업로드 필요하다고 안내

commit/push 하지 마세요.
```

---

## 프롬프트 ③ — onlycebu 스타일 통합 (게시판·메뉴·홈)

onlycebu처럼 **빌더 홈 + 그누보드 게시판**을 같이 쓸 때:

```
이 프로젝트를 onlycebu.com 과 같은 패턴으로 맞춰 주세요.

【현재】
- 빌더 프로젝트 ID: [onlycebu2 / oo-main 등]
- 게시판: [notice, howto 등 bo_table 목록]
- 빌더 소스: _BUILDER_INPUT/app/

【목표】
1. 루트 URL(/)은 빌더 홈 유지 (리다이렉트 없이)
2. 게시판(notice/howto 등)은 onlycebu 레이아웃: 전용 nav·footer·dark 테마 (ONLYCEBU_BOARD_LAYOUT)
3. 메뉴: 회사소개(#company), 뉴스(/howto), 공지(/notice), 검색(#search), 상담 예약(챗)
4. 홈 React와 게시판 PHP 메뉴바 동일하게

【참고 파일 (onlycebu)】
- extend/onlycebu_board_layout.extend.php
- plugin/onoff-builder-bridge/lib/onlycebu-board-layout.php
- plugin/onoff-builder-bridge/layout/onlycebu-board-chrome.php
- skin/board/onlycebu/
- _site.config.php → home_builder_bridge_id

먼저 수정·생성할 파일 목록만 제시하고, 확인 후 구현해 주세요.
FTP/커밋은 요청 전까지 하지 마세요.
```

---

## 프롬프트 ④ — 관리자 업로드 후 오류 해결

```
빌더 ZIP을 upload.php 에 업로드했는데 문제가 있습니다.

【정보】
- 프로젝트 ID: [ID]
- 증상: [흰 화면 / 404 assets / 원본 React 프로젝트 오류 메시지 / 기타]
- page.php URL: [전체 URL]
- ZIP 구조: [index.html이 루트인지, dist/ 안에 있는지]

【요청】
1. ZIP 구조·빌드 산출물이 올바른지 진단
2. F12에서 예상되는 Console/Network 오류와 해결책
3. 필요 시 npm run build · ZIP 재생성 절차
4. onlycebu의 home-latest.js·React DOM 충돌 여부도 참고

코어 /bbs /lib 수정은 최소화하고, 플러그인·빌더 쪽만 제안해 주세요.
```

---

## 프롬프트 ⑤ — 커밋·FTP 배포 (PHP/스킨만)

> **주의:** `_BUILDER_INPUT/**` 는 GitHub Actions FTP에서 **제외**됩니다. 홈 UI 변경은 **관리자 ZIP 업로드**가 필수입니다.

```
다음 변경을 git commit 후 main push 해 주세요. (FTP 자동 배포)

【포함】
- [예: plugin/onoff-builder-bridge/, skin/board/onlycebu/, extend/]

【제외】
- data/dbconfig.php, data/dbconfig.local.php
- node_modules/, _BUILDER_INPUT/app/dist/

【커밋 메시지】
[예: fix(board): 게시판 툴바 버튼 크기 통일]

push 후: 빌더 홈 반영은 onlycebu-main.zip 을 관리자 onlycebu2(또는 [ID])에 수동 업로드 필요하다고 알려 주세요.
```

---

## 프롬프트 ⑥ — 새 사이트에 onlycebu 템플릿 복사

```
onoff-g5-base 또는 onlycebu 레포를 복사해 [새 사이트명] 프로젝트를 시작합니다.

1. setup/replace-checklist.md 기준으로 _site.config.php, site.sample.json 치환 목록 작성
2. onoff-builder-bridge 플러그인은 그대로 두고, 빌더 ZIP 배포 흐름만 문서화
3. _BUILDER_INPUT/app/ 에 넣을 빌더 ZIP 구조 점검
4. 아직 코드 수정·commit/push/FTP 하지 말고 계획만

참고: BUILDER-ZIP-DEPLOY-PROMPT.md, BUILDER-WORKFLOW.md, plugin/onoff-builder-bridge/docs/BUILDER-BUILD-GUIDE.md
```

---

## 체크리스트 (배포 전·후)

| # | 확인 |
|---|------|
| ☐ | `npm install` 완료 |
| ☐ | `npm run build` → `dist/index.html`, `dist/assets/` 존재 |
| ☐ | ZIP 루트 = `index.html` + `assets/` (src·node_modules 없음) |
| ☐ | `upload.php` 업로드 성공 |
| ☐ | `page.php?id=...` 브라우저에서 정상 |
| ☐ | 메뉴 또는 홈(`index.php` / `_site.config.php`) 연결 |
| ☐ | 게시판 URL은 그누보드 그대로 동작 |
| ☐ | 홈 UI 변경 시 **관리자 ZIP 재업로드** (FTP만으로는 React 미반영) |

---

## onlycebu 참고 URL

| 항목 | URL/경로 |
|------|----------|
| ZIP 업로드 | `https://onlycebu.com/plugin/onoff-builder-bridge/admin/upload.php` |
| 프로젝트 목록 | `.../admin/list.php` |
| 공개 페이지 | `.../page.php?id=onlycebu2` (실제 ID는 list.php에서 확인) |
| 빌드 가이드 | `plugin/onoff-builder-bridge/docs/BUILDER-BUILD-GUIDE.md` |
| FTP 제외 | `.github/workflows/deploy.yml` → `_BUILDER_INPUT/**` |

---

## 배포 방식 비교

| 방식 | 용도 |
|------|------|
| **빌더 dist ZIP → upload.php** | 랜딩·메인 전체 화면 (이 문서) ✅ |
| **section/*.php + custom.css** | 그누보드 head/tail·게시판과 한 몸 |
| **Git push (main)** | PHP·플러그인·스킨·CSS (data·_BUILDER_INPUT 제외) |

---

## 프롬프트 ⑤ — 그누보드 팝업레이어 × onoff-builder 연동

관리자 **환경설정 → 팝업레이어관리**에 등록한 팝업을 빌더 홈(React SPA)에 표시할 때 사용합니다.

### 자동 연동 (권장 · React 수정 최소)

서버(onoff-builder-bridge)가 빌더 HTML에 팝업을 **PHP로 자동 주입**합니다. 빌더 ZIP에 별도 팝업 UI를 넣지 않아도 됩니다.

| 조건 | 팝업 표시 |
|------|-----------|
| 프로젝트가 사이트 홈(`/`)으로 연결됨 | 자동 표시 |
| `imports.json` 에 `"popup_layer": true` | `page.php?id=...` 에서도 표시 |
| `"popup_layer": false` | 해당 프로젝트에서는 숨김 |

**관리자 토글:** `plugin/onoff-builder-bridge/admin/list.php` → 프로젝트별 「팝업레이어」 체크

**팝업 내용 수정:** 그누보드 관리자 → 환경설정 → 팝업레이어관리 (빌더 재빌드 불필요)

```
【상황】
- onoff-builder-bridge 프로젝트 ID: [headnerve-main 등]
- 홈(/) 또는 page.php 로 빌더 SPA 출력 중
- 그누보드 팝업레이어관리에 팝업 등록함

【요청】
1. 이 빌더 프로젝트에 그누보드 팝업레이어가 노출되도록 onoff-builder-bridge 연동 확인
2. imports.json 의 popup_layer 설정 및 홈 연결(home_builder_bridge_id) 점검
3. index.php 에서 _INDEX_ 정의 시점·빌더 렌더 순서 확인
4. 필요 시 _BUILDER_INPUT/app 에 GnuboardPopupLayer 컴포넌트 추가 (로컬 dev·API fallback용)

【React 선택 연동 파일】
- src/lib/popupLayer.ts
- src/components/common/GnuboardPopupLayer.tsx
- Layout.tsx 홈 경로에 <GnuboardPopupLayer projectId="[프로젝트ID]" fetchWhenMissing />

【주의】
- 운영 서버는 PHP 주입(#hd_pop)이 우선 → React 컴포넌트는 #hd_pop 이 없을 때만 렌더
- 팝업 수정은 관리자 팝업레이어관리만 변경 (ZIP 재업로드 불필요)
- git commit/push·FTP 배포는 내가 요청할 때만
```

### 새 빌더 프로젝트 체크리스트

1. `_site.config.php` → `home_builder_bridge_id` = 프로젝트 ID
2. `plugin/onoff-builder-bridge/data/imports.json` → `"popup_layer": true` (홈 프로젝트)
3. `index.php` 가 빌더 홈을 출력하는지 확인
4. (선택) React `GnuboardPopupLayer` — 로컬 `npm run dev` 미리보기용

---

## Cursor에 ZIP 폴더만 맡길 때 (한 줄)

```
_BUILDER_INPUT/app 에 구글 스튜디오 ZIP 풀어뒀어. npm install → build → dist만 [프로젝트ID].zip 만들고, upload.php 업로드·page.php?id=[ID]·메뉴 URL까지 onlycebu 방식으로 정리해줘. commit은 하지 마.
```
