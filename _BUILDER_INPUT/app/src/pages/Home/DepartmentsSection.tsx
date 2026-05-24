import { Link } from 'react-router-dom';
import { ChevronRight } from 'lucide-react';

export function DepartmentsSection() {
  const departments = [
    {
      id: "headache",
      title: "두통",
      href: "/headache",
      eng: "HEADACHE",
      description: "통증 억제가 아닌 원인 분석의 관점"
    },
    {
      id: "dizziness",
      title: "어지럼증",
      href: "/dizziness",
      eng: "DIZZINESS",
      description: "고유수용성 감각과 자율신경 불균형 확인"
    },
    {
      id: "autonomic",
      title: "자율신경",
      href: "/autonomic",
      eng: "AUTONOMIC",
      description: "검사에서 잘 드러나지 않는 기능 문제"
    },
    {
      id: "neuropathy",
      title: "말초신경병증",
      href: "/neuropathy",
      eng: "NEUROPATHY",
      description: "혈류와 신경 회복 환경의 심층 개선"
    },
    {
      id: "brainfog",
      title: "브레인포그",
      href: "/brainfog",
      eng: "BRAINFOG",
      description: "의지 문제가 아닌 뇌 에너지 공급 문제"
    }
  ];

  return (
    <section className="maekrak-snap-section bg-maekrak-ivory">
      <div className="w-full h-full flex flex-col justify-center px-6 md:px-12 py-20 max-w-[1600px] mx-auto">
        <div className="mb-16">
          <div className="text-[12px] uppercase opacity-50 font-bold tracking-widest mb-4">Focus Area</div>
          <h2 className="text-[42px] md:text-[52px] font-light text-maekrak-navy mb-4 tracking-tight leading-[1.1]">
            맥락한의원이 집중하는 <strong className="font-bold">진료</strong>
          </h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-5 gap-4 h-auto md:h-1/2 min-h-[360px]">
          {departments.map((dept, i) => (
            <Link 
              key={dept.id} 
              to={dept.href}
              className={`group relative bg-white border border-gray-100 rounded-2xl p-8 transition-all duration-500 overflow-hidden hover:bg-maekrak-navy hover:scale-[1.02] hover:shadow-xl flex flex-col justify-between`}
            >
              <div className="relative z-10">
                <span className="text-[11px] font-bold text-gray-300 group-hover:text-maekrak-accent tracking-widest uppercase transition-colors block mb-2">{dept.eng}</span>
                <h3 className="text-3xl font-bold text-maekrak-navy group-hover:text-white transition-colors mb-6">
                  {dept.title}
                </h3>
                <p className="text-gray-500 group-hover:text-white/80 text-[15px] leading-relaxed break-keep font-light transition-colors">
                  {dept.description}
                </p>
              </div>
              
              <div className="relative z-10 flex items-center justify-between mt-8 hidden md:flex">
                <div className="w-10 h-10 rounded-full border border-gray-200 group-hover:border-white/30 flex items-center justify-center transition-colors">
                  <ChevronRight className="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" />
                </div>
              </div>
              
              {/* Optional Background Decorative Elements */}
              <div className="absolute -bottom-10 -right-10 text-[120px] font-serif font-bold italic text-gray-50 group-hover:text-white/5 transition-colors select-none pointer-events-none leading-none">
                0{i+1}
              </div>
            </Link>
          ))}
        </div>
      </div>
    </section>
  );
}
