import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Diabetic() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-[#4a8fa8]/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/neuropathy" className="hover:text-white transition-colors">Neuropathy</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">Diabetic</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            당뇨병성 말초신경병증
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            지속적인 고혈당으로 미세혈관이 망가져 신경이 굶어 죽는 당뇨 합병증. 양말을 신은 듯한 저림과 화끈거림이 주된 특징입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Activity className="w-8 h-8 text-[#4a8fa8]" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                혈당을 잘 조절해도 <strong>이미 손상된 신경이 자동으로 회복되지는 않습니다.</strong> 혈당 조절은 추가 손상을 막는 방패일 뿐이며, 손상된 신경을 되살리려면 말초 혈류를 뚫어주는 별도의 치료가 반드시 필요합니다.
              </p>
              <p>
                당뇨병성 말초신경병증 증상은 발끝에서 시작해 발목·종아리·허벅지로 타고 올라오는 양상을 보입니다. 손상 진지가 넓어질수록 고치기가 어려워집니다. <strong>증상이 위로 올라오기 전에</strong> 신경 회복의 물꼬를 터야 합니다.
              </p>
              <p>
                맥락한의원은 <strong>전신 순환계(혈당 피로도)와 국소 신경 통로(오랜 포착)</strong> 두 가지를 다 엽니다. <strong className="text-[#3b7185] font-bold inline-block relative">내과적 혈류 회복과 외과적 압박 해제<span className="absolute bottom-1 left-0 w-full h-[6px] bg-[#4a8fa8]/20 -z-10"></span></strong>를 동시에 달성하는 것이 핵심입니다.
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
                title: "혈당이 내려갔는데도 저림이 낫지 않는다",
                desc: "이미 망가진 신경선은 혈당이 정상이 된다고 저절로 낫지 않습니다. 복구 작업이 필요합니다."
              },
              {
                title: "발끝 저림이 종아리·허벅지로 올라온다",
                desc: "증상이 상행하는 것은 신경이 점차 죽어가며 손상 범위가 확장되고 있다는 심각한 경고입니다."
              },
              {
                title: "양손까지 동시에 저리기 시작함",
                desc: "발에서 시작해 손까지 왔다면 목디스크보단 당뇨성 말초신경병증의 범람을 의심해야 합니다."
              },
              {
                title: "발에 상처나 화상을 입어도 잘 모른다",
                desc: "감각 신경이 완전히 죽어버리기 직전입니다. 당뇨발 궤양의 가장 큰 원인입니다."
              },
              {
                title: "디스크 치료만 수개월째 효과 없음",
                desc: "당뇨가 있는 상태에서 손발이 저리다면, 쓸데없는 척추 수술 전 말초신경 자체를 확인해야 합니다."
              },
              {
                title: "송곳으로 찌르는 듯한 한밤중의 통증",
                desc: "수면을 극도로 악화시키며 이로 인해 혈당과 피로가 다시 치솟는 악순환에 빠집니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-[#4a8fa8]/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-[#4a8fa8] shrink-0 mt-1" strokeWidth={2} />
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
          <div className="bg-[#f8f9fa] rounded-2xl p-8 lg:p-12 mb-10">
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6">고혈당이 신경을 어떻게 죽이는가</h2>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep mb-6">
              끈적해진 혈액(고혈당)이 지속되면 신경가지들을 감싸고 영양분을 대주는 <strong>미세 초소형 혈관들</strong>이 찌꺼기에 막혀 터지고 파괴됩니다. 
            </p>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
              신경도 세포이기에 피를 먹어야 사는데, 이 밥줄이 끊기니 심장에서 가장 먼 발끝 신경부터 서서히 말라 비틀어지며 에러 신호(작열감, 찌릿함, 저림)를 무한 방출하는 것입니다.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">전신 + 국소 동시 접근 필수</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
                당뇨로 혈관이 좁아진 <strong>'전신 흐름 저하'</strong>뿐 아니라 발목이나 무릎에서 신경이 기계적으로 눌리는 <strong>'국소 포착'</strong>이 흔하게 동반됩니다. 둘 다 열어줘야 피가 갑니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-[#4a8fa8]/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">통맥탕(通脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  손상된 모세혈관들을 대신하여 뚫고 지나가는 측부 혈류망을 강화하여 약재의 영양분이 어떻게든 말초까지 다다를 수 있게 처방을 구성합니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">어혈 / 소염 / 녹용 약침</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  발가락 끝, 발목 등의 막힌 어혈을 뚫고 염증을 소화하며, 녹용의 줄기세포적 영양성분이 너덜너덜해진 신경막을 복구하도록 돕습니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">추나 교정</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  허리나 목이 틀어져 있으면 여기서부터 말초로 가는 전류 신호가 약해집니다. 경추와 요추 척추 뿌리를 교정하여 신경 회복의 방해물을 치웁니다.
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
                q: "혈당 조절만 잘하면 서서히 저절로 낫지 않을까요?",
                a: "초기라면 가능할지 모르나 증상이 생긴 시점은 이미 혈관 파괴가 상당히 누적된 후입니다. 방치하면 계속 진행될 뿐이며 직접 신경을 살리는 치료가 필요합니다."
              },
              {
                q: "당뇨약·인슐린을 맞는 중인데 한방 치료와 병행 가능한가요?",
                a: "시너지가 납니다. 내과에서 혈당을 잡는 것은 '더 나빠짐'을 방어하는 것이고, 본원의 치료는 '망가진 것을 고치는' 복구 작업입니다."
              },
              {
                q: "발바닥부터 시작해 종아리 위까지 타고 올라왔습니다.",
                a: "빠른 결단이 필요합니다. 상행한다는 것은 신경이 죽어 올라온다는 뜻이며 허벅지까지 오면 회복이 매우 깁니다. 지금 선호되어야 할 것은 확장을 막고 밀어내리는 치료입니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-[#4a8fa8]">Q.</span> {faq.q}
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
