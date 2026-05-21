# 맥락한의원 테마 운영 가이드

## 사이트 설정 (`theme/basic/inc/site_config.php`)

| 상수 | 용도 |
|------|------|
| `MK_CLINIC_*` | 원명, 전화, 주소, 진료시간 |
| `MK_BLOG_BOARD` | 블로그 게시판 ID (`blog`) |
| `MK_RESERVE_URL` | [네이버 예약](https://m.booking.naver.com/booking/13/bizes/1120036) |
| `MK_KAKAO_URL` | [카카오톡 채널](https://pf.kakao.com/_PxdavG/chat) |
| `MK_KAKAO_MAP_APP_KEY` | 카카오맵 JS 키 (또는 관리자 `cf_kakao_js_apikey`) |
| `MK_HERO_HOME` | 홈 히어로 이미지 basename (`img/hero/home.svg` 등) |

서버 전용 override: `inc/maekrak_local_config.php` (git 제외 권장)

## 히어로·에셋 (10차)

- **경로**: `theme/basic/img/hero/` — `home`, `headache`, `dizziness`, `autonomic`, `peripheral`, `brainfog` (SVG placeholder, JPG/WebP로 교체 가능)
- **의료진 사진**: `theme/basic/img/doctors/` — `site_config.php` `$maekrak_doctors[].photo`에 파일명 (예: `lee.jpg`)
- **1층 FAQ**: `condition_data.php` · JSON-LD `inc/faq_jsonld.php`
- **2층 builder**: `hero_variant` + parent별 accent (`--maekrak-dis-accent`)

## 페이지 구조

- **홈**: `index.php` → `inc/main_content.php`
- **1층 진료과목** (5): `content.php?co_id=headache` 등 · 스킨 `theme/maekrak_condition`
- **2층 질환** (23): `content.php?co_id=migraine` 등 · 스킨 `theme/maekrak_disease`
- **블로그**: `/bbs/board.php?bo_table=blog` · 스킨 `theme/maekrak_blog`

### 2층 co_id (20자 제한)

긴 ID는 짧게 변경됨: `cervicogenic_hd`, `orthostatic_hp`, `peripheral_neuro`

## 배포

```bash
git ftp push   # ftp://headnerve.iwinv.net/public_html/
```

macOS `._*` 파일이 있으면 `git restore` 후 push.

## SEO (9차)

- **OG 이미지**: `theme/basic/img/og-maekrak.svg` · `MK_OG_IMAGE_URL`
- **사이트맵**: [theme/basic/sitemap_maekrak.php](sitemap_maekrak.php) — Search Console·네이버 서치어드바이저에 URL 제출
- **카카오맵 키**: [Kakao Developers](https://developers.kakao.com) → 앱 키 → **플랫폼**에 `headnerve.iwinv.net` 등록. 코드 키는 `maekrak_local_config.php`로 옮기는 것을 권장

## 정적 페이지 (9차)

- `company` · `privacy` · `provision` — 스킨 `theme/maekrak_page` (install 1회 등록)

## 2층 수작업 보강 (9·11차)

**전체 23개** 수작업 — [`disease_data.php`](inc/disease_data.php) core 3종 + [`disease_handcrafted_extra.php`](inc/disease_handcrafted_extra.php) 20종.

**어지럼 4종 원장 문안 반영** (DOCX): `cervical_dizziness`, `meniere`, `bppv`, `vestibular_neuritis` — AI 앵커·맥락 관점·치료(두맥탕/약침/추나)·FAQ·사례 요약

## 10차 QA 체크리스트

- [ ] 홈·1층 5·2층 23: 히어로 이미지 표시, 없을 때 CSS fallback
- [ ] 1층 5개: FAQ 아코디언 + FAQPage JSON-LD
- [ ] 2층 builder 14개: parent별 accent·variant 구분
- [ ] 블로그 목록: 썸네일 없을 때 카테고리별 기본 이미지
- [ ] 의료진: `img/doctors/` 실사진 교체 시 카드 반영
- [ ] 모바일: 히어로·FAQ·블로그 카드 레이아웃

## 런칭 체크리스트

- [ ] 홈: 지도·네이버 예약·카카오톡 버튼
- [ ] GNB: 진료과목 2단·블로그 URL
- [ ] 1층 5개 + 2층 23개 URL 200 및 본문 표시
- [ ] 블로그 샘플/실제 글·카테고리 매칭 (샘플 최대 19건)
- [ ] 푸터: 소개·개인정보·이용약관 페이지
- [ ] 모바일 하단 CTA (예약·전화·카카오)
- [ ] 사이트맵 제출
- [ ] 관리자: install 스크립트 삭제 여부

## 블로그 카테고리

`두통|어지럼증|자율신경|말초신경|브레인포그|편두통|군발두통|사례|건강정보`

1·2층 페이지 `blog_category`와 게시글 분류명을 동일하게 맞출 것.
