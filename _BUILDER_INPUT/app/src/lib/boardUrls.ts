/** 그누보드 게시판 URL (빌더 SPA 외부) */

export function boardUrl(boTable: string): string {
  return `/bbs/board.php?bo_table=${encodeURIComponent(boTable)}`;
}

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
  href: BOARD_URLS.notice,
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
    href.startsWith('http://') ||
    href.startsWith('https://') ||
    href.startsWith('tel:')
  );
}
