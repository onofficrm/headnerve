/** 그누보드 게시판 URL (빌더 SPA 외부) */

export function boardUrl(boTable: string): string {
  return `/${encodeURIComponent(boTable)}`;
}

export const BOOKING_URL = 'https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1';
export const KAKAO_CHAT_URL = 'http://pf.kakao.com/_PxdavG';
export const NAVER_PLACE_URL = 'https://map.naver.com/p/entry/place/1769198478?placePath=%252Fhome%253Fentry%253Dplt&searchType=place&lng=126.9758741&lat=37.5635861&c=15.00,0,0,0,dh';
export const NAVER_BLOG_URL = 'https://blog.naver.com/rlarnwl67696';

export const BOARD_TABLES = {
  notice: 'notice',
  news: 'news',
  column: 'column',
  reviews: 'reviews',
} as const;

export const BOARD_URLS = {
  notice: boardUrl(BOARD_TABLES.notice),
  news: boardUrl(BOARD_TABLES.news),
  column: boardUrl(BOARD_TABLES.column),
  reviews: boardUrl(BOARD_TABLES.reviews),
} as const;

/** 네이버 카페 — 커뮤니티 질문하기 */
export const NAVER_CAFE_URL = 'https://cafe.naver.com/leeaj1';

export type NavMenuItem = {
  name: string;
  href: string;
  external?: boolean;
  subLinks?: NavMenuItem[];
};

/** 헤더·푸터 커뮤니티 메뉴 */
export const COMMUNITY_NAV: NavMenuItem = {
  name: '커뮤니티',
  href: BOARD_URLS.column,
  external: true,
  subLinks: [
    { name: '블로그', href: BOARD_URLS.column, external: true },
    { name: '질문하기', href: NAVER_CAFE_URL, external: true },
    { name: '공지사항', href: BOARD_URLS.notice, external: true },
  ],
};

export function isExternalNavHref(href: string): boolean {
  return (
    href.startsWith('/bbs/') ||
    href === BOARD_URLS.notice ||
    href === BOARD_URLS.column ||
    href === BOARD_URLS.reviews ||
    href.startsWith('http://') ||
    href.startsWith('https://') ||
    href.startsWith('//') ||
    href.startsWith('tel:')
  );
}
