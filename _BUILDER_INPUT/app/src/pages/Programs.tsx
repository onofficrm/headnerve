import { useEffect } from 'react';
import { ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Programs() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const programs = [
    {
      title: '두통 치료 프로그램',
      desc: '신경계 안정화와 두개경추 정렬을 통해 편두통, 긴장성 두통, 만성 두통의 원인을 치료합니다.',
      path: '/headache',
      color: 'bg-blue-50',
      textColor: 'text-blue-900',
    },
    {
      title: '어지럼증 치료 프로그램',
      desc: '자율신경 불균형과 전정 기능의 저하를 구조적·기능적으로 바로잡아 근본적 안정을 돕습니다.',
      path: '/dizziness',
      color: 'bg-indigo-50',
      textColor: 'text-indigo-900',
    },
    {
      title: '말초신경병증 치료 프로그램',
      desc: '당뇨병성, 항암제 유발 등 손발 저림과 통증을 유발하는 훼손된 말초신경의 재생을 촉진합니다.',
      path: '/neuropathy',
      color: 'bg-emerald-50',
      textColor: 'text-emerald-900',
    },
    {
      title: '자율신경 치료 프로그램',
      desc: '기립성 저혈압, 공황장애, 불면증 등 널뛰는 자율신경계의 팽팽한 과항진을 교정합니다.',
      path: '/autonomic',
      color: 'bg-purple-50',
      textColor: 'text-purple-900',
    },
    {
      title: '브레인포그 치료 프로그램',
      desc: '코로나 후유증, 만성피로, 수험생의 뇌 에너지 고갈과 저하를 회복하여 집중력을 높입니다.',
      path: '/brainfog',
      color: 'bg-sky-50',
      textColor: 'text-sky-900',
    }
  ];

  return (
    <div className="bg-white min-h-[calc(100vh-80px)]">
      {/* Hero Section */}
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto text-center">
          <div className="text-[12px] md:text-[13px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">
            맥락한의원
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] lg:text-[52px] font-medium text-white leading-[1.3] mb-6">
            맥락 치료 프로그램
          </h1>
          <p className="text-[16px] md:text-[18px] text-white/80 max-w-2xl mx-auto leading-[1.8] break-keep font-light">
            신경계의 기능적 안정과 두개경추의 구조적 균형을 동시에 바로잡는 맥락한의원만의 치료 프로그램을 소개합니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-20 md:py-32">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {programs.map((prog, idx) => (
            <Link 
              key={idx} 
              to={prog.path}
              className="group block p-8 rounded-3xl bg-white border border-gray-100 hover:shadow-xl hover:border-transparent transition-all duration-300 relative overflow-hidden flex flex-col h-full"
            >
              <div className={`absolute top-0 right-0 w-32 h-32 ${prog.color} rounded-bl-full -z-10 transition-transform group-hover:scale-110`} />
              
              <h3 className={`text-[22px] md:text-[24px] font-bold ${prog.textColor} mb-4 tracking-tight`}>
                {prog.title}
              </h3>
              
              <p className="text-[15px] md:text-[16px] text-gray-600 leading-[1.7] font-light flex-grow break-keep mb-8">
                {prog.desc}
              </p>
              
              <div className="flex items-center text-[14px] font-bold text-maekrak-blue group-hover:text-maekrak-accent transition-colors mt-auto">
                프로그램 안내 <ArrowRight className="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform" />
              </div>
            </Link>
          ))}
        </div>
      </div>
    </div>
  );
}
