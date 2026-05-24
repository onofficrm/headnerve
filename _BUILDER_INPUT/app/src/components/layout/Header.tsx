import { useState, useEffect } from 'react';
import { Menu, X, Phone, Calendar, LogIn } from 'lucide-react';
import { Link, useLocation } from 'react-router-dom';
import { cn } from '../../lib/utils';
import { Logo } from '../common/Logo';
import { AUTH_URLS } from '../../lib/authUrls';
import { COMMUNITY_NAV, type NavMenuItem } from '../../lib/boardUrls';
import { NavMenuLink } from './NavMenuLink';

export function Header() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const location = useLocation();
  const isHomePage = location.pathname === '/';

  useEffect(() => {
    const handleScroll = (e: Event) => {
      setIsScrolled((e.target as HTMLElement).scrollTop > 50 || window.scrollY > 50);
    };
    
    window.addEventListener('scroll', handleScroll, { passive: true });
    const snapContainer = document.querySelector('.maekrak-snap-container');
    if (snapContainer) {
      snapContainer.addEventListener('scroll', handleScroll, { passive: true });
    }

    return () => {
      window.removeEventListener('scroll', handleScroll);
      if (snapContainer) {
        snapContainer.removeEventListener('scroll', handleScroll);
      }
    };
  }, []);

  const navLinks: NavMenuItem[] = [
    { name: '맥락한의원소개', href: '/about' },
    { 
      name: '맥락 치료프로그램', 
      href: '/programs',
      subLinks: [
        { name: '두통치료프로그램', href: '/headache' },
        { name: '어지럼증치료프로그램', href: '/dizziness' },
        { name: '말초신경병증치료프로그램', href: '/neuropathy' },
        { name: '자율신경치료프로그램', href: '/autonomic' },
        { name: '브레인포그 치료 프로그램', href: '/brainfog' },
      ]
    },
    { 
      name: '두통', 
      href: '/headache', 
      subLinks: [
        { name: '편두통', href: '/headache/migraine' },
        { name: '긴장형 두통', href: '/headache/tension' },
        { name: '약물과용 두통', href: '/headache/medication-overuse' },
        { name: '경추성 두통', href: '/headache/cervicogenic' },
        { name: '군발성 두통', href: '/headache/cluster' },
        { name: '생리 두통', href: '/headache/menstrual' },
        { name: '소아 편두통', href: '/headache/pediatric' },
        { name: '수험생 두통', href: '/headache/student' },
      ]
    },
    { 
      name: '어지럼증', 
      href: '/dizziness', 
      subLinks: [
        { name: '경추성 어지럼증', href: '/dizziness/cervicogenic' },
        { name: '메니에르병', href: '/dizziness/menieres' },
        { name: '이석증', href: '/dizziness/bppv' },
        { name: '전정신경염', href: '/dizziness/vestibular-neuritis' },
      ]
    },
    { 
      name: '자율신경', 
      href: '/autonomic', 
      subLinks: [
        { name: '자율신경실조증', href: '/autonomic/dysautonomia' },
        { name: '기립성저혈압', href: '/autonomic/orthostatic-hypotension' },
        { name: '공항/불안장애', href: '/autonomic/panic-anxiety' },
        { name: '불면', href: '/autonomic/insomnia' },
      ]
    },
    { 
      name: '말초신경병증', 
      href: '/neuropathy', 
      subLinks: [
        { name: '특발성 말초신경병증', href: '/neuropathy/idiopathic' },
        { name: '당뇨병성 말초신경병증', href: '/neuropathy/diabetic' },
        { name: '항암후 말초신경병증', href: '/neuropathy/chemo' },
      ]
    },
    { 
      name: '브레인포그', 
      href: '/brainfog',
      subLinks: [
        { name: '코로나 후유증 브레인포그', href: '/brainfog/post-covid' },
        { name: '만성피로 브레인포그', href: '/brainfog/chronic-fatigue' },
        { name: '수험생 브레인포그', href: '/brainfog/students' },
      ]
    },
    COMMUNITY_NAV,
  ];

  const headerBgClass = isScrolled || !isHomePage ? 'glass-nav border-gray-100 shadow-sm' : 'bg-transparent border-transparent';

  return (
    <header className={cn('fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b', headerBgClass, isHomePage ? 'h-[90px]' : 'h-20')}>
      <div className="w-full h-full px-6 md:px-12 flex justify-between items-center">
        {/* Logo */}
        <Link to="/" className="flex items-center gap-3">
          <Logo className={cn("h-10 md:h-12 w-auto transition-colors", isScrolled || !isHomePage ? "text-maekrak-navy" : "text-white")} />
        </Link>

        {/* Center / Right Nav */}
        <div className="flex items-center gap-6 md:gap-12">
          <nav className={cn("hidden xl:flex gap-10 text-[15px] font-medium transition-colors", isScrolled || !isHomePage ? "text-gray-800" : "text-white")}>
            {navLinks.map((link) => (
              <div key={link.name} className="relative group">
                <NavMenuLink
                  href={link.href}
                  external={link.external}
                  className="hover:opacity-70 transition-opacity py-2 flex items-center"
                >
                  {link.name}
                </NavMenuLink>
                {link.subLinks && (
                  <div className="absolute top-full left-0 mt-2 w-48 bg-white border border-gray-100 shadow-lg rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-3 z-50">
                    {link.subLinks.map(subLink => (
                      <NavMenuLink
                        key={subLink.name}
                        href={subLink.href}
                        external={subLink.external ?? link.external}
                        className="block px-5 py-2.5 text-sm text-gray-700 hover:text-maekrak-accent hover:bg-gray-50 transition-colors"
                      >
                        {subLink.name}
                      </NavMenuLink>
                    ))}
                  </div>
                )}
              </div>
            ))}
          </nav>
          
          <div className="hidden md:flex items-center gap-3">
             <a
               href={AUTH_URLS.login}
               className={cn(
                 "px-5 py-3 rounded-full text-[14px] font-semibold tracking-wide transition-all border",
                 isScrolled || !isHomePage
                   ? "border-gray-200 text-maekrak-navy hover:border-maekrak-navy hover:bg-gray-50"
                   : "border-white/40 text-white hover:bg-white/10"
               )}
             >
               로그인
             </a>
             <a href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1" target="_blank" rel="noopener noreferrer" className={cn("px-8 py-3 rounded-full text-[14px] font-bold tracking-wide transition-all shadow-md", isScrolled || !isHomePage ? "bg-maekrak-navy text-white hover:bg-maekrak-navy-light shadow-blue-900/10" : "bg-white text-maekrak-navy hover:bg-gray-100 shadow-black/10")}>
               상담 예약하기
             </a>
             <button onClick={() => setMobileMenuOpen(true)} className={cn("w-12 h-12 flex items-center justify-center rounded-full border transition-all cursor-pointer", isScrolled || !isHomePage ? "border-gray-300 text-gray-800 hover:bg-gray-50" : "border-white/30 text-white hover:bg-white/10")}>
               <Menu className="w-5 h-5" />
             </button>
          </div>

          <button onClick={() => setMobileMenuOpen(true)} className={cn("md:hidden p-2", isScrolled || !isHomePage ? "text-gray-900" : "text-white")}>
            <Menu className="w-7 h-7" />
          </button>
        </div>
      </div>

      {/* Mobile/Overlay Menu Panel */}
      {mobileMenuOpen && (
        <div className="fixed inset-0 bg-white z-[60] flex flex-col animate-in fade-in slide-in-from-right-4 duration-300">
          <div className="h-20 px-6 flex justify-between items-center border-b border-gray-100 shrink-0">
             <Logo className="h-8 w-auto text-maekrak-navy" />
             <button onClick={() => setMobileMenuOpen(false)} className="p-2 text-gray-900"><X className="w-7 h-7" /></button>
          </div>
          <div className="flex-1 overflow-y-auto p-6 md:p-12 flex flex-col gap-6">
            <h3 className="text-sm font-bold tracking-widest text-gray-400 mb-4 uppercase">Menu</h3>
            {navLinks.map(link => (
              <div key={link.name} className="flex flex-col gap-3">
                <NavMenuLink
                  href={link.href}
                  external={link.external}
                  className="text-3xl font-light text-gray-800 hover:text-maekrak-accent transition-colors"
                  onClick={() => !link.subLinks && setMobileMenuOpen(false)}
                >
                  {link.name}
                </NavMenuLink>
                {link.subLinks && (
                  <div className="pl-6 flex flex-col gap-3 mt-2 border-l border-gray-100">
                    {link.subLinks.map(subLink => (
                      <NavMenuLink
                        key={subLink.name}
                        href={subLink.href}
                        external={subLink.external ?? link.external}
                        className="text-xl font-light text-gray-600 hover:text-maekrak-accent transition-colors"
                        onClick={() => setMobileMenuOpen(false)}
                      >
                        {subLink.name}
                      </NavMenuLink>
                    ))}
                  </div>
                )}
              </div>
            ))}
            <div className="mt-auto pt-10 flex flex-col gap-3">
              <a href={AUTH_URLS.login} className="py-4 border border-gray-200 rounded-2xl flex items-center justify-center gap-2 text-maekrak-navy font-bold hover:bg-gray-50 transition-colors" onClick={() => setMobileMenuOpen(false)}>
                <LogIn className="w-5 h-5" /> <span>로그인</span>
              </a>
              <div className="grid grid-cols-2 gap-3">
                <a href="tel:02-6959-7252" className="py-5 bg-gray-50 rounded-2xl flex flex-col items-center justify-center gap-2 text-maekrak-navy font-bold hover:bg-gray-100 transition-colors">
                  <Phone className="w-6 h-6" /> <span>전화상담</span>
                </a>
                <a href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1" target="_blank" rel="noopener noreferrer" className="py-5 bg-maekrak-navy text-white rounded-2xl flex flex-col items-center justify-center gap-2 font-bold hover:bg-maekrak-navy-light transition-colors" onClick={() => setMobileMenuOpen(false)}>
                  <Calendar className="w-6 h-6" /> <span>예약하기</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      )}
    </header>
  );
}

