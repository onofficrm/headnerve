import { Link } from 'react-router-dom';
import { BOARD_URLS, KAKAO_CHAT_URL, NAVER_BLOG_URL } from '../../lib/boardUrls';

export function ContactFooterSection() {
  return (
    <>
      <section className="maekrak-snap-section bg-maekrak-navy w-full flex-col relative z-20" id="cta">
        <div className="w-full h-full flex flex-col md:flex-row max-w-7xl mx-auto px-6 md:px-12 py-20 items-center justify-between gap-10">
          <div className="flex flex-col text-center md:text-left pt-6">
            <h3 className="font-serif text-[26px] md:text-[34px] font-medium text-white mb-4 tracking-tight leading-snug break-keep">
              지금보다 나은 상태는
              <br />
              반드시 만들 수 있습니다
            </h3>
            <p className="text-[15px] text-white/55 leading-relaxed font-light break-keep max-w-2xl">
              진통제, 항CGRP 주사, 대학병원까지 다 해봤지만 나아지지 않은 분들을 위한 상담을 진행합니다.
              <br className="hidden md:block" />
              서울 시청역 인근 · 침구과 전문의 직접 진료 · 초진 예약제 운영
            </p>
          </div>
          <div className="flex flex-col sm:flex-row gap-4 shrink-0 pb-6">
            <a
              href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex justify-center items-center px-10 py-5 text-[15px] font-bold rounded-lg text-maekrak-navy bg-white hover:bg-gray-100 transition-colors min-w-[200px]"
            >
              진료 예약하기
            </a>
            <a
              href={BOARD_URLS.column}
              className="inline-flex justify-center items-center px-10 py-5 text-[15px] font-bold rounded-lg text-white/70 bg-transparent border border-white/25 hover:border-white/50 hover:text-white transition-colors min-w-[200px]"
            >
              블로그 보기
            </a>
          </div>
        </div>
      </section>

      <section className="maekrak-snap-section bg-[#F8FAFC] w-full flex-row" id="contact">
      <div className="w-full h-full flex flex-col md:flex-row max-w-7xl mx-auto px-6 md:px-12 pt-24 pb-12">
        
        {/* Left Side: Contact Info */}
        <div className="w-full md:w-1/2 flex flex-col justify-center pr-0 md:pr-12 md:pb-10">
          <h2 className="text-4xl lg:text-[52px] font-bold mb-8 tracking-tighter text-maekrak-navy">맥락한의원 오시는길</h2>
          
          <div className="flex flex-col sm:flex-row sm:items-center gap-4 mb-10">
            <span className="text-[15px] font-bold text-gray-500 tracking-widest hidden sm:block">대표번호</span>
            <span className="text-4xl lg:text-[46px] font-light text-maekrak-navy tracking-tight">02.6959.7252</span>
            {/* Social Icons Placeholder */}
            <div className="flex gap-2 sm:ml-4 mt-2 sm:mt-0">
              <a href={NAVER_BLOG_URL} target="_blank" rel="noopener noreferrer" className="w-9 h-9 rounded-full bg-[#03C75A] flex items-center justify-center text-white text-xs font-bold hover:opacity-80 transition-opacity">B</a>
              <a href={KAKAO_CHAT_URL} target="_blank" rel="noopener noreferrer" className="w-9 h-9 rounded-full bg-[#FEE500] flex items-center justify-center text-[#371d1e] text-xs font-bold hover:opacity-80 transition-opacity">K</a>
            </div>
          </div>
          
          <div className="flex flex-col sm:flex-row gap-6 sm:gap-12 mb-10 text-[15px] text-gray-600 leading-relaxed font-light">
            <div>
              <span className="font-bold text-gray-800 mr-4 block sm:inline-block mb-1 sm:mb-0">진료시간</span>
              <div className="inline-block">
                <span>평 일 : am 10:00 ~ pm 08:00</span><br/>
                <span>토요일 : am 10:00 ~ pm 02:00</span>
              </div>
            </div>
            <div>
              <div className="inline-block border-l-2 border-maekrak-accent/30 pl-4 sm:border-none sm:pl-0">
                <span>점심시간 : pm 02:00 ~ pm 03:00</span><br/>
                <span className="text-red-400 font-medium">일요일 및 공휴일 휴진</span>
              </div>
            </div>
          </div>
          
          <div className="py-6 border-y border-gray-200 mb-8">
            <p className="text-[16px] text-gray-700 font-light">
              서울시 중구 서소문로 134, 2층 맥락한의원 <span className="text-maekrak-accent font-bold ml-2">(시청역 8번 출구 1분)</span>
            </p>
          </div>
          
          <div className="flex flex-wrap gap-4 text-[13px] text-gray-500 mb-8 font-medium">
            <Link to="/about" className="hover:text-maekrak-navy transition-colors tracking-wide">병원소개</Link>
            <span className="text-gray-300">|</span>
            <Link to="/terms" className="hover:text-maekrak-navy transition-colors tracking-wide">이용약관</Link>
            <span className="text-gray-300">|</span>
            <Link to="/privacy" className="hover:text-maekrak-navy text-gray-800 transition-colors tracking-wide">개인정보취급방침</Link>
            <span className="text-gray-300">|</span>
            <Link to="/non-covered" className="hover:text-maekrak-navy transition-colors tracking-wide">비급여진료안내</Link>
          </div>
          
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 text-[12px] text-gray-400 font-light leading-relaxed">
            <div>
              <p>상호 : 맥락한의원</p>
              <p>사업자등록번호 : 573-93-02056</p>
              <p>이메일 : macnac.kclinic@gmail.com</p>
            </div>
            <div>
              <p>위치 : 서울시 중구 서소문로 134, 2층</p>
              <p>대표 : 이재성</p>
            </div>
          </div>
          <p className="text-[11px] text-gray-400 mt-8 uppercase tracking-widest font-bold">&copy; MAEKRAK CLINIC. ALL RIGHTS RESERVED.</p>
        </div>

        {/* Right Side: Google Map */}
        <div className="w-full md:w-1/2 relative bg-white border border-gray-100 my-8 md:my-12 rounded-[2rem] shadow-sm overflow-hidden min-h-[360px] md:min-h-0">
          <iframe
            title="맥락한의원 위치 지도"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.061312785755!2d126.9758536!3d37.5635946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca3658affe99b%3A0xeae2abc9e2c8b290!2z66el65297ZWc7J2Y7JuQ!5e1!3m2!1sko!2sph!4v1781842127379!5m2!1sko!2sph"
            className="absolute inset-0 h-full w-full"
            style={{ border: 0 }}
            allowFullScreen
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          />
          <div className="pointer-events-none absolute left-5 top-5 rounded-full bg-maekrak-accent px-5 py-2 text-sm font-bold text-white shadow-lg md:text-base">
            시청역 8번 출구
          </div>
        </div>
      </div>
    </section>
    </>
  );
}
