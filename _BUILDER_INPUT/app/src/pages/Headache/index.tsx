import { useEffect } from 'react';
import { ArrowRight, CheckCircle2, ChevronRight, Stethoscope } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Headache() {
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
            두통 <span className="font-sans font-light text-white/50 text-[24px] md:text-[32px] ml-2 tracking-wide">Headache</span>
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl leading-[1.8] break-keep font-light">
            두통은 머리 부위에 발생하는 통증을 말하며 크게 두 가지로 나뉩니다. 두통 자체가 질병인 일차성 두통과 다른 질병의 증상으로 나타나는 이차성 두통이 있으며, <strong>대부분의 만성 두통은 일차성 두통입니다.</strong>
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
            <p className="text-[18px] md:text-[24px] leading-[1.6] text-gray-800 font-medium break-keep">
              "두통은 자율신경의 기능적인 문제와 경추의 구조적인 문제로 인해 생기는 <span className="text-maekrak-blue relative inline-block">뇌 에너지 불균형 상황에서 보내는 SOS 신호<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></span>입니다."
            </p>
          </div>
        </section>

        {/* 주요 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">두통, 왜 생기는 걸까요?</h2>
          <div className="prose prose-lg max-w-none text-gray-800 leading-[1.8]">
            <p className="mb-6">
              편두통은 뇌가 에너지 위기 상황에서 보내는 SOS 신호입니다. 연료 공급이 부족하거나 공급에 비해 소모가 과도할 때 뇌는 스스로 혈류를 늘리려 합니다. 
            </p>
            <p className="text-[18px] md:text-[20px] text-gray-800 font-medium leading-[1.6] p-6 border-l-4 border-maekrak-blue bg-gray-50 my-10">
              그 보상 반응으로 혈관이 확장되고 압력이 높아지며 두통이 생기는 것입니다.
            </p>
            <p>
              머리를 둘러싼 환경의 문제, 특히 <strong className="text-gray-900 font-semibold">경추의 틀어짐과 자율신경의 불균형</strong>이 뇌의 에너지 위기를 만들고 그 결과로 두통이 생기는 것입니다.
            </p>
          </div>
        </section>

        {/* 이런 경우 치료를 고려하세요 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-10 tracking-tight">이런 경우, 맥락한의원의 치료가 필요합니다</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            {[
              "신경과, 대학병원에서 약을 받아먹는데 점점 심해지는 경우",
              "진통제가 더 이상 듣지 않는 경우",
              "처방받은 예방약 부작용이 걱정되는 경우 (임신 전후 등)",
              "진통제를 통한 증상 완화 말고 근본적인 원인을 알고 고치고 싶은 경우",
              "두통약에 점차 의존하게 되는 경우 (약물과용 두통)"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-6 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[16px] md:text-[18px] text-gray-700 leading-[1.6] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        {/* 두통의 종류 */}
        <section className="mb-24 md:mb-32">
          <div className="flex items-center justify-between mb-10">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 tracking-tight">두통의 종류</h2>
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {[
              { name: '편두통', path: '/headache/migraine' },
              { name: '긴장형 두통', path: '/headache/tension' },
              { name: '약물과용 두통', path: '/headache/medication-overuse' },
              { name: '경추성 두통', path: '/headache/cervicogenic' },
              { name: '군발성 두통', path: '/headache/cluster' },
              { name: '생리 두통', path: '/headache/menstrual' },
              { name: '소아 편두통', path: '/headache/pediatric' },
              { name: '수험생 두통', path: '/headache/student' }
            ].map((type, idx) => (
              <Link key={idx} to={type.path} className="group block p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:bg-maekrak-navy hover:border-transparent transition-all duration-300">
                <h3 className="text-[18px] font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">{type.name}</h3>
                <div className="flex items-center text-[14px] font-medium text-maekrak-blue group-hover:text-[#7ec8e0] transition-colors">
                  자세히 보기 <ArrowRight className="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </div>
              </Link>
            ))}
          </div>
        </section>

        {/* 치료 프로그램 */}
        <section>
          <div className="text-center mb-16">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6 tracking-tight">맥락한의원의 두통 치료 프로그램</h2>
            <p className="text-[16px] md:text-[18px] text-gray-800 max-w-3xl mx-auto leading-[1.8] break-keep">
              맥락한의원 두통 치료는 <strong className="font-semibold text-gray-900">기능적 치료(두맥탕·총명공진단)와 구조적 치료(약침·추나)를 동시에 진행</strong>합니다. 약으로 신경계를 안정시키는 동시에 두개경추 불균형을 교정해야 두통이 재발하지 않기 때문입니다. 증상만 억누르는 것이 아니라 두통이 반복되는 원인 자체를 없애는 것이 치료 목표입니다.
            </p>
          </div>

          <div className="bg-[#f8f9fa] rounded-2xl p-8 md:p-12 mb-16 border border-gray-100">
            <h3 className="text-[20px] font-bold text-gray-900 mb-8">이런 분들에게 맞습니다</h3>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
              {[
                "진통제, 트립탄, 예방약을 수년 이상 복용했지만 두통이 반복되는 분",
                "아조비, 엠갤러티 주사를 맞아도 효과가 지속되지 않는 분",
                "대학병원 검사에서 이상 없다는 말만 들은 분",
                "약물과용두통이 생겨 약을 끊고 싶은 분",
                "임신 전 두통을 근본적으로 해결하고 싶은 분",
                "수년~수십 년 된 만성 두통으로 치료를 포기했던 분"
              ].map((item, id) => (
                <div key={id} className="flex gap-3 text-[16px] text-gray-700 leading-[1.5] break-keep"><span className="text-maekrak-blue font-bold">·</span> {item}</div>
              ))}
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">치료 구성 — 기능과 구조를 함께</h3>
            
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
              {/* 두맥탕 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">기능적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">두맥탕 <span className="text-[16px] font-normal text-gray-500 ml-2">(신경계 안정)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  맥락한의원이 두통 치료 경험과 최신 뇌과학 연구를 바탕으로 구성한 한약 처방입니다. 뇌 에너지 공급을 안정시키고 자율신경 균형을 회복하며 전신 순환을 개선하는 것이 목표입니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 (기본):</strong> <span className="text-gray-600 text-[14px]">자율신경 균형 회복과 뇌 에너지 안정화에 집중합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 A:</strong> <span className="text-gray-600 text-[14px]">기본 처방에 녹용이 추가됩니다. 만성화된 두통, 전신 피로 동반 시 적용합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">두맥탕 S:</strong> <span className="text-gray-600 text-[14px]">녹용 함량이 가장 높은 처방. 오래되고 깊어진 두통, 체력 저하가 심할 때 처방합니다.</span></div>
                </div>
              </div>

              {/* 약침 */}
              <div className="p-8 rounded-2xl bg-white border border-gray-200">
                <div className="inline-block px-3 py-1 bg-maekrak-blue/10 text-maekrak-blue font-bold text-[14px] rounded-lg mb-4">구조적 치료</div>
                <h4 className="text-[22px] font-bold text-gray-900 mb-4">약침 <span className="text-[16px] font-normal text-gray-500 ml-2">(신경·경막 직접 작용)</span></h4>
                <p className="text-[15px] font-light text-gray-600 leading-[1.7] mb-6 break-keep">
                  후두하근, C1-C2 분절, 삼차신경 경로에 직접 작용해 신경 과흥분과 경막 긴장을 해소합니다.
                </p>
                <div className="space-y-4">
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">어혈 약침:</strong> <span className="text-gray-600 text-[14px]">만성적으로 굳어있는 후두하근과 경추 주변 조직의 혈류를 회복시킵니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">소염 약침:</strong> <span className="text-gray-600 text-[14px]">삼차신경 과흥분이 심하거나 후두신경통 패턴이 있는 경우 염증을 억제합니다.</span></div>
                  <div className="break-keep"><strong className="text-gray-900 text-[15px]">녹용 약침:</strong> <span className="text-gray-600 text-[14px]">경추 구조 교정 후 인대와 신경 조직의 회복을 돕고 치료 효과를 지속시킵니다.</span></div>
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">추나 <span className="text-sm font-normal text-gray-500">(두개경추 정렬 교정)</span></h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">두개경추의 틀어짐을 교정합니다. C0-C1, C1-C2 분절의 기능 이상을 바로잡아 두통의 구조적 원인을 제거합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">자율신경검사</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">자율신경 기능을 수치로 평가합니다. 치료 시작 전 기저 상태를 측정하고 중간에 다시 측정해 회복 정도를 확인합니다.</p>
              </div>
              <div className="p-6 rounded-xl bg-gray-50">
                <h5 className="font-bold text-gray-900 mb-2">총명공진단</h5>
                <p className="text-[15px] text-gray-800 leading-[1.6]">뇌 영양 공급을 목적으로 한 공진단입니다. 두맥탕과 함께 복용하면 두통 회복 속도를 높이는 데 도움이 됩니다.</p>
              </div>
            </div>
          </div>

          <div className="mb-16">
            <h3 className="text-[24px] font-bold text-gray-900 mb-8">기존 두통 치료와 어떻게 다른가요?</h3>
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
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">진통제·트립탄</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">통증 신호를 일시적으로 차단</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">근본 원인 미해결, 약물과용두통 위험</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">아조비·엠겔러티</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">CGRP 차단</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">한달에 한번 계속 맞아야 함. CGRP 과분비 근본 해결X</td>
                  </tr>
                  <tr className="border-b border-gray-100">
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-800">도수치료, 마사지</td>
                    <td className="py-4 px-6 text-[15px] text-gray-600">근육 이완</td>
                    <td className="py-4 px-6 text-[15px] text-gray-500">두통의 핵심인 두개경추 교정X. 일시적인 이완</td>
                  </tr>
                  <tr className="bg-blue-50/50">
                    <td className="py-4 px-6 text-[15px] font-bold text-maekrak-blue">맥락한의원</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">신경계 기능적 안정 + 두개경추 구조적 균형</td>
                    <td className="py-4 px-6 text-[15px] font-medium text-gray-900">근본 원인을 해결함으로써 재발 방지에 초점</td>
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
                <p className="text-[15px] text-gray-700 leading-[1.6]">두통 빈도와 강도를 빠르게 낮추는 것이 목표입니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#4a8fa8]/40"></div>
                <div className="text-[#4a8fa8] font-bold mb-2">2단계: 안정기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">주 1~2회, 약 4~8주</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">두통 발작이 줄어드는 시기입니다. 치료 빈도를 조정하며 효과를 안정적으로 유지합니다.</p>
              </div>
              <div className="bg-white border border-gray-200 rounded-xl p-6 relative overflow-hidden">
                <div className="absolute top-0 left-0 w-full h-1 bg-[#7ec8e0]/60"></div>
                <div className="text-[#3b7185] font-bold mb-2">3단계: 유지기</div>
                <div className="text-[13px] text-gray-500 mb-4 bg-gray-50 inline-block px-2 py-1 rounded">2주~1개월 1회</div>
                <p className="text-[15px] text-gray-700 leading-[1.6]">구조적 교정이 안정되고 자율신경 균형이 회복된 상태를 유지하며 재발을 방지합니다.</p>
              </div>
            </div>
          </div>

          <div className="bg-maekrak-navy text-white rounded-2xl p-8 md:p-12 relative overflow-hidden">
            <div className="absolute right-0 top-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>
            <h3 className="text-[20px] md:text-[24px] font-serif font-bold mb-6 relative z-10">맥락한의원을 선택해야 하는 이유</h3>
            <p className="text-white/90 text-[16px] md:text-[18px] leading-[1.8] font-light max-w-4xl break-keep relative z-10">
              진통제와 예방주사로 해결되지 않던 두통이 나아지는 이유는 하나입니다. <strong className="text-white font-medium">두통의 근본 원인인 두개경추 불균형과 자율신경 불균형을 함께 교정해서 뇌 에너지 불균형을 바로잡았기 때문입니다.</strong>
              <br /><br />
              두개경추가 틀어지면 경추신경이 압박되고, 압박된 신경은 CGRP를 과분비시켜 편두통 발작을 만듭니다. 자율신경이 불균형하면 사소한 자극에도 뇌가 과민하게 반응해 두통이 반복됩니다. 진통제는 이 신호를 잠시 막을 뿐, 두개경추와 자율신경 문제는 그대로입니다. 맥락한의원은 이 두 가지를 동시에 잡습니다.
            </p>
          </div>
        </section>

      </div>
    </div>
  );
}
