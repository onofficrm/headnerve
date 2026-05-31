import { useEffect } from 'react';
import { ArrowRight, CheckCircle2, Stethoscope } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Dizziness() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="text-[12px] md:text-[13px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">
            맥락 치료과목
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] lg:text-[52px] font-medium text-white leading-[1.3] mb-6">
            어지럼증
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl leading-[1.8] break-keep font-light">
            어지럼증은 자신이나 주변이 움직이는 것처럼 느껴지거나, 균형을 잡기 어렵거나, 머리가 붕 뜨는 듯한 감각이 지속되는 증상으로 귀·눈·경추·자율신경계 등 다양한 원인에 의해 발생합니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        <section className="mb-24 md:mb-32">
          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 border border-gray-100">
            <div className="flex items-center gap-3 mb-6">
              <Stethoscope className="w-6 h-6 text-maekrak-blue" strokeWidth={1.5} />
              <h2 className="text-[18px] md:text-[20px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="text-[16px] md:text-[18px] text-gray-800 leading-[1.8] break-keep space-y-4">
              <p>
                어지럼증의 원인이 되는 기관은 귀만이 아닙니다. 귀, 눈, 그리고 경추의 고유수용성 감각이 함께 작동해야 균형이 유지됩니다. 경추 근방추 기능이 저하되면 실제 머리 위치와 인식하는 위치가 달라지고, 그 불일치가 어지럼증으로 나타납니다.
              </p>
              <p>
                빙빙 도는 회전성 어지럼증은 귀 문제일 가능성이 높습니다. 몸이 붕 뜨는 느낌, 물 위를 걷는 듯한 느낌, 가만히 있어도 머리가 흔들리는 비회전성 어지럼증은 경추성 어지럼증일 확률이 높습니다.
              </p>
              <p>
                앉았다 일어나면 어지럽거나 머리에 압이 차는 느낌은 현기증 패턴으로, 뇌에 연료가 순간적으로 부족해지는 자율신경 문제와 연결됩니다. 맥락한의원은 어지럼증을 경추 고유수용성 감각 이상과 자율신경 불균형이라는 두 가지 핵심 축으로 봅니다.
              </p>
            </div>
          </div>
        </section>

        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">어지럼증, 왜 생기는 걸까요?</h2>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <div className="p-8 rounded-2xl bg-white border border-gray-100 shadow-sm">
              <h3 className="text-[20px] font-bold text-gray-900 mb-4">경추 고유수용성 감각 이상</h3>
              <p className="text-[15px] text-gray-700 leading-[1.8] break-keep mb-4">
                균형을 유지하는 데는 귀의 전정기관, 눈의 시각 정보, 경추의 고유수용성 감각이 함께 작동합니다. 후두하근은 다른 근육보다 근방추 밀도가 높아 머리 위치 인식에 핵심적인 역할을 합니다.
              </p>
              <p className="text-[15px] text-gray-700 leading-[1.8] break-keep">
                후두하근이 만성적으로 경직되면 근방추가 정확한 신호를 보내지 못합니다. 실제 머리 위치와 뇌가 인식하는 위치 사이에 불일치가 생기고, 귀·눈 정보와 충돌하면서 어지럼증이 나타납니다.
              </p>
              <ul className="mt-6 space-y-2 text-[14px] text-gray-600">
                {['몸이 붕 뜨는 느낌', '물 위를 걷는 듯한 느낌', '가만히 있어도 머리가 흔들리는 느낌', '목을 움직일 때 어지럼증이 심해짐'].map((item) => (
                  <li key={item} className="flex gap-2"><span className="text-maekrak-blue">·</span>{item}</li>
                ))}
              </ul>
            </div>
            <div className="p-8 rounded-2xl bg-white border border-gray-100 shadow-sm">
              <h3 className="text-[20px] font-bold text-gray-900 mb-4">자율신경 불균형</h3>
              <p className="text-[15px] text-gray-700 leading-[1.8] break-keep mb-4">
                앉았다 일어날 때 어지럽거나 머리에 압이 차는 느낌은 현기증에 가깝습니다. 자율신경이 체위 변화에 따른 혈압과 혈류를 즉각 조절하지 못하면, 뇌에 순간적으로 연료가 부족해집니다.
              </p>
              <p className="text-[15px] text-gray-700 leading-[1.8] break-keep">
                두통과 어지럼증이 함께 오는 경우가 많은 이유가 여기 있습니다. 경추 고유수용성 감각 이상과 자율신경 불균형이 동시에 작용하면, 어느 한 가지만 다뤄서는 어지럼증이 완전히 해소되지 않습니다.
              </p>
            </div>
          </div>
        </section>

        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">어지럼증의 종류</h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {[
              { name: '경추성 어지럼증', path: '/dizziness/cervicogenic' },
              { name: '메니에르병', path: '/dizziness/menieres' },
              { name: '이석증(BPPV)', path: '/dizziness/bppv' },
              { name: '전정신경염', path: '/dizziness/vestibular-neuritis' },
            ].map((type) => (
              <Link
                key={type.path}
                to={type.path}
                className="group block p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:bg-maekrak-navy hover:border-transparent transition-all duration-300"
              >
                <h3 className="text-[18px] font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">{type.name}</h3>
                <div className="flex items-center text-[14px] font-medium text-maekrak-blue group-hover:text-[#7ec8e0] transition-colors">
                  자세히 보기 <ArrowRight className="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </div>
              </Link>
            ))}
          </div>
        </section>

        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">이런 경우, 맥락한의원의 치료가 필요합니다</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            {[
              '이비인후과에서 검사를 받았는데 이상이 없다고 했습니다',
              '이석증 치료를 받았는데 어지럼증이 계속됩니다',
              '빙빙 도는 것이 아니라 붕 뜨는 느낌, 물 위를 걷는 듯한 느낌입니다',
              '앉았다 일어나면 어지럽고 머리에 압이 차는 느낌이 있습니다',
              '대학병원 검사도 모두 정상인데 어지럼증이 계속됩니다',
              '두통과 어지럼증이 함께 옵니다',
            ].map((item) => (
              <div key={item} className="flex items-start gap-4 p-6 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[16px] md:text-[18px] text-gray-700 leading-[1.6] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        <section>
          <div className="text-center mb-16">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">맥락한의원의 어지럼증 치료 프로그램</h2>
            <p className="text-[16px] md:text-[18px] text-gray-800 max-w-3xl mx-auto leading-[1.8] break-keep">
              맥락한의원 어지럼증 치료는 <strong className="font-semibold text-gray-900">기능적 치료(두맥탕)와 구조적 치료(약침·추나)를 동시에 진행</strong>합니다. 귀만 보는 것이 아니라 경추 고유수용성 감각 이상과 자율신경 불균형이라는 두 가지 원인 축을 함께 다뤄야 어지럼증이 재발하지 않습니다.
            </p>
          </div>

          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 mb-16 border border-gray-100">
            <h3 className="text-[20px] font-bold text-gray-900 mb-8">이런 분들에게 맞습니다</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              {[
                '이비인후과 검사에서 이상이 없다는 말만 들은 분',
                '이석증 치료를 받았는데 어지럼증이 계속 반복되는 분',
                '몸이 붕 뜨는 느낌, 물 위를 걷는 듯한 느낌이 지속되는 분',
                '앉았다 일어날 때 어지럽거나 머리에 압이 차는 느낌이 반복되는 분',
                '대학병원 검사도 모두 정상인데 어지럼증이 계속되는 분',
                '두통과 어지럼증이 함께 반복되는 분',
                '자세를 바꾸거나 목을 움직일 때 어지럼증이 심해지는 분',
              ].map((item) => (
                <div key={item} className="flex gap-3 text-[16px] text-gray-700 leading-[1.5] break-keep">
                  <span className="text-maekrak-blue font-bold">·</span> {item}
                </div>
              ))}
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 구성 — 기능과 구조를 함께</h3>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">기능적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">두맥탕 <span className="text-[16px] font-normal text-gray-500 ml-2">(자율신경 안정·뇌 혈류 회복)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  경추성 어지럼증이 주된 경우는 뇌 혈류 공급과 경막 긴장 완화에, 자율신경성 어지럼증이 주된 경우는 자율신경 균형 회복과 기립성 혈류 조절에 무게를 둡니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 (기본):</strong> <span className="text-gray-600 text-[14px]">자율신경 균형 회복과 뇌 혈류 안정화에 집중합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 A:</strong> <span className="text-gray-600 text-[14px]">기본 처방에 녹용이 추가됩니다. 만성화된 어지럼증, 전신 피로 동반 시 적용합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 S:</strong> <span className="text-gray-600 text-[14px]">녹용 함량이 가장 높은 처방. 오래되고 깊어진 어지럼증, 체력 저하가 심할 때 처방합니다.</span></div>
                </div>
              </div>
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">구조적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">약침 <span className="text-[16px] font-normal text-gray-500 ml-2">(후두하근·자율신경 직접 작용)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  경추성 어지럼증에서는 후두하근의 근방추 기능을 방해하는 긴장을 해소하고, 자율신경성 어지럼증에서는 교감신경절 주변 시술로 기립 시 뇌 혈류 조절을 안정시킵니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">어혈 약침:</strong> <span className="text-gray-600 text-[14px]">후두하근과 경추 주변 조직의 혈류를 회복시킵니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">소염 약침:</strong> <span className="text-gray-600 text-[14px]">신경 염증이 심하거나 어지럼증 발작 빈도가 높은 경우에 적용합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">녹용 약침:</strong> <span className="text-gray-600 text-[14px]">경추 구조 교정 후 인대와 신경 조직의 회복을 돕습니다.</span></div>
                </div>
              </div>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">추나 <span className="text-sm font-normal text-gray-500">(두개경추 정렬 교정)</span></h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">C0-C1, C1-C2 분절의 기능 이상을 바로잡아 경추성 어지럼증의 구조적 원인을 제거합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">자율신경검사</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">자율신경 균형 회복 경과를 수치로 확인하고 치료 방향을 조정합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">총명공진단</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">두맥탕과 함께 복용하면 어지럼증 회복 속도를 높이는 데 도움이 됩니다.</p>
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
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">이석 정복술</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">잘못 위치한 이석 교정</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">이석 외 원인에는 효과 없음</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">전정억제제·항구토제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">어지럼증 증상 일시 억제</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">근본 원인 미해결, 반복 재발</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">전정 재활 운동</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">전정 보상 기능 훈련</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">경추 고유수용성 감각 문제 미해결</td>
                  </tr>
                  <tr className="bg-blue-50/50">
                    <td className="py-4 px-6 text-[15px] font-bold text-maekrak-blue">맥락한의원</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">경추 고유수용성 감각 회복 + 자율신경 균형</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">귀 외의 원인까지 다뤄 재발 방지</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 단계</h3>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#1e3a8a]/20" />
                <div className="text-[#1e3a8a] font-bold mb-2">1단계: 집중 치료기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 2~3회, 약 4주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">어지럼증 발생 빈도와 강도를 빠르게 낮추는 것이 목표입니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#4a8fa8]/40" />
                <div className="text-[#4a8fa8] font-bold mb-2">2단계: 안정기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 1~2회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">어지럼증이 줄어드는 시기입니다. 치료 빈도를 조정하며 효과를 안정적으로 유지합니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#7ec8e0]/60" />
                <div className="text-[#3b7185] font-bold mb-2">3단계: 유지기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">2주~1개월 1회</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">두개경추 교정과 자율신경 균형이 회복된 상태를 유지하며 재발을 방지합니다.</p>
              </div>
            </div>
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 relative overflow-hidden">
            <div className="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none" />
            <h3 className="text-[20px] md:text-[24px] font-serif font-bold mb-6 relative z-10">맥락한의원을 선택해야 하는 이유</h3>
            <p className="text-white/90 text-[16px] md:text-[18px] leading-[1.8] font-light max-w-4xl break-keep relative z-10">
              이비인후과와 대학병원에서 해결되지 않던 어지럼증이 나아지는 이유는 하나입니다. <strong className="text-white font-medium">귀 외의 원인인 경추 고유수용성 감각 이상과 자율신경 불균형을 함께 교정해서 어지럼증이 반복되는 구조 자체를 없앴기 때문입니다.</strong>
              <br /><br />
              후두하근이 경직되면 근방추가 정확한 위치 신호를 보내지 못하고, 자율신경이 불균형하면 체위 변화에 따른 뇌 혈류 조절이 늦어집니다. 이석 정복술과 전정억제제는 이 구조를 다루지 않습니다.
            </p>
          </div>
        </section>
      </div>
    </div>
  );
}
