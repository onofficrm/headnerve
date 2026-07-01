import { Outlet, useLocation } from 'react-router-dom';
import { Header } from './Header';
import { Footer } from './Footer';
import { MobileBottomCTA } from './MobileBottomCTA';
import { GnuboardPopupLayer } from '../common/GnuboardPopupLayer';

export function Layout() {
  const location = useLocation();
  const isHome = location.pathname === '/';

  return (
    <div className={`flex flex-col font-sans text-maekrak-text bg-white ${isHome ? 'h-[100dvh] overflow-hidden' : 'min-h-screen'}`}>
      {isHome ? (
        <GnuboardPopupLayer projectId="headnerve-main" fetchWhenMissing />
      ) : null}
      <Header />
      <main className={isHome ? 'flex-grow h-full relative' : 'flex-grow pt-20'}>
        <Outlet />
      </main>
      {!isHome && <Footer />}
      <MobileBottomCTA />
    </div>
  );
}
