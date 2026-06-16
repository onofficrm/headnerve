import { useEffect, useMemo, useState } from 'react';
import { createPortal } from 'react-dom';
import {
  fetchOnoffBuilderPopupLayers,
  getOnoffBuilderPopupBootstrap,
  isPopupCookieHidden,
  setPopupCookie,
  type OnoffBuilderPopupLayer,
} from '../../lib/popupLayer';

type Props = {
  /** onoff-builder 프로젝트 ID. 홈이면 home_builder_bridge_id 와 동일하게 지정 */
  projectId?: string;
  /** true 면 PHP 주입(#hd_pop)이 없을 때 API로 다시 조회 */
  fetchWhenMissing?: boolean;
};

function ensurePopupStylesheet(cssUrl?: string) {
  if (!cssUrl) return;
  const existing = document.querySelector(`link[data-onoff-popup-layer="1"]`);
  if (existing) return;
  const link = document.createElement('link');
  link.rel = 'stylesheet';
  link.href = cssUrl;
  link.setAttribute('data-onoff-popup-layer', '1');
  document.head.appendChild(link);
}

function PopupCard({
  layer,
  onClose,
  onReject,
}: {
  layer: OnoffBuilderPopupLayer;
  onClose: () => void;
  onReject: () => void;
}) {
  return (
    <div
      id={`hd_pops_${layer.id}`}
      className="hd_pops"
      style={{ top: `${layer.top}px`, left: `${layer.left}px` }}
    >
      <div
        className="hd_pops_con"
        style={{ width: `${layer.width}px`, height: `${layer.height}px` }}
        dangerouslySetInnerHTML={{ __html: layer.html }}
      />
      <div className="hd_pops_footer">
        <button type="button" className="hd_pops_reject" onClick={onReject}>
          <strong>{layer.disableHours}</strong>시간 동안 다시 열람하지 않습니다.
        </button>
        <button type="button" className="hd_pops_close" onClick={onClose}>
          닫기
        </button>
      </div>
    </div>
  );
}

/**
 * 그누보드 팝업레이어 (onoff-builder-bridge 연동)
 * - 운영 서버: PHP가 #hd_pop 을 주입하면 이 컴포넌트는 자동으로 숨김
 * - 로컬 dev / API 전용: projectId + fetchWhenMissing 로 조회
 */
export function GnuboardPopupLayer({ projectId = '', fetchWhenMissing = false }: Props) {
  const [layers, setLayers] = useState<OnoffBuilderPopupLayer[]>([]);
  const [hiddenIds, setHiddenIds] = useState<Set<number>>(new Set());
  const [phpHandled, setPhpHandled] = useState(false);

  const bootstrap = useMemo(() => getOnoffBuilderPopupBootstrap(), []);

  useEffect(() => {
    if (document.getElementById('hd_pop')) {
      setPhpHandled(true);
      return;
    }

    const boot = bootstrap;
    if (boot?.layers?.length) {
      ensurePopupStylesheet(boot.cssUrl);
      setLayers(boot.layers.filter((layer) => !isPopupCookieHidden(layer.cookieName)));
      return;
    }

    if (!fetchWhenMissing || !projectId) {
      return;
    }

    let cancelled = false;
    fetchOnoffBuilderPopupLayers(projectId).then((data) => {
      if (cancelled || !data?.layers?.length) return;
      ensurePopupStylesheet(data.cssUrl);
      setLayers(data.layers.filter((layer) => !isPopupCookieHidden(layer.cookieName)));
    });

    return () => {
      cancelled = true;
    };
  }, [bootstrap, fetchWhenMissing, projectId]);

  const visibleLayers = layers.filter((layer) => !hiddenIds.has(layer.id));
  if (phpHandled || visibleLayers.length === 0) {
    return null;
  }

  return createPortal(
    <div id="hd_pop">
      <h2 className="sr-only">팝업레이어 알림</h2>
      {visibleLayers.map((layer) => (
        <PopupCard
          key={layer.id}
          layer={layer}
          onClose={() => setHiddenIds((prev) => new Set(prev).add(layer.id))}
          onReject={() => {
            setPopupCookie(layer.cookieName, layer.disableHours || 24);
            setHiddenIds((prev) => new Set(prev).add(layer.id));
          }}
        />
      ))}
    </div>,
    document.body,
  );
}
