import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function CervicogenicHeadache() {
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
            <span className="text-[#7ec8e0]">경추성 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            경추성 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "경추성 두통은 목 주변의 척추, 근육 등 경추 구조의 기능 이상과 신경 압박으로 인해 후두부뿐만 아니라 관자놀이, 눈 주변까지 통증이 번지는 구조적 두통 질환입니다."
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
              경추성 두통은 통증 발생지가 환자가 체감하는 부위(머리)와 일치하지 않는 기만적인 성질을 띕니다.<br /><br />
              맥락한의원은 진통제로 거짓 평화를 누리는 것을 지양하며, C1, C2 상부 경추의 구조적 압박점(TCC)을 정밀 타격하여 통증의 '방송국(원천)' 자체를 파괴하는 구조적 완치를 추구합니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "목이나 어깨를 특정 각도로 움직일 때 두통이 악화된다",
              "뒷목에서 시작된 통증이 정수리, 이마, 눈가까지 퍼져나간다",
              "스마트폰이나 모니터를 볼 때 증상이 예외 없이 증폭된다",
              "어지럼증이나 눈 침침함이 종종 동반된다",
              "도수치료나 마사지를 받아도 그때뿐이고 진통제가 잘 듣지 않는다"
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
              두개골을 받치고 있는 1번, 2번 경추 주변은 삼차신경핵과 경추신경이 한 덩어리로 뭉쳐있는 '삼차경추신경복합체(TCC)' 거점입니다.
            </p>
            <p className="mt-4 font-medium text-gray-800">
              일자목·거북목 체형이 지속되면 좁은 경추 통로에 극심한 기계적 압박이 가해지고, 목에서 발생한 염증 신호가 삼차신경망을 타고 눈과 이마로 잘못 송출(연관통)되는 것입니다.
            </p>
          </div>
        </section>

        {/* 치료 방법 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">구조 정립 하드웨어 수리 (추나)</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근 긴장을 해제하고 어긋난 두개경추 정렬을 하드웨어적으로 원상 복구합니다. 일시적인 근육 마사지와는 차원이 다른 원인 해체 작업입니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">소염 & 인대 보수 (약침)</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                경추 신경절이 물리적으로 압사하며 뿜어내는 극심한 신경 염증을 즉각 진화시키는 소형 소방수 약침을 투입합니다.
              </p>
            </div>
             <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">연비 강화 소프트웨어 수리 (청혈 두맥탕)</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                하드웨어가 고쳐져도 혈액 속 노폐물이 신경을 자극하면 재발합니다. 전신 뇌척수액 순환을 정화하여 장기적인 완전 평형을 이룩합니다.
              </p>
            </div>
          </div>
        </section>

        {/* 치료 사례 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                안구가 빠질 듯한 통증으로 안과부터 돌았던 직장인 환자. 추나 및 소염 약침 집중 연사 후 눈 통증이 목 디스크성 연관통이었음을 확인하며 증상 소실.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                진통제로 연명하며 수개월 차도가 없던 긴장성·경추성 복합 만성 두통 사례. C1, C2 정밀 교정 적용 후 2주차에 짓누르는 하중감 70% 증발, 안정 치료 후 완쾌.
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
                q: "눈알이 아픈데 목이 원인이라고요?",
                a: "네, 목 신경절과 뇌신경(삼차신경)이 두개골 한 곳에서 교차합니다. 뇌는 목뼈에서 보낸 통증을 안구 통증으로 착각(연관통)하여 인지합니다."
              },
              {
                q: "도수치료랑 추나가 뭐가 다르죠?",
                a: "단순 근육을 풀어주는 마사지성 이완은 하루짜리 임시방편입니다. 한의사가 직접 경추 코어 관절 구조의 비틀림 잠금을 따버리는 고차원 교정입니다."
              },
              {
                q: "진통제가 잘 안 듣는 이유가 뭔가요?",
                a: "진통제는 전신 염증 약화제이나, 경추성 두통은 물리적으로 목뼈가 신경을 짓누르는 압살 상황입니다. 바위를 치우지 않고 진통제만 먹어선 풀리지 않습니다."
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
