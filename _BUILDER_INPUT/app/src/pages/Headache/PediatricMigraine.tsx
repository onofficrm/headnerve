import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function PediatricMigraine() {
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
            <span className="text-[#7ec8e0]">소아 편두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            소아 편두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "소아 편두통은 만 18세 이하에서 발생하는 편두통으로, 성인과 달리 양측성 두통이 많고 지속 시간이 짧으며 구역·구토·복통·어지럼증 같은 소화기·자율신경 증상이 두드러지는 경향이 있습니다."
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
              성인과 다른 언어로 구조 신호를 보냅니다. "배 아파", "어지러워", 혹은 그냥 양호실에 엎드려 있는 행동이 편두통일 가능성이 높습니다.<br /><br />
              맥락한의원은 자라나는 뇌의 에너지 대사를 철저하게 회복하여 무너진 집중력과 성장의 잠재력까지 한 번에 살려냅니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "잦은 양호실 방문 및 활동 기피",
              "두통보다 복통, 구토 증세를 주로 호소함",
              "어지럽다거나 시야가 이상하다는 표현",
              "두통 발병 시 어두운 곳에 누우려 함",
              "한 숨 깊게 자고 나면 귀신같이 쌩쌩해짐"
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
          <div className="prose prose-lg max-w-none text-gray-800 leading-[1.8] break-keep">
            <p>
              성인과 뿌리 구조는 동일하나, <strong>성장기 특유의 방아쇠 3대 요인(수면부족, 디지털 기기 과로, 자세 망가짐)</strong>이 치명적으로 작용합니다.
            </p>
            <p className="mt-4">
              학업 스케줄 탓에 뇌 글림프(청소) 시스템이 야간에 정지되고, 태블릿 영상물로 폭발적인 신경 피질 소모가 발생하며, 오랫동안 숙인 목뼈는 물리적인 신경 압박 파이프가 되어 버립니다. 이 사이클이 결국 뇌의 에너지 파산을 불러 소아 편두통을 완성합니다.
            </p>
          </div>
        </section>

        {/* 치료 방법 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">연령 맞춤형 두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                성인 약재를 줄여 쓰는 게 아닌 안전성과 성장 대사에 특화된 보육 처방입니다. 신경을 다독일 뿐만 아니라 뇌 에너지 고효율 연비를 이끌어 기억력과 학습 집중도까지 함께 개선하는 이중 효과를 노립니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">소아 약침 & 성형 추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                아이의 공포를 최소화한 부드럽고 가벼운 시술로 상부 경추의 구조적 막힘(Myodural bridge 견인)을 영리하게 해제합니다.
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
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                새벽에 잠을 깰 정도로 두통에 시달려 신경과 예방약 부작용만 안고 찾아온 고1 여학생. 두맥탕 병행 단 4주 만에 야간 발작 완전 소멸 및 무사히 정규 학업 복귀.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                잦은 양호실 방문으로 학업을 미끄러지던 중2 남학생. 모자(母子)가 동반 환자로 등록되어 단기간에 집중된 체질 교정과 추나를 통해 학습 집중력까지 극적으로 향상되며 치료 종결.
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
                q: "애가 스트레스에 꾀병 부리는 건 아닐까요?",
                a: "단호히 아닙니다. 빛을 회피하거나, 수면 후 말끔해지는 극적 패턴을 보인다면 소아 편두통 특유의 생물학적 발작 양상일 확률이 높습니다."
              },
              {
                q: "성인이 되면 알아서 낫지 않나요?",
                a: "과거엔 그렇게 생각했으나, 방치된 편두통은 뇌 신경구조를 퇴행시켜 불량한 성인 편두통으로 직결되는 징검다리입니다."
              },
              {
                q: "소아에게 한약이 안전한가요?",
                a: "원장이 직접 상태를 초정밀 타게팅하여 성장 방해나 무리가 되는 자극성 약재를 완벽히 배제한 식약처 인증 안심 등급 처방만을 진행합니다."
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
            <ArrowLeft className="w-4 h-4 mr-2" /> 두통 전체 보기
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
