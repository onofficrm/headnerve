import doctor1Img from '../../assets/images/doctor1.png';

export function AboutDoctorSection() {
  return (
    <div className="bg-[#f8f9fb]">
      <section className="py-20 md:py-24 px-6 md:px-12 lg:px-24">
        <div className="max-w-7xl mx-auto">
          <div className="text-[11px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-3">의료진 소개</div>
          <h2 className="font-serif text-[28px] md:text-[34px] font-medium text-gray-900 leading-[1.5] mb-4">
            맥락한의원 의료진
          </h2>
          <p className="text-[15px] md:text-[16px] text-gray-500 mb-14 max-w-2xl leading-[1.9] break-keep font-light">
            침구과 전문의와 신경계 질환 전문 한의사가 함께 진료합니다. 두통·신경계 환자에게 일관된 치료 방향을 제공하기 위해 정기적으로 케이스를 공유하고 연구합니다.
          </p>

          <div className="flex flex-col lg:flex-row gap-12 lg:gap-16">
            <div className="w-full lg:w-[320px] shrink-0">
              <div className="w-full aspect-[3/4] bg-[#f2f5f8] border border-gray-200 flex items-center justify-center relative overflow-hidden group">
                <img src={doctor1Img} alt="이재성 대표원장" className="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-[1.02]" />
              </div>
            </div>

            <div className="flex-1">
              <div className="mb-10">
                <h3 className="font-serif text-[28px] font-medium text-gray-900 mb-1">이재성</h3>
                <p className="text-[14.5px] font-medium text-maekrak-accent tracking-widest">
                  대표원장 · 침구과 전문의 · 두통·어지럼증·자율신경 전문
                </p>
              </div>

              <div className="space-y-8">
                <div>
                  <h4 className="text-[11.5px] font-bold tracking-[0.15em] uppercase text-gray-400 mb-3 pb-2 border-b border-gray-200">
                    학력 및 전문의 취득
                  </h4>
                  <ul className="space-y-2">
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> ○○대학교 한의과대학 졸업</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 대학병원 인턴·레지던트 4년 수료 — 침구과 전문의 취득</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 침구과 전문의 국가고시 합격</li>
                  </ul>
                </div>

                <div>
                  <h4 className="text-[11.5px] font-bold tracking-[0.15em] uppercase text-gray-400 mb-3 pb-2 border-b border-gray-200">
                    국제 학술 활동
                  </h4>
                  <ul className="space-y-2">
                    <li className="text-[14px] text-gray-700 flex items-start gap-3 flex-wrap">
                      <span className="text-maekrak-accent mt-0.5 shrink-0">–</span> 
                      <span>2018 ICMART-iSAMS 국제침구학회 (독일 뮌헨) — 연구 발표</span>
                      <span className="px-2 py-0.5 text-[11px] bg-[#f5f0e0] text-[#b8912a] border border-[#b8912a]/20 rounded-sm font-medium mt-0.5 sm:mt-0">해외 학술발표</span>
                    </li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3 flex-wrap">
                      <span className="text-maekrak-accent mt-0.5 shrink-0">–</span> 
                      <span>제 67회 전일본침구학회 — 초청 학술교류</span>
                      <span className="px-2 py-0.5 text-[11px] bg-[#f5f0e0] text-[#b8912a] border border-[#b8912a]/20 rounded-sm font-medium mt-0.5 sm:mt-0">해외 초청</span>
                    </li>
                  </ul>
                </div>

                <div>
                  <h4 className="text-[11.5px] font-bold tracking-[0.15em] uppercase text-gray-400 mb-3 pb-2 border-b border-gray-200">
                    학회 및 공공 활동
                  </h4>
                  <ul className="space-y-2">
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 대한한의학회 대의원 (前)</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 대한침구의학회 간사 (前) · 평생회원</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 천안시 감염병대응센터 역학조사관 — 질병관리청 정식 6주 교육 수료 후 투입</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3 flex-wrap">
                      <span className="text-maekrak-accent mt-0.5 shrink-0">–</span> 
                      <span>코로나19 방역 공로 — 보건복지부 장관 표창 수상</span>
                      <span className="px-2 py-0.5 text-[11px] bg-[#f5f0e0] text-[#b8912a] border border-[#b8912a]/20 rounded-sm font-medium mt-0.5 sm:mt-0">장관 표창</span>
                    </li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 코로나19 방역 공로 — 충청남도 도지사 표창 수상</li>
                  </ul>
                </div>

                <div>
                  <h4 className="text-[11.5px] font-bold tracking-[0.15em] uppercase text-gray-400 mb-3 pb-2 border-b border-gray-200">
                    임상 연구
                  </h4>
                  <ul className="space-y-2">
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 두통-경추 관계 최신 국제 논문 지속 검토 및 임상 적용 연구</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 편두통-삼차신경경추복합체 CGRP 기전 연구 (British Journal of Pain, 2020 외)</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 두통 환자 케이스 정기 공유 — 원내 교육 운영</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Doctor Story */}
      <div className="bg-maekrak-navy py-20 px-6 md:px-12 lg:px-24">
        <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-20">
          <div>
            <div className="text-[11px] font-bold tracking-[0.18em] uppercase text-maekrak-accent mb-4">원장이 이 길을 선택한 이유</div>
            <p className="text-[15px] text-white/75 leading-[2] font-light break-keep">
              가족 중 한 분이 <strong className="font-medium text-white">군발성 두통</strong> 환자였습니다.
              두통 주기가 찾아오면 일상생활 자체가 불가능했습니다. 대학병원에서 MRI, MRA, 각종 약을 써도 잡히지 않던 통증이었습니다.
            </p>
            <p className="text-[15px] text-white/75 leading-[2] font-light break-keep mt-4">
              결국 지푸라기라도 잡는 심정으로 찾아간 곳에서 구조적 치료를 받고 낫지 않던 두통이 나아졌습니다.
              그때부터 공부했습니다. <strong className="font-medium text-white">구조적인 문제를 해결하면 약이 듣지 않는 두통도 나을 수 있다</strong>는 것을.
            </p>
          </div>
          <div>
            <div className="text-[11px] font-bold tracking-[0.18em] uppercase text-maekrak-accent mb-4">지금 어떤 의사가 되고 싶은가</div>
            <p className="text-[15px] text-white/75 leading-[2] font-light break-keep">
              진통제가 듣지 않는다고 환자를 포기하는 의사가 아니라, <strong className="font-medium text-white">왜 듣지 않는지 원인을 찾는 의사</strong>가 되고 싶습니다.
            </p>
            <p className="text-[15px] text-white/75 leading-[2] font-light break-keep mt-4">
              기존 치료의 한계를 느껴 맥락한의원을 찾아오시는 분들에게 "지금보다 나은 상태는 반드시 만들 수 있다"고 말할 수 있는 의사. 치료가 끝난 뒤에도 <strong className="font-medium text-white">우리 치료 없이 건강한 일상을 유지하는 것</strong>이 진짜 치료라고 생각합니다.
            </p>
          </div>
        </div>
      </div>

      {/* 진료원장 Section */}
      <section className="py-20 px-6 md:px-12 lg:px-24 bg-white">
        <div className="max-w-7xl mx-auto">
          <div className="text-[11px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-3">진료원장</div>
          <h2 className="font-serif text-[24px] font-medium text-gray-900 mb-12">김윤서 원장</h2>
          
          <div className="flex flex-col lg:flex-row gap-12 lg:gap-16">
            <div className="w-full lg:w-[320px] shrink-0">
              <div className="w-full aspect-[3/4] bg-[#f2f5f8] border border-gray-200 flex items-center justify-center relative overflow-hidden group">
                <span className="text-[12px] text-gray-400 tracking-wider">원장 프로필 사진</span>
              </div>
            </div>

            <div className="flex-1">
              <div className="mb-8">
                <h3 className="font-serif text-[24px] font-medium text-gray-900 mb-1">김윤서</h3>
                <p className="text-[14px] font-medium text-maekrak-accent tracking-widest">
                  진료원장 · 말초신경병증·브레인포그 전문
                </p>
              </div>

              <div className="space-y-8 mb-8">
                <div>
                  <h4 className="text-[11.5px] font-bold tracking-[0.15em] uppercase text-gray-400 mb-3 pb-2 border-b border-gray-200">
                    주요 진료 분야
                  </h4>
                  <ul className="space-y-2">
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 말초신경병증 — 손발 저림·시림·작열감</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 브레인포그 — 집중력 저하·머리 멍함·만성 피로</li>
                    <li className="text-[14px] text-gray-700 flex items-start gap-3"><span className="text-maekrak-accent mt-0.5">–</span> 코로나19 후유증 관련 신경계 증상</li>
                  </ul>
                </div>
              </div>

              <p className="text-[14px] text-gray-500 leading-[1.9] font-light max-w-xl break-keep">
                대표원장과 정기적인 케이스 공유를 통해 두통·신경계 환자에게 일관된 치료 방향을 유지합니다.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}
