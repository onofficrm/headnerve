import { Check } from 'lucide-react';

const checklist = [
  { text: '진통제를 먹어도 효과가 점점 줄어들고 있습니다', checked: true },
  { text: '신경과·대학병원 검사는 정상인데 두통이 반복됩니다', checked: true },
  { text: '항CGRP 주사(아조비·앰갤러티)도 효과가 없었습니다', checked: true },
  { text: '두통과 어지럼증, 이명, 뒷목 통증이 함께 있습니다', checked: true },
  { text: '머리가 멍하고 집중이 안 되는데 원인을 모릅니다', checked: true },
  { text: '약 없이 건강한 일상으로 돌아가고 싶습니다', checked: true },
];

export function HeroSection() {
  const scrollToWhy = () => {
    const el = document.getElementById('why');
    const container = document.querySelector('.maekrak-snap-container');
    if (el && container instanceof HTMLElement) {
      container.scrollTo({ top: el.offsetTop, behavior: 'smooth' });
    }
  };

  return (
    <section className="maekrak-snap-section relative bg-maekrak-navy isolate w-full overflow-hidden" id="hero">
      <div className="absolute inset-0 z-0">
        <img
          src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2680&auto=format&fit=crop"
          alt=""
          className="w-full h-full object-cover opacity-40 mix-blend-overlay"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-maekrak-navy via-maekrak-navy/90 to-maekrak-navy/70" />
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_55%_70%_at_75%_50%,rgba(74,143,168,0.18),transparent)]" />
      </div>

      <div className="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 h-full pt-24 pb-12">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 h-full items-center">
          <div className="flex flex-col justify-center">
            <div className="inline-flex items-center gap-2 bg-[#4a8fa8]/15 border border-[#4a8fa8]/30 px-4 py-2 rounded-sm mb-6 w-fit">
              <span className="w-1.5 h-1.5 rounded-full bg-[#7ec8e0]" />
              <span className="text-[11px] font-bold text-[#7ec8e0] tracking-[0.14em] uppercase">
                침구과 전문의 · 두통 · 어지럼증 · 자율신경 전문 한의원
              </span>
            </div>

            <h1 className="font-serif text-[32px] sm:text-4xl md:text-[52px] leading-[1.35] font-medium text-white mb-6 tracking-tight break-keep">
              진통제도, 항CGRP 주사도
              <br />
              효과가 없다면,
              <br />
              <span className="text-[#7ec8e0] border-b-2 border-[#7ec8e0]/35">원인이 다른 것입니다</span>
            </h1>

            <p className="text-[15px] md:text-base text-white/65 leading-[2] max-w-md mb-8 border-l-2 border-[#4a8fa8]/50 pl-4 break-keep font-light">
              맥락한의원은 두개경추 구조와 자율신경 불균형이라는 근본 원인을 찾아 치료합니다.
              내원 환자의 90% 이상이 이미 진통제·항CGRP 주사까지 시도했지만 효과를 보지 못한 분들입니다.
            </p>

            <div className="flex flex-wrap gap-6 md:gap-8 mb-10 p-5 bg-white/5 border border-white/10 rounded-lg">
              <div>
                <p className="font-serif text-3xl text-white leading-none">
                  10<sup className="text-base">년+</sup>
                </p>
                <p className="text-[11px] text-white/45 mt-1 tracking-wide">두통·신경계 전문 임상</p>
              </div>
              <div className="w-px bg-white/10 hidden sm:block" />
              <div>
                <p className="font-serif text-3xl text-white leading-none">
                  90<sup className="text-base">%</sup>
                </p>
                <p className="text-[11px] text-white/45 mt-1 tracking-wide">기존 치료 무효 환자 비율</p>
              </div>
              <div className="w-px bg-white/10 hidden sm:block" />
              <div>
                <p className="font-serif text-2xl md:text-3xl text-white leading-none">침구과</p>
                <p className="text-[11px] text-white/45 mt-1 tracking-wide">전문의 직접 진료</p>
              </div>
            </div>

            <div className="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
              <a
                href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1"
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex justify-center items-center px-10 py-4 text-[14px] font-bold rounded-lg text-maekrak-navy bg-white hover:bg-gray-100 transition-colors tracking-wide min-w-[180px]"
              >
                진료 예약하기
              </a>
              <button
                type="button"
                onClick={scrollToWhy}
                className="text-[14px] text-white/50 hover:text-white border-b border-white/20 pb-0.5 transition-colors bg-transparent border-none cursor-pointer tracking-wide"
              >
                어떤 분께 맞는지 확인 →
              </button>
            </div>
          </div>

          <div className="flex items-center justify-center lg:justify-end">
            <div className="w-full max-w-[360px] bg-white/6 border border-white/12 p-8 rounded-sm backdrop-blur-sm">
              <p className="text-[11px] font-bold tracking-[0.18em] uppercase text-[#7ec8e0] mb-5 pb-3 border-b border-white/10">
                이런 증상이라면 읽어보세요
              </p>
              <ul className="space-y-0">
                {checklist.map((item) => (
                  <li
                    key={item.text}
                    className="flex gap-3 items-start py-3 border-b border-white/7 last:border-b-0 text-[14px] text-white/70 leading-relaxed break-keep"
                  >
                    <span
                      className={`w-4 h-4 shrink-0 mt-0.5 rounded-sm border flex items-center justify-center ${
                        item.checked ? 'bg-[#4a8fa8] border-[#4a8fa8]' : 'border-[#4a8fa8]/60'
                      }`}
                    >
                      {item.checked && <Check className="w-2.5 h-2.5 text-white" strokeWidth={3} />}
                    </span>
                    {item.text}
                  </li>
                ))}
              </ul>
              <p className="mt-5 text-[12px] text-white/35 leading-relaxed border-l-2 border-[#4a8fa8]/30 pl-3 break-keep">
                위 항목 중 하나라도 해당된다면, 증상이 아닌 원인을 봐야 할 시점입니다.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
