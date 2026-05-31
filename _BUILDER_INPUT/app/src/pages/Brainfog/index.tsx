import { useEffect } from 'react';
import { CheckCircle2, CloudFog, Stethoscope } from 'lucide-react';

export function Brainfog() {
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
            브레인포그 <span className="font-sans font-light text-white/50 text-[24px] md:text-[32px] ml-2 tracking-wide">Brainfog</span>
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl leading-[1.8] break-keep font-light">
            뇌에 안개가 낀 것처럼 사고가 흐릿해지고 집중력이 떨어지며 언어 처리가 어려워지는 상태입니다. 구조적 뇌 병변이 아닌 <strong>기능적 문제</strong>로 발생하기 때문에 보통 MRI 검사에서 정상으로 나옵니다.
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
                "브레인포그는 치매와 다릅니다. 20~30대에서도 흔히 나타나는 기능적 저하입니다. 그리고 의지의 문제도 아닙니다. <span className="text-maekrak-blue relative inline-block">뇌라는 기관에 연료와 산소가 원활히 공급되지 않는 구조망의 장애<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></span>입니다."
              </p>
              <p className="text-[16px] md:text-[18px] text-gray-800">
                맥락한의원은 브레인포그를 영양 공급과 노폐물 배출이라는 대사적 관점, 그리고 자율신경과 경추 정렬이라는 구조적 관점에서 통합적으로 치료합니다.
              </p>
            </div>
          </div>
        </section>

        {/* 주요 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">브레인포그를 만드는 3가지 요인</h2>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="p-8 rounded-2xl bg-white border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]">
              <div className="text-[48px] text-maekrak-blue/20 font-bold mb-4 font-serif">01</div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 leading-[1.4]">두개경추 부정렬<br/><span className="text-gray-500 text-[15px] font-medium">통로의 압박</span></h3>
              <p className="text-[15px] font-light text-gray-600 leading-[1.7]">두개골과 경추가 틀어지면 뇌로 가는 혈관과 신경이 얽혀 노폐물 공간 배출을 방해하고 뇌신경이 압박받습니다.</p>
            </div>
            <div className="p-8 rounded-2xl bg-white border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]">
              <div className="text-[48px] text-maekrak-blue/20 font-bold mb-4 font-serif">02</div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 leading-[1.4]">자율신경 불균형<br/><span className="text-gray-500 text-[15px] font-medium">회로의 오작동</span></h3>
              <p className="text-[15px] font-light text-gray-600 leading-[1.7]">부품이 아닌 뇌 주변 회로의 문제입니다. 교감신경 항진이 지속되면 에너지의 효율적인 사용이 불가능해집니다.</p>
            </div>
            <div className="p-8 rounded-2xl bg-white border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)]">
              <div className="text-[48px] text-maekrak-blue/20 font-bold mb-4 font-serif">03</div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 leading-[1.4]">만성적인 대사 문제<br/><span className="text-gray-500 text-[15px] font-medium">불안정한 뇌 연료 공급</span></h3>
              <p className="text-[15px] font-light text-gray-600 leading-[1.7]">현대인의 급격한 혈당 롤러코스터는 포도당과 케톤체를 쓰는 뇌를 굶주리게 만들고 카페인 의존성을 키웁니다.</p>
            </div>
          </div>
        </section>

        {/* 이런 경우 치료를 고려하세요 */}
        <section>
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">이런 증상이 있다면 치료가 필요합니다</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-16">
            {[
              "코로나 감염(후유증) 이후로 계속해서 머리가 멍하고 맑지 않은 경우",
              "20~30대인데도 집중이 안되고 단어가 잘 안떠오르고 기억력이 떨어진 경우",
              "항상 머릿속에 안개가 낀 것처럼 흐릿하게 느껴지는 경우",
              "피곤해서 수면을 취해도 뇌 노폐물 배출이 원활하지 않아 피로가 안풀리는 경우",
              "MRI 등의 검사에서 정상이라고 들었지만 본인은 계속 이상을 호소하는 경우",
              "정신건강의학과에서 주는 치료약의 약효가 떨어지면 근본 문제가 반복되는 경우"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-6 rounded-xl bg-gray-50 hover:bg-white border text-left border-gray-50 hover:border-maekrak-blue/20 transition-all">
                <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[16px] md:text-[18px] text-gray-700 font-medium leading-[1.6] break-keep">{item}</span>
              </div>
            ))}
          </div>

          <div className="bg-[#1f2937] text-white rounded-2xl p-8 md:p-12 mb-16">
            <h3 className="text-[22px] md:text-[26px] font-serif font-medium mb-8">청명한 사고를 되찾는 핵심 처방 프로그램</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
              <div className="bg-white/5 p-6 rounded-xl">
                <h4 className="text-[18px] font-bold text-[#f7b731] mb-2">두맥탕 & 총명공진단</h4>
                <p className="text-white/80 font-light leading-[1.6]">두맥탕으로 체질 맞춤 뇌 에너지를 회복시키고, 브레인포그의 핵심 처방인 보약 기반의 총명공진단으로 신경 세포에 직접 자양을 공급합니다.</p>
              </div>
              <div className="bg-white/5 p-6 rounded-xl">
                <h4 className="text-[18px] font-bold text-[#f7b731] mb-2">약침 & 추나 교정</h4>
                <p className="text-white/80 font-light leading-[1.6]">후두하근 주변의 긴장과 경추 1번 2번의 병리적인 틀어짐을 교정합니다. 뇌척수액의 순환로를 정비하여 근본적인 산소 공급을 유도합니다.</p>
              </div>
            </div>
          </div>
        </section>

        {/* 치료 프로그램 */}
        <section>
          <div className="text-center mb-16">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">맥락한의원의 브레인포그 치료 프로그램</h2>
            <p className="text-[16px] md:text-[18px] text-gray-800 max-w-3xl mx-auto leading-[1.8] break-keep">
              맥락한의원 브레인포그 치료는 <strong className="font-semibold text-gray-900">기능적 치료(두맥탕·총명공진단)와 구조적 치료(추나·약침)를 동시에 진행</strong>합니다. 뇌에 영양을 공급하는 것과 영양이 잘 전달될 수 있는 뇌의 환경을 만드는 것을 동시에 해결해야 만성적인 안개를 걷어낼 수 있습니다. 일시적인 각성이 아니라 영구적인 인지 기능 회복이 목표입니다.
            </p>
          </div>

          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 mb-16 border border-gray-100">
            <h3 className="text-[20px] font-bold text-gray-900 mb-8">이런 분들에게 맞습니다</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              {[
                "코로나 감염(후유증) 이후로 계속해서 머리가 멍하고 맑지 않은 분",
                "20~30대인데도 단어가 잘 안 떠오르고 기억력이 눈에 띄게 떨어진 분",
                "항상 머릿속에 안개가 낀 것처럼 흐릿하게 느껴지는 분",
                "자도 자도 피곤하고, 뇌 노폐물 배출이 원활하지 않아 멍함이 지속되는 분",
                "MRI 검사는 정상인데 스스로 인지 저하를 심하게 느끼는 분",
                "정신과 약을 먹을 때만 반짝하고 시간 지나면 다시 멍해지는 분",
                "집중력이 급격히 떨어져 학업이나 업무 효율이 예전 같지 않은 분"
              ].map((item, id) => (
                <div key={id} className="flex gap-3 text-[16px] text-gray-700 leading-[1.5] break-keep"><span className="text-maekrak-blue font-bold">·</span> {item}</div>
              ))}
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 구성 — 영양 공급과 환경 개선을 함께</h3>
            
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
              {/* 두맥탕 & 총명공진단 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">기능적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">두맥탕 & 총명공진단 <span className="text-[16px] font-normal text-gray-500 ml-2">(뇌 에너지 회복·신경 영양 공급)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  뇌가 활발하게 기능할 수 있도록 연료를 채워주는 핵심 처방입니다. 만성화된 대사 불균형을 바로잡습니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕:</strong> <span className="text-gray-600 text-[14px]">환자의 체질에 맞춰 뇌 혈류량을 증가시키고 자율신경 균형을 바로잡는 맞춤 처방입니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">총명공진단:</strong> <span className="text-gray-600 text-[14px]">뇌신경 세포에 직접 자양을 공급하는 보약 기반 처방. 집중력과 기억력 저하가 심할 때 두맥탕과 병행합니다.</span></div>
                </div>
              </div>

              {/* 약침 & 침 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">구조적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">약침 & 침 <span className="text-[16px] font-normal text-gray-500 ml-2">(뇌척수액 순환로 정비)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  뇌 노폐물이 원활하게 배출되고 산소가 공급될 수 있도록 뇌척수액 순환로를 가로막는 긴장을 해소합니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">어혈 약침:</strong> <span className="text-gray-600 text-[14px]">후두하근 주변의 혈류 정체를 풀어 뇌로 가는 길목을 넓혀줍니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">침 치료:</strong> <span className="text-gray-600 text-[14px]">경항부(목)의 만성적인 긴장 부위를 풀어 뇌신경이 압박받지 않는 환경을 만듭니다.</span></div>
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">추나 요법 <span className="text-sm font-normal text-gray-500">(경추 정렬 교정)</span></h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">두개경추(C1, C2)의 병리적 틀어짐을 교정해 신경 압박을 풀고 근본적인 뇌 산소 공급을 유도합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">자율신경검사</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">교감신경 과항진으로 인한 뇌 에너지 낭비가 있는지 측정하여 치료 효율을 높입니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">대사·생활 밀착 관리</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">혈당 롤러코스터와 카페인 의존을 줄이는 생활 습관 교정으로 뇌 연료 공급을 안정화합니다.</p>
              </div>
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">기존 브레인포그 치료와 어떻게 다른가요?</h3>
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
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">단순 영양제 (징코빌로바 등)</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">일반적인 혈액순환 개선</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">구조적 압박(경추 틀어짐)이나 심한 뇌 대사 저하시 효과 제한적</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">정신과 약물 (각성제 등)</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">일시적 신경 전달 물질 조절</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">약효 소진 시 증상 반복, 근본 뇌 환경 개선 안됨</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">카페인 의존</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">아데노신 수용체 차단 (피로 은폐)</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">각성 후 더 심한 브레인포그 유발 (크래시 현상)</td>
                  </tr>
                  <tr className="bg-blue-50/50">
                    <td className="py-4 px-6 text-[15px] font-bold text-maekrak-blue">맥락한의원</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">뇌 영양 공급(한약) + 순환 방해 구조 교정(추나)</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">뇌가 스스로 회복할 수 있는 근본 환경을 지속시켜 재발 방지</td>
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
                <div className="text-[#1e3a8a] font-bold mb-2">1단계: 집중 순환기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 2~3회, 약 4주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">두개경추 구조를 바로잡고 막혀있던 뇌척수액 순환로를 정비하여 극심한 피로와 멍함을 빠르게 낮춥니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#4a8fa8]/40"></div>
                <div className="text-[#4a8fa8] font-bold mb-2">2단계: 인지 안정기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 1~2회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">머리가 맑아지는 시간이 길어집니다. 총명공진단 등으로 신경 세포 자양을 집중 보충합니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#7ec8e0]/60"></div>
                <div className="text-[#3b7185] font-bold mb-2">3단계: 안착 및 유지기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">2주~1개월 1회</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">회복된 뇌 순환과 대사 환경이 흔들리지 않도록 정착시키고 생활 관리를 병행합니다.</p>
              </div>
            </div>
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 relative overflow-hidden">
            <div className="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>
            <h3 className="text-[20px] md:text-[24px] font-serif font-bold mb-6 relative z-10">맥락한의원을 선택해야 하는 이유</h3>
            <p className="text-white/90 text-[16px] md:text-[18px] leading-[1.8] font-light max-w-4xl break-keep relative z-10">
              쉬어도 낫지 않고 커피로 버티던 브레인포그가 호전되는 이유는 하나입니다. <strong className="text-white font-medium">뇌가 제 기능을 할 수 있는 두 가지 필수 조건 — 뇌척수액 순환을 통한 노폐물 배출(구조 교정)과 신경 세포 에너지 충전(기능 처방) — 을 동시에 해결했기 때문입니다.</strong>
              <br /><br />
              단순히 피로를 은폐하는 각성제나 영양제만으로는 구부러진 호스를 펴지 않고 물만 세게 트는 것과 같습니다. 맥락한의원은 경추 정렬을 통해 호스를 펴고(순환로 개방), 두맥탕을 통해 질 좋은 영양(연료)을 채워 뇌의 기능 저하를 근본에서부터 되돌립니다.
            </p>
          </div>
        </section>

      </div>
    </div>
  );
}
