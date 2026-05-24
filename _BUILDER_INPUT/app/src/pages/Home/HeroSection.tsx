import { Link } from 'react-router-dom';

export function HeroSection() {
  return (
    <section className="maekrak-snap-section relative bg-gray-900 isolate w-full" id="hero">
      {/* Full screen background image */}
      <div className="absolute inset-0 z-0 bg-maekrak-navy">
        <img 
          src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2680&auto=format&fit=crop" 
          alt="Clinic Background" 
          className="w-full h-full object-cover opacity-60 mix-blend-overlay"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-maekrak-navy via-maekrak-navy/80 to-transparent" />
      </div>

      <div className="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 flex flex-col justify-center h-full pt-20">
        <div className="overflow-hidden mb-6">
           <div className="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full border border-white/20">
             <span className="w-2 h-2 rounded-full bg-maekrak-accent"></span>
             <span className="text-[12px] font-bold text-white tracking-widest uppercase">맥락한의원 소개</span>
           </div>
        </div>
        
        <h1 className="text-4xl sm:text-5xl md:text-[68px] leading-[1.1] font-light text-white mb-8 tracking-tight break-keep max-w-4xl">
          머리와 목의 <em className="not-italic text-[#7ec8e0] font-bold">구조적 맥락</em>에서<br />
          두통의 원인을 읽습니다
        </h1>
        
        <p className="text-lg md:text-xl text-gray-300 leading-relaxed mb-12 max-w-2xl break-keep font-serif">
          맥락한의원은 진통제와 주사로 증상을 덮는 방식 대신, 두개경추 구조와 자율신경의 불균형이라는 근본 원인을 찾아 치료합니다. 침구과 전문의 이재성 원장이 직접 진료합니다.
        </p>
        
        <div className="flex flex-col sm:flex-row gap-4">
          <a 
            href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1" 
            target="_blank" rel="noopener noreferrer"
            className="inline-flex justify-center items-center px-10 py-5 text-[14px] font-bold rounded-lg text-maekrak-navy bg-white hover:bg-gray-100 transition-colors uppercase tracking-widest shadow-lg min-w-[200px]"
          >
            정밀 예약하기
          </a>
          <Link 
            to="/departments" 
            className="inline-flex justify-center items-center px-10 py-5 text-[14px] font-bold rounded-lg text-white bg-transparent border border-white/30 hover:bg-white hover:text-maekrak-navy transition-colors uppercase tracking-widest min-w-[200px]"
          >
            진료과목 안내
          </Link>
        </div>
      </div>
    </section>
  );
}
