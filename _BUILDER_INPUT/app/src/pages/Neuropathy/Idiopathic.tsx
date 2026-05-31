import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Idiopathic() {
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
            <Link to="/neuropathy" className="hover:text-white transition-colors">Neuropathy</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">Idiopathic</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            특발성 말초신경병증
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            당뇨·항암치료·음주 등 알려진 원인 없이 발생하는 말초신경 손상으로, 전체 말초신경병증 환자의 약 30~40%가 여기에 해당합니다.
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
                특발성 말초신경병증에서 "원인 불명"은 현대 의학 검사로 원인을 찾지 못했다는 뜻입니다. 신경이 얼마나 손상됐는지는 신경전도검사로 확인할 수 있지만, <strong>왜 손상이 시작됐는지 — 말초까지 기혈이 제대로 순환되지 않는 구조 — 는 기존 검사로 잡히지 않습니다.</strong>
              </p>
              <p>
                말초신경병증은 쉬어도, 자세를 바꿔도 나아지지 않습니다. 일시적인 손발 저림과 결정적으로 다른 점입니다. 저림·작열감이 3개월 이상 지속되고 밤에 심해진다면 <strong>신경 자체</strong>를 봐야 합니다.
              </p>
              <p>
                말초신경 회복에는 두 가지가 반드시 필요합니다. <strong>손상된 신경에 혈류와 영양을 공급하는 것</strong>, 그리고 <strong>신경이 눌린 포착 부위를 풀어주는 것</strong>. 이 두 가지를 동시에 해결하지 않으면 한쪽만으로는 한계가 있습니다.
              </p>
              <p>
                맥락한의원은 특발성 말초신경병증을 <strong className="text-maekrak-navy font-bold inline-block relative">전신 문제와 국소 문제<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></strong>로 나눠 진단합니다. 전신 순환과 기혈 흐름의 문제, 그리고 특정 부위 신경 포착 문제를 함께 확인한 후 치료 방향을 결정합니다.
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
                title: "발끝·손끝 저림과 시림 (3개월 이상)",
                desc: "쉬거나 자세를 바꿔도 나아지지 않는다면 일시적인 혈액순환 문제가 아닙니다."
              },
              {
                title: "발바닥이 타는 듯 화끈하거나 전기 충격감",
                desc: "말초신경 손상의 대표 증상입니다. 밤에 심해져 수면을 방해하는 경우가 많습니다."
              },
              {
                title: "젖은 양말을 신은 듯한 이상감각",
                desc: "감각 이상의 전형적인 기분 나쁜 불편함입니다. 모래 위를 걷는 듯한 느낌이 나옵니다."
              },
              {
                title: "온도 (뜨겁고 차가움) 감각 둔화",
                desc: "온도 감각 저하는 신경 손상이 꽤 진행된 신호입니다. 적극적 치료가 시급합니다."
              },
              {
                title: "발목 아래가 허옇고 늘 땀이 남",
                desc: "눈으로 봐도 혈색 차이가 날 정도로 말초 혈류가 심각하게 저하된 상태입니다."
              },
              {
                title: "당뇨가 없는데 손발에 저림/작열감",
                desc: "원인 불명의 '특발성'이며, 신경으로 가는 기혈 순환 자체가 나빠진 문제입니다."
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
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 한의학적 주요 원인</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">1. 전신 문제 (순환 저하)</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                말초신경이 기능하려면 신경까지 혈류와 영양이 가야 합니다. 전신 순환 저하 시 심장에서 먼 말초부터 메마르기 시작하며 신경이 서서히 죽어갑니다. 맥진, 복진, 이학적 검사로 이 막힘을 찾습니다.
              </p>
            </div>
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">2. 국소 문제 (신경 포착)</h3>
              <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.85] break-keep">
                발목, 무릎, 고관절, 손목 등 신경이 지나는 길목에서 꽉 눌린(포착) 상태라면, 아무리 위에서 피를 보내도 신경까지 닿지 못합니다. 이 닫힌 통로를 열어줘야 합니다.
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
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">통맥탕(通脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  막힌 혈맥을 뚫고 말초까지 피와 영양이 공급되도록 펌프질합니다. 말초 혈류를 살려 신경 재생의 <strong className="text-white">기본 재료</strong>를 댑니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">어혈 / 소염 / 녹용 약침</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  염증과 작열감이 심한 부위에 소염 약침을, 영양 공급에 녹용 약침을 시술하여 조직 자체가 강해지도록 직접 영양을 꽂아 넣습니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">침 치료 / 통로 개방</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  발견된 '신경 포착 해부학적 지점'들에 침을 놓아 물리적인 막힘을 풀고 약이 타겟까지 도달하도록 고속도로를 뚫어줍니다.
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
                q: "당뇨가 없는데 왜 말초신경병증이 생기나요?",
                a: "전체 환자의 30~40%는 원인 불명의 '특발성'입니다. 당뇨가 없어도 말초를 적시는 기혈 순환력이 떨어지면 신경은 메말라버립니다."
              },
              {
                q: "신경전도검사는 정상인데 저림이 계속됩니다.",
                a: "전도검사는 굵은 신경만 봅니다. 가느다란 신경이 손상되거나, 미세 혈류만 떨어진 초기 단계는 정상이라고 나올 수 있으나 통증은 100% 진짜입니다."
              },
              {
                q: "리리카나 가바펜틴을 먹고 있는데 병행해도 되나요?",
                a: "양약은 예민한 두뇌 통증 센서를 속여 안 아프게 만드는 것이고, 저희는 말단 신경 자체를 복구시키는 것이라 동시에 해도 좋습니다. 회복될수록 통증약은 줄여가면 됩니다."
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
