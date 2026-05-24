import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function TensionHeadache() {
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
            <span className="text-[#7ec8e0]">긴장형 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            긴장형 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "긴장형 두통이란 머리 전체를 띠로 조이듯 압박하는 통증이 30분에서 수 시간 지속되는 두통입니다. 단순한 근육 긴장이 아닌 후두하근과 승모근의 만성 경직이 신경을 압박하는 연쇄 반응이 원인입니다."
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
              긴장형 두통을 단순한 근육 긴장이 아닌 <strong>두개경추 구조 문제와 신경계 긴장 문제</strong>로 접근합니다. 신경계 긴장을 이완하고 경추를 바로 잡는 것이 반복되는 긴장형 두통의 근본 치료 방향입니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "조이는 듯한 압박감의 두통이 있다",
              "두통이 거의 매일, 또는 한달에 15일 이상 있다",
              "뒷목과 어깨가 항상 뻣뻣하고 심하면 머리로 뻗치는 두통이 있다",
              "오래 앉아 일하면 두통이 스물스물 심해진다",
              "통증 강도는 극심하진 않지만 하루 종일 묵직하게 깔려있는 느낌이다",
              "스트레스를 받으면 증상이 심해진다"
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
              긴장형 두통은 단순한 근육 긴장이 아닌 <strong>두개경추 구조 문제와 신경계 긴장</strong>이 원인입니다. 특히 교감신경의 항진, 자율신경 불균형, 경추의 틀어짐이 주된 원인입니다.
            </p>
            <p>
              두통으로 찍는 MRI, CT 검사는 이차성 두통을 감별하기 위한 검사입니다. 긴장형 두통은 경추와 자율신경의 문제이기 때문에 양방 기질적 검사에서는 이상이 발견되지 않는 경우가 많습니다.
            </p>
            <p className="font-medium text-gray-800 my-6">
              기존 진통제를 반복 복용하면 일시적으로 완화될 수 있지만, 구조적·기능적 긴장이 해소되지 않으면 두통은 평생 반복됩니다.
            </p>
            <p>
              맥락한의원은 자율신경 균형 회복과 경추 정렬 교정을 통해 근본적인 원인을 치료합니다.
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
                체질과 두통 패턴에 따라 맞춤 처방되며 신경계의 불균형을 해소하고 기능적 긴장을 안정화합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근의 근육 내 트리거 포인트에 정확히 시술해 경막 긴장을 물리적으로 해소합니다. 경막 긴장이 완화되면 두개내압 변동이 줄고 흐름이 원활해집니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                근육 긴장을 풀어도 경추 정렬 자체가 틀어진 상태라면 근육은 다시 긴장합니다. 추나는 구조를 바로잡아 원 상태로 돌아가지 못하게 록(Lock)을 걸어 재발을 막는 핵심 치료입니다.
              </p>
            </div>
          </div>
          
          <div className="p-6 rounded-xl bg-blue-50/50">
            <h4 className="font-bold text-gray-900 mb-3">예상 경과</h4>
            <p className="text-[15px] text-gray-600 leading-[1.6]">
              증상이 호전되는 것은 4주 이내에 나타나고 완치까지는 3~6개월 기간이 걸립니다. 약물과용 여부나 다른 동반 질환에 따라 차이가 있을 수 있습니다.<br /><br />
              첫 4주를 집중 치료 기간으로 잡아 두통 빈도·강도, 자율신경 검사, 경추 부전을 재평가하여 치료를 이어나갑니다.
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
                도수치료, 물리치료를 받아도 잠깐뿐이고 반복되는 긴장형 두통 환자. 근본 원인 해결 없이 마사지만 받았기 때문입니다. 내원 후 두맥탕·약침·추나 집중치료 2회차부터 호전 반응. 3주차부터는 머리가 눌리는 압박감이 완전히 소실되어 치료 종결.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                예리한 통증보단 뭉툭한 막대로 누르는 듯 하루 종일 묵직한 통증. MRI 이상 없음 소견으로 진통제만 처방받은 2년 차 두통. 집중 치료 2주 만에 강도 70% 감소, 빈도 대폭 하락하여 치료 종결로 이어졌습니다.
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
                q: "진통제랑 뭐가 다른가요?",
                a: "진통제는 통증을 느끼지 못하게만 만드는 것이고, 맥락한의원 치료는 통증을 '일으키는 구조와 원인' 자체를 고치는 것입니다. 그래서 진통제·스테로이드 일절 없이 두통이 낫는 것입니다."
              },
              {
                q: "진통제는 당장 끊어야 하나요?",
                a: "치료 시작과 동시에 바로 끊을 필요는 없습니다. 맥락의 근본 치료가 진행되며 약물이 필요한 횟수 자체가 자연스럽게 줄어드는 것이 정상적인 목표입니다. (단, 과용 상태에 따라 즉각적인 테이퍼링을 협의할 수 있습니다.)"
              },
              {
                q: "얼마나 다녀야 하나요?",
                a: "첫 4주가 집중 치료 기간입니다. 만성화된 기간에 비례해 회복 기간이 필요하지만, 구조적 문제가 해소되고 나면 수치 개선과 함께 증상 호전이 빠르게 따라옵니다."
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
