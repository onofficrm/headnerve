export function AboutPhilosophySection() {
  const principles = [
    {
      num: "01",
      title: "구조적 원인 우선",
      desc: "두개경추 정렬 문제가 해결되지 않으면 어떤 약도 근본적인 해결책이 될 수 없습니다. 머리와 목이 만나는 지점의 구조적 문제를 먼저 봅니다."
    },
    {
      num: "02",
      title: "다음 두통까지 치료",
      desc: "지금의 두통을 없애는 것을 넘어, 다음에 찾아올 두통의 빈도와 강도를 낮추는 것이 치료의 목표입니다."
    },
    {
      num: "03",
      title: "몸에 해가 되지 않는 치료",
      desc: "트립탄의 심혈관 위험, 항우울제 계열 예방약의 장기 부작용, 마약성 진통제 의존을 피합니다. 지금 편하더라도 장기적으로 해가 되는 치료는 하지 않습니다."
    },
    {
      num: "04",
      title: "환자가 이해하는 설명",
      desc: "왜 머리가 아픈지, 왜 이 치료가 필요한지 환자가 납득할 수 있게 설명합니다. 이해 없는 치료는 결국 의존으로 끝납니다."
    }
  ];

  return (
    <section className="py-20 md:py-24 px-6 md:px-12 lg:px-24">
      <div className="max-w-7xl mx-auto">
        <div className="text-[11px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-3">대표원장 진료철학</div>
        <h2 className="font-serif text-[28px] md:text-[34px] font-medium text-gray-900 leading-[1.5] mb-4 break-keep">
          약은 증상을 가릴 뿐,<br className="md:hidden" /> 원인을 고치지 않습니다
        </h2>
        <p className="text-[15px] md:text-[16px] text-gray-500 mb-14 max-w-2xl leading-[1.9] break-keep font-light">
          편두통·어지럼증 환자분들이 수년간 신경과, 대학병원을 전전하며 듣는 말은 대부분 같습니다. "검사상 이상 없습니다. 약 꾸준히 드세요." 맥락한의원은 이 답이 틀렸다고 생각합니다.
        </p>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
          <div>
            <div className="font-serif text-[18px] md:text-[22px] text-maekrak-navy leading-[1.8] p-8 md:p-10 bg-[#e8f4f8] border-l-4 border-maekrak-accent mb-8 break-keep">
              "아픈 사람의 꿈은 단 하나입니다.<br />어제처럼 살고 싶다는 것."
            </div>
            
            <div className="space-y-6 text-[15px] text-gray-600 leading-[2] font-light break-keep">
              <p>
                좋아하는 운동을 두통 때문에 포기하고, 주말마다 누워 계신 분들을 봅니다.
                직장에서 집중이 안 되고, 가족과 여행 한 번 못 가는 분들을 봅니다.
                맥락한의원의 치료 목표는 <strong className="font-medium text-gray-900 border-b border-gray-900/20 pb-0.5">검사 수치가 아니라 일상의 회복</strong>입니다.
              </p>
              <p>
                두통은 머리가 보내는 신호입니다. 신호를 약으로 막는 것은 화재경보기 선을 끊는 것과 같습니다.
                <strong className="font-medium text-gray-900 border-b border-gray-900/20 pb-0.5">머리와 목의 구조적 원인을 바로잡으면</strong>, 신호가 더 이상 울리지 않아도 되는 몸을 만들 수 있습니다.
              </p>
              <p>
                진통제, 트립탄, 항CGRP 주사까지 써봤지만 점점 약이 늘어가고 있다면, 치료 방향을 바꿔야 할 때입니다.
                <strong className="font-medium text-gray-900 border-b border-gray-900/20 pb-0.5">약에 의존하지 않아도 되는 건강한 머리</strong>를 만드는 것이 맥락한의원의 목표입니다.
              </p>
            </div>

            <ul className="mt-10 space-y-3">
              {[
                "검사는 정상인데 두통이 계속된다는 말만 들었습니다",
                "진통제를 먹어도 효과가 점점 줄어들고 있습니다",
                "신경과, 내과, 이비인후과를 돌았지만 원인을 못 찾았습니다",
                "약을 끊고 싶은데 끊으면 더 심해져서 못 끊겠습니다"
              ].map((text, idx) => (
                <li key={idx} className="text-[14px] md:text-[15px] text-gray-500 py-3 pl-6 border-b border-gray-100 relative leading-[1.7] break-keep relative">
                  <span className="absolute left-0 top-3 text-[18px] text-maekrak-accent font-serif leading-none">"</span>
                  {text}
                </li>
              ))}
            </ul>
          </div>

          <div>
            <div className="text-[11px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-5">진료 원칙</div>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-[1px] bg-gray-200 border border-gray-200">
              {principles.map((p, idx) => (
                <div key={idx} className="bg-white p-8 md:p-10 flex flex-col hover:bg-gray-50/50 transition-colors">
                  <span className="font-serif text-4xl text-maekrak-navy/10 font-bold mb-4">{p.num}</span>
                  <h3 className="text-[15px] font-bold text-maekrak-navy mb-2">{p.title}</h3>
                  <p className="text-[13.5px] md:text-[14px] text-gray-500 leading-[1.8] font-light break-keep">
                    {p.desc}
                  </p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
