import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function StudentHeadache() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      {/* 2층 Header */}
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium text-white/60 mb-6">
            <Link to="/headache" className="hover:text-white transition-colors">두통</Link>
            <ChevronRight className="w-4 h-4" />
            <span className="text-[#7ec8e0]">수험생 두통</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            수험생 두통
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              "수험생 두통은 장시간 학습, 수면 부족, 디지털 기기 과사용, 고정된 자세가 복합적으로 작용해 뇌 에너지를 만성적으로 고갈시키는 두통입니다. 집중력 저하, 브레인포그가 동반되는 경우가 많습니다."
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        
        {/* 맥락한의원 관점 */}
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100 mb-8">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <p className="text-[16px] md:text-[18px] text-gray-800 leading-[1.8] break-keep">
              수험생 두통의 근본은 뇌 에너지의 철저한 파산 상태입니다.<br /><br />
              시간이 급하다고 진통제로 덮어버린 결과는 약물과용 두통의 지옥일 뿐입니다. 맥락한의원은 뇌 에너지 대사를 순식간에 복원하여, 통증의 퇴치와 집중력·학습 성과 폭발적 향상이라는 두 마리 토끼를 일거에 사냥합니다.
            </p>
          </div>
        </section>

        {/* 증상 체크리스트 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {[
              "두통과 함께 머리가 멍한 브레인포그 동반",
              "아침 기상 시부터 찾아오는 헤비한 머리 묵직함",
              "인강, 스마트폰 시청 시 증상 가속",
              "뒷목, 어깨의 콘크리트 같은 강직",
              "진통제를 하루 2~3알 이상 들이부어야만 버티는 일상"
            ].map((item, idx) => (
              <div key={idx} className="flex items-start gap-4 p-5 rounded-xl bg-white border border-gray-200">
                <CheckCircle2 className="w-5 h-5 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[15px] md:text-[16px] text-gray-700 leading-[1.5] break-keep">{item}</span>
              </div>
            ))}
          </div>
        </section>

        {/* 한의학적 원인 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">왜 생기는가 — 한의학적 원인</h2>
          <div className="prose prose-lg max-w-none text-gray-800 leading-[1.8] break-keep">
            <p>
              감각 처리 한계를 넘은 폭발적 디지털 인풋으로 뇌피질은 매일 과열됩니다. 이 과열을 냉각시켜 줄 거북목, 일자목의 경추 파이프라인은 공부 자세로 인해 꽉 막혀있으며, 야간 취침 중 쓰레기를 비워내야 할 글림프 청소 시스템마저 극단적 수면 억제로 파괴되어 있습니다. 
            </p>
            <p className="mt-4 font-medium text-gray-800">
              뇌 에너지가 고갈된 최악의 사막 위에서 결국 터지는 불꽃이 바로 수험생 두통입니다.
            </p>
          </div>
        </section>

        {/* 치료 방법 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">맥락한의원에서는 어떻게 치료하나요</h2>
          
          <div className="space-y-6 mb-12">
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">두맥탕 & 총명공진단 결합</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                두통 진정제가 아닙니다. 고도의 뇌 에너지 집중 포션입니다. 전신 순환망을 수리하여 두통을 소거함과 동시에 무너진 집중력을 기적처럼 재부팅시킵니다.
              </p>
            </div>
            <div className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm">
              <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">하이엔드 약침 & 추나</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6]">
                치료 즉시 목의 후두하근 긴장을 날려 수험생이 "살 것 같다"는 실시간 피드백을 전달합니다. 추나를 통한 경추 재설정은 공부할수록 아픈 저주받은 물리적 메커니즘을 차단해냅니다.
              </p>
            </div>
          </div>
        </section>

        {/* 치료 사례 */}
        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">실제 치료 사례 요약</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 1</div>
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                공시 준비 중 진통제 한계치 초과(약물 과용 두통)로 찾아온 공시생. 억지로 진통제 중단 시 쏟아질 후폭풍을 두맥탕으로 선제 방어하며 연착륙 성공, 통증과 진통제 결별 성공.
              </p>
            </div>
            <div className="p-8 rounded-xl bg-gray-50 border border-gray-100">
              <div className="text-maekrak-blue font-bold mb-3">사례 2</div>
              <p className="text-[15px] text-gray-800 leading-[1.7] break-keep mb-6">
                회계사 2차 수험생 브레인포그 병합 케이스. 짧은 기간 안에 파워풀한 두맥탕 및 추나 투입으로 단기 통증 제압은 물론, 안개 낀 뇌 시야를 걷어내며 막판 집중력 스퍼트를 완성함.
              </p>
            </div>
          </div>
          <div className="text-center">
            <Link to="/blog" className="inline-flex items-center text-[15px] font-medium text-maekrak-blue hover:text-[#7ec8e0] transition-colors border-b border-current pb-0.5">
              자세한 사례 보기 (블로그) <ArrowRight className="w-4 h-4 ml-1" />
            </Link>
          </div>
        </section>

        {/* FAQ */}
        <section className="mb-24">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">자주 묻는 질문 FAQ</h2>
          <div className="space-y-4">
            {[
              {
                q: "치료받으러 올 시간조차 무서운데 어쩌죠?",
                a: "단순 통증을 위해 침대에 뻗어있는 기회비용이 수 십 배 큽니다. 치료로 확보된 맑은 뇌는 투자한 30분의 수 백 배 효율적 시간을 돌려드립니다."
              },
              {
                q: "진통제가 잘 드는데 굳이요?",
                a: "제일 위험한 시점입니다. 진통제 월 10일 이상 도달 시 만성 과용 두통 늪에 빠집니다. 약이 들을 때야 말로 가장 빠르고 확실한 완치 골든타임입니다."
              },
              {
                q: "학습 성적, 진짜 도움 되나요?",
                a: "백문이 불여일견입니다. 두통의 제거는 학습 최전선 피질의 에너지 최적화(글림프 펑션 정상 복구)를 뜻합니다. 같은 책을 봐도 파워와 몰입 자체가 쾌조를 띕니다."
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

        {/* Footer Navigation */}
        <div className="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100">
          <Link to="/headache" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
            <ArrowLeft className="w-4 h-4 mr-2" /> 두통 전체 보기
          </Link>
          <div className="flex gap-4">
            <Link to="/blog" className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors">
              블로그 글 보기 <ArrowRight className="w-4 h-4 ml-2" />
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
