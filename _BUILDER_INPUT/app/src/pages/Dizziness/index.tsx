import { ArrowRight } from 'lucide-react';
import { useEffect } from 'react';
import { Link } from 'react-router-dom';

export function Dizziness() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            어지럼증 종류
          </h1>
          <p className="text-[16px] text-white/80 max-w-2xl leading-[1.6]">
            이비인후과나 신경과에서 원인을 찾지 못하는 만성 어지럼증, 이석증 및 각종 관련 질환. 그 이면에 작용하는 복합적인 원인과 치료 방식을 안내합니다.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16">
        <section>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {[
              { name: '경추성 어지럼증', path: '/dizziness/cervicogenic' },
              { name: '메니에르병', path: '/dizziness/menieres' },
              { name: '이석증', path: '/dizziness/bppv' },
              { name: '전정신경염', path: '/dizziness/vestibular-neuritis' }
            ].map((type, idx) => (
              <Link key={idx} to={type.path} className="group block p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:bg-maekrak-navy hover:border-transparent transition-all duration-300">
                <h3 className="text-[18px] font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">{type.name}</h3>
                <div className="flex items-center text-[14px] font-medium text-maekrak-blue group-hover:text-[#7ec8e0] transition-colors">
                  자세히 보기 <ArrowRight className="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" />
                </div>
              </Link>
            ))}
          </div>
        </section>
      </div>
    </div>
  );
}
