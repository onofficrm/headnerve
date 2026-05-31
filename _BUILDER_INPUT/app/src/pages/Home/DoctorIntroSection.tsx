import { Link } from 'react-router-dom';

const proofItems = [
  {
    icon: '전문의 자격',
    num: '침구과',
    label: '대학병원 인턴·레지던트 4년 수료\n침구과 전문의 국가고시 합격',
  },
  {
    icon: '국제 학술',
    num: '2개국',
    label: '독일 뮌헨 ICMART-iSAMS 연구발표(2018)\n제67회 전일본침구학회 초청 학술교류',
  },
  {
    icon: '공공 수상',
    num: '장관 표창',
    label: '보건복지부 장관 표창 수상\n충청남도 도지사 표창 수상 (코로나19 역학조사 공로)',
  },
];

const credentials = [
  '침구과 전문의 (대학병원 레지던트 4년 + 국가고시)',
  '대한침구의학회 평생회원',
  '대한한의학회 대의원 (前)',
  '대한침구의학회 간사 (前)',
  '2018 ICMART-iSAMS 뮌헨 국제침구학회 연구발표',
  '제67회 전일본침구학회 초청 학술교류',
  '질병관리청 역학조사관 정식 교육 수료 · 3년 활동',
  '보건복지부 장관 표창 · 충청남도 도지사 표창 수상',
  '두통-경추 국제 논문 지속 연구 및 임상 적용',
  '편두통 케이스 원내 정기 교육 운영',
];

export function DoctorIntroSection() {
  return (
    <section className="maekrak-snap-section bg-maekrak-navy relative py-20 px-6 md:px-12 overflow-y-auto" id="doctor">
      <div className="max-w-7xl mx-auto w-full flex flex-col justify-center min-h-0 py-4">
        <div className="mb-10">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">
            맥락한의원 대표원장
          </div>
          <h2 className="font-serif text-[28px] md:text-[38px] font-medium text-white mb-4 tracking-tight break-keep">
            침구과 전문의 이재성 원장
          </h2>
          <p className="text-[15px] text-white/55 leading-[1.95] font-light break-keep max-w-2xl">
            침구과 전문의 자격, 국제 학술발표, 보건복지부 장관 표창.
            두통 환자를 보는 한의사 중 이 이력을 가진 원장은 드뭅니다.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-px bg-white/8 border border-white/10 rounded-lg overflow-hidden mb-10">
          {proofItems.map((item) => (
            <div key={item.icon} className="bg-maekrak-navy p-6 md:p-8 hover:bg-white/5 transition-colors">
              <p className="text-[11px] font-bold tracking-[0.15em] uppercase text-[#7ec8e0] mb-3">{item.icon}</p>
              <p className="font-serif text-3xl text-white mb-2">{item.num}</p>
              <p className="text-[13px] text-white/50 leading-relaxed whitespace-pre-line break-keep">{item.label}</p>
            </div>
          ))}
        </div>

        <div className="border-t border-white/10 pt-8">
          <p className="text-[11px] font-bold tracking-[0.15em] uppercase text-[#b8912a] mb-5">전체 약력</p>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-3 mb-8">
            {credentials.map((line) => (
              <div key={line} className="flex items-start gap-2 text-[13px] text-white/60 leading-relaxed break-keep">
                <span className="w-1 h-1 rounded-full bg-[#7ec8e0] shrink-0 mt-2" />
                {line}
              </div>
            ))}
          </div>
          <Link
            to="/about"
            className="inline-flex px-8 py-3 border border-white/25 rounded-lg text-white text-[13px] font-bold tracking-widest uppercase hover:bg-white/10 transition-colors"
          >
            의료진 상세 보기
          </Link>
        </div>
      </div>
    </section>
  );
}
