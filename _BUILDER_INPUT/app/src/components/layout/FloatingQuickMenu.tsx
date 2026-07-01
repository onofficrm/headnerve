import { useState, type ReactNode } from 'react';
import { ArrowUp, Plus, X, Youtube } from 'lucide-react';
import { BOOKING_URL, KAKAO_CHAT_URL, NAVER_CAFE_URL } from '../../lib/boardUrls';

const menuItems = [
  {
    label: '질문하기',
    href: NAVER_CAFE_URL,
    icon: (
      <div className="w-[22px] h-[22px] bg-[#03C75A] text-white flex items-center justify-center rounded-[5px] font-bold text-[8px] leading-none tracking-tighter pt-0.5">
        cafe
      </div>
    ),
  },
  {
    label: '예약하기',
    href: BOOKING_URL,
    icon: (
      <div className="w-[22px] h-[22px] bg-[#03C75A] text-white flex items-center justify-center rounded-sm font-bold text-[14px] leading-none">
        N
      </div>
    ),
  },
  {
    label: '네이버 TV',
    href: 'https://tv.naver.com/headache123?tab=highlight',
    icon: (
      <div className="text-[#03C75A] -ml-0.5">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M6 4l14 8-14 8z" /></svg>
      </div>
    ),
  },
  {
    label: '유튜브',
    href: 'https://youtube.com/channel/UC_DMpaxnafqqkS3cpdJz7GA?si=ZZfgZMLOaHqHgWGc',
    icon: <Youtube className="w-6 h-6 text-[#FF0000]" fill="currentColor" />,
  },
  {
    label: '블로그',
    href: 'https://blog.naver.com/rlarnwl67696',
    icon: (
      <div className="w-[22px] h-[22px] bg-[#03C75A] text-white flex items-center justify-center rounded-[5px] font-bold text-[9px] leading-none tracking-tighter pt-0.5">
        blog
      </div>
    ),
  },
  {
    label: '상담하기',
    href: KAKAO_CHAT_URL,
    icon: (
      <div className="relative w-6 h-[18px] flex items-center justify-center">
        <div className="absolute inset-0 bg-[#3A1D1D] rounded-[8px]" />
        <div className="absolute w-2 h-2 bg-[#3A1D1D] bottom-[-3px] left-1 rotate-45" />
        <span className="relative z-10 text-[#FEE500] font-bold text-[8px] leading-none pt-[1px] tracking-tight">TALK</span>
      </div>
    ),
  },
];

function FloatingMenuLink({
  href,
  icon,
  label,
  onNavigate,
}: {
  href: string;
  icon: ReactNode;
  label: string;
  onNavigate?: () => void;
}) {
  const external = href.startsWith('http');

  return (
    <a
      href={href}
      target={external ? '_blank' : '_self'}
      rel={external ? 'noopener noreferrer' : undefined}
      onClick={onNavigate}
      className="flex items-center gap-3.5 bg-white px-5 py-3.5 rounded-full shadow-[0_4px_16px_rgba(0,0,0,0.08)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.12)] hover:-translate-y-1 transition-all w-[156px] border border-gray-50/50"
    >
      <div className="w-6 flex justify-center items-center shrink-0">{icon}</div>
      <span className="text-[15px] font-bold text-gray-800 whitespace-nowrap">{label}</span>
    </a>
  );
}

export function FloatingQuickMenu() {
  const [open, setOpen] = useState(false);

  const scrollToTop = () => {
    const snapContainer = document.querySelector('.maekrak-snap-container');
    if (snapContainer) {
      snapContainer.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    setOpen(false);
  };

  return (
    <>
      <div className="hidden md:flex fixed right-8 bottom-8 z-[70] flex-col gap-2 scale-[0.91] origin-bottom-right">
        {menuItems.map((item) => (
          <FloatingMenuLink key={item.label} {...item} />
        ))}
        <button
          type="button"
          onClick={scrollToTop}
          className="flex items-center gap-2 bg-[#00A650] text-white px-5 py-4 rounded-full shadow-[0_4px_16px_rgba(0,0,0,0.15)] hover:bg-[#009040] hover:-translate-y-1 transition-all w-[156px] justify-center mt-2 outline-none group"
        >
          <ArrowUp className="w-5 h-5 group-hover:-translate-y-0.5 transition-transform" strokeWidth={2.5} />
          <span className="text-[15px] font-bold">상단으로</span>
        </button>
      </div>

      {open ? (
        <button
          type="button"
          className="md:hidden fixed inset-0 z-[69] bg-slate-900/25"
          aria-label="빠른 메뉴 닫기"
          onClick={() => setOpen(false)}
        />
      ) : null}

      <div
        className="md:hidden fixed right-4 z-[70] flex flex-col-reverse items-end gap-3"
        style={{ bottom: 'calc(4.5rem + env(safe-area-inset-bottom, 0px))' }}
      >
        <button
          type="button"
          className="flex items-center justify-center w-14 h-14 rounded-full bg-[#00A650] text-white shadow-[0_4px_16px_rgba(0,0,0,0.18)]"
          aria-expanded={open}
          aria-label="빠른 메뉴"
          onClick={() => setOpen((prev) => !prev)}
        >
          {open ? <X className="w-6 h-6" strokeWidth={2.5} /> : <Plus className="w-6 h-6" strokeWidth={2.5} />}
        </button>

        <div
          className={`flex flex-col items-end gap-2 transition-all duration-200 ${
            open ? 'opacity-100 translate-y-0 pointer-events-auto' : 'opacity-0 translate-y-3 pointer-events-none'
          }`}
          aria-hidden={!open}
        >
          {menuItems.map((item) => (
            <FloatingMenuLink key={item.label} {...item} onNavigate={() => setOpen(false)} />
          ))}
          <button
            type="button"
            onClick={scrollToTop}
            className="flex items-center gap-2 bg-[#00A650] text-white px-5 py-4 rounded-full shadow-[0_4px_16px_rgba(0,0,0,0.15)] w-[156px] justify-center outline-none"
          >
            <ArrowUp className="w-5 h-5" strokeWidth={2.5} />
            <span className="text-[15px] font-bold">상단으로</span>
          </button>
        </div>
      </div>
    </>
  );
}
