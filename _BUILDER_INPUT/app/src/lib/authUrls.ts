/** 그누보드 회원 페이지 (빌더 SPA 외부) */
export const AUTH_URLS = {
  login: '/bbs/login.php',
  register: '/bbs/register.php',
  passwordLost: '/bbs/password_lost.php',
  logout: '/bbs/logout.php',
  myInfo: '/bbs/member_confirm.php?url=register_form.php',
} as const;

export type HeadnerveAuthState = {
  loggedIn: boolean;
  loginUrl: string;
  logoutUrl: string;
  myInfoUrl: string;
};

declare global {
  interface Window {
    __HEADNERVE_AUTH__?: HeadnerveAuthState;
  }
}

export function getHeadnerveAuthState(): HeadnerveAuthState {
  const injected = window.__HEADNERVE_AUTH__;
  if (injected) {
    return injected;
  }

  return {
    loggedIn: false,
    loginUrl: AUTH_URLS.login,
    logoutUrl: AUTH_URLS.logout,
    myInfoUrl: AUTH_URLS.myInfo,
  };
}
