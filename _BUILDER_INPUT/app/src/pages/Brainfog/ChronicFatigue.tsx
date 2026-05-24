import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Brain } from 'lucide-react';
import { Link } from 'react-router-dom';

export function ChronicFatigue() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-maekrak-green/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/brainfog" className="hover:text-white transition-colors">Brainfog</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-maekrak-green">Chronic Fatigue</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            만성피로 브레인포그
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            지속적인 피로감과 함께 머리가 멍하고 집중력·기억력이 저하되는 상태가 반복되는 것으로, 아무리 자고 쉬어도 회복되지 않는 극심한 방전 상태입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Brain className="w-8 h-8 text-maekrak-green" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                만성피로 브레인포그의 배후는 단순한 체력 고갈이 아닙니다. 스트레스 조절 기관인 <strong>부신(Adrenal gland)의 완전한 셧다운</strong>과 뇌 노폐물 청소 시스템인 <strong>글림프 기능의 마비</strong>가 빚어낸 총체적 난국입니다.
              </p>
              <p>
                현대 사무직의 모니터 집중 업무는 눈과 뇌의 피질에 엄청난 과흥분을 강제합니다. 육체적 노동 없이 정신만 팽팽히 당겨진 채 하루 종일 앉아있는 습관과 퇴근 후 스마트폰 시청은 뇌에 쉴 틈을 0.1초도 주지 않습니다.
              </p>
              <p>
                자도 피로가 풀리지 않는 것은 <strong>'수면의 양'이 아니라 '수면의 질'이 엉망</strong>이기 때문입니다. 교감신경의 긴장 상태로 깊은 수면에 들어가지 못하니 노폐물 청소가 패스된 채 다음날 깨어나게 됩니다. 맥락한의원은 이 부러진 <strong className="text-maekrak-navy font-bold inline-block relative">수면 구조와 부신 펌프<span className="absolute bottom-1 left-0 w-full h-[6px] bg-maekrak-green/20 -z-10"></span></strong>를 고칩니다.
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
                title: "자도 피로가 풀리지 않고 아침 기상이 지옥이다",
                desc: "수면 중 뇌 청소(글림프 작동)가 이루어지지 않은 채 눈만 뜬 상태입니다."
              },
              {
                title: "오전엔 머리가 죽고 오후에 얕게 살아나는 패턴",
                desc: "부신의 코르티솔(기상 호르몬) 분비 리듬이 완전히 망가져 오전에 각성을 못하는 전형압니다."
              },
              {
                title: "머리에 안개가 낀 것처럼 멍하고 버벅거린다",
                desc: "뇌에 배출되지 못한 단백질 노폐물이 쌓이며 신경절 사이의 통신이 느려진 상태입니다."
              },
              {
                title: "최근 들어 기억력이 눈에 띄게 감퇴되었다",
                desc: "과부하된 뇌가 불필요한 에너지를 막기 위해 단기 기억 저장 스위치 전력을 꺼버린 것입니다."
              },
              {
                title: "하루 종일 모니터를 보는 직군이다",
                desc: "장시간 디지털 자극과 갇힌 자세는 뇌 피질 과흥분과 경추 압박을 동시에 만듭니다."
              },
              {
                title: "커피(카페인) 없이는 오전 업무를 볼 수 없다",
                desc: "방전된 부신을 억지로 쥐어짜는 최악의 임시 방편으로, 부신 피로를 더 가속화시킵니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-maekrak-green/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-maekrak-green shrink-0 mt-1" strokeWidth={2} />
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
          <h2 className="text-[32px] md:text-[40px] font-bold text-gray-900 mb-12 tracking-tight">왜 생기는가 — 한의학적 주요 원인</h2>
          <div className="bg-[#f8f9fa] rounded-2xl p-8 lg:p-12 mb-10">
            <h3 className="text-[24px] font-bold text-gray-900 mb-6">부신 피로 (코르티솔의 파산)</h3>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep mb-6">
              스트레스를 견디는 호르몬 공장인 '부신'은 마감, 성과, 야근 등 현대인의 연속된 재난 경보 속에서 코르티솔을 과다 분비하다 결국 공장 문을 닫아버립니다(고갈). 이 기관이 멈추면 아침에 에너지 시동이 절대 안 걸립니다.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">글림프 기능 저하 (뇌 하수도 마비)</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
                깊은 수면인 '서파 수면' 상태에 도달해야만 뇌 세포가 쪼그라들면서 그 사이로 뇌척수액이 물청소를 하는 글림프액 작용이 일어납니다. 수박 겉핥기 잠으로는 이 물청소가 시작조차 되지 않아 염증물질이 뇌에 남습니다.
              </p>
            </div>
            <div>
              <h3 className="text-[24px] font-bold text-gray-900 mb-6">스마트폰과 거북목의 콜라보</h3>
              <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
                멍 때리는 기본 휴식 망인 DMN(Deafault Mode Network)이 숏폼 등 자극으로 전혀 쉬질 못합니다. 여기에 모니터를 보는 거북목 자세가 두개경추(C1)를 눌러 뇌 혈관의 입구마저 틀어막습니다. 완전히 고립된 성과 같습니다.
              </p>
            </div>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-maekrak-green/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">두맥탕(頭脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  텅 빈 배터리인 부신의 기운을 최우선적으로 붓고, 코르티솔의 분비 리듬 스위치를 아침으로 재정렬하여 자가 각성력을 복원합니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">총명공진단</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  값비싼 사향과 최정예 약재들을 응축한 특효처방으로, 물리적인 뇌 혈류를 강력하게 위로 쏘아올려 글림프 펌프질을 재가동시킵니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">경추 약침</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  하루 10시간 이상 굳어 목뼈 사이에 엉겨붙은 후두하근과 염증에 직접 침투하여 경직을 파쇄하고 뇌 하수구를 뚫어냅니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">구조 추나 교정</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  뻣뻣한 일자목, 거북목 구조 자체를 펴주어 치료가 끝난 후 사무실로 돌아가도 곧바로 증상이 재발하지 않도록 기초 토목 공사를 다집니다.
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
                q: "휴가를 길게 다녀왔는데도 почему 피로가 안 풀리나요?",
                a: "바닥난 부신 기능과 멈춰버린 뇌 청소 시스템은 며칠 바다를 보고 온다고 물리적으로 켜지지 않습니다. 장기간 누적된 고장은 리셋이 아니라 '수리'가 필요합니다."
              },
              {
                q: "생명수인 아아(아이스 아메리카노)를 끊어야 하나요?",
                a: "카페인은 부신을 가불해서 쥐어짜는 일시적 채찍질입니다. 부신 피로를 최악으로 망칩니다. 다만, 바로 끊으면 금단 무기력이 심하므로 치료와 함께 서서히 줄여가도록 가이드합니다."
              },
              {
                q: "직장 생활, 야근이 많은데 치료 병행이 가능한가요?",
                a: "오히려 더 필요합니다. 주 1~2회 잠시 짬을 내어 받는 약침과 추나만으로 뒷목 순환이 터지면, 업무 효율이 올라가고 야근의 악순환 꼬리를 자를 수 있는 체력이 생깁니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-maekrak-green">Q.</span> {faq.q}
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
