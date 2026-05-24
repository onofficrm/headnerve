import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function MedicationOveruseHeadache() {
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
            <span className="text-[#7ec8e0]">약물과용 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            약물과용 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "약물과용두통(MOH)은 두통 치료를 위해 진통제나 트립탄을 과도하게 복용할 때 오히려 두통이 더 자주, 더 강하게 나타나는 상태입니다. 한 달에 단순 진통제 15일 이상, 트립탄 10일 이상 복용 시 발생할 수 있습니다."
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
              약물과용두통은 의지의 문제가 아닌, 뇌의 통증 조절 시스템이 망가져 약에 의존해야만 하는 메커니즘에 갇힌 상태입니다.<br /><br />
              맥락한의원은 단순히 약을 끊으라고 강요하지 않습니다. 테이퍼링을 통해 두통 발생 자체를 줄여 약물이 필요한 날카로운 상황을 자연스럽게 줄이는 방식을 채택합니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 gap-4">
            {[
              "한 달에 일반진통제를 15일 이상, 트립탄 또는 복합진통제를 10일 이상 복용하고 있다",
              "예전에는 잘 듣던 약이 이제는 효과가 짧아졌다",
              "두통이 거의 매일 온다. 아침에 일어나면 이미 두통이 있다",
              "약을 먹지 않으면 두통이 더 심해질 것 같아 미리 먹게 된다",
              "예방약이나 아조비·엠갤러티 주사를 맞아도 효과가 없다",
              "진통제를 끊으려 했는데 두통이 너무 심해 결국 다시 먹게 됐다"
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
            <h4 className="font-bold text-gray-900 mt-6 mb-3">진통제가 두통을 만드는 역설적 구조</h4>
            <p>
              뇌의 통증 조절 시스템은 약물이 반복적으로 통증을 억제하면 감각 수용체를 더 민감하게 보상 증폭시킵니다. 약이 떨어질 때마다 나타나는 반동 현상이 바로 그것입니다. 이 반동을 막기 위해 또 약을 먹고, 트립탄에 빈번히 노출되면 결국 CGRP라는 매개 물질 농도마저 높아져 쉽게 두통에 불이 붙는 체질로 변모합니다.
            </p>
            <h4 className="font-bold text-gray-900 mt-8 mb-3">절대 갑자기 끊어선 안 됩니다</h4>
            <p>
              약물과용두통의 해결책이 절대 '무작정 끊기(Cold Turkey)'가 아닌 이유입니다. 일상은 망가지고 극심한 반동 두통이 몰려옵니다. 원인을 제거하며 서서히 테이퍼링(점진적 감량)해야 뇌가 자생력을 회복합니다.
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
                과민화된 통증 시스템을 진정시키고 뇌 에너지를 공급합니다. 반동 두통 증후군을 이겨내고 테이퍼링 과정에서의 고통을 적극적으로 방어합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침 & 추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                C1·C2 경막 주변에 직접 작용하여 근본적인 방아쇠를 끕니다. 경추 정렬이 회복되면 사소한 자극에도 쉽게 텨지지 않는 안정된 신경 환경이 조성됩니다. 발작이 줄면 자연스럽게 약도 줄일 수 있습니다.
              </p>
            </div>
            <div className="p-6 rounded-xl bg-blue-50/50 mt-6 border border-blue-100">
              <h4 className="font-bold text-gray-900 mb-3">테이퍼링 진행 방식</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                현재 복용량 분석 → 목표 횟수 수립 → <strong>한의학 치료를 통해 발작을 억제하며 서서히 약물 간격 연장</strong> → 복용량 감소의 선순환
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
                10년간 처방약 복용, 월 트립탄 20회 이상. 약을 많이 먹어 통증 시스템이 과민화된 30대 여성. 두통 근본 원인을 다루는 테이퍼링을 병행하여 자연스럽게 트립탄 복용이 감소, 5개월 만에 치료 종결에 이른 케이스.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                진통제를 달고 살다 더 이상 약이 듣지 않게 된 60대 여성. 예방치료, 앰겔러티 주사도 소용없던 한계를 극복하기 위해 맥락 치료 병행. 6개월 테이퍼링 이후 수십 년 고착되었던 진통제 인생에서 벗어날 수 있었습니다.
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
                q: "처방받은 약을 먹은게 잘못인가요?",
                a: "아닙니다. 지시대로 먹었어도 빈도가 누적되면 MOH 메커니즘을 피할 수 없습니다. 핵심은 몰랐던 과거가 아니라 제대로 끊어내는 지금부터의 치료입니다."
              },
              {
                q: "아조비, 엠갤러티 예방주사를 맞는데 왜 실패했었나요?",
                a: "약물로 통증 시스템이 완전히 지배당해 있으면 생물학적 예방 제재도 뇌세포에 유효하게 수용되지 못합니다. 약물과용 락을 먼저 부숴야 다음 스텝이 보입니다."
              },
              {
                q: "혼자 끊다가 죽는 줄 알았습니다. 또 실패할까 겁납니다.",
                a: "갑자기 끊는 방식의 극심한 부작용을 누구보다 잘 압니다. 맥락은 무차별 단약이 아닌 점진적 테이퍼링을 진행합니다. 치료가 통증을 대신 받아주며 연착륙 시킵니다."
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
