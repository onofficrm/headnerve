export type OnoffBuilderPopupLayer = {
  id: number;
  top: number;
  left: number;
  width: number;
  height: number;
  disableHours: number;
  subject: string;
  html: string;
  cookieName: string;
};

export type OnoffBuilderPopupBootstrap = {
  cssUrl?: string;
  layers: OnoffBuilderPopupLayer[];
};

declare global {
  interface Window {
    __ONOFF_BUILDER_POPUP__?: OnoffBuilderPopupBootstrap;
  }
}

export function getOnoffBuilderPopupBootstrap(): OnoffBuilderPopupBootstrap | null {
  const injected = window.__ONOFF_BUILDER_POPUP__;
  if (!injected || !Array.isArray(injected.layers)) {
    return null;
  }
  return injected;
}

export function isPopupCookieHidden(cookieName: string): boolean {
  if (!cookieName) return false;
  return document.cookie.split(';').some((part) => part.trim().startsWith(`${cookieName}=`));
}

export function setPopupCookie(cookieName: string, hours: number): void {
  const expires = new Date();
  expires.setTime(expires.getTime() + hours * 60 * 60 * 1000);
  document.cookie = `${cookieName}=1; path=/; expires=${expires.toUTCString()};`;
}

export async function fetchOnoffBuilderPopupLayers(projectId: string): Promise<OnoffBuilderPopupBootstrap | null> {
  if (!projectId) return null;
  const url = `/plugin/onoff-builder-bridge/api/popup-layer.php?project_id=${encodeURIComponent(projectId)}`;
  try {
    const res = await fetch(url, { credentials: 'same-origin' });
    if (!res.ok) return null;
    const data = await res.json();
    if (!data?.ok || !Array.isArray(data.layers) || data.layers.length === 0) {
      return null;
    }
    return {
      cssUrl: typeof data.cssUrl === 'string' ? data.cssUrl : '',
      layers: data.layers,
    };
  } catch {
    return null;
  }
}
