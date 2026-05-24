import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function MenstrualHeadache() {
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
            <span className="text-[#7ec8e0]">생리 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            생리 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "생리 두통은 월경 주기와 연관되어 발생하는 두통으로, 생리 전후 에스트로겐 수치가 급격히 떨어지는 시기에 주로 나타나며 편두통 양상을 동반하는 경우가 많습니다."
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
              생리 두통에서 호르몬 변화는 원인이 아니라 방아쇠일 뿐입니다.<br /><br />
              시간이 지나며 생리와 무관한 만성 두통으로 악화되는 과정은 호르몬의 문제가 아니라 '두통 임계점' 자체가 무너지고 있다는 뜻입니다. 맥락한의원은 호르몬 변동조차 가볍게 무시하고 지나갈 <strong>견고한 뇌 에너지·구조 기반</strong>을 구축합니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "생리 시작 1~2일 전부터 두통이 강하게 시작된다",
              "생리 기간에 두통이 극대화되고 끝나면 사라진다",
              "생리 두통이 편두통처럼 심장 박동과 같이 욱신거린다",
              "처음엔 생리 때만 아팠는데 언제부턴가 수시로 아프다",
              "수면 장애나 극심한 피로, 예민함이 함께 동반된다"
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
              동일한 에스트로겐 하락 시나리오를 겪으면서도 어떤 여성은 고통받고 어떤 여성은 무탈합니다. 차이는 내분비계 호르몬 자체가 아니라, 그 출렁임을 버텨낼 '뇌 에너지 내구성'에 있습니다.
            </p>
            <p className="mt-4">
              매달 두통 신경망이 타오르면 점차 뇌의 통증 역치가 하락합니다. 결국 생리 방아쇠 없이도 조금만 체력이 떨어지면 만성 두통으로 번지게 됩니다. 
              <strong>목표는 호르몬 인위적 조작이 아니라, 어떠한 출렁임에도 무너지지 않는 항체를 기르는 것</strong>입니다.
            </p>
          </div>
        </section>

        {/* 치료 방법 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕 (소화, 수면, 피로 맞춤형)</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                전신 순환 및 지방 대사를 활성화해 혈당과 에너지 롤러코스터에 저항 강도를 높입니다. 수면 불량 체질, 소화 연약 체질 등 환자별 취약점을 선제적으로 커버하여 에스트로겐 하락파도를 완충합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침 & 추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                호르몬 변동 시기에 관절과 인대가 이완되며 경추가 더 잘 비틀어집니다. 이 구조적 균열을 추나로 미리 단단히 고정하고 약침으로 팽배해진 교감 신경 항진을 물리적으로 꺼트립니다.
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
                매달 생리 전후 3일간 밤을 지새우는 극심한 통증 환자. 4주간 집중 치료 후 다음 주기엔 통증 절반으로 하락, 이후 점진적 안착 후 치료 종결. 호르몬 사이클의 두려움에서 완벽 해방.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                임신 중엔 마법같이 사라졌다 출산 보육 후 쏟아진 구역질 동반 만성 두통. 두맥탕 중심으로 약화된 뇌 대사를 집중 복구시켜 다음 주기엔 구토 없이 무탈. 완전 소실 종결.
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
                q: "피임약을 끊으면 생리 두통이 낫나요?",
                a: "단순 복용 부작용이라면 호전될 수 있으나, 이미 존재하던 두통 기반에 에스트로겐 촉발 인자가 거들기만 한 거라면 약을 끊어도 두통은 반복됩니다."
              },
              {
                q: "생리통이 심한데 연관 관계가 있나요?",
                a: "깊은 연관이 있습니다. 생리통 발현 기전인 프로스타글란딘의 전신 혈관 파이프 조절 능력이 뇌혈류를 거칠게 흔들며 시너지를 일으킵니다."
              },
              {
                q: "임신 중엔 왜 통증이 없었을까요?",
                a: "임신 중엔 호르몬 바다가 고요하게 유지되기 때문입니다. 출산 후 호르몬 태풍에 육아 수면부족까지 더해져 만성화의 초고속 도로에 진입하는 경우가 잦아 출산 후 재발은 빠른 방어가 필수입니다."
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
