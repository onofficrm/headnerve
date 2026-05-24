import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Migraine() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      {/* 2층 Header */}
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium text-white/60 mb-6">
            <Link to="/headache" className="hover:text-white transition-colors">두통</Link>
            <ChevronRight className="w-4 h-4" />
            <span className="text-[#7ec8e0]">편두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            편두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "편두통이란 머리 한쪽에 박동성 통증이 4~72시간 지속되며, 구역, 구토, 빛이나 소리 과민을 동반하는 신경계 질환입니다. 빛 번짐, 시야 왜곡, 시야 제한 등 시야 전조 증상을 동반하기도 합니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        {/* 맥락한의원 관점 */}
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.8] break-keep">
              편두통은 뇌가 에너지 위기 상황에서 보내는 신호입니다. 원인이 없는 것이 아니라 지금까지 보지 못했을 뿐입니다. 트립탄은 혈관을 수축하고 아조비, 앰갤러티는 CGRP 작용을 차단해 통증을 줄이지만, 왜 CGRP 분비가 많아졌는지 이유는 신경쓰지 않습니다. 신호를 끈다고 원인이 사라지지는 않습니다.<br /><br />
              맥락한의원은 편두통을 <strong className="text-gray-900 font-bold">머리를 둘러싼 구조와 기능의 불균형</strong>으로 봅니다. 편두통 발작이 반복되는 근본적인 원인을 고쳐야 편두통 없는 일상을 만들 수 있습니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "일상 생활이 어려울 정도의 두통이거나 일상 활동만으로 극심한 두통이 발생한다",
              "두통과 함께 구역감, 구토가 동반된다",
              "두통이 있을 때 빛, 소리, 냄새가 극도로 괴롭다",
              "두통 전 눈앞이 번쩍이거나 시야가 흐려지는 전조 증상이 있다",
              "생리 전후로 증상이 심하다"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-5 rounded-xl bg-white border border-gray-200">
                <CheckCircle2 className="w-5 h-5 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[15px] md:text-[16px] text-gray-700 leading-[1.5] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        {/* 한의학적 원인 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">왜 생기는가 — 한의학적 원인</h2>
          <div className="prose prose-lg max-w-none text-gray-600 font-light leading-[1.8] break-keep">
            <p>
              기존에는 편두통을 “뇌가 예민해서 그래요. 유전 영향이 있습니다”라고 설명합니다. 유전적 뇌 과민성은 틀린 말은 아니지만 그것이 전부가 아닙니다.
            </p>
            <p className="font-medium text-gray-800 my-6">
              편두통 환자는 뇌 연료 공급이 불안정합니다. 
            </p>
            <p>
              주된 원인은 자율신경 불균형과 대사 문제로 인한 공급 부족과 뇌 에너지 소비 과잉이 첫 번째입니다. 이 과정에서 보상적 뇌혈관 확장은 압력을 높이면서 두통을 만들어냅니다.
            </p>
            <p className="mt-4">
              두 번째로는 연료가 공급되는 길인 경추가 구조적으로 틀어져 있기 때문입니다. 편두통 환자들은 항상 경추 기능부전이 발견되고 두통 방향과 경추 기능 이상의 방향이 일치하는 것은 결코 우연이 아닙니다.
            </p>
          </div>
        </section>

        {/* 치료 방법 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                체질과 두통 패턴에 따라 맞춤 처방되며 신경계의 불균형을 해소하고 기능을 회복합니다. 효과 시점은 에너지 안정화는 4주 이후, 발작 빈도 감소는 6~8주부터 체감하는 경우가 많습니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                편두통 발작의 직접 방아쇠인 경막 긴장과 삼차신경혈관 과활성을 다룹니다. 후두하근의 트리거포인트와 C1, C2 분절에 시술해 물리적으로 당겨지는 힘을 해소합니다. 시술 후 긴장 완화는 즉각 느끼는 경우가 많고 발작 빈도 감소는 3~4회 이후부터 확인됩니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                두개경추 정렬이 회복되면 뇌척수액 순환이 원활해지고 경막이 이완된 상태를 구조적으로 유지할 수 있습니다. 약침 시술 이후 추나를 진행합니다. 근육이 이완된 상태에서 교정해야 효과가 유지됩니다.
              </p>
            </div>
          </div>
          
          <div className="p-6 rounded-xl bg-blue-50/50">
            <h4 className="font-bold text-gray-900 mb-3">예상 경과</h4>
            <p className="text-[15px] text-gray-600 leading-[1.6]">
              증상이 호전되는 것은 4주 이내에 나타나고 완치까지는 3개월 ~ 6개월 기간이 걸립니다. 편두통의 기간, 동반 증상, 약물과용 여부, 다른 질환이 겸하고 있는지에 따라 차이가 있습니다.<br /><br />
              첫 4주를 집중 치료 기간으로 잡습니다. 4주 치료 이후 두통 빈도, 강도, 자율신경 검사, 경추 기능 부전 검사를 재평가하고 안정기, 유지 치료를 합니다.
            </p>
          </div>
        </section>

        {/* 치료 사례 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                시야 전조 증상이 시작되면 빛 번짐과 시야 흐림이 생긴다. 20~30분 후 통증이 오는데 일상생활 불가능할 정도이고 구토를 해야 끝난다. 10년 된 증상으로 내원. 두맥탕, 약침, 추나 치료로 3주차에 두통 강도 50%로 감소, 집중치료 후 편두통 발작 없어짐. 3개월 내 치료 종결.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                출산 이후 심해진 편두통. 아조비, 트립탄 모두 듣지 않아 근본 치료를 위해 내원. 4주간 집중 치료 후 두통 강도와 빈도가 50%로 감소. 안정 및 유지 치료로 발작 소실. 4개월 내 치료 종결.
              </p>
            </div>
          </div>
          <div className="text-center">
            <Link to="/blog" className="inline-flex items-center text-[15px] font-medium text-maekrak-blue hover:text-[#7ec8e0] transition-colors border-b border-current pb-0.5">
              자세한 사례 보기 (블로그) <ArrowRight className="w-4 h-4 ml-1" />
            </Link>
          </div>
        </section>

        {/* FAQ */}
        <section className="mb-24">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">자주 묻는 질문 FAQ</h2>
          <div className="space-y-4">
            {[
              {
                q: "MRI 결과는 정상인데 편두통이 맞나요?",
                a: "맞습니다. MRI는 뇌의 종양, 출혈을 확인하는 검사입니다. 정상이라는 것은 그런 병이 없다는 뜻이지, 편두통의 원인이 없다는 뜻이 아닙니다. 경추 기능 이상, 자율신경 불균형, 대사 문제는 MRI에 나타나지 않습니다. 맥락한의원의 진단은 여기서부터 시작합니다."
              },
              {
                q: "항CGRP 주사(앰갤러티, 아조비)를 맞고 있는데 한의원 치료를 같이 받을 수 있나요?",
                a: "가능합니다. 항CGRP 주사는 CGRP의 작용을 차단해 발작 빈도를 줄이는 방식으로 맥락한의원의 치료 방향과 경쟁하지 않습니다. 오히려 발작 빈도를 낮춘 상태로 근본 원인을 함께 다루면 치료 속도가 빨라지는 경우도 있습니다."
              },
              {
                q: "생리 전후에 편두통이 심해집니다. 호르몬 문제 아닌가요?",
                a: "호르몬 변동은 대표적인 트리거입니다. 하지만 원인은 아닙니다. 호르몬을 조절하지 않더라도, 평소 뇌 에너지 기반을 정상으로 만들어놓으면 같은 호르몬 변동에도 편두통 발작으로 이어지지 않는 상태를 만들 수 있습니다."
              },
              {
                q: "편두통이 10년 이상 됐는데 좋아질 수 있나요?",
                a: "만성화된 기간이 길수록 회복에 시간이 걸리는 것은 사실입니다. 다만 기간보다 중요한 것은 원인의 구조입니다. 경추 문제가 주된 분들은 기간과 무관하게 구조 교정에 잘 반응하는 경우가 많습니다."
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

        {/* Footer Navigation */}
        <div className="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100">
          <Link to="/headache" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
            <ArrowLeft className="w-4 h-4 mr-2" /> 두통 전체 보기 (1층)
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
