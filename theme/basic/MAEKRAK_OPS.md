# 맥락한의원 테마 운영 가이드

## 사이트 설정 (`theme/basic/inc/site_config.php`)

| 상수 | 용도 |
|------|------|
| `MK_CLINIC_*` | 원명, 전화, 주소, 진료시간 |
| `MK_BLOG_BOARD` | 블로그 게시판 ID (`blog`) |
| `MK_RESERVE_URL` | [네이버 예약](https://m.booking.naver.com/booking/13/bizes/1120036) |
| `MK_KAKAO_URL` | [카카오톡 채널](https://pf.kakao.com/_PxdavG/chat) |
| `MK_KAKAO_MAP_APP_KEY` | 카카오맵 JS 키 (또는 관리자 `cf_kakao_js_apikey`) |

서버 전용 override: `inc/maekrak_local_config.php` (git 제외 권장)

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

## 런칭 체크리스트

- [ ] 홈: 지도·네이버 예약·카카오톡 버튼
- [ ] GNB: 진료과목 2단·블로그 URL
- [ ] 1층 5개 + 2층 23개 URL 200 및 본문 표시
- [ ] 블로그 샘플/실제 글·카테고리 매칭
- [ ] 모바일 하단 CTA (예약·전화·카카오)
- [ ] 관리자: install 스크립트 삭제 여부

## 블로그 카테고리

`두통|어지럼증|자율신경|말초신경|브레인포그|편두통|군발두통|사례|건강정보`

1·2층 페이지 `blog_category`와 게시글 분류명을 동일하게 맞출 것.
