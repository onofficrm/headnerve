export function AboutStrengthSection() {
  const strengths = [
    {
      num: "01",
      icon: "전문의 직접 진료",
      title: "침구과 전문의가 처음부터 끝까지 직접 진료합니다",
      desc: "문진·진단·침 치료·약침·추나까지 이재성 대표원장이 직접 담당합니다. 신경과처럼 검사 후 처방전만 받고 나오는 구조가 아닙니다. 환자와의 접점이 길수록 치료는 정교해집니다.",
      proof: "대학병원 레지던트 4년 + 침구과 전문의 · 국제 학술발표 경험"
    },
    {
      num: "02",
      icon: "구조적 접근",
      title: "두개경추 구조를 치료하는 한의원은 많지 않습니다",
      desc: "편두통과 경추 장애의 연관성은 국제 학술지에서 이미 밝혀진 사실입니다. 삼차신경경추복합체의 구조적 문제가 두통을 만성화시킵니다. 맥락한의원은 긴 바늘을 이용한 두경부 약침과 상부경추 복잡추나를 핵심 치료로 씁니다.",
      proof: "근거: Involvement of cervical disability in migraine, British Journal of Pain, 2020"
    },
    {
      num: "03",
      icon: "다과목 통합 진단",
      title: "신경과·이비인후과·내과를 전전하던 이유가 있습니다",
      desc: "두개경추 불균형 환자는 편두통만 있지 않습니다. 뒷목 통증·어지럼증·이명·브레인포그·두근거림·수족냉증이 동시에 나타납니다. 각 과에서 각각의 증상만 보기 때문에 원인을 못 찾는 것입니다. 맥락한의원은 여러 증상을 하나의 구조적 맥락에서 읽습니다.",
      proof: "진단검사: 자율신경 검사·이학적 검사·맥진·복진 통합 분석"
    },
    {
      num: "04",
      icon: "약물 독립 목표",
      title: "약에 의존하게 만드는 것이 진짜 악순환입니다",
      desc: "트립탄은 장기 복용 시 심혈관 위험을 높입니다. 항우울제 계열 예방약은 머리가 멍해지는 부작용이 있습니다. 진통제 과용은 약물과용두통을 만들어 원래 두통보다 더 자주 아프게 만듭니다. 맥락한의원의 목표는 치료가 끝난 뒤 약 없이도 건강한 일상을 유지하는 것입니다.",
      proof: "항CGRP 주사·트립탄·진통제가 효과 없는 환자 90% 이상 내원"
    },
    {
      num: "05",
      icon: "검증된 임상 경험",
      title: "다른 병원에서 낫지 않은 환자를 치료한 사례가 있습니다",
      desc: "수술을 앞두고 찾아온 40대 두통 환자(10회 치료 후 증상 80% 감소), 응급실을 반복한 30대 경추성 어지럼증 환자, 항CGRP 주사도 무효였던 20년 편두통 환자. 기존 치료의 한계를 느낀 분들이 블로그를 보고 멀리서 찾아옵니다.",
      proof: "독일 뮌헨 국제침구학회 연구발표 / 일본 침구학회 초청 학술교류"
    },
    {
      num: "06",
      icon: "공공 신뢰",
      title: "실력은 임상만이 아니라 공공 활동에서도 검증됩니다",
      desc: "코로나19 기간 질병관리청 정식 역학조사관으로 3년간 활동, 공로를 인정받아 보건복지부 장관 표창·충청남도 도지사 표창을 수상했습니다. 의사로서의 책임감과 공공성을 중요하게 생각합니다.",
      proof: "보건복지부 장관 표창 수상 · 충청남도 도지사 표창 수상"
    }
  ];

  return (
    <section className="py-20 md:py-24 px-6 md:px-12 lg:px-24 bg-[#f8f9fb]">
      <div className="max-w-7xl mx-auto">
        <div className="text-[11px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-3">맥락이 다른 이유</div>
        <h2 className="font-serif text-[28px] md:text-[34px] font-medium text-gray-900 leading-[1.5] mb-8 break-keep">
          다른 한의원, 신경과와<br className="md:hidden" /> 맥락한의원이 다른 6가지
        </h2>
        <div className="max-w-2xl mb-16">
          <p className="text-[15px] md:text-[16px] text-gray-500 leading-[2] font-light break-keep">
            두통 전문을 표방하는 곳은 많습니다. 그러나 어떤 관점으로 두통을 보는지, 어떤 치료를 어떤 기준으로 결정하는지는 전혀 다릅니다. 맥락한의원이 다른 이유를 구체적으로 말씀드립니다.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[1px] bg-gray-200 border border-gray-200">
          {strengths.map((s, idx) => (
            <div key={idx} className="bg-white p-8 md:p-10 flex flex-col hover:bg-[#e8f4f8] transition-colors group">
              <span className="font-serif text-[44px] font-light text-maekrak-navy/10 leading-none mb-6">{s.num}</span>
              <div className="text-[11px] font-bold tracking-[0.15em] uppercase text-maekrak-accent mb-3">{s.icon}</div>
              <h3 className="font-serif text-[16px] font-medium text-gray-900 mb-4 leading-[1.5] break-keep">{s.title}</h3>
              <p className="text-[13.5px] md:text-[14px] text-gray-500 leading-[1.85] font-light mb-6 flex-1 break-keep">
                {s.desc}
              </p>
              <div className="text-[12.5px] text-maekrak-accent border-t border-gray-100 pt-4 font-medium">
                → {s.proof}
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
