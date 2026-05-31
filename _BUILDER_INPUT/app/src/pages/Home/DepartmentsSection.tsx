import { Link } from 'react-router-dom';
import { ChevronRight } from 'lucide-react';

export function DepartmentsSection() {
  const departments = [
    {
      id: 'headache',
      title: '두통 · 편두통',
      href: '/headache',
      keywords: '편두통 · 긴장형 · 군발두통 · 경추성두통 · 약물과용두통',
    },
    {
      id: 'dizziness',
      title: '어지럼증',
      href: '/dizziness',
      keywords: '현훈 · 경추성 어지럼 · 자율신경성 어지럼',
    },
    {
      id: 'autonomic',
      title: '자율신경',
      href: '/autonomic',
      keywords: '두근거림 · 불면 · 소화장애 · 호흡곤란',
    },
    {
      id: 'neuropathy',
      title: '말초신경병증',
      href: '/neuropathy',
      keywords: '저림 · 시림 · 작열감 · 3개월 이상 지속 증상',
    },
    {
      id: 'brainfog',
      title: '브레인포그',
      href: '/brainfog',
      keywords: '집중력 저하 · 머리 멍함 · 뇌 에너지 공급 문제',
    },
  ];

  return (
    <section className="maekrak-snap-section bg-maekrak-ivory" id="dept">
      <div className="w-full h-full flex flex-col justify-center px-6 md:px-12 py-20 max-w-7xl mx-auto">
        <div className="mb-12">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-maekrak-accent mb-4">진료과목</div>
          <h2 className="font-serif text-[28px] md:text-[38px] font-medium text-maekrak-navy mb-4 tracking-tight break-keep">
            맥락한의원이 집중하는 질환
          </h2>
          <p className="text-[15px] text-gray-500 leading-relaxed font-light break-keep max-w-2xl">
            증상별로 원인을 다르게 보고, 구조·기능·에너지를 함께 회복합니다.
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
          {departments.map((dept) => (
            <Link
              key={dept.id}
              to={dept.href}
              className="group bg-white border border-gray-100 rounded-2xl p-6 md:p-7 transition-all duration-300 hover:bg-maekrak-navy hover:shadow-xl flex flex-col min-h-[200px]"
            >
              <h3 className="font-serif text-lg font-medium text-maekrak-navy group-hover:text-white transition-colors mb-3 break-keep">
                {dept.title}
              </h3>
              <p className="text-[12px] text-gray-500 group-hover:text-white/75 leading-relaxed break-keep font-light flex-1 transition-colors">
                {dept.keywords}
              </p>
              <span className="mt-4 text-[12px] font-bold text-maekrak-accent group-hover:text-[#7ec8e0] flex items-center gap-1 transition-colors">
                자세히 보기
                <ChevronRight className="w-3.5 h-3.5" />
              </span>
            </Link>
          ))}
        </div>
      </div>
    </section>
  );
}
