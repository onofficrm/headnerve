import { useEffect } from 'react';
import { ArrowRight, CheckCircle2, ChevronRight, Stethoscope, Activity } from 'lucide-react';

export function Autonomic() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="text-[12px] md:text-[13px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">
            맥락 치료과목
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] lg:text-[52px] font-medium text-white leading-[1.3] mb-6">
            자율신경
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl leading-[1.8] break-keep font-light">
            자율신경계는 심장박동·호흡·소화·혈압·체온 등 의식적으로 조절할 수 없는 신체 기능을 24시간 자동으로 조율하는 신경계로, 교감신경과 부교감신경이 균형을 이루며 작동합니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 border border-gray-100">
            <div className="flex items-center gap-3 mb-6">
              <Stethoscope className="w-6 h-6 text-maekrak-blue" strokeWidth={1.5} />
              <h2 className="text-[18px] md:text-[20px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="text-[18px] md:text-[22px] leading-[1.7] text-gray-800 font-medium break-keep space-y-6">
              <p>
                "자율신경 불균형은 단순히 교감신경이나 부교감신경이 항진되어 있는 상태가 아닙니다. 몸이 생명 유지를 위해 <span className="text-maekrak-blue relative inline-block">잘못된 방향으로 동적 평형을 맞춘 상태<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></span>입니다. 정상이 아닌 균형점에서 몸이 작동하면서 다양한 오작동이 발생합니다."
              </p>
              <p className="text-[16px] md:text-[18px] text-gray-800">
                한 번의 스트레스가 아니라, 잘못된 반응 패턴이 쌓이면서 몸이 그것을 정상으로 인식하게 됩니다. 그래서 맥락한의원의 치료 목표는 증상을 억제하는 것이 아니라 올바른 평형점을 회복하도록 돕는 것입니다.
              </p>
            </div>
          </div>
        </section>

        {/* 주요 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">자율신경 불균형이 만드는 신호들</h2>
          <p className="text-[18px] md:text-[20px] font-light text-gray-600 mb-10 max-w-4xl break-keep leading-[1.8]">
            자율신경은 끊임없이 변하는 외부 환경에 몸을 맞추는 시스템입니다. 만성 스트레스, 불규칙한 수면, 과도한 디지털 자극, 잘못된 자세가 지속되면 <strong>자율신경은 비상 모드를 정상 상태로 인식하기 시작합니다.</strong> 전신에 분포하기 때문에 여러 곳에서 동시에 증상이 나타납니다.
          </p>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {[
              { title: "심장·혈관", desc: "이유 없이 두근거리거나 빠르게 뜁니다. 심장 검사는 정상인데 혈압이 불규칙적으로 오르내립니다." },
              { title: "호흡", desc: "숨이 자꾸 막히는 느낌, 깊게 숨을 쉬어야 할 것 같은 답답함이 호흡기 검사 정상임에도 계속됩니다." },
              { title: "소화기", desc: "스트레스를 받으면 바로 배가 아프거나 설사를 합니다. 손발이 차고 복부 냉감이 동반됩니다." },
              { title: "체온·순환", desc: "손발이 항상 차거나, 반대로 몸에 주기적으로 열이 오릅니다. 이유 없이 얼굴이 붉어집니다." },
              { title: "수면·피로", desc: "잠들기 어렵고 잦은 각성이 있습니다. 오래 자도 피로가 풀리지 않고 만성 피로가 유발됩니다." },
              { title: "경추와의 연관", desc: "경추 주변에는 교감신경절이 있습니다. 경추가 비뚤어지면 계속 구조적인 자극을 주게 됩니다." }
            ].map((item, idx) => (
              <div key={idx} className="p-8 rounded-2xl bg-white border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]">
                <Activity className="w-8 h-8 text-[#7ec8e0] mb-4" />
                <h3 className="text-[18px] font-bold text-gray-900 mb-3">{item.title}</h3>
                <p className="text-[15px] font-light text-gray-600 leading-[1.6]">{item.desc}</p>
              </div>
            ))}
          </div>
        </section>

        {/* 이런 경우 치료를 고려하세요 */}
        <section>
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">이런 경우, 맥락한의원의 치료가 필요합니다</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-16">
            {[
              "혈액검사·MRI·심전도·내시경 등 각종 검사가 정상이지만 몸은 힘든 경우",
              "심계항진 (두근거림)이나 호흡 곤란감이 있는데 병원 검사는 정상인 경우",
              "손발이 차갑고 소화가 평소 잘 안되며 함께 연관되어 나타나는 경우",
              "공황장애 진단 후 약물치료 중이나 근본적인 원인을 다스리고 싶은 경우",
              "두통·어지럼증과 함께 소화문제, 수면장애, 만성피로가 함께 나타나는 경우"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-6 rounded-xl bg-gray-50 hover:bg-maekrak-navy/5 transition-colors">
                <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[16px] md:text-[18px] text-gray-800 font-medium leading-[1.6] break-keep">{item}</span>
              </div>
            ))}
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 mb-16">
            <h3 className="text-[22px] md:text-[26px] font-serif font-medium mb-6">맥락한의원에서는 어떻게 치료하나요?</h3>
            <p className="text-white/80 font-light mb-8 leading-[1.7] break-keep">
              심맥탕·약침·추나를 통해 잘못된 동적 평형 상태를 올바른 방향으로 재설정합니다.
            </p>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              <div>
                <h4 className="text-[18px] font-medium text-[#7ec8e0] mb-2">심맥탕 (心脈湯)</h4>
                <p className="text-white/70 text-[14px] font-light leading-[1.6]">교감신경 과항진 완화와 전신 순환 회복에 초점을 맞춘 맞춤형 자율신경 균형 한약입니다.</p>
              </div>
              <div>
                <h4 className="text-[18px] font-medium text-[#7ec8e0] mb-2">약침 & 침</h4>
                <p className="text-white/70 text-[14px] font-light leading-[1.6]">경추·흉추 주변 교감신경절 긴장을 즉각적으로 완화시키고 자율신경 반응을 안정화시킵니다.</p>
              </div>
              <div>
                <h4 className="text-[18px] font-medium text-[#7ec8e0] mb-2">추나 교정</h4>
                <p className="text-white/70 text-[14px] font-light leading-[1.6]">경추 정렬을 교정해 신경에 가해지는 물리적인 만성 스트레스 자극을 제거합니다.</p>
              </div>
            </div>
          </div>
        </section>

        {/* 치료 프로그램 */}
        <section>
          <div className="text-center mb-16">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">맥락한의원의 자율신경 치료 프로그램</h2>
            <p className="text-[16px] md:text-[18px] text-gray-800 max-w-3xl mx-auto leading-[1.8] break-keep">
              맥락한의원 자율신경 치료는 <strong className="font-semibold text-gray-900">기능적 치료(심맥탕)와 구조적 치료(약침·추나)를 동시에 진행</strong>합니다. 검사에서 이상이 없는데 몸이 힘든 것은 장기에 병이 생긴 것이 아니라 몸 전체가 잘못된 동적 평형 상태에 안착해버린 것입니다. 증상 하나를 억제하는 것이 아니라 자율신경이 올바른 평형점을 회복하도록 돕는 것이 치료 목표입니다.
            </p>
          </div>

          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 mb-16 border border-gray-100">
            <h3 className="text-[20px] font-bold text-gray-900 mb-8">이런 분들에게 맞습니다</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              {[
                "검사를 다 받았는데 이상은 없으나 몸은 계속 힘들고 아픈 분",
                "심장이 두근거리는데 심장 검사는 정상인 분",
                "숨이 자꾸 막히는 느낌인데 호흡기 검사는 정상인 분",
                "손발이 차고 소화가 잘 안 되는 증상이 함께 있는 분",
                "공황장애 진단을 받았지만 근본적인 원인을 알고 싶은 분",
                "두통·어지럼증과 함께 몸 전반에 여러 증상이 반복되는 분",
                "잠들기 어렵고 자도 피로가 풀리지 않는 분"
              ].map((item, id) => (
                <div key={id} className="flex gap-3 text-[16px] text-gray-700 leading-[1.5] break-keep"><span className="text-maekrak-blue font-bold">·</span> {item}</div>
              ))}
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 구성 — 기능과 구조를 함께</h3>
            
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
              {/* 심맥탕 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">기능적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">심맥탕 <span className="text-[16px] font-normal text-gray-500 ml-2">(자율신경 균형 재설정)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  맥락한의원이 자율신경 치료 경험을 바탕으로 구성한 한약 처방 프로그램으로, 환자의 체질과 패턴에 따라 세부 구성이 다릅니다. 잘못된 동적 평형 상태를 올바른 방향으로 돌려놓는 것이 목표입니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">심맥탕 (기본):</strong> <span className="text-gray-600 text-[14px]">교감신경 과항진 완화와 균형 회복에 집중합니다. 증상 초기 혹은 경할 때 적용.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">심맥탕 A:</strong> <span className="text-gray-600 text-[14px]">기본 처방에 녹용이 추가됩니다. 만성화, 전신 피로 및 수면장애가 심할 때 적용.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">심맥탕 S:</strong> <span className="text-gray-600 text-[14px]">녹용 함량이 가장 높은 처방. 오래되고 깊어진 불균형이나 체력 저하가 극심할 때 처방.</span></div>
                </div>
              </div>

              {/* 약침 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">구조적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">약침 <span className="text-[16px] font-normal text-gray-500 ml-2">(교감신경절 직접 안정화)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  경추·흉추 주변 만성 경직이 교감신경에 주는 압박을 해소합니다. 구조적인 자극을 제거해 뇌와 신경이 새로운 평형 상태를 찾게 돕습니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">어혈 약침:</strong> <span className="text-gray-600 text-[14px]">경·흉추 주변 혈류를 회복시켜 교감신경절에 가해지는 만성 압박 완화.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">소염 약침:</strong> <span className="text-gray-600 text-[14px]">항진이 심하거나 오래된 경우, 신경 주변 염증 반응을 직접 줄여줍니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">녹용 약침:</strong> <span className="text-gray-600 text-[14px]">자율신경 조절 기능의 회복을 돕고 재발 없이 효과가 오래가도록 강화합니다.</span></div>
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">추나 <span className="text-sm font-normal text-gray-500">(경추 정렬 교정)</span></h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">자율신경 이상에 경추 압박이 연관된 경우, 구조를 교정해 신경절이 새로운 자극을 받지 않도록 합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">자율신경검사</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">"나아지는 느낌"뿐 아니라 교감·부교감신경계의 기저 상태와 회복 추이를 객관적인 데이터로 추적합니다.</p>
              </div>
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">기존 치료와 어떻게 다른가요?</h3>
            <div className="overflow-x-auto rounded-xl border border-gray-200">
              <table className="w-full text-left border-collapse min-w-[600px] bg-white">
                <thead>
                  <tr className="bg-gray-50 border-b border-gray-200">
                    <th className="py-4 px-6 font-bold text-gray-900">치료 방법</th>
                    <th className="py-4 px-6 font-bold text-gray-900">작용 방식</th>
                    <th className="py-4 px-6 font-bold text-gray-900">한계 / 특징</th>
                  </tr>
                </thead>
                <tbody>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">항불안제·신경안정제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">신경계 흥분 일시 억제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">근본 원인 미해결, 중단 시 재발, 의존·중독 우려</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">베타차단제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">심박수·혈압 조절</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">교감신경 과항진의 출발 원인 미해결</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">심리치료·상담</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">심리적 스트레스 완화</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">구조적·기능적 신체 고착화 원인 해소 한계</td>
                  </tr>
                  <tr className="bg-blue-50/50">
                    <td className="py-4 px-6 text-[15px] font-bold text-maekrak-blue">맥락한의원</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">교감신경절 구조적 안정 + 자율신경 균형 재설정</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">잘못된 동적 평형 상태를 올바른 방향으로 회복</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 단계</h3>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#1e3a8a]/20"></div>
                <div className="text-[#1e3a8a] font-bold mb-2">1단계: 집중 치료기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 2~3회, 약 4주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">교감신경 과항진을 빠르게 낮추고 자율신경 반응을 안정시키는 첫 번째 관문입니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#4a8fa8]/40"></div>
                <div className="text-[#4a8fa8] font-bold mb-2">2단계: 안정기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 1~2회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">증상이 줄어드는 시기입니다. 간격을 조정하며 뇌와 몸이 새로운 평형점에 안착하도록 합니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#7ec8e0]/60"></div>
                <div className="text-[#3b7185] font-bold mb-2">3단계: 유지기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">2주~1개월 1회</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">교정된 상태를 유지하며 스트레스 및 수면 변화에도 자율신경이 흔들리지 않도록 방어합니다.</p>
              </div>
            </div>
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 relative overflow-hidden">
            <div className="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>
            <h3 className="text-[20px] md:text-[24px] font-serif font-bold mb-6 relative z-10">맥락한의원을 선택해야 하는 이유</h3>
            <p className="text-white/90 text-[16px] md:text-[18px] leading-[1.8] font-light max-w-4xl break-keep relative z-10">
              여러 검사에서 이상이 없다는 말만 들었던 몸이 나아지는 이유는 하나입니다. <strong className="text-white font-medium">자율신경 불균형을 잘못된 동적 평형 상태로 보고, 교감신경절의 구조적 압박과 기능적 불균형을 동시에 교정해서 몸이 올바른 평형점을 회복하도록 했기 때문입니다.</strong>
              <br /><br />
              항불안제와 신경안정제는 흥분된 신경을 억제할 뿐, 왜 몸이 잘못된 평형 상태에 고착됐는지는 다루지 않습니다. 약을 끊으면 증상이 돌아오는 이유입니다. 맥락한의원은 그 고착된 평형 상태 자체를 바꿉니다.
            </p>
          </div>
        </section>

      </div>
    </div>
  );
}
