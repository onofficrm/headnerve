const causeSteps = [
  {
    num: '01',
    title: '구조적 원인 파악',
    desc: '자율신경 검사·이학적 검사·맥진·복진을 통합 분석해 두개경추 불균형의 원인을 찾습니다.',
  },
  {
    num: '02',
    title: '긴 바늘 두경부 약침',
    desc: '두경부 심층에 직접 약침을 적용해 압박받는 신경과 혈관의 긴장을 해소합니다.',
  },
  {
    num: '03',
    title: '상부경추 복잡추나',
    desc: '머리와 목이 만나는 상부경추의 정렬을 교정해 구조적 문제의 근본 원인을 바로잡습니다.',
  },
  {
    num: '04',
    title: '신경계 균형 회복 (두맥탕)',
    desc: '환자 상태에 맞춘 한약으로 신경계 균형과 뇌 에너지 회복 환경을 만듭니다.',
  },
  {
    num: '05',
    title: '재발 관리 — 약 없이 유지',
    desc: '증상 억제로 끝나지 않고, 치료 없이도 건강한 일상을 유지하는 것이 최종 목표입니다.',
  },
];

export function CauseSection() {
  return (
    <section className="maekrak-snap-section bg-white relative py-20 px-6 md:px-12" id="cause">
      <div className="max-w-7xl mx-auto w-full flex flex-col h-full justify-center">
        <div className="mb-12">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-4">
            맥락한의원의 치료 원리
          </div>
          <h2 className="font-serif text-[28px] md:text-[38px] font-medium text-maekrak-navy tracking-tight break-keep leading-[1.4]">
            왜 약으로는 낫지 않는가
            <br />
            — 두개경추 구조와 두통의 관계
          </h2>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
          <div className="space-y-5 text-[15px] text-gray-600 leading-[2] font-light break-keep">
            <p>
              편두통, 어지럼증, 이명, 브레인포그가 함께 나타나는 분들의 공통점은{' '}
              <strong className="text-gray-900 font-medium">머리와 목이 만나는 두개경추 부위의 구조적 불균형</strong>
              입니다. 이 부위의 근육 긴장과 정렬 문제가 지속적인 자극을 만들고, 그 자극이 삼차신경경추복합체를 통해 두통 발작을 반복시킵니다.
            </p>
            <p>
              신경과는 뇌를 검사하고, 이비인후과는 귀를 검사합니다. 각 과에서 이상이 없다고 해도 두통이 계속되는 이유는{' '}
              <strong className="text-gray-900 font-medium">구조적 원인을 보는 곳이 없기 때문</strong>입니다.
            </p>
            <p>
              진통제와 항CGRP 주사는 통증 신호를 차단할 수 있지만, 신호를 만들어내는 구조적 원인은 그대로입니다.
              시간이 지날수록 약의 용량이 늘어나고, 약 없이는 버티기 힘들어지는 이유입니다.
            </p>

            <div className="bg-[#faf6ec] border border-[#b8912a]/20 p-6 md:p-8 mt-4">
              <p className="text-[11px] font-bold tracking-[0.15em] uppercase text-[#b8912a] mb-3">학술 근거</p>
              <p className="text-[14px] text-gray-700 leading-relaxed break-keep">
                편두통과 경추 장애의 연관성은 국제 학술지를 통해 밝혀져 있습니다.
                경추의 구조적 문제(근육 긴장, 압통점 활성화)가 지속적 자극을 생성하고,
                이 자극이 삼차신경경추복합체(TCC)를 통해 편두통 발작 빈도를 증가시키고 만성화를 촉진합니다.
              </p>
              <p className="text-[12px] text-gray-500 mt-3 italic leading-relaxed">
                출처: &quot;Involvement of cervical disability in migraine: a literature review&quot;
                <br />
                British Journal of Pain, 2020
              </p>
            </div>
          </div>

          <div className="flex flex-col gap-px border border-gray-200 rounded-lg overflow-hidden">
            {causeSteps.map((step) => (
              <div
                key={step.num}
                className="flex gap-4 p-5 md:p-6 bg-white hover:border-maekrak-accent transition-colors border-b border-gray-100 last:border-b-0"
              >
                <span className="font-serif text-xl text-maekrak-navy/20 shrink-0">{step.num}</span>
                <div>
                  <h3 className="text-[15px] font-bold text-maekrak-navy mb-1">{step.title}</h3>
                  <p className="text-[13px] text-gray-500 leading-relaxed break-keep font-light">{step.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
