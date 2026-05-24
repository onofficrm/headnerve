import { Link } from 'react-router-dom';

export function AboutCtaBlock() {
  return (
    <div className="bg-[#f8f9fb] py-20 px-6 md:px-12 lg:px-24">
      <div className="max-w-7xl mx-auto flex flex-col lg:flex-row items-center lg:items-center justify-between gap-8">
        <div className="flex-1 text-center lg:text-left">
          <h3 className="font-serif text-[20.5px] font-medium text-gray-900 mb-2">
            지금보다 나은 상태는 반드시 만들 수 있습니다
          </h3>
          <p className="text-[14px] text-gray-500 leading-[1.8] font-light break-keep flex-1">
            진통제, 항CGRP 주사, 대학병원까지 다 해봤지만 나아지지 않은 분들을 위한 상담을 진행합니다.<br className="hidden md:inline" />
            초진 예약은 하루 제한 인원으로 운영합니다.
          </p>
        </div>
        <div className="flex flex-col sm:flex-row gap-4 shrink-0 px-4 w-full sm:w-auto">
          <a
            href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1"
            target="_blank"
            rel="noopener noreferrer"
            className="w-full sm:w-auto text-center px-8 py-3.5 bg-maekrak-navy text-white text-[13.5px] font-medium rounded-sm hover:bg-[#1a2f45] transition-colors"
          >
            진료 예약하기
          </a>
          <Link
            to="/departments"
            className="w-full sm:w-auto text-center px-8 py-3.5 bg-white text-maekrak-navy border border-gray-200 text-[13.5px] font-medium rounded-sm hover:border-maekrak-navy transition-colors"
          >
            진료과목 보기
          </Link>
        </div>
      </div>
    </div>
  );
}
