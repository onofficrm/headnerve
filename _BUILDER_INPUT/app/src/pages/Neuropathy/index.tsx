import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Stethoscope, Footprints } from 'lucide-react';

export function Neuropathy() {
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
            말초신경병증 <span className="font-sans font-light text-white/50 text-[24px] md:text-[32px] ml-2 tracking-wide">Neuropathy</span>
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl leading-[1.8] break-keep font-light">
            뇌와 척수를 제외한 신경이 손상되어 저림, 시림, 작열감이 나타나는 질환입니다. 당뇨나 항암치료가 주요 원인이지만, 전체 환자의 30~40%는 원인을 찾지 못하는 <strong className="text-white">특발성</strong>입니다.
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
                "말초신경병증과 일시적인 손발 저림의 결정적인 차이는 <span className="text-maekrak-blue relative inline-block">쉬어도, 자세를 바꿔도 나아지지 않는다<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></span>는 것입니다. 저림과 시림이 3개월 이상 지속된다면 단순 순환제가 아니라 신경 자체를 봐야 합니다."
              </p>
              <p className="text-[16px] md:text-[18px] text-gray-600 font-light">
                말초신경 회복에는 두 가지가 반드시 필요합니다. 손상된 신경에 혈류와 영양을 공급하는 것, 그리고 신경이 눌린 부분을 풀어주는 것. 
              </p>
            </div>
          </div>
        </section>

        {/* 주요 원인 */}
        <section className="mb-24 md:mb-32">
          <div className="flex items-start gap-8 flex-col lg:flex-row mb-12">
            <div className="flex-1">
              <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">원인 불명은 치료 불가능을 의미하지 않습니다</h2>
              <div className="prose prose-lg max-w-none text-gray-600 font-light leading-[1.8]">
                <p>
                  현대 의학 검사는 신경이 얼마나 손상됐는지는 볼 수 있지만, 왜 손상이 시작됐는지는 잘 잡아내지 못합니다. 허리디스크 치료를 받아도 발바닥 저림이 낫지 않는다면 말초 문제일 가능성이 높습니다.
                </p>
                <p>
                  한의학적으로는 말초까지 기혈 순환이 제대로 이뤄지지 않아 신경이 제 기능을 잃어가는 과정으로 봅니다. 공급이 끊기면 신경은 손상되기 시작하며, 이 손상은 점점 부위가 넓어집니다.
                </p>
              </div>
            </div>
            <div className="w-full lg:w-[400px] bg-red-50/50 rounded-2xl p-8 border border-red-100">
              <h3 className="flex items-center gap-2 font-bold text-red-700 mb-6 text-[18px]">
                <Footprints className="w-5 h-5 flex-shrink-0" />
                이런 신호가 오면 즉시 치료가 필요합니다
              </h3>
              <ul className="space-y-4">
                {[
                  "저림·시림이 3개월 이상 지속될 때",
                  "밤에 증상이 심해져 수면을 방해할 때",
                  "발바닥이 타는 듯하거나 전기가 오는 느낌이 있을 때",
                  "뜨겁고 차가운 것을 잘 느끼지 못하게 될 때",
                  "감각이 점점 둔하게 무뎌지는 느낌이 들 때"
                ].map((item, id) => (
                  <li key={id} className="flex gap-3 text-[15px] text-red-900/80 leading-[1.5]"><span className="font-bold text-red-400">·</span> {item}</li>
                ))}
              </ul>
            </div>
          </div>
        </section>

        {/* 이런 경우 치료를 고려하세요 */}
        <section>
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">이런 경우, 맥락한의원의 치료가 필요합니다</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-16">
            {[
              "손발이 저리고 찌릿한데 당뇨는 없는 경우 (특발성)",
              "항암치료 후 손발 저림이 생겨 나아지지 않는 경우",
              "허리 디스크 검사는 정상인데 손발이 저린 경우",
              "발바닥이 타는 듯 화끈거리고 열감이 느껴지는 경우",
              "n년간 허리 치료를 받았는데 발바닥 증상이 그대로인 경우"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-6 rounded-xl bg-gray-50 border border-gray-100/50 hover:bg-white hover:border-maekrak-blue/30 transition-colors hover:shadow-sm">
                <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[16px] md:text-[18px] text-gray-700 font-medium leading-[1.6] break-keep">{item}</span>
              </div>
            ))}
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 mb-16">
            <h3 className="text-[22px] md:text-[26px] font-serif font-medium mb-8">손상된 신경, 어떻게 회복할까요?</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
              <div>
                <h4 className="text-[18px] font-bold text-[#7ec8e0] mb-3 flex items-center"><span className="w-6 h-6 rounded-full bg-[#7ec8e0]/20 flex items-center justify-center mr-3 text-[14px]">1</span>통맥탕 (通脈湯)</h4>
                <p className="text-white/80 font-light leading-[1.6] break-keep">막힌 혈맥을 뚫고 말초까지 혈류와 영양이 닿을 수 있는 환경을 만듭니다. 신경 회복을 위한 필수적인 재료를 가장 깊숙한 곳까지 공급합니다.</p>
              </div>
              <div>
                <h4 className="text-[18px] font-bold text-[#7ec8e0] mb-3 flex items-center"><span className="w-6 h-6 rounded-full bg-[#7ec8e0]/20 flex items-center justify-center mr-3 text-[14px]">2</span>맞춤 약침</h4>
                <p className="text-white/80 font-light leading-[1.6] break-keep">통맥탕이 전신의 흐름을 주도한다면, 신경 주변 경혈에 주입하는 약침은 손상 부위에 집중적으로 작용해 조직 재생과 염증 완화를 돕습니다.</p>
              </div>
              <div>
                <h4 className="text-[18px] font-bold text-[#7ec8e0] mb-3 flex items-center"><span className="w-6 h-6 rounded-full bg-[#7ec8e0]/20 flex items-center justify-center mr-3 text-[14px]">3</span>침 치료</h4>
                <p className="text-white/80 font-light leading-[1.6] break-keep">신경이 눌리거나 포착된 지점을 풀어줍니다. 통로가 개방되어야 영양과 혈류가 목표 지점에 안전하게 스며들 수 있습니다.</p>
              </div>
              <div>
                <h4 className="text-[18px] font-bold text-[#7ec8e0] mb-3 flex items-center"><span className="w-6 h-6 rounded-full bg-[#7ec8e0]/20 flex items-center justify-center mr-3 text-[14px]">4</span>추나 요법</h4>
                <p className="text-white/80 font-light leading-[1.6] break-keep">경추, 요추 문제가 동반된 경우 척추에서 신경이 뻗어나가는 시작점의 구조적 압박을 해소하여 근본적인 흐름을 안정화시킵니다.</p>
              </div>
            </div>
          </div>

        </section>

        {/* 치료 프로그램 */}
        <section>
          <div className="text-center mb-16">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">맥락한의원의 말초신경병증 치료 프로그램</h2>
            <p className="text-[16px] md:text-[18px] text-gray-600 font-light max-w-3xl mx-auto leading-[1.8] break-keep">
              맥락한의원 말초신경 치료는 <strong className="font-semibold text-gray-900">기능적 치료(통맥탕)와 구조적 치료(약침·침 치료)를 동시에 진행</strong>합니다. 손상된 신경에 혈류와 영양을 공급하는 것, 그리고 신경이 눌린 부분을 풀어주는 것 — 이 두 가지를 동시에 해결하지 않으면 한쪽만으로는 한계가 있습니다. 신경통 진통제로 통증 신호를 막는 것이 아니라, 말초신경이 실제로 회복되는 환경을 만드는 것이 치료 목표입니다.
            </p>
          </div>

          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 mb-16 border border-gray-100">
            <h3 className="text-[20px] font-bold text-gray-900 mb-8">이런 분들에게 맞습니다</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              {[
                "발끝·손끝이 저리고 시린 증상이 3개월 이상 지속되는 분",
                "당뇨가 없는데 손발 저림·작열감이 반복되는 분",
                "항암치료 후 손발 저림·감각 이상이 생긴 분",
                "발바닥이 타는 듯 화끈거리거나 전기가 오는 느낌이 있는 분",
                "허리 디스크 치료를 받았는데 발바닥·손발 증상이 낫지 않는 분",
                "밤에 저림·작열감이 심해져 수면을 방해받는 분",
                "가바펜틴·프레가발린 같은 약을 복용 중인데 근본적으로 해결하고 싶은 분",
                "감각이 점점 무뎌지는 느낌이 드는 분"
              ].map((item, id) => (
                <div key={id} className="flex gap-3 text-[16px] text-gray-700 leading-[1.5] break-keep"><span className="text-maekrak-blue font-bold">·</span> {item}</div>
              ))}
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 구성 — 공급·흡수·통로 개방을 함께</h3>
            
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
              {/* 통맥탕 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">기능적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">통맥탕 <span className="text-[16px] font-normal text-gray-500 ml-2">(말초 혈류·신경 영양 공급)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  막힌 혈맥을 뚫고 말초까지 혈류와 영양이 닿을 수 있는 환경을 만드는 것이 핵심입니다. 환자의 체질과 신경 손상 정도에 따라 세부 구성이 달라집니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">통맥탕 (기본):</strong> <span className="text-gray-600 text-[14px]">말초 혈류 회복과 신경 영양 공급에 집중합니다. 증상 초기 혹은 경할 때 적용합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">통맥탕 A:</strong> <span className="text-gray-600 text-[14px]">기본 처방에 녹용이 추가됩니다. 만성화된 병증, 전신 피로 동반 시 적용합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">통맥탕 S:</strong> <span className="text-gray-600 text-[14px]">녹용 함량이 최고. 오래된 신경 손상이나 항암 후유증으로 손상이 심할 때 처방합니다.</span></div>
                </div>
              </div>

              {/* 약침 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">구조적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">약침 <span className="text-[16px] font-normal text-gray-500 ml-2">(손상 신경 조직 직접 회복)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  통맥탕이 전신의 흐름을 주도하는 동안 약침은 손상 부위에 집중 작용해 조직 회복을 직접적으로 돕습니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">어혈 약침:</strong> <span className="text-gray-600 text-[14px]">말초 혈류가 저하된 부위 주변 순환을 회복시킵니다. 막힌 곳을 뚫어줍니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">소염 약침:</strong> <span className="text-gray-600 text-[14px]">작열감이나 전기가 오는 듯한 느낌, 신경 염증이 심할 때 직접 억제합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">녹용 약침:</strong> <span className="text-gray-600 text-[14px]">손상된 신경과 인대를 강화하고, 신경 조직의 재생을 도와 회복을 지속시킵니다.</span></div>
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">침 치료 <span className="text-sm font-normal text-gray-500">(신경 포착 해소)</span></h5>
                <p className="text-[14px] text-gray-600 leading-[1.6]">신경이 물리적으로 포착된(눌린) 부위에 침을 놓아 통로를 개방, 혈류가 끝까지 닿도록 합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">추나 <span className="text-sm font-normal text-gray-500">(경추/요추 문제 시)</span></h5>
                <p className="text-[14px] text-gray-600 leading-[1.6]">신경이 시작되는 척추에서 압박이 있을 때, 구조적 환경을 개선하기 위해 병행 처방합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">자율신경검사</h5>
                <p className="text-[14px] text-gray-600 leading-[1.6]">말초신경병증과 자율신경 불균형이 동반되는 경우가 잦아, 객관적인 지표로 경과를 확인합니다.</p>
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
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">가바펜틴·프레가발린</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">신경 과민 통증 신호 차단</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">신경 회복 없음, 약 중단 시 재발</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">비타민B 영양제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">신경 영양 보충</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">말초 혈류 저하 시 흡수·전달 한계</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">물리치료·마사지</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">국소 혈류 일시 개선</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">신경 포착 해소·신경 재생 효과 없음</td>
                  </tr>
                  <tr className="bg-blue-50/50">
                    <td className="py-4 px-6 text-[15px] font-bold text-maekrak-blue">맥락한의원</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">말초 혈류 공급 + 신경포착 해소 + 신경 회복</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">신경이 실제로 회복되는 환경을 만들어 재발 방지</td>
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
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 2~3회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">혈류 회복과 신경 포착 해소에 집중합니다. 신경은 회복 속도가 느려 처음엔 내부에서 변화가 시작됩니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#4a8fa8]/40"></div>
                <div className="text-[#4a8fa8] font-bold mb-2">2단계: 안정기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 1~2회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">저림과 작열감이 호전됨을 체감하는 시기입니다. 치료 빈도를 조정하며 회복을 안정화합니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#7ec8e0]/60"></div>
                <div className="text-[#3b7185] font-bold mb-2">3단계: 유지기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">2주~1개월 1회</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">감각 회복이 안정된 상태를 길게 유지하며 환경을 지키고 재발을 방지합니다.</p>
              </div>
            </div>
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 relative overflow-hidden">
            <div className="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>
            <h3 className="text-[20px] md:text-[24px] font-serif font-bold mb-6 relative z-10">맥락한의원을 선택해야 하는 이유</h3>
            <p className="text-white/90 text-[16px] md:text-[18px] leading-[1.8] font-light max-w-4xl break-keep relative z-10">
              가바펜틴과 진통제로 해결되지 않던 말초신경병증이 나아지는 이유는 하나입니다. <strong className="text-white font-medium">신경이 회복되는 데 필요한 두 가지 — 말초 혈류·영양 공급과 신경 포착 해소 — 를 동시에 다뤘기 때문입니다.</strong>
              <br /><br />
              신경통 진통제는 통증 신호를 차단할 뿐 손상된 신경에 혈류와 영양을 공급하지 않습니다. 영양제는 말초 혈류가 부족한 상태에서는 신경까지 닿지 못합니다. 신경이 눌린 포착 지점을 풀어주지 않으면 공급이 이뤄져도 전달이 안 됩니다. 맥락한의원은 <strong className="text-[#7ec8e0] font-medium">공급·흡수·통로 개방</strong> 세 가지를 동시에 다룹니다.
            </p>
          </div>
        </section>

      </div>
    </div>
  );
}
