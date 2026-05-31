export function PhilosophySection() {
  const symptoms = [
    {
      num: '01',
      title: '약이 점점 안 듣는 편두통',
      desc: '진통제·트립탄·항CGRP 주사까지 써봤지만 효과가 줄거나 재발이 반복되는 분',
    },
    {
      num: '02',
      title: '검사는 정상, 두통은 계속',
      desc: 'MRI·MRA 정상 판정에도 두통이 사라지지 않아 원인을 모르는 분',
    },
    {
      num: '03',
      title: '두통 + 어지럼·이명 동반',
      desc: '두통과 함께 어지럼증·이명·뒷목 통증·브레인포그가 동시에 반복되는 분',
    },
    {
      num: '04',
      title: '약물과용두통 의심',
      desc: '진통제를 자주 먹어야 하고, 약 없이는 버티기 힘든 상태가 된 분',
    },
    {
      num: '05',
      title: '경추성·긴장형 두통',
      desc: '목·어깨 긴장 후 두통이 심해지거나 목 가동 범위가 줄어든 분',
    },
    {
      num: '06',
      title: '자율신경 이상 증상',
      desc: '두근거림·호흡곤란·수족냉증이 반복되는데 내과 검사는 정상인 분',
    },
    {
      num: '07',
      title: '어지럼증·경추성 어지럼',
      desc: '이비인후과에서 이상 없다는 판정에도 어지럼이 반복되는 분',
    },
    {
      num: '08',
      title: '브레인포그·집중력 저하',
      desc: '머리가 항상 멍하고 집중이 안 되는데 의지 문제가 아닌 것 같은 분',
    },
  ];

  return (
    <section className="maekrak-snap-section bg-maekrak-ivory relative py-20 px-6 md:px-12" id="why">
      <div className="max-w-7xl mx-auto w-full flex flex-col h-full justify-center">
        <div className="mb-12">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-4">
            이런 분이 오세요
          </div>
          <h2 className="font-serif text-[28px] md:text-[38px] font-medium text-maekrak-navy mb-4 tracking-tight break-keep leading-[1.4]">
            다른 치료에서 답을 못 찾으셨나요
          </h2>
          <p className="text-[15px] md:text-[16px] text-gray-500 leading-[1.95] font-light break-keep max-w-2xl">
            맥락한의원을 찾아오시는 분들의 공통점은 하나입니다.
            병원을 여러 곳 다녔지만 원인을 모른 채 약만 받았다는 것.
            증상이 아닌 <strong className="text-maekrak-navy font-medium">구조적 원인</strong>을 찾아야 합니다.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-gray-200 border border-gray-200 rounded-lg overflow-hidden">
          {symptoms.map((item) => (
            <div
              key={item.num}
              className="bg-white p-6 md:p-7 hover:bg-[#e8f4f8] transition-colors"
            >
              <span className="font-serif text-2xl text-maekrak-navy/10 block mb-3">{item.num}</span>
              <h3 className="text-[15px] font-bold text-maekrak-navy mb-2 break-keep">{item.title}</h3>
              <p className="text-[13px] text-gray-500 leading-relaxed break-keep font-light">{item.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
