import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function VestibularNeuritis() {
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
            <span className="text-[#7ec8e0]">전정신경염</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            전정신경염
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "전정신경염은 바이러스 감염 등으로 전정신경에 염증이 생겨 갑작스러운 극심한 회전성 어지럼증이 수 시간에서 수일간 지속되는 질환입니다. 난청이나 이명은 동반되지 않는 것이 메니에르병과의 차이점입니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <div className="prose prose-lg max-w-none text-gray-800 font-light leading-[1.8] break-keep">
              <p>전정신경염 급성기 이후 전정 보상 기능으로 대부분 회복되지만, 회복이 완전하지 않아 만성 어지럼증이 남는 경우가 많다. 몇 달이 지나도 머리가 흔들리는 느낌, 몸이 붕 뜨는 느낌이 지속된다면 전정 보상 기능 회복이 충분히 이뤄지지 않은 것이다.</p>
              <p className="mt-4">전정 보상 기능이 완전히 회복되려면 경추 고유수용성 감각이 정상적으로 작동해야 한다. 두개경추 기능 이상이 남아있으면 전정 보상 기능 회복이 지연되고 만성 어지럼증으로 이어진다.</p>
              <p className="mt-4">내이 혈류가 불안정한 상태에서는 손상된 전정신경의 회복도 더디다. 두개경추 배액 장애와 내이 혈류 저하가 전정신경염 이후 만성 어지럼증을 만드는 구조적 배경이 된다.</p>
              <p className="mt-4">맥락한의원은 전정신경염 이후 만성 어지럼증을 경추 고유수용성 감각 이상과 두개경추 기능 이상, 내이 혈류 저하의 복합 문제로 본다. 시간이 해결해주기를 기다리는 것이 아니라 회복을 방해하는 구조를 적극적으로 다루는 것이 치료 목표다.</p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "전정신경염 급성기가 지났는데도 어지럼증이 완전히 사라지지 않는다",
              "머리를 빠르게 움직일 때 어지럽고 시야가 흔들린다",
              "걸을 때 한쪽으로 쏠리거나 똑바로 걷기 어렵다",
              "어두운 곳이나 눈을 감으면 더 어지럽다",
              "급성기 이후 목이 심하게 굳고 두통이 함께 생겼다",
              "몇 달째 회복이 더디고 피로하면 어지럼증이 심해진다"
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
          <div className="prose prose-lg max-w-none text-gray-600 font-light leading-[1.8] break-keep">
            <p className="font-medium text-gray-800">경추 고유수용성 감각 이상</p>
            <p>급성기 극심한 어지럼증을 버티면서 무의식적으로 목을 긴장합니다. 고착된 긴장은 뇌의 보상에 활용되는 경추 신호를 왜곡하여 회복을 지연시킵니다.</p>
            <p className="font-medium text-gray-800 mt-6">두개경추 기능 이상과 내이 혈류 저하</p>
            <p>메니에르병·이석증과 동일하게 경추 정맥계 배액이 불안정하면 전정신경 손상 조직 회복에 필요한 혈류 공급이 줄어들어 회복 자체의 진행이 더디어집니다.</p>
            <p className="font-medium text-gray-800 mt-6">"시간이 지나면" 나아진다는 말의 한계</p>
            <p>경추 긴장 구조가 해결되지 않은 채로 내이 혈류 저하를 방치하면, 전정 보상 과정이 자연스럽게 완수되지 않아 만성화로 흐릅니다.</p>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                손상된 신경의 대사와 회복 촉진을 위해 전신 체액과 내이 혈류 회복을 도와 보상 기능에 에너지를 보충합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근 장력 완화와 경추 긴장을 물리적으로 해소하여 근방추가 뇌에 수신하는 밸런스 감각 정보의 정확도를 높여 전정 보상 속도를 증진시킵니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                두개경추 정렬을 교정해 보상 기능과 배액을 통한 내이혈류의 안정성을 보장해 완전히 정상화된 구조적 기반을 만듭니다.
              </p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                30대 여성, 전정신경염 후 4개월째 잔여 어지러움. 4개월이 지나도 자연회복되지 않아 방문. 경추 저하 상태를 관찰하고 어지럼증 치료 프로그램으로 근방추 회복. 3개월 후 치료 종결. 시간이 해결해주지 못한 방해요소를 처치함.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                40대 남성, 응급실 다녀온 후 약 복용 중이나 어지럼증 계속. 내이 혈류 저하와 배액 문제 해결 위해 치료 프로그램 개시. 정렬 교정과 혈류 재건으로 전정 신경 회복의 환경 조성. 4개월 이후 정상 궤도 진입.
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
                q: "전정신경염은 시간이 지나면 자연히 낫지 않나요?",
                a: "초기 급성기 증상은 사라지지만, 본질적인 경추 고유수용성 감각 불일치나 혈류 저하는 남을 경우 적극 치료가 필요합니다."
              },
              {
                q: "전정 재활 운동을 하고 있는데 왜 효과가 없나요?",
                a: "보상 과정을 돕는 정보인 경추 신호가 뒤틀려 있으면 재활의 효율이 떨어집니다. 긴장을 해소하고 하면 훨씬 효과적입니다."
              },
              {
                q: "전정신경염과 메니에르병은 어떻게 다른가요?",
                a: "메니에르병은 난청 및 이명이 수반되나, 전정신경염은 귀증상 없이 극도로 어지러움을 유발하는 회전성 증세 자체에 가깝습니다. 두 질환의 배액 근본 이유는 비슷합니다."
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
            <ArrowLeft className="w-4 h-4 mr-2" /> 어지럼증 전체 보기 (1층)
          </Link>
          <div className="flex gap-4">
            <Link to="/blog" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
              블로그 글 보기 (3층) <ArrowRight className="w-4 h-4 ml-2" />
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
