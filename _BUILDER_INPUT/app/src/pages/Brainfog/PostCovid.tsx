import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Brain } from 'lucide-react';
import { Link } from 'react-router-dom';

export function PostCovid() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-maekrak-green/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/brainfog" className="hover:text-white transition-colors">Brainfog</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-maekrak-green">Post-COVID</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            코로나 후유증 브레인포그
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            코로나19 감염 이후 머리가 멍하고 집중력·기억력·언어 처리 능력이 저하되는 상태가 수개월 지속되는 대표적인 롱코비드 증상입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Brain className="w-8 h-8 text-maekrak-green" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                코로나 감염 후 1년이 지나도 브레인포그가 지속되는 비율은 약 32%에 달합니다. 이는 중증도나 나이와 무관합니다. 이는 단순한 피로가 아니라 <strong>자율신경계 교란과 뇌 혈류 조절 실패</strong>의 기질적 문제입니다.
              </p>
              <p>
                코로나 바이러스는 미주신경에 심각한 데미지를 주어 <strong>교감신경의 과활성</strong>을 유발합니다. 또한 감염 과정에서 뒷목(두개경추)의 조직 염증과 근육 강직이 연쇄적으로 일어나 뇌로 들어가는 산소와 빠져나와야 할 노폐물(정맥 배액)의 통로를 좁혀버립니다.
              </p>
              <p>
                맥락한의원은 코로나 후유증을 <strong className="text-maekrak-navy font-bold inline-block relative">자율신경계 불균형 + 두개경추(C1-C2) 물리적 손상<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-green/20 -z-10"></span></strong>이라는 더블 체크 베이스로 진단합니다. 바이러스가 남기고 간 뇌와 척추의 엉킨 실타래를 푸는 것이 치료의 핵심입니다.
              </p>
            </div>
          </div>
        </section>

        {/* 의심 증상 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {[
              {
                title: "코로나를 앓고 난 뒤 쭉 머리에 안개가 낀 듯하다",
                desc: "감염 이후 뇌 기능이 이전처럼 깔끔하게 돌아오지 않는 롱코비드의 전형입니다."
              },
              {
                title: "대화 시 단어가 안 떠오르고 남의 말이 튕겨나간다",
                desc: "언어 처리 영역의 대사 저하. 듣고는 있지만 뜻을 해석하는 데 과도한 뇌 에너지가 쓰입니다."
              },
              {
                title: "글자가 읽히지 않고 집중이 전혀 안 된다",
                desc: "활자는 보이나 뇌에 맺히지 않아 업무나 학업 수행 능력이 현저하게 떨어집니다."
              },
              {
                title: "코로나 이후 어지럼증까지 동반되었다",
                desc: "뇌 혈류 불안정과 두개경추 틀어짐이 평형 감각까지 건드린 신호입니다."
              },
              {
                title: "코로나 백신 접종 직후 비슷한 증상이 시작됐다",
                desc: "바이러스 감염뿐 아니라 백신으로 인한 자율신경계의 급격한 오류 반응도 동일 기전을 가집니다."
              },
              {
                title: "몇 달이 지나도 조금도 맑아지지 않는다",
                desc: "회복의 타이밍을 놓치고 몸이 브레인포그 상태를 '기본값'으로 인식해 굳어버린 상태입니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-maekrak-green/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-maekrak-green shrink-0 mt-1" strokeWidth={2} />
                  <div>
                    <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-3">{item.title}</h3>
                    <p className="text-[15px] md:text-[16px] text-gray-800 leading-[1.75] break-keep">{item.desc}</p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </section>

        {/* 한의학적 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 한의학적 주요 원인</h2>
          <div className="bg-[#f8f9fa] rounded-2xl p-8 lg:p-12 mb-10">
            <h3 className="text-[24px] font-bold text-gray-900 mb-6">자율신경 에러와 뇌 혈류의 단전</h3>
            <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep mb-6">
              코로나 바이러스는 미주신경(안전을 담당하는 부교감신경)에 타격을 줍니다. 이는 비상 경보(교감신경)를 항시 켜두게 만들며, 수면의 질을 나빠지게 합니다. 잠이 나쁘면 글림프 시스템(뇌 청소기)이 멈추고 노폐물이 쌓이는 악순환이 브레인포그를 영속시킵니다.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">두개경추 조직 염증</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                잔기침과 고열을 겪으며 목 주변 두개경추 근육(후두하근)에 염증과 극심한 긴장이 유발됩니다. 이곳이 막히면 뇌로 들어가는 산소와 정맥 배액(하수도)이 통제됩니다. 뒷목이 막혀 뇌가 숨을 못 쉬는 구조입니다.
              </p>
            </div>
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">코로나 감염 vs 백신 후유증</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                백신 접종 후 갑작스레 발생한 멍함, 어지럼증 또한 바이러스 감염과 마찬가지로 자율신경계의 팽팽한 과항진과 경추 긴장이 뇌 혈류를 틀어막은 동일한 기전입니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-maekrak-green/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">두맥탕(頭脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  바이러스가 휩쓸고 가 바닥이 난 뇌 에너지 대사를 복구하고, 널뛰는 자율신경계를 스위치 오프하여 뇌가 정상 작동할 체력을 올려줍니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">어혈 / 소염 약침</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  뻣뻣하게 굳은 후두하근과 C1, C2 경추 분절에 직접 시술. 코로나로 인해 목 뒤에 고착된 만성 염증을 끄고 막힌 뇌 정맥 하수도를 직관적으로 시원하게 뚫어냅니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">두개경추 정렬 추나</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  물리적으로 틀어진 두개골과 경추 1번의 결합 구조를 교정하여 좁아진 뇌 혈류 고속도로의 차선을 넓히는 구조적 공사를 병행합니다.
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* FAQ */}
        <section>
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">자주 묻는 질문</h2>
          <div className="space-y-6">
            {[
              {
                q: "코로나 후유증 브레인포그는 시간이 지나면 자연히 낫지 않나요?",
                a: "일부 환자는 회복되지만, 자율신경 불균형과 두개경추 틀어짐이 심하게 남은 분들은 시간이 지나도 정체됩니다. 수개월을 참았다면 물리적인 개입이 필요한 시점입니다."
              },
              {
                q: "코로나 백신 접종 후 생긴 브레인포그도 방향이 같나요?",
                a: "네. 백신이 야기한 과잉 면역 반응이 자율신경계를 타격하는 방식은 실제 감염과 놀랍도록 무대가 유사합니다. 두개경추 긴장 해소라는 동일한 로직으로 치유됩니다."
              },
              {
                q: "코로나를 두 번 앓았더니 브레인포그가 훨씬 심해졌습니다.",
                a: "반복 감염은 자율신경계 저항력을 완전히 꺾어버리고 심폐 및 경추 조직의 구축을 배가시킵니다. 회복 기간이 좀 더 걸리지만 집중 치료를 통해 원상 복구가 목표입니다."
              },
              {
                q: "어지럼증이 브레인포그와 같이 온 이유는 뭔가요?",
                a: "두개경추(뒷목 상단)는 뇌 혈류의 관문이자 동시에 공간을 인지하는 '고유수용성 감각' 센서의 밀집처입니다. 이곳이 망가지면 멍함과 어지럼증이 세트로 발현됩니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-maekrak-green">Q.</span> {faq.q}
                </h3>
                <p className="text-[16px] md:text-[17px] text-gray-600 leading-[1.7] font-light break-keep flex gap-4">
                  <span className="text-gray-400 font-bold">A.</span>
                  <span>{faq.a}</span>
                </p>
              </div>
            ))}
          </div>
        </section>
      </div>
    </div>
  );
}
