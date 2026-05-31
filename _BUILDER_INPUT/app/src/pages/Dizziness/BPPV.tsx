import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function BPPV() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium text-white/60 mb-6">
            <Link to="/dizziness" className="hover:text-white transition-colors">어지럼증</Link>
            <ChevronRight className="w-4 h-4" />
            <span className="text-[#7ec8e0]">이석증</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            이석증
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "이석증(BPPV · 양성 돌발성 체위성 현훈)은 귀 안의 이석이 제자리에서 떨어져 반고리관으로 들어가면서 머리를 움직일 때 갑작스러운 회전성 어지럼증이 나타나는 질환입니다. 이석 정복술로 대부분 호전되지만 시술 후에도 어지럼증이 지속되는 경우가 많습니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <div className="prose prose-lg max-w-none text-gray-800 font-light leading-[1.8] break-keep">
              <p>2022년 환자를 대상으로 한 연구에 따르면 이석 정복술 이후 잔존 어지럼증의 유병률은 43%였다. 이석이 제자리로 돌아갔어도 절반에 가까운 환자가 어지럼증으로 계속 고생하고 있다는 의미다.</p>
              <p className="mt-4">이석 정복술 후 잔여 어지럼증은 여러 요인이 복합적으로 작용한다. 이석 문제가 해결됐어도 경추 고유수용성 감각 이상, 두개경추 기능 이상, 전정 보상 기능 저하가 남아있으면 어지럼증은 지속된다.</p>
              <p className="mt-4">이석이 반복적으로 떨어지는 배경에는 내이 혈류 저하와 두개경추 기능 이상이 관여할 수 있다. 내이 환경이 불안정한 상태에서는 이석 정복술을 받아도 재발이 반복된다.</p>
              <p className="mt-4">맥락한의원은 이석 정복술 후 잔여 어지럼증을 경추 고유수용성 감각 이상과 두개경추 배액 장애의 문제로 본다. 이석이 제자리에 있어도 이 구조가 남아있으면 어지럼증은 계속된다.</p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "이석 정복술을 받았는데 아직도 어지럼증이 남아있다",
              "고개를 갑자기 돌리거나 눕고 일어날 때 핑 도는 느낌이 반복된다",
              "어지럼증은 줄었는데 머리가 붕 뜨는 느낌, 몸이 흔들리는 느낌이 남아있다",
              "이석증이 반복적으로 재발한다",
              "이석 정복술 후 목이 뻣뻣해지고 두통이 생겼다",
              "눈을 감으면 어지럽거나 어두운 곳에서 균형 잡기가 어렵다"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-5 rounded-xl bg-white border border-gray-200">
                <CheckCircle2 className="w-5 h-5 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[15px] md:text-[16px] text-gray-700 leading-[1.5] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">왜 생기는가 — 한의학적 원인</h2>
          <div className="prose prose-lg max-w-none text-gray-800 leading-[1.8] break-keep">
            <p className="font-medium text-gray-800">경추 고유수용성 감각 이상</p>
            <p>이석증 이후 어지럼증을 피하기 위해 무의식적으로 목을 긴장합니다. 이 긴장이 고착되면 고유수용성 감각 신호가 왜곡되어 시각, 전정기관, 경추 세 가지 기관의 정보가 충돌하여 잔존 어지럼증이 생성됩니다.</p>
            <p className="font-medium text-gray-800 mt-6">두개경추 기능 이상과 내이 혈류 저하</p>
            <p>두개경추가 틀어지고 정맥 배액이 미진하면 내이 혈류가 불안정해집니다. 이석이 재발하기 쉬운 환경으로 지속적인 재발 요인이 됩니다.</p>
            <p className="font-medium text-gray-800 mt-6">전정 보상 기능 저하</p>
            <p>전정 기관 회복시에는 경추의 정상적인 감각 도움이 필요합니다. 그러나 경추가 경직된 상태에선 뇌의 보상 과정 작동이 둔화되어 회복에 차질을 초래합니다.</p>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                전신 순환을 개선하고 내이로 가는 혈류를 안정시켜 전정 보상 기능을 높이고 이석 재발을 방지합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근과 C1, C2 분절 주변에 시술하여 긴장된 경추를 해소하고, 근방추의 감각을 정상화해 감각 불일치 잔여 어지럽증을 해소합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                두개경추의 정렬을 교정하여 고유수용성 감각과 배액 통로가 장기적으로 유지될 수 있도록 돕습니다.
              </p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                20대 남성. 이석 정복술 후 잔여 어지러움 잔존. 일상생활 지장될 정도의 증상 호소. 고유수용성 감각 왜곡으로 판단하여 3개월 어지럼증 치료 프로그램 적용 후 경추 긴장과 근방추 기능 회복으로 종결.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                50대 여성. 이석증 재발의 무한반복 경험. 10년간 약과 이석정복술을 받음. 내이 혈류 불안정과 두개경추 정렬 불량 확인. 4주차에 증상 호전후 일시적 악화를 겪었으나 극복하고 결국 종결 성공. 반복 환경을 제거함.
              </p>
            </div>
          </div>
          <div className="text-center">
            <Link to="/blog" className="inline-flex items-center text-[15px] font-medium text-maekrak-blue hover:text-[#7ec8e0] transition-colors border-b border-current pb-0.5">
              자세한 사례 보기 (블로그) <ArrowRight className="w-4 h-4 ml-1" />
            </Link>
          </div>
        </section>

        <section className="mb-24">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">자주 묻는 질문 FAQ</h2>
          <div className="space-y-4">
            {[
              {
                q: "이석 정복술을 받았는데 왜 아직도 어지럽나요?",
                a: "이석 문제는 해결됐을지라도 시술 및 통증 회피 과정에 굳어진 경추의 고유수용성 감각 불일치가 남아있기 때문입니다."
              },
              {
                q: "이석증이 자꾸 재발합니다. 왜 그런가요?",
                a: "내이 혈류가 불안정하고 경추 정맥 배액이 저하되면 반고리관으로 이석이 떨어지기 쉬운 환경적 악조건이 되기 때문입니다."
              },
              {
                q: "전정 재활 운동을 하고 있는데 병행해도 되나요?",
                a: "네, 긴장을 해소하고 근방추 기능이 회복된 상태의 운동은 신경계의 안정을 도와 더 큰 시너지가 납니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="p-6 rounded-xl border border-gray-200">
                <h4 className="text-[16px] font-bold text-gray-900 mb-2 flex items-start gap-2">
                  <span className="text-maekrak-blue">Q.</span> {faq.q}
                </h4>
                <p className="text-[15px] text-gray-600 leading-[1.6] pl-6 break-keep">
                  <span className="font-bold text-gray-400 mr-2">A.</span> {faq.a}
                </p>
              </div>
            ))}
          </div>
        </section>

        <div className="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100">
          <Link to="/dizziness" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
            <ArrowLeft className="w-4 h-4 mr-2" /> 어지럼증 전체 보기
          </Link>
          <div className="flex gap-4">
            <Link to="/blog" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
              블로그 글 보기 <ArrowRight className="w-4 h-4 ml-2" />
            </Link>
            <a href="tel:02-6959-7252" className="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-maekrak-navy text-white hover:bg-[#1a3276] transition-colors font-medium">
              상담 예약하기
            </a>
          </div>
        </div>

      </div>
    </div>
  );
}
