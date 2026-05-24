import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function OrthostaticHypotension() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-[#4a8fa8]/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/autonomic" className="hover:text-white transition-colors">Autonomic</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">Orthostatic Hypotension</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            기립성 저혈압
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            앉거나 누운 자세에서 일어설 때 혈압이 급격히 떨어지면서 어지럼증·눈앞이 캄캄해지는 느낌·실신 등이 나타나는 상태로, 자율신경계가 체위 변화에 따른 혈압을 즉각적으로 조절하지 못할 때 발생합니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Activity className="w-8 h-8 text-[#4a8fa8]" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                기립성 저혈압은 평소 혈압이 낮은 것이 주된 문제가 아니라, <strong>일어설 때 혈압을 순간적으로 유지하는 자율신경 보상 기능이 작동하지 않는 것</strong>입니다. 따라서 단순히 혈압 수치를 올리는 것보다 <strong>자율신경이 중력에 보상적으로 반응하는 기능을 회복</strong>하는 것이 핵심입니다.
              </p>
              <p>
                수분·염분 섭취와 압박 스타킹은 일시적인 완화에 도움이 되지만, 자율신경 기능 저하가 원인인 경우에는 이런 생활 습관만으로 한계가 있습니다. 미드린 등 혈압을 올리는 약 또한 복용 중에는 효과적이나 중단 시 다시 혈압이 낮아집니다.
              </p>
              <p>
                맥락한의원은 기립성 저혈압을 <strong>자율신경계의 중력 보상 기능 저하</strong>로 진단합니다. <strong className="text-[#3b7185] font-bold inline-block relative">교감신경 기능을 회복하고 자율신경 균형을 재설정<span className="absolute bottom-1 left-0 w-full h-[6px] bg-[#4a8fa8]/20 -z-10"></span></strong>하여 약에 의존하지 않고 몸이 스스로 혈압을 조절할 수 있도록 돕습니다.
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
                title: "일어설 때 눈앞이 캄캄해지고 핑 돈다",
                desc: "가장 전형적인 증상으로 일어서는 순간 뇌로 가는 혈류가 떨어지며 수초 내에 증상이 생깁니다."
              },
              {
                title: "일어서는 것 자체가 두려운 경험",
                desc: "심하게 어지럽거나 쓰러질 뻔한 경험 이후 일상 동작을 기피하게 되는 경우입니다."
              },
              {
                title: "고개를 숙였다 들어올 때 반복되는 어지럼증",
                desc: "단순 체위 변화에도 증상이 나타날 만큼 자율신경 보상 반응이 매우 떨어진 상태입니다."
              },
              {
                title: "오래 서 있으면 어지럽고 힘이 빠짐",
                desc: "중력에 대항해 지속적으로 혈압을 유지하는 교감신경 기능이 약해진 것입니다."
              },
              {
                title: "손발이 차고 쉽게 피곤함",
                desc: "전신 순환이 저하되고 자율신경 불균형이 동반될 때 전형적으로 나타나는 패턴입니다."
              },
              {
                title: "수분 섭취나 천천히 일어나기로 해결 불가",
                desc: "생활 습관 교정만으로 해결이 안 된다면 자율신경 기능 자체를 회복해야 합니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-[#4a8fa8]/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-[#4a8fa8] shrink-0 mt-1" strokeWidth={2} />
                  <div>
                    <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-3">{item.title}</h3>
                    <p className="text-[15px] md:text-[16px] text-gray-600 leading-[1.7] break-keep font-light">{item.desc}</p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </section>

        {/* 한의학적 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 원인</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">혈압이 낮은 게 문제가 아니다</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
                정상 상태라면 일어설 때 자율신경이 즉각(0.5~1초) 조율하여 하지 혈관을 수축시키고 심박수를 높입니다. 기립성 저혈압은 이 '보상 기능'이 저하되어 뇌 혈류가 순간적으로 떨어질 때 나타납니다.
              </p>
            </div>
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">자율신경 불균형과의 연결</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
                자율신경실조증의 한 표현으로, 교감신경 기능이 전반적으로 떨어지거나 잘못된 동적 평형 상태에 있을 때 쉽게 피로하며 보상 반응이 늦어지게 됩니다.
              </p>
            </div>
            <div className="md:col-span-2">
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">역설적인 교감신경 피로 현상</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep max-w-4xl">
                경추 정렬 이상이 교감신경절을 만성적으로 자극하면, 이에 적응해버린 교감신경이 급격한 변화(일어서는 동작)에 오히려 즉각적으로 반응하지 못하게 됩니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-[#4a8fa8]/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">심맥탕</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  체위 변화에 즉각 반응하는 자율신경 보상 기능(혈관 긴장도 파워)을 회복하고 전반적인 기립 시 혈류 유지 능력을 재설정합니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">약침 요법</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  경추·흉추 교감신경절 주변에 시술해 만성적으로 저하된 교감신경 반응성을 깨우고 혈관 수축 능력이 회복되는 환경을 만듭니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">추나 / 자율신경검사</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  구조적 자극원인 경추를 교정하고, 중간 점검 시 자율신경검사를 통해 교감신경 반응성이 실제로 개선되고 있는지 수치로 확인합니다.
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
                q: "기립성 저혈압은 체질이라 어쩔 수 없지 않나요?",
                a: "평소 혈압이 낮은 체질이어도 보상 기능만 회복하면 같은 혈압 수치에서도 기립 시 증상이 나타나지 않는 상태를 만들 수 있습니다."
              },
              {
                q: "기립성 저혈압과 어지럼증이 함께 있는데 연관이 있나요?",
                a: "기립성 어지럼증과 자율신경성 어지럼증은 같은 기반에서 나옵니다. 뇌 혈류를 안정적으로 조절하지 못하는 상태가 공통 원인이므로 함께 다루는 것이 효과적입니다."
              },
              {
                q: "미드론을 처방받았는데 한의원 치료와 병행할 수 있나요?",
                a: "가능합니다. 약으로 증상을 즉각 방어하면서, 본원 치료로 자율신경 반응성을 올립니다. 회복됨에 따라 기존 양약 의존도를 서서히 줄여나갈 수 있습니다."
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
