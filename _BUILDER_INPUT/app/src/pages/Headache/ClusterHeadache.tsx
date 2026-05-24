import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function ClusterHeadache() {
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
            <span className="text-[#7ec8e0]">군발성 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            군발성 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "군발두통은 한쪽 눈 주위에 극심한 통증이 15분~3시간씩, 하루 1~8회 반복되는 두통으로, 다른 두통보다 강도가 훨씬 세고 같은 쪽 눈물, 코막힘, 눈꺼풀 처짐을 동반하는 삼차자율신경 두통입니다."
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
              군발두통의 핵심은 삼차신경과 자율신경계의 동시 과흥분입니다.<br /><br /> 
              산소 요법과 트립탄은 이미 시작된 발작을 잠깐 완화할 뿐 다음 폭탄을 해체하지 못합니다. 맥락은 <strong>삼차경추신경복합체(TCC)의 과흥분을 구조적으로 제거</strong>하여, 지긋지긋한 사이클의 사슬을 끊어내는 것을 최종 목표로 삼습니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "한쪽 눈 주위나 관자놀이에 송곳으로 찌르는 듯한 극심한 통증",
              "통증이 15분 ~ 3시간 안에 끝나지만 하루에도 여러 번 반복",
              "두통 시 같은 쪽 눈이 충혈되고 눈물이 나거나 코가 막힘",
              "두통이 몇주~달간 매일 오다가 갑자기 사라짐",
              "음주 후 즉각적인 발작 시작"
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
              군발두통 발작은 '삼차경추신경복합체(TCC)'의 과흥분이 원인입니다. 이 핵이 두개골과 경추가 만나는 하부 구조에 위치하며, 약간의 구조적 비틀림이나 스트레스만으로도 폭발적인 통증 신호를 쏘아올립니다.
            </p>
            <p className="mt-4">
              발작 중의 눈물·콧물은 부교감신경계의 비정상적 과활성입니다. 이 자율신경 불균형은 비군발기에도 숨어있다가 환절기 등 환경 변동에 맞춰 항상성을 잃으며 수면 위로 돌출됩니다. 소양인 체질 비율이 유난히 높은 통계가 교감신경의 선천적 항진 임계치와 직결되는 이유입니다. 
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
                군발기를 단축시키고 다음 사이클 발작 강도를 극적으로 하락시킵니다. 교감 신경 과흥분 체질을 근본적으로 보수하여 삼차자율신경계 평형을 맞춥니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침 & 추나 결합치료</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                TCC 지점과 삼차 분지에 직효하는 약침으로 신경 역치를 방어하고, 두개경추 정렬 추나로 핵에 가해지는 기계적 자극 압력을 상시 제거합니다.
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
                응급실을 제 집처럼 들락거리던 30대 남성 군발환자. 맥락 병행 2주차부터 발작 빈도가 매일에서 2일에 1회 꼴로 감소, 일상이 가능해질 정도로 강도 축소 후 치료 종결.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                이번 주기엔 눈꺼풀 처짐까지 동반되며 진통제를 5~6알 달고살던 환자. 집중 치료 3주차부터 안면 거상(처짐 회복) 보이며 진통제 의존 극적 하락 후 3개월 치료 종결.
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
                q: "편두통과 어떻게 다른건가요?",
                a: "첫째, 통증 성질이 다릅니다(편두통=욱신, 군발=찌름). 둘째 행동 패턴입니다(편=가만히눕기, 군발=동동거림). 무엇보다 군발은 눈물·콧물 동반 같은 명확한 자율신경 이상을 지표로 삼습니다."
              },
              {
                q: "군발기 끝나면 자연 치유된 것 아닌가요?",
                a: "절대 아닙니다. 통증 신호가 꺼졌을 뿐 폭탄은 여전히 잠복 상태입니다. 사이클이 정지된 비군발기야 말로 체질과 구조를 보수하여 다음 주기를 폭파시킬 최적의 예방 골든 타임입니다."
              },
              {
                q: "스테로이드 단기 투여중인데 한의원 병행이 가능할까요?",
                a: "네 가능합니다. 스테로이드는 급성기 화재 진압에 유용하며, 맥락의 치료는 건축 구조를 바로잡는 것으로 서로 적대하지 않고 시너지를 창출합니다."
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
