import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function MenieresDisease() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium text-white/60 mb-6">
            <Link to="/dizziness" className="hover:text-white transition-colors">어지럼증</Link>
            <ChevronRight className="w-4 h-4" />
            <span className="text-[#7ec8e0]">메니에르병</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            메니에르병
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "메니에르병은 내이의 내림프액 과잉으로 인해 회전성 어지럼증·난청·이명·이충만감이 반복적으로 나타나는 질환입니다. 발작은 수십 분에서 수 시간 지속되며, 반복될수록 청력 손실이 누적되는 경향이 있습니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <div className="prose prose-lg max-w-none text-gray-800 font-light leading-[1.8] break-keep">
              <p>메니에르병 환자 그룹에서 경추 질환이 대조군보다 유의미하게 많이 나타납니다. 특히 두개경추(환추-후두, 환추-축추 관절)의 기능 이상과 머리·목 움직임이 메니에르 발작과 강한 연관성을 보입니다.</p>
              <p className="mt-4">내림프액 과잉의 배경에는 경추 정맥계 배액 장애가 있습니다. 뇌의 체액과 노폐물이 경추 정맥계를 통해 배출되지 못하면 두개내압이 높아지고, 이것이 내림프액 흡수를 방해해 메니에르 발작으로 이어질 수 있습니다.</p>
              <p className="mt-4">이뇨제는 내림프액 양을 일시적으로 줄이지만 왜 과잉 생성되는지는 다루지 않습니다. 겐타마이신 주사는 전정 기능을 의도적으로 손상시켜 어지럼증 신호를 차단하지만 청력 손실 위험이 있고 근본 원인은 그대로 남는 문제가 있습니다.</p>
              <p className="mt-4">맥락한의원은 메니에르병을 두개경추 기능 이상과 경추 정맥계 배액 장애, 귀로 가는 혈류 공급 저하의 복합 구조로 봅니다. 이 구조를 해소하지 않으면 내림프액 양을 일시적으로 줄여도 발작은 반복됩니다.</p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "갑자기 세상이 빙빙 도는 극심한 회전성 어지럼증이 수십 분~수 시간 지속된다",
              "어지럼증 발작과 함께 한쪽 귀가 먹먹해지고 소리가 잘 안 들린다",
              "한쪽 귀에서 웅웅거리거나 바람 소리 같은 이명이 지속된다",
              "귀 안이 꽉 찬 듯 압박감이 느껴진다 (이충만감)",
              "목을 움직이거나 특정 자세에서 어지럼증이 심해진다",
              "이뇨제를 복용하는 동안은 낫지만 끊으면 발작이 다시 온다"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-5 rounded-xl bg-white border border-gray-200">
                <CheckCircle2 className="w-5 h-5 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[15px] md:text-[16px] text-gray-700 leading-[1.5] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">왜 생기는가 — 한의학적 원인</h2>
          <div className="prose prose-lg max-w-none text-gray-600 font-light leading-[1.8] break-keep">
            <p className="font-medium text-gray-800">두개경추 기능 이상과 경추 정맥계 배액 장애</p>
            <p>뇌의 체액과 노폐물은 경추 정맥계를 통해 뇌 밖으로 배출됩니다. 두개경추가 틀어지고 경추 주변 조직이 만성 경직되면 이 배액 통로가 좁아집니다. 배액이 제대로 이뤄지지 않으면 두개내압이 높아지고, 압력이 내림프액 흡수를 방해해 발작으로 이어질 수 있습니다.</p>
            <p className="font-medium text-gray-800 mt-6">귀로 가는 혈류 공급 저하</p>
            <p>내이는 혈류 공급에 매우 민감한 기관입니다. 경추 기능 이상으로 혈류가 줄어들면 내림프액 생성과 흡수 불균형이 초래되어 발작의 기반이 됩니다.</p>
            <p className="font-medium text-gray-800 mt-6">턱관절과의 연결</p>
            <p>턱관절 기능 이상이 두개경추에 추가적 부하를 줘 경추 정맥계 배액을 더욱 방해할 수 있습니다. 턱의 움직임과 귀 증상이 강한 연관을 보입니다.</p>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                체질과 패턴에 맞게 구성된 두맥탕은 내이로 가는 혈류 공급을 안정시키고 내림프액 생성과 흡수의 균형을 회복할 수 있는 환경을 만듭니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근과 C1, C2 분절 주변에 시술해 경추 정맥계 배액을 방해하는 긴장을 직접 해소합니다. 구조 완화로 두개내압 안정화의 단초가 됩니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                두개경추의 정렬을 바로잡아 경추 정맥계 배액이 원활해지게 하며 내림프액 흡수를 개선합니다. 필요할 경우 턱관절 추나를 동반합니다.
              </p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                40대 남성. 이명·난청·이충만감이 주된 문제였고 메니에르 진단을 받음. 이뇨제와 스테로이드를 복용했으나 중단시 증상 재발. 두개경추 기능 이상 확인 후 탕약, 침, 추나 치료 개시하여 3주차부터 이명 감소. 이후 안정기 유지 치료로 종결.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                5년간 반복 재발하던 메니에르병 환자. 증상 완화와 재발의 반복, 최근 발작이 잦아져 방문. 두개경추 배액 통로가 좁아진 것을 바로잡아 순환을 확보하고 두맥탕 치료 결과 발작 빈도 감소, 안정화 확인 후 종결 성공.
              </p>
            </div>
          </div>
          <div className="text-center">
            <Link to="/blog" className="inline-flex items-center text-[15px] font-medium text-maekrak-blue hover:text-[#7ec8e0] transition-colors border-b border-current pb-0.5">
              자세한 사례 보기 (블로그) <ArrowRight className="w-4 h-4 ml-1" />
            </Link>
          </div>
        </section>

        <section className="mb-24">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">자주 묻는 질문 FAQ</h2>
          <div className="space-y-4">
            {[
              {
                q: "이뇨제를 복용 중인데 한의원 치료와 병행할 수 있나요?",
                a: "가능합니다. 이뇨제는 수분을 배출하여 양을 일시적으로 줄이지만 내이 혈류 정상화라는 맥락한의원 치료와 타겟이 달라서 발작을 줄이며 원인을 병행 대처하면 치료에 더 도움이 됩니다."
              },
              {
                q: "겐타마이신 주사를 맞고 청력이 더 떨어졌는데, 회복이 가능한가요?",
                a: "완전한 회복 여부는 세포 손상에 따르지만 잔존 청력의 보존 및 이명 완화에 큰 도움이 되며, 상태 악화를 막는 것이 기본 목표입니다."
              },
              {
                q: "메니에르병과 경추성 어지럼증은 어떻게 구별하나요?",
                a: "메니에르병은 어지럼증에 난청·이명 등이 함께 나타나지만 경추성 어지럼증은 단일 어지럼 증상에 주로 그칩니다."
              },
              {
                q: "발작이 없는 기간에도 치료를 받아야 하나요?",
                a: "발작이 멈춰도 구조 문제가 남았으면 언제든 재발할 수 있어 이 시기의 교정 치료가 다음 재발 방지를 이끄는 핵심입니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="p-6 rounded-xl border border-gray-200">
                <h4 className="text-[16px] font-bold text-gray-900 mb-2 flex items-start gap-2">
                  <span className="text-maekrak-blue">Q.</span> {faq.q}
                </h4>
                <p className="text-[15px] text-gray-600 leading-[1.6] pl-6 break-keep">
                  <span className="font-bold text-gray-400 mr-2">A.</span> {faq.a}
                </p>
              </div>
            ))}
          </div>
        </section>

        <div className="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100">
          <Link to="/dizziness" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
            <ArrowLeft className="w-4 h-4 mr-2" /> 어지럼증 전체 보기 (1층)
          </Link>
          <div className="flex gap-4">
            <Link to="/blog" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
              블로그 글 보기 (3층) <ArrowRight className="w-4 h-4 ml-2" />
            </Link>
            <a href="tel:02-6959-7252" className="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-maekrak-navy text-white hover:bg-[#1a3276] transition-colors font-medium">
              상담 예약하기
            </a>
          </div>
        </div>

      </div>
    </div>
  );
}
