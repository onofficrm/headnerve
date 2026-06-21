import { Phone, Calendar, MessageCircle } from 'lucide-react';
import { KAKAO_CHAT_URL, NAVER_PLACE_URL } from '../../lib/boardUrls';

export function MobileBottomCTA() {
  return (
    <div className="md:hidden fixed bottom-0 left-0 right-0 z-[60] bg-white border-t border-gray-200 shadow-[0_-4px_20px_rgba(0,0,0,0.05)]" style={{ paddingBottom: 'env(safe-area-inset-bottom)' }}>
      <div className="flex w-full h-16">
        <a 
          href="tel:02-6959-7252" 
          className="flex-1 flex flex-col items-center justify-center text-maekrak-navy hover:bg-gray-50 border-r border-gray-100"
        >
          <Phone className="w-5 h-5 mb-1" />
          <span className="text-[11px] font-bold">전화상담</span>
        </a>
        <a 
          href={KAKAO_CHAT_URL}
          target="_blank"
          rel="noopener noreferrer"
          className="flex-1 flex flex-col items-center justify-center text-[#FEE500] bg-white hover:bg-yellow-50 border-r border-gray-100"
        >
          <MessageCircle className="w-5 h-5 mb-1 text-[#371d1e]" />
          <span className="text-[11px] font-bold text-[#371d1e]">카카오상담</span>
        </a>
        <a 
          href={NAVER_PLACE_URL}
          target="_blank"
          rel="noopener noreferrer"
          className="flex-1 flex flex-col items-center justify-center bg-maekrak-navy text-white hover:bg-maekrak-navy-light"
        >
          <Calendar className="w-5 h-5 mb-1" />
          <span className="text-[11px] font-bold">빠른예약</span>
        </a>
      </div>
    </div>
  );
}
