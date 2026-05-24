import { Outlet, useLocation } from 'react-router-dom';
import { Header } from './Header';
import { Footer } from './Footer';
import { MobileBottomCTA } from './MobileBottomCTA';
import { FloatingQuickMenu } from './FloatingQuickMenu';

export function Layout() {
  const location = useLocation();
  const isHome = location.pathname === '/';

  return (
    <div className={`flex flex-col font-sans text-maekrak-text bg-white ${isHome ? 'h-[100dvh] overflow-hidden' : 'min-h-screen'}`}>
      <Header />
      <main className={isHome ? 'flex-grow h-full relative' : 'flex-grow pt-20'}>
        <Outlet />
      </main>
      {!isHome && <Footer />}
      <MobileBottomCTA />
      <FloatingQuickMenu />
    </div>
  );
}
