import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function CervicogenicDizziness() {
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
            <span className="text-[#7ec8e0]">경추성 어지럼증</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            경추성 어지럼증
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "경추성 어지럼증은 경추 기능 이상으로 인해 발생하는 어지럼증으로, 귀·뇌의 구조적 이상 없이 경추 고유수용성 감각 이상이 균형 인식의 불일치를 만들어 어지럼증이 나타나는 유형입니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <div className="prose prose-lg max-w-none text-gray-800 font-light leading-[1.8] break-keep">
              <p>우리가 위치를 인식하는 기관은 귀만이 아니다. 귀, 눈, 그리고 경추의 고유수용성 감각이 함께 작동해야 균형이 유지된다. 경추 후두하근은 다른 근육보다 근방추 밀도가 높아 머리 위치 인식에 핵심적인 역할을 한다.</p>
              <p className="mt-4">후두하근이 만성적으로 경직되면 근방추가 정확한 신호를 보내지 못한다. 실제 머리 위치와 뇌가 인식하는 머리 위치 사이에 불일치가 생기고, 귀와 눈에서 오는 정보와 충돌한다. 뇌는 이 충돌을 어지럼증으로 경험한다.</p>
              <p className="mt-4">빙빙 도는 회전성 어지럼증이 아닌 몸이 붕 뜨는 느낌, 물 위를 걷는 듯한 느낌, 가만히 있어도 머리가 흔들리는 것 같은 비회전성 어지럼증이라면 이비인후과 문제가 아닐 확률이 높다.</p>
              <p className="mt-4">맥락한의원은 경추성 어지럼증을 경추 기능부전 평가와 이학적 검사로 진단한다. MRI·CT에서 정상이어도 후두하근 근방추 기능 이상과 상부 경추 기능 이상은 직접 확인이 가능하다.</p>
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "목을 움직이거나 고개를 돌릴 때 어지럼증이 심해진다",
              "빙빙 도는 것이 아니라 몸이 붕 뜨는 느낌, 물 위를 걷는 듯한 느낌이다",
              "오래 앉아 일하거나 고개를 숙이고 있으면 어지럼증이 심해진다",
              "뒷목과 어깨가 항상 뻣뻣하고 어지럼증과 함께 두통이 온다",
              "이비인후과·신경과·응급실 검사에서 이상이 없다고 했는데 어지럼증이 계속된다",
              "가만히 있어도 머리가 흔들리는 것 같고 멍한 느낌이 든다"
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
            <p className="font-medium text-gray-800">균형을 만드는 세 가지 감각 시스템</p>
            <p>우리 몸이 균형을 유지하는 데는 세 가지 감각 시스템이 함께 작동합니다. 귀의 전정기관, 눈의 시각 정보, 그리고 근육과 관절에서 오는 고유수용성 감각입니다. 이 세 가지가 일치해야 뇌는 "내가 지금 어디 있는가"를 정확하게 인식합니다.</p>
            
            <p className="font-medium text-gray-800 mt-6">후두하근 근방추 — 경추성 어지럼증의 핵심</p>
            <p>경추의 후두하근은 다른 근육보다 근방추(muscle spindle) 밀도가 월등히 높습니다. 근방추는 근육의 길이와 긴장도를 감지해 뇌에 머리 위치 신호를 보내는 감각 수용체입니다. 후두하근의 근방추 밀도가 높다는 것은 이 근육이 머리 위치 인식에 핵심적인 역할을 한다는 의미입니다.</p>
            <p>후두하근이 만성적으로 경직되거나 기능이 저하되면 근방추가 정확한 신호를 보내지 못합니다. 실제 머리 위치와 뇌가 인식하는 머리 위치 사이에 불일치가 생기고, 귀와 눈에서 오는 정보와 충돌합니다. 뇌는 이 충돌을 어지럼증으로 경험합니다.</p>
            
            <p className="font-medium text-gray-800 mt-6">두개경추 기능 이상이 만드는 구조</p>
            <p>장시간 고개를 숙인 자세, 거북목·일자목 구조, 한쪽으로 치우친 작업 자세가 상부 경추에 만성 부하를 만듭니다. C0-C1, C1-C2 분절의 기능 이상이 고착되면 후두하근 근방추 기능이 지속적으로 저하됩니다. 이비인후과·신경과 검사가 정상이어도 어지럼증이 반복되는 이유가 여기 있습니다.</p>
            
            <p className="font-medium text-gray-800 mt-6">맥락한의원의 진단</p>
            <p>경추 기능부전 평가로 C0-C1, C1-C2 분절의 가동 범위와 기능 이상을 직접 측정합니다. 이학적 검사로 후두하근과 상부 경추 주변의 압통점을 확인합니다. 특정 부위를 눌렀을 때 어지럼증이 재현되거나 악화된다면 경추성 어지럼증의 원인 부위를 특정할 수 있습니다.</p>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                체질과 증상 패턴에 맞게 구성된 두맥탕으로 전신 순환을 개선합니다. 만성적인 경추 긴장은 국소 혈류 저하를 동반합니다. 혈류가 부족한 후두하근은 이완되기 어렵고 근방추 기능 회복도 더딥니다. 두맥탕은 후두하근과 경추 주변 조직에 충분한 혈류가 공급되는 환경을 만들어 약침·추나의 효과를 안정적으로 유지하는 역할을 합니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">약침</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                후두하근 4개 근육의 압통점과 C1·C2 분절 주변에 시술합니다. 만성 경직된 후두하근을 직접 이완시켜 근방추가 정확한 위치 신호를 보낼 수 있는 상태를 만듭니다. 경추 고유수용성 감각 신호가 정확해지면 귀·눈·경추 정보의 불일치가 줄어들면서 어지럼증이 완화됩니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                약침으로 후두하근을 충분히 이완시킨 후 추나를 진행합니다. 상부 경추 정렬을 교정해 후두하근이 이완된 상태를 구조적으로 유지합니다. 두개경추 정렬이 회복되면 근방추 기능이 정상화되고 경추 고유수용성 감각 기능이 안정적으로 회복됩니다.
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
                30대 남성, 미용사, MRI·CT 정상인데 일하기 어려운 어지럼증. 서서 일하면서 고개를 좌우로 움직이는 특성상 경추 부하가 쌓여 나타남. 경추 기능부전 평가에서 상부 경추 기능 이상 확인, 두맥탕·약침·추나 치료 시작 후 4주 뒤 증상 대폭 완화.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[14px] text-gray-600 leading-[1.7] break-keep mb-6">
                30대 남성, 증권사 재직, 하루종일 모니터를 보며 숫자를 확인하는 업무 특성상 고개를 고정하여 긴장이 고착됨. 3개월 차부터 어지럼증 소실되며 유지기 이후 종결. 기존 검사에서 보지 못한 감각 이상을 찾아 해결함.
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
                q: "이비인후과에서 이상이 없다고 했는데 왜 어지럼증이 계속 오나요?",
                a: "이비인후과 검사는 전정기관·이석 중심의 검사입니다. 귀에 이상이 없어도 경추 고유수용성 감각이 왜곡되면 어지럼증이 반복됩니다."
              },
              {
                q: "MRI·CT가 정상인데 경추 문제가 있을 수 있나요?",
                a: "MRI·CT는 디스크 탈출 등의 역학적 구조적 병변을 확인합니다. 후두하근 근방추의 기능적 이상은 영상의학적 검사에 나타나지 않아 이학적 평가가 중요합니다."
              },
              {
                q: "어지럼증이 나았다가 다시 오기를 반복합니다. 왜 그런가요?",
                a: "경추 긴장이 완전히 해소되지 않은 상태에서 같은 자세와 생활 패턴이 반복되면 재발합니다. 구조 교정 없이 이완만 시키면 원인이 남아 있기 때문입니다."
              },
              {
                q: "두통과 어지럼증이 함께 옵니다. 둘이 연관이 있나요?",
                a: "직접적인 연관이 있습니다. 두개경추 기능 이상은 두통과 어지럼증의 공통 기반으로, 후두하근이 경막을 당기며 두통을 유발하고 근방추 저하로 어지럼증을 만듭니다."
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
