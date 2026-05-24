import { Link } from 'react-router-dom';

export function ContactFooterSection() {
  return (
    <>
      <section className="maekrak-snap-section bg-maekrak-ivory w-full flex-col relative z-20" id="cta">
        <div className="w-full h-full flex flex-col md:flex-row max-w-7xl mx-auto px-6 md:px-12 py-20 items-center justify-between gap-10">
          <div className="flex flex-col text-center md:text-left pt-6">
            <h3 className="text-[28px] md:text-[36px] font-bold text-gray-900 mb-4 tracking-tight leading-tight break-keep">
              지금보다 나은 상태는<br className="md:hidden" /> 반드시 만들 수 있습니다
            </h3>
            <p className="text-[16px] text-gray-600 leading-relaxed font-light break-keep max-w-2xl">
              진통제, 항CGRP 주사, 대학병원까지 다 해봤지만 나아지지 않은 분들을 위한 상담을 진행합니다.<br className="hidden md:block" />
              초진 예약은 하루 제한 인원으로 운영합니다.
            </p>
          </div>
          <div className="flex flex-col sm:flex-row gap-4 shrink-0 pb-6">
            <a 
              href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1" 
              target="_blank" rel="noopener noreferrer"
              className="inline-flex justify-center items-center px-10 py-5 text-[15px] font-bold rounded-lg text-white bg-maekrak-navy hover:bg-[#1a2f45] transition-colors shadow-lg min-w-[200px]"
            >
              진료 예약하기
            </a>
            <Link 
              to="/departments" 
              className="inline-flex justify-center items-center px-10 py-5 text-[15px] font-bold rounded-lg text-maekrak-navy bg-white border border-gray-200 hover:border-maekrak-navy transition-colors min-w-[200px]"
            >
              진료과목 보기
            </Link>
          </div>
        </div>
      </section>

      <section className="maekrak-snap-section bg-[#F8FAFC] w-full flex-row" id="contact">
      <div className="w-full h-full flex flex-col md:flex-row max-w-7xl mx-auto px-6 md:px-12 pt-24 pb-12">
        
        {/* Left Side: Contact Info */}
        <div className="w-full md:w-1/2 flex flex-col justify-center pr-0 md:pr-12 md:pb-10">
          <h2 className="text-4xl lg:text-[52px] font-bold mb-8 tracking-tighter text-maekrak-navy uppercase">Contact Us</h2>
          
          <div className="flex flex-col sm:flex-row sm:items-center gap-4 mb-10">
            <span className="text-[15px] font-bold text-gray-500 tracking-widest hidden sm:block">대표번호</span>
            <span className="text-4xl lg:text-[46px] font-light text-maekrak-navy tracking-tight">02.6959.7252</span>
            {/* Social Icons Placeholder */}
            <div className="flex gap-2 sm:ml-4 mt-2 sm:mt-0">
              <a href="#" className="w-9 h-9 rounded-full bg-[#1da1f2] flex items-center justify-center text-white text-xs font-bold hover:opacity-80 transition-opacity">B</a>
              <a href="#" className="w-9 h-9 rounded-full bg-[#FEE500] flex items-center justify-center text-[#371d1e] text-xs font-bold hover:opacity-80 transition-opacity">K</a>
              <a href="#" className="w-9 h-9 rounded-full bg-[#E1306C] flex items-center justify-center text-white text-xs font-bold hover:opacity-80 transition-opacity">IN</a>
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
              <p>사업자등록번호 : 준비중</p>
            </div>
            <div>
              <p>위치 : 서울시 중구 서소문로 134, 2층</p>
              <p>대표자 : 이재성, 김윤서</p>
            </div>
          </div>
          <p className="text-[11px] text-gray-400 mt-8 uppercase tracking-widest font-bold">&copy; MAEKRAK CLINIC. ALL RIGHTS RESERVED.</p>
        </div>

        {/* Right Side: Visual Map (abstract design) md and up */}
        <div className="hidden md:flex w-1/2 relative bg-white border border-gray-100 items-center justify-center my-12 rounded-[2rem] shadow-sm overflow-hidden group">
          <div className="absolute inset-0 opacity-[0.15] diagram-pattern" />
          
          {/* Map Area */}
          <div className="relative z-10 w-full h-full p-12 flex flex-col justify-end items-end">
             {/* Substation line abstraction */}
             <div className="absolute top-[40%] left-0 right-0 h-[10px] bg-maekrak-navy/10 -skew-y-12 shrink-0 group-hover:-translate-y-2 transition-transform duration-700" />
             <div className="absolute top-[38%] left-[40%] px-5 py-2.5 bg-maekrak-accent text-white font-bold rounded-full text-lg shadow-lg z-20 group-hover:-translate-y-4 group-hover:shadow-xl transition-all duration-500">
               시청역 8번 출구
             </div>
             
             {/* Giant Location Pin / Info bubble */}
             <div className="bg-maekrak-navy text-white p-8 rounded-full w-56 h-56 flex items-center justify-center flex-col shadow-2xl absolute top-12 right-12 group-hover:scale-110 transition-transform duration-700 ease-in-out">
               <span className="font-serif font-bold text-3xl tracking-widest leading-none mb-2 italic">맥락</span>
               <span className="text-sm font-light opacity-80 tracking-widest">한의원</span>
               <div className="w-12 h-[2px] bg-white opacity-40 mt-5" />
             </div>
          </div>
        </div>
      </div>
    </section>
    </>
  );
}
