import { useEffect } from 'react';
import { CheckCircle2, ChevronRight, Activity } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Chemo() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-[#1e1e1e] px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-1/2 bg-gradient-to-l from-[#3a6b8c]/20 to-transparent" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium tracking-wider text-gray-400 mb-6 uppercase">
            <Link to="/neuropathy" className="hover:text-white transition-colors">Neuropathy</Link>
            <ChevronRight className="w-3 h-3" />
            <span className="text-[#89CFF0]">Chemo-induced</span>
          </div>
          <h1 className="font-serif text-[36px] md:text-[48px] lg:text-[56px] font-medium text-white leading-[1.25] mb-6 tracking-tight">
            항암 후 말초신경병증
          </h1>
          <p className="text-[18px] md:text-[22px] text-gray-300 max-w-3xl leading-[1.7] break-keep font-light">
            암을 죽이기 위해 투여된 항암제가 말초신경 세포까지 가차없이 독성을 입혀 발생하는 흔한 후유증입니다. 항암 치료가 끝나도 얼음장 같은 시림, 감각 저하가 계속됩니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        {/* 맥락한의원의 관점 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-gray-50 rounded-3xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div className="flex items-center gap-3 mb-8">
              <Activity className="w-8 h-8 text-[#3a6b8c]" strokeWidth={1.5} />
              <h2 className="text-[22px] md:text-[26px] font-bold text-gray-900 tracking-tight">맥락한의원의 관점</h2>
            </div>
            <div className="space-y-6 text-[18px] md:text-[20px] text-gray-800 leading-[1.8] font-light break-keep">
              <p>
                항암 후 말초신경병증(CIPN)은 <strong>"버티면 시간이 지나서 낫겠지"</strong>라는 막연한 기대로 방치하면 안 됩니다. 항암제 독성으로 인해 신경 세포와 모세혈관의 자생력이 모두 꺾인 상태이기 때문에 적극적인 회복 조치가 없으면 증상이 굳어버립니다.
              </p>
              <p>
                리리카, 뉴론틴 같은 처방약들은 예민해진 통증 신호를 억제하여 고통을 줄일 뿐 손상된 신경 자체를 조립하여 회복시키지는 못합니다. 약을 먹어도 <strong>감각이 돌아오지 않고 먹먹하다면</strong> 직접적인 신경 재생 치료가 필요합니다.
              </p>
              <p>
                맥락한의원은 <strong className="text-gray-900 font-bold border-b border-[#3a6b8c]/50">1단계: 증상 악화 방어 및 안정화 / 2단계: 실제 신경 감각 회복</strong> 의 전략적인 로드맵을 따라 항암 생존자들의 파괴된 삶의 질을 복구합니다.
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
                title: "항암 치료가 끝났는데 손발 저림 계속",
                desc: "시간이 지나면 나아진다는 주치의 말에 수개월을 참았으나 회복 기미조차 보이지 않습니다."
              },
              {
                title: "시간이 갈수록 양말 신은 듯 감각 둔화",
                desc: "찌릿함을 넘어 살가죽이 두꺼워진 느낌, 둔탁해지는 느낌은 감각 신경이 죽어가는 것입니다."
              },
              {
                title: "발가락·다리에 힘이 없고 걷기가 불편함",
                desc: "항암 독성이 감각신경을 넘어 '운동신경'까지 파괴하고 있다는 매우 좋지 않은 신호입니다."
              },
              {
                title: "리리카를 먹어도 둔탁한 감각은 남음",
                desc: "약물은 통증과 작열감은 덮어줄 수 있으나, 죽어버린 무뎌진 감각 살은 복구하지 못합니다."
              },
              {
                title: "손으로 물건을 잡을 때 자꾸 놓친다",
                desc: "손끝 감각 저하와 미세 근력 저하가 동반된 전형적인 항암 후유증입니다."
              },
              {
                title: "차가운 바닥에 발을 대면 얼음처럼 시림",
                desc: "극심한 혈류 순환 장애와 신경 염증이 동반된 극한의 시림이 나타납니다."
              }
            ].map((item, idx) => (
              <div key={idx} className="bg-white p-8 rounded-2xl border border-gray-100 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:border-[#3a6b8c]/30 transition-colors">
                <div className="flex items-start gap-4">
                  <CheckCircle2 className="w-6 h-6 text-[#3a6b8c] shrink-0 mt-1" strokeWidth={2} />
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
            <h2 className="text-[28px] md:text-[34px] font-bold text-gray-900 mb-6">항암제의 강력한 신경 파괴력</h2>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep mb-6">
              백금계열(옥살리플라틴 등), 탁산계열 등 강력한 표적·화학항암제들은 암세포를 터트리며 우리 몸의 가장 연약한 말초신경의 미토콘드리아와 껍질(수초)을 무참히 파괴합니다.
            </p>
            <p className="text-[16px] md:text-[18px] text-gray-600 leading-[1.8] font-light break-keep">
              가장 길고 연약한 발가락 끝, 손가락 끝부터 타격을 입으며, 항암 약물이 체내에서 빠져나갔다 하더라도 이미 박살난 신경망에는 재생을 돕는 혈류가 들어오지 못해 <strong>영구 손상 상태</strong>로 굳어지게 됩니다. 이것을 뚫어 말초 펌프질을 해주는 것이 회복의 첫 단추입니다.
            </p>
          </div>
        </section>

        {/* 맥락한의원 치료 */}
        <section className="mb-24 md:mb-32">
          <div className="bg-[#1e1e1e] rounded-[40px] p-10 md:p-16 lg:p-20 text-white relative overflow-hidden">
            <div className="absolute right-0 bottom-0 w-2/3 h-2/3 bg-[#3a6b8c]/10 blur-[100px] rounded-full pointer-events-none" />
            <h2 className="text-[32px] md:text-[40px] font-serif font-medium mb-12 relative z-10">맥락한의원 치료 과정</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-10 relative z-10">
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">통맥탕(通脈湯)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  바닥을 친 몸의 기력과 전신 순환을 우선적으로 추스르며 혈류를 맹렬히 돌려, 손발 끝 황무지까지 재생 파동이 도달할 수 있게 처방의 기초를 잡습니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">어혈 / 소염 / 녹용 약침</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  항암 후유증으로 극도로 체력이 저하된 신경절에 녹용의 강한 영양분과 소염/어혈 성분을 주사 형태로 직접 찔러 넣어 세포 부활을 강제합니다.
                </p>
              </div>
              <div>
                <h3 className="text-[22px] font-bold text-[#89CFF0] mb-4">구조적 불균형 해소 (추나)</h3>
                <p className="text-white/80 leading-[1.7] font-light break-keep">
                  긴 투병 생활 중 틀어진 경추/요추 부위 신경 출구를 넓혀주어, 기껏 만든 영양분과 재생 신호가 발끝까지 잘 내려가게 척추 고속도로를 정비합니다.
                </p>
              </div>
            </div>
            
            <div className="relative z-10 bg-white/5 rounded-2xl p-8 border border-white/10 mt-10 flex flex-col md:flex-row gap-6 items-center">
              <div className="bg-[#89CFF0] text-maekrak-navy font-bold px-4 py-2 rounded-lg whitespace-nowrap">
                FAQ 공포 환자분들께
              </div>
              <p className="text-white/80 leading-[1.6]">
                한약을 먹으면 암이 전이/재발될까 봐 끔찍히 두려워하시는 것을 압니다. 맥락한의원은 암을 자극하는 약재를 극도로 자제하고 <strong>염증 치료 및 재생 순환</strong>에만 철저히 집중 검증된 처방으로 돕기 때문에 안심하셔도 됩니다.
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
  );
}
