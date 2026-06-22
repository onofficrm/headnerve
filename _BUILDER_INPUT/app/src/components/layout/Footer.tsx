import { Link } from 'react-router-dom';
import { Logo } from '../common/Logo';
import { BOARD_URLS, BOOKING_URL } from '../../lib/boardUrls';

export function Footer() {
  return (
    <footer className="bg-white border-t border-gray-100 py-16" id="footer">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,1fr)] lg:items-start">
          {/* Brand Info */}
          <div className="flex-1 max-w-sm">
            <Link to="/" className="inline-block mb-6">
              <Logo className="h-9 w-auto text-maekrak-navy" />
            </Link>
            <div className="space-y-4 text-[13px] text-gray-500 leading-relaxed font-light">
              <p>주소: 서울시 중구 서소문로 134, 2층 맥락한의원</p>
              <p>전화: <a href="tel:02-6959-7252" className="text-maekrak-navy hover:underline font-bold">02-6959-7252</a></p>
              <p>대표: 이재성</p>
              <p>사업자등록번호: 573-93-02056</p>
              <p>이메일: <a href="mailto:macnac.kclinic@gmail.com" className="text-maekrak-navy hover:underline">macnac.kclinic@gmail.com</a></p>
            </div>
          </div>

          <div className="text-[13px] leading-relaxed">
            <h3 className="font-bold text-gray-800 mb-6 uppercase tracking-widest text-[11px]">진료시간</h3>
            <div className="space-y-3 text-gray-500 font-light">
              <p>평일 10:00 - 20:00 (점심 14-15)</p>
              <p>토요일 10:00 - 14:00 (점심시간 없음)</p>
              <p className="text-red-400">휴진: 일요일, 공휴일</p>
            </div>
          </div>

          {/* Quick Links */}
          <div className="text-[13px]">
            <h3 className="font-bold text-gray-800 mb-6 uppercase tracking-widest text-[11px]">바로가기</h3>
            <ul className="space-y-3 text-gray-500">
              <li><Link to="/about" className="hover:text-maekrak-navy transition-colors">맥락한의원 소개</Link></li>
              <li><Link to="/programs" className="hover:text-maekrak-navy transition-colors">치료 프로그램</Link></li>
              <li><a href={BOARD_URLS.reviews} className="hover:text-maekrak-navy transition-colors">치료후기</a></li>
              <li><a href={BOARD_URLS.notice} className="hover:text-maekrak-navy transition-colors">공지사항</a></li>
              <li><a href={BOARD_URLS.column} className="hover:text-maekrak-navy transition-colors">블로그</a></li>
              <li><a href={BOOKING_URL} target="_blank" rel="noopener noreferrer" className="hover:text-maekrak-navy transition-colors">상담 예약</a></li>
            </ul>
          </div>
  
          {/* Legal / Policy */}
          <div className="text-[13px]">
            <h3 className="font-bold text-gray-800 mb-6 uppercase tracking-widest text-[11px]">약관 및 정책</h3>
            <ul className="space-y-3 text-gray-500">
              <li><Link to="/privacy" className="hover:text-maekrak-navy text-gray-800 font-medium transition-colors">개인정보처리방침</Link></li>
              <li><Link to="/terms" className="hover:text-maekrak-navy transition-colors">이용약관</Link></li>
              <li><Link to="/non-covered" className="hover:text-maekrak-navy transition-colors">비급여 진료비 안내</Link></li>
            </ul>
          </div>
        </div>

        <div className="mt-16 pt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4 text-[12px] text-gray-400">
          <p>&copy; {new Date().getFullYear()} 맥락한의원. All rights reserved.</p>
          <div className="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-full text-gray-400 cursor-pointer hover:border-gray-400 hover:text-gray-600 transition-colors" onClick={() => window.scrollTo({top: 0, behavior: 'smooth'})}>
            ↑
          </div>
        </div>
      </div>
    </footer>
  );
}
