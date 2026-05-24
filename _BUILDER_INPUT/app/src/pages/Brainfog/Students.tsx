import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Brain } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Students() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-[#3b82f6]/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/brainfog" className="hover:text-white transition-colors">Brainfog</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#3b82f6]">Students</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            수험생 브레인포그
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            아무리 공부해도 머리에 남지 않는 억울함. 수면 부족과 장시간 공부 지옥이 뇌 에너지를 고갈시키고 집중력과 기억력 수치를 나락으로 떨어뜨리는 구조적 뇌 방전 상태입니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Brain className="w-8 h-8 text-[#3b82f6]" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                수험생 브레인포그는 학생의 <strong>노력이나 멘탈 문제가 절대 아닙니다.</strong> 뇌라는 슈퍼 컴퓨터가 요구하는 전력은 공급되지 않는데, 풀가동만 억지로 시키면 결국 시스템이 극강의 렉이 걸리는 물리적(기질적) 현상입니다.
              </p>
              <p>
                책상 앞의 고정 자세로 두개경추(목)의 통로가 꽉 막히고, 인강용 태블릿/디지털 화면에 피질은 만성으로 과흥분되며, 줄인 잠 탓에 뇌의 밤 청소(글림프 배출)는 셧다운되었습니다. 이 3가지 콤보가 뇌의 저장 용량을 0에 가깝게 리셋시킵니다.
              </p>
              <p>
                잠을 쪼개서 8시간을 멍하게 책상에 앉아있는 것보다, <strong>물리적 청소와 식사(뇌 혈류 개방)</strong>를 갖춘 초집중의 6시간이 수험의 성패를 가릅니다. 맥락한의원은 <strong className="text-maekrak-navy font-bold inline-block relative">막힌 경추 해빙과 직접적인 뇌 부스팅<span className="absolute bottom-1 left-0 w-full h-[6px] bg-[#3b82f6]/20 -z-10"></span></strong>을 만듭니다.
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
                title: "글자는 보이지만 내용이 전혀 뇌로 남지 않는다",
                desc: "에너지가 고갈된 뇌가 외부 정보를 처리할 전력을 아예 끊어버려, 의미 해석 기능이 마비된 것입니다."
              },
              {
                title: "아무리 외워도 방금 본 것이 백지화된다",
                desc: "단기 기억을 장기 기억으로 넘기는 해마의 작업장에 쓰레기(피로물질)가 쌓여 작동이 정지되었습니다."
              },
              {
                title: "책상에 앉으면 뒷목이 미친 듯이 뻣뻣하고 조인다",
                desc: "10시간 이상 고개 숙인 거북목이 뇌로 올라가는 피의 통로를 목줄 조르듯 옭아매고 있는 물리적 현상입니다."
              },
              {
                title: "공부 시간 대비 모의고사 성취/업풋이 너무 낮다",
                desc: "투자되는 시간과 에너지 대비 현저한 연비 불량 상태, 뇌 효율이 최악의 바닥을 찍고 있다는 증명입니다."
              },
              {
                title: "머리에 커다란 구름이 낀 것처럼 항상 멍하다",
                desc: "깊은 수면 부족으로 뇌 청소기(글림프액)가 돌지 않아 일주일치 신경 단백질 찌꺼기가 뇌에 부패 중입니다."
              },
              {
                title: "커피, 에너지 드링크 먹으면 심장만 뛰고 집중 불가",
                desc: "신경 회복 없이 카페인으로 심장과 빈 뇌를 채찍질하면 자율신경계 교란으로 교감신경의 헛바퀴만 돕니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-[#3b82f6]/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-[#3b82f6] shrink-0 mt-1" strokeWidth={2} />
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
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6">뇌 에너지 광탈의 3콤보</h2>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep mb-6">
              인체 에너지의 20% 이상을 빨아먹는 블랙홀이 바로 뇌입니다. 집중 학습은 이를 초과 가동합니다. 그러나 공급은 끊깁니다. 모니터/인강과 숏폼의 <strong>쉬지 못하는 뇌(디지털 흥분)</strong>, 잠을 죽여 청소를 포기하는 <strong>글림프 마비(수행시간 증대)</strong>, 고개 숙인 <strong>일자목 통로 폐쇄</strong>가 맞물리니 뇌가 굶어 질식하는 것은 당연합니다.
            </p>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-[#3b82f6]/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 두뇌 회복 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">두맥탕(頭脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  텅 빈 뇌 에너지 탱크에 연료를 부어주어 대사를 일으키고, 교감신경을 안정시켜 불안감을 끄며 침착한 집중 모드로 돌파력을 끌어올립니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#fde047] mb-4 flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-[#fde047]"></span>
                  총명공진단 (가장 강력한 부스터)
                </h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  수험 치료의 궁극적인 치트키입니다. 시중 약국약과 다르게 진짜 녹용과 사향을 응축해 곧바로 뇌 혈류를 터트려, 짧은 수면 후에도 뇌를 리셋하여 맑게 깨웁니다. 두맥탕과 병용 시 미친 효율을 냅니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">약침 & 추나 이완</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  경직된 후두하근과 상부 경추(C1, C2)를 타겟팅한 약침은 <strong>맞고 일어서는 순간 뒷목이 뻥 뚫리고 시력이 선명해지는</strong> 직관적 느낌을 가장 빠르게 줍니다.
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
                q: "치료를 받으면 진짜 성적이 오를까요?",
                a: "공부를 대신해 드릴 순 없으나, 멍하게 3페이지 볼 시간에 맑은 상태로 10페이지를 흡수하게 만듭니다. 같은 1시간을 써도 뇌에 파고드는 '조직적 효율(연비)'이 압도적으로 달라져 아웃풋이 극명해집니다."
              },
              {
                q: "수능이, 혹은 자격시험이 코앞인데 지금 와도 될까요?",
                a: "네. 구조적 약침 시술은 즉각적인 뒷목 해빙을 주며 공진단과 탕약도 2~3주면 머리가 돌아가는 것을 체감합니다. 하루가 급한데 브레인포그 상태로 시간을 버리는 게 더 미련한 선택입니다."
              },
              {
                q: "잠이 너무 아까워요. 수면을 줄여서라도 공부해야 하는데...",
                a: "가장 최악의 전략입니다. 뇌는 책상에서 외운 걸 '자는 동안(특히 깊은 잠)'에만 장기기억으로 복사합니다. 수면을 박탈하면 어제 한 공부를 쓰레기통에 스스로 버리는 짓이자, 염증을 쌓아 다음날을 망치는 행위입니다."
              }
            ].map((faq, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition-shadow">
                <h3 className="text-[18px] md:text-[20px] font-bold text-gray-900 mb-4 flex gap-4">
                  <span className="text-[#3b82f6]">Q.</span> {faq.q}
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
