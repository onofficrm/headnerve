import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function PanicAnxiety() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-maekrak-navy/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/autonomic" className="hover:text-white transition-colors">Autonomic</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">Panic / Anxiety</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            공황/불안장애
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            공황장애는 예고 없이 극심한 공포와 함께 심계항진·호흡 곤란·흉통·죽을 것 같은 느낌이 갑작스럽게 나타나는 발작이 반복되는 질환입니다. 불안장애는 일상적인 상황에서 과도한 불안과 긴장이 지속되는 상태입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Activity className="w-8 h-8 text-maekrak-blue" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                공황 발작은 <strong>자율신경계의 급격한 과반응</strong>입니다. 실제 위험이 없는 상황에서 교감신경이 극도로 활성화되면서 "뇌가 생명의 위협을 느끼는 것"입니다. 의지로 멈출 수 없는 이유가 바로 여기에 있습니다.
              </p>
              <p>
                공황장애의 근본 원인은 단순히 마음의 병이 아닙니다. <strong>교감신경 과흥분</strong>, <strong>부교감신경 기능 저하</strong>, <strong>뇌 혈류 안정성 저하</strong>(포도당과 산소 부족)라는 세 가지가 맞물려 뇌가 비상 상태를 오인하기 때문입니다.
              </p>
              <p>
                벤조디아제핀(정신과 약물) 계열은 발작 순간을 억제하는 데는 매우 빠르고 효과적입니다. 하지만 복용 횟수가 늘수록 의존성이 생기고 자율신경계의 자생적 균형 회복을 무디게 만듭니다.
              </p>
              <p>
                맥락한의원은 공황·불안장애를 자율신경계 교란으로 진단하며, <strong className="text-maekrak-navy font-bold inline-block relative">뇌를 근본적으로 안심시키는 것<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-blue/20 -z-10"></span></strong>을 치료의 핵심으로 삼습니다. 발작이 쉽게 일어나지 않는 단단한 환경을 만들어 냅니다.
              </p>
            </div>
          </div>
        </section>

        {/* 의심 증상 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">이런 증상이 있다면 의심하세요</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {[
              {
                title: "갑자기 두근거리며 죽을 것 같은 공포",
                desc: "예고 없이 극심한 공포와 신체 증상이 동시에 나타납니다. 응급실 심장 검사에서는 언제나 정상을 보입니다."
              },
              {
                title: "지하철 등 갇힌 공간에서의 극도 불안",
                desc: "빠져나오기 어려운 공간이나 예전 발작이 일어났던 상황에서 심장 박동이 치솟습니다."
              },
              {
                title: "항상 긴장하고 걱정이 끊이지 않음",
                desc: "불안장애의 특징. 잘못된 자율신경 평형으로 인해 뇌가 24시간 끊임없이 위험 신호 처리를 가동합니다."
              },
              {
                title: "정신과 약을 먹으면 멍하고 조절이 어려움",
                desc: "약이 중추신경게 전반을 억제하여 각성과 집중력, 활기까지 꺼버리기 때문입니다."
              },
              {
                title: "약 먹는 횟수 증가와 두려움 고착화",
                desc: "점점 약 없이는 외출이 힘들어지고, '또 발작이 오면 어쩌지'하는 예기불안이 고착화됩니다."
              },
              {
                title: "무기력함, 심한 피로, 우울 동반",
                desc: "뇌가 매일 비상 상태를 가동하느라 에너지를 방전시켜 우울감이 동반되기 쉽습니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-maekrak-blue/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-maekrak-blue shrink-0 mt-1" strokeWidth={2} />
                  <div>
                    <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-3">{item.title}</h3>
                    <p className="text-[15px] md:text-[16px] text-gray-600 leading-[1.7] break-keep font-light">{item.desc}</p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </section>

        {/* 한의학적 원인 */}
        <section className="mb-24 md:mb-32">
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 3대 발작 원인</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 text-maekrak-blue">1. 교감신경 과흥분</h3>
              <p className="text-[16px] text-gray-600 leading-[1.7] font-light break-keep">
                교감신경이 만성적으로 긴장되어 있으면 아주 작은 자극에도 폭발적으로 반응합니다. 임계점이 낮아져 있어 쉽게 방아쇠가 당겨집니다.
              </p>
            </div>
            <div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 text-maekrak-blue">2. 부교감신경 지표 저하</h3>
              <p className="text-[16px] text-gray-600 leading-[1.7] font-light break-keep">
                부교감신경은 과흥분에 '제동'을 겁니다. 이 브레이크 기능이 망가지면 한 번 시작된 패닉 상태가 스스로 멈추지 않고 길게 이어집니다.
              </p>
            </div>
            <div>
              <h3 className="text-[20px] font-bold text-gray-900 mb-4 text-maekrak-blue">3. 뇌 혈류 공급 불안정</h3>
              <p className="text-[16px] text-gray-600 leading-[1.7] font-light break-keep">
                두개경추 기능 이상으로 뇌에 산소와 포도당이 원활하지 않으면, 뇌는 이것을 '생명 위기'로 감지하고 즉각 비상(공황) 사이렌을 울립니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-maekrak-blue/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">심맥탕 <span className="text-[14px] font-normal text-white/60 block mt-1">(뇌 안심시키기)</span></h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  교감신경 과흥분을 내리고 뇌 혈류를 안정시켜 '뇌가 더 이상 비상 상태가 아님을' 깨닫도록 하는 핵심 처방입니다. 양약과 병행하며 서서히 의존도를 낮춥니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">약침 요법</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  두개경추와 흉추 교감신경절 부위에 직접 시술하여 뇌에 포도당과 산소가 안정적으로 들어가도록 막힌 혈류 통로를 열고 신경을 진정시킵니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">추나 / 객관적 수치 점검</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  두개경추 정렬을 교정하여 자극 없는 깨끗한 구조를 만들고, 주기적인 자율신경검사를 통해 자율신경 균형이 진짜 돌아오고 있는지 눈으로 확인시킵니다.
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* FAQ */}
        <section>
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">자주 묻는 질문</h2>
          <div className="space-y-6">
            {[
              {
                q: "정신과 약을 갑자기 끊어도 되나요?",
                a: "갑자기 끊으면 금단 및 반동 발작 증상이 강하게 옵니다. 자율신경 기능을 우리 치료로 채우면서 그 회복 속도에 맞춰 처방의와 상의하에 서서히 줄여나가야 합니다."
              },
              {
                q: "공황장애는 정신과에서 치료해야 하는 거 아닌가요?",
                a: "정신과 치료가 필요한 부분(증상의 급격한 억제)이 있습니다. 하지만 우리는 자율신경 '과반응 시스템' 자체를 정상화하는 다른 차원의 역할을 하므로 병행 시너지가 아주 큽니다."
              },
              {
                q: "공황장애와 불안장애가 많이 다른 건가요?",
                a: "공황은 극심한 발작이 폭발하는 형태고, 불안장애는 은은한 위기 상태가 매일 유지되는 차이입니다. 둘 다 자율신경의 잘못된 방어 기제에서 오므로 본원의 근본 치료 방향은 동일합니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-maekrak-blue">Q.</span> {faq.q}
                </h3>
                <p className="text-[16px] md:text-[17px] text-gray-600 leading-[1.7] font-light break-keep flex gap-4">
                  <span className="text-gray-400 font-bold">A.</span>
                  <span>{faq.a}</span>
                </p>
              </div>
            ))}
          </div>
        </section>
      </div>
    </div>
  );
}
