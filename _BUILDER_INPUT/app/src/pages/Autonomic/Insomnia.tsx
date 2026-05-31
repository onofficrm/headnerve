import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity, Moon } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Insomnia() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-blue-900/40 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/autonomic" className="hover:text-white transition-colors">자율신경</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">불면</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            불면
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            불면증은 잠들기 어렵거나, 자다가 자주 깨거나, 새벽에 일찍 깨어 다시 잠들지 못하는 상태가 지속되어 낮 시간의 에너지를 고갈시키는 수면 장애입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Moon className="w-8 h-8 text-[#4a8fa8]" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                불면증의 핵심은 단순한 '수면 부족' 현상이 아닙니다. 가장 큰 이유는 <strong>잠들기 위해 필요한 환경적, 신체적 조건이 꺼지지 않는 것</strong>입니다. <strong>교감신경이 각성 상태를 유지</strong>하는 한 뇌는 절대로 수면 모드로 전환되지 않습니다.
              </p>
              <p>
                침대에 누워도 <strong>DMN (디폴트 모드 네트워크)</strong> 회로가 꺼지지 않으면, 눈을 감고 있어도 과거를 반추하고 내일을 걱정하는 생각이 자동 재생됩니다. 뇌가 이토록 바쁘게 도는데 수면 상태로 진입하는 것은 구조적으로 불가능합니다.
              </p>
              <p>
                수면제는 깨어있는 뇌를 화학적으로 '강제 셧다운'시킵니다. 자율신경 균형을 바로잡지 않기 때문에 약을 중단하면 뇌는 다시 불이 켜지고 불면은 돌아옵니다.
              </p>
              <p>
                맥락한의원은 불면을 <strong className="text-maekrak-navy font-bold inline-block relative">교감신경 과활성 + DMN 과활성<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></strong>이라는 자율신경 불균형의 문제로 봅니다. 물리적 억제가 아니라 뇌가 안심하고 스스로 스위치를 내릴 수 있게 회복시키는 것이 치료 목표입니다.
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
                title: "침대에 누우면 오히려 생각이 폭발한다",
                desc: "조용히 눈을 감으면 과거의 후회와 내일의 할 일이 시작됩니다. DMN이 과활성된 상태입니다."
              },
              {
                title: "1시간 이상 뒤척이는 날의 반복",
                desc: "교감신경이 활성화되어 부교감신경(이완 모드)으로 전환되지 않는 입면 장애 패턴입니다."
              },
              {
                title: "얕게 자고 수시로 깨서 다시 잠이 안 옴",
                desc: "수면 중 다시 교감신경 신호가 튀어 각성으로 강제 전환되는 유형입니다."
              },
              {
                title: "새벽 3~4시 이른 각성",
                desc: "수면 회복이 다 끝나지 않았는데 자율신경 불균형 및 코르티솔 분비 이상으로 뇌가 일찍 깨어버립니다."
              },
              {
                title: "자도 자도 피로가 풀리지 않고 머리가 무거움",
                desc: "글림프 시스템(뇌 노폐물 청소)이 작동하는 '깊은 수면' 단계에 도달하지 못하여 뇌가 정화되지 못했습니다."
              },
              {
                title: "수면제 복용 중지 시 극심한 반동 불면",
                desc: "약을 먹어야만 자는 상태가 지속되면 뇌 스스로 잠드는 자생력을 잃어버립니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-[#4a8fa8]/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-[#4a8fa8] shrink-0 mt-1" strokeWidth={2} />
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
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6">수면으로의 전환을 막는 장벽</h2>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep mb-6">
                수면은 전등 끄듯 바로 되는 것이 아닙니다. 각성 상태에서 교감신경이 충분히 낮아지고 부교감이 활성화되어야 하는 <strong className="text-gray-900">적극적인 전환 과정</strong>입니다.
              </p>
              <div className="space-y-6 mt-8">
                <div className="pl-6 border-l-2 border-[#4a8fa8]">
                  <h4 className="font-bold text-gray-900 mb-2">교감신경의 고착</h4>
                  <p className="text-[15px] text-gray-600">몸은 누웠으나 경추 경직 등 구조적 텐션에 의해 뇌는 각성 모드(비상 경계 상태)를 유지합니다.</p>
                </div>
                <div className="pl-6 border-l-2 border-maekrak-navy">
                  <h4 className="font-bold text-gray-900 mb-2">글림프 시스템 방해 악순환</h4>
                  <p className="text-[15px] text-gray-600">불면으로 깊은 수면이 안 되면 뇌 염증물질(노폐물)이 쌓이고, 이는 다음 날 뇌를 더 예민하게 만들어 또 수면을 방해하는 악순환 고리가 됩니다.</p>
                </div>
              </div>
            </div>
            
            <div className="bg-[#f8f9fa] rounded-2xl p-8 lg:p-10">
              <h3 className="text-[22px] font-bold text-gray-900 mb-4">DMN (디폴트 모드 네트워크) 란?</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep mb-6">
                특별한 외부 작업이 없이 멍때리거나 휴식할 때 뇌에서 활성화되는 회로입니다. 하지만 이 스위치가 꺼지지 않으면 과부하가 걸립니다.
              </p>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                불면 환자는 눈을 감고 있어도 잠을 자기보단 끊임없이 과거나 미래를 시뮬레이션 합니다. 생각이 많은 것은 마음의 문제가 아니라 <strong>신경학적 회로의 오작동(종료 불능)</strong> 현상입니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-[#4a8fa8]/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 수면 회복 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-10 relative z-10 mb-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">심맥탕</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  입면 지연형, 잦은 각성형, 조기 각성형 등 환자 패턴에 맞춰 처방합니다. 뇌 호르몬이 스스로 수면 모드로 차분히 이륙할 수 있게 교감신경의 열기를 부드럽게 끕니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">약침 & 추나</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  경·흉추 주변 뻣뻣한 근육이 신경을 자극하여 잠들기 전 심장이 뛰게 만드는 것을 해소합니다. 구조가 부드러워야 잠에 빠질 때 덜컹거리지 않습니다.
                </p>
              </div>
            </div>
            
            <div className="relative z-10 bg-white/5 rounded-2xl p-8 border border-white/10 mt-6">
              <h3 className="text-[20px] font-bold text-white mb-3">수면제한법 (행동 치료 병행)</h3>
              <p className="text-white/70 font-light leading-[1.6]">
                침대에서 괴롭게 눈을 감고 버티는 시간을 과감히 자릅니다. 침대=잠 이라는 연관성을 뇌에 다시 학습시키고, 진짜 수면 효율(실제 자는 시간 / 침대 체류 시간)을 압축적으로 끌어올리는 강력한 훈련입니다.
              </p>
            </div>
          </div>
        </section>

        {/* FAQ */}
        <section>
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">자주 묻는 질문</h2>
          <div className="space-y-6">
            {[
              {
                q: "수면제를 끊고 싶은데 갑자기 끊어도 되나요?",
                a: "절대 안 됩니다. 치료에 맞춰 자연 수면 능력이 올라올 때 4/4, 3/4, 반알 단위로 의사와 상의하며 서서히 무의식적으로 줄여나가는 것이 원칙입니다."
              },
              {
                q: "생각이 많은 제 성격 때문에 못 자는 것 아닌가요?",
                a: "스트레스가 시작점일 순 있지만, 현재는 경추 긴장과 DMN 스위치 고장이라는 기질적 문제로 넘어간 것입니다. 단순 마인드 컨트롤로 해결되지 않는 이유입니다."
              },
              {
                q: "수면제를 너무 오래 먹었는데 스스로 잘 수 있나요?",
                a: "가능합니다. 회복까지 계단식 정체기가 있을 수 있지만, 자는 근육(뇌의 조율 능력)을 다시 학습시키면 의존도 없이 회복될 수 있습니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-[#4a8fa8]">Q.</span> {faq.q}
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
