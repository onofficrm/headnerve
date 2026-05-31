const flowSteps = [
  {
    num: 'STEP 01',
    title: '상태 확인',
    desc: '자율신경 검사, 이학적 검사, 맥진·복진으로 두개경추 구조 문제와 신경계 상태를 파악합니다',
  },
  {
    num: 'STEP 02',
    title: '원인 설명',
    desc: '왜 두통이 생겼는지, 왜 이 치료가 필요한지 환자가 납득할 수 있게 설명합니다',
  },
  {
    num: 'STEP 03',
    title: '구조 + 기능 치료',
    desc: '약침·추나로 경추 구조를 교정하고, 두맥탕으로 신경계 균형을 회복합니다',
  },
  {
    num: 'STEP 04',
    title: '재발 없는 종결',
    desc: '증상 억제가 아닌 원인 해소. 치료 종결 후 약 없이도 건강한 일상 유지를 목표합니다',
  },
];

export function TreatmentApproachSection() {
  return (
    <section className="maekrak-snap-section bg-white relative py-20 px-6 md:px-12 border-t border-gray-100" id="flow">
      <div className="max-w-7xl mx-auto w-full flex flex-col h-full justify-center">
        <div className="mb-12">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-4">치료 과정</div>
          <h2 className="font-serif text-[28px] md:text-[38px] font-medium text-maekrak-navy tracking-tight break-keep">
            초진부터 치료 종결까지
          </h2>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 border border-gray-200 rounded-lg overflow-hidden">
          {flowSteps.map((step, idx) => (
            <div
              key={step.num}
              className={`p-6 md:p-8 bg-maekrak-ivory hover:bg-white transition-colors relative ${
                idx < flowSteps.length - 1 ? 'lg:border-r border-gray-200' : ''
              } ${idx < 2 ? 'sm:border-b lg:border-b-0 border-gray-200' : ''}`}
            >
              <p className="text-[11px] font-bold tracking-[0.12em] text-maekrak-accent mb-3">{step.num}</p>
              <h3 className="font-serif text-[16px] font-medium text-maekrak-navy mb-3">{step.title}</h3>
              <p className="text-[13px] text-gray-500 leading-relaxed break-keep font-light">{step.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
