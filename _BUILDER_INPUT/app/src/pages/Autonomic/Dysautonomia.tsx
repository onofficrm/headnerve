import { useEffect } from 'react';
import { ArrowRight, CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Dysautonomia() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-maekrak-navy/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/autonomic" className="hover:text-white transition-colors">자율신경</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">자율신경실조증</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            자율신경실조증
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            자율신경실조증은 심장박동·호흡·소화·혈압·체온 등을 자동으로 조율하는 자율신경계의 기능이 불균형해져 여러 장기에서 동시다발적으로 증상이 나타나는 상태입니다. 구조적 병변이 없기 때문에 일반 검사에서 정상으로 나오는 경우가 많습니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Activity className="w-8 h-8 text-maekrak-blue" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                자율신경실조증은 특정 장기의 병이 아닙니다. 여러 장기를 동시에 조율하는 <strong>자율신경계 기능 자체가 무너진 것</strong>입니다. 심장·호흡·소화·순환이 각각 따로 이상한 것이 아니라 <strong>하나의 조율 시스템이 오작동</strong>하고 있는 것입니다.
              </p>
              <p>
                자율신경실조증은 <strong>잘못된 동적 평형 상태</strong>입니다. 외부 환경에 대한 대응이 잘못된 방향으로 반복되면서 몸이 그것을 정상으로 인식하게 된 상태입니다. 교감신경이 항상 켜져 있는 상태, 소화기 혈류가 만성적으로 줄어든 상태를 몸이 새로운 평형점으로 받아들인 것입니다.
              </p>
              <p>
                혈액검사·MRI·심초음파·내시경이 모두 정상이어도 자율신경 기능 이상은 잡히지 않습니다. 자율신경 기능 문제는 구조적 병변 검사가 아닌 <strong className="text-maekrak-navy font-bold inline-block relative">자율신경 기능 평가로 확인<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></strong>해야 합니다.
              </p>
              <p>
                맥락한의원은 자율신경실조증을 교감신경절의 구조적 압박과 기능적 불균형이 복합된 문제로 봅니다. 증상을 억제하는 것이 아니라 <strong className="text-gray-900 font-bold">몸이 올바른 평형점을 회복하도록 돕는 것</strong>이 치료 목표입니다.
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
                title: "심장이 두근거려 심장내과에 갔으나 정상",
                desc: "심계항진은 자율신경 불균형의 흔한 증상입니다. 심장 검사가 정상이라면 자율신경 쪽을 봐야 합니다."
              },
              {
                title: "숨이 막히고 가슴이 답답하나 폐는 정상",
                desc: "기도나 폐에 문제가 없는데 숨이 불편하다면 자율신경 기능 이상이 호흡 조절에 영향을 준 것입니다."
              },
              {
                title: "소화가 안 되고 속이 울렁이나 위내시경 깨끗",
                desc: "만성적인 스트레스로 소화기 혈류가 줄어 위장 기능이 저하됩니다."
              },
              {
                title: "이유 없는 극심한 피로감과 무기력",
                desc: "몸이 24시간 긴장 상태에서 에너지를 소모해 충분히 쉬어도 피로가 풀리지 않습니다."
              },
              {
                title: "미주신경성 실신 (어지럽고 쓰러질 듯함)",
                desc: "긴장, 통증 시 혈압이 떨어지며 자율신경의 과반응으로 발생합니다."
              },
              {
                title: "여러 과를 돌아다녀도 원인을 못 찾음",
                desc: "각 장기는 정상이지만 장기를 조율하는 시스템에 문제가 생긴 전형적인 패턴입니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-maekrak-blue/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-1" strokeWidth={2} />
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
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 원인</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">검사가 정상인 이유</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                혈액검사·MRI·심초음파·내시경은 장기의 구조적 병변을 확인하는 검사입니다. 자율신경 기능 이상은 조절 신경의 오작동, 즉 기능적 문제입니다. 구조를 보는 검사로는 이런 조율의 불균형이 잡히지 않습니다.
              </p>
            </div>
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">잘못된 동적 평형 상태</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                만성 스트레스, 수면 부족 등이 지속되면 자율신경은 '비상 모드'를 정상으로 인식하기 시작합니다. 혈류가 줄어든 상태나 심박수가 늘 빠른 상태를 새로운 평형점으로 고착시키기 때문에 반복적으로 증상이 나타납니다.
              </p>
            </div>
            <div className="md:col-span-2">
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">경추와 자율신경의 연결</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep max-w-4xl">
                경추 주변 교감신경절이 틀어지거나 주변 근육이 경직되면 지속적인 자극을 받습니다. 심리적 스트레스가 없어도 몸이 긴장 상태를 유지하는 구조적 이유가 바로 이 때문이며, 경추 교정이 필수적인 이유입니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-maekrak-blue/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">심맥탕</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  교감신경 과항진 완화와 전신 순환 회복에 초점을 맞춘 맞춤 처방입니다. 잘못된 동적 평형 상태를 올바른 방향으로 재설정합니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">약침 요법</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  경·흉추 교감신경절 주변에 시술해 구조적으로 교감신경을 자극하는 긴장을 직접 완화시키고 과반응을 즉각적으로 진정시킵니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">추나 / 자율신경검사</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  경추 정렬을 교정하여 교감신경절 압박을 구조적으로 해소하고, 자율신경검사를 통해 회복 추이를 객관적인 수치로 확인합니다.
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
                q: "자율신경실조증이라는 진단을 어디서도 안 해줬습니다",
                a: "심장내과는 심장을, 호흡기내과는 폐를 봅니다. 각 장기 검사가 정상인데 여러 증상이 동시다발적으로 있다면 자율신경 기능 전체를 평가해봐야 합니다."
              },
              {
                q: "약을 먹어도 소용이 없었습니다",
                a: "심계항진에 베타차단제, 소화불량에 소화제는 일시적 억제입니다. 자율신경 불균형이라는 공통 원인을 다루지 않으면 증상은 계속 반복됩니다."
              },
              {
                q: "스트레스를 받지 않으면 낫지 않나요?",
                a: "스트레스는 방아쇠 중 하나일 뿐입니다. 구조적 경직과 잘못 세팅된 체내 평형이 유지된다면 스트레스 없이도 교감신경 긴장이 풀리지 않습니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-maekrak-blue">Q.</span> {faq.q}
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
