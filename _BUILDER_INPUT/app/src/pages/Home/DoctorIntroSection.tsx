import { Link } from 'react-router-dom';
import doctor1Img from '../../assets/images/doctor1.png';

export function DoctorIntroSection() {
  const doctor = {
    name: "이재성",
    title: "대표원장",
    field: "두통/어지럼증/자율신경/말초신경/브레인포그",
    image: doctor1Img, 
    historyLines: [
      "침구과 전문의 (대학병원 인턴, 레지던트 4년, 학회 활동 및 논문, 임상 실험, 전문의 국가고시)",
      "전 대한한의학회 대의원",
      "전 대한침구의학회 간사",
      "대한침구의학회 평생회원",
      "2018 ICMART-iSAMS 뮌헨 연구발표",
      "제 67회 전일본침구학회 초청 학술교류",
      "전 천안시 감염병대응센터 역학조사관",
      "코로나19 기간 질병관리청 역학조사관 정식 교육 및 투입",
      "3년간 역학조사관 활동 공로 보건복지부 장관·충청남도 도지사 표창"
    ]
  };

  return (
    <section className="maekrak-snap-section bg-white relative">
      <div className="max-w-7xl mx-auto w-full px-6 flex flex-col md:flex-row items-center md:items-stretch justify-between h-full py-16 md:py-24 gap-12 md:gap-8">
        
        {/* Left: General Intro */}
        <div className="w-full md:w-[40%] flex flex-col justify-center">
          <div className="text-[12px] uppercase opacity-50 font-bold tracking-widest mb-4">Medical Team</div>
          <h2 className="text-[36px] md:text-[46px] lg:text-[52px] font-light text-maekrak-navy mb-6 md:mb-8 tracking-tight break-keep leading-[1.2] md:leading-[1.1]">
            두통과 신경계를 <br/><strong className="font-bold">설명하는 한의사</strong>
          </h2>
          <p className="text-[16px] md:text-[18px] text-gray-500 leading-relaxed font-light break-keep italic mb-8 border-l-2 border-maekrak-accent pl-6">
            "환자가 이해할 수 있는 설명, 지속가능한 치료, 해가 되지 않는 치료를 가장 중요하게 생각합니다."
          </p>
          <div className="hidden md:block">
            <Link 
              to="/about" 
              className="w-fit px-8 py-4 border border-gray-300 rounded-lg text-maekrak-navy font-bold hover:bg-maekrak-navy hover:text-white transition-all text-[13px] tracking-widest uppercase"
            >
              의료진 상세 보기
            </Link>
          </div>
        </div>

        {/* Right: Single Doctor Profile */}
        <div className="w-full md:w-[60%] flex flex-col xl:flex-row gap-8 items-center xl:items-start relative">
          
          <div className="w-full sm:w-2/3 md:w-full xl:w-[45%] shrink-0 aspect-[3/4] xl:aspect-auto xl:h-[500px] bg-white overflow-hidden rounded-xl border border-gray-100 flex items-center justify-center">
            {doctor.image ? (
              <img src={doctor.image} alt={`${doctor.name} ${doctor.title}`} className="w-full h-full object-cover object-top hover:scale-[1.02] transition-transform duration-700" />
            ) : (
              <span className="text-gray-300 font-serif font-light text-9xl italic opacity-50">M</span>
            )}
          </div>
          
          <div className="flex-1 flex flex-col pt-2 xl:pt-4 w-full">
             <div className="flex items-end gap-2 mb-2">
               <h3 className="text-[28px] md:text-[32px] font-bold text-gray-900 tracking-tight">{doctor.name}</h3>
               <span className="text-[15px] md:text-[16px] text-gray-500 font-medium pb-1.5">{doctor.title}</span>
             </div>
             <p className="text-maekrak-accent font-bold text-[14px] tracking-wide mb-6">FOCUS: {doctor.field}</p>
             
             <ul className="flex flex-col gap-2.5 border-t border-gray-100 pt-6">
               {doctor.historyLines.map((line, idx) => (
                 <li key={idx} className="text-[13px] md:text-[15px] text-gray-800 font-medium leading-normal flex items-start gap-2 break-keep">
                   <span className="text-maekrak-accent text-[10px] mt-[5px] opacity-70">■</span>
                   <span className="flex-1">{line}</span>
                 </li>
               ))}
             </ul>
          </div>
          
          <div className="md:hidden mt-4 w-full">
            <Link 
              to="/about" 
              className="w-full text-center block px-8 py-4 border border-gray-300 rounded-lg text-maekrak-navy font-bold hover:bg-maekrak-navy hover:text-white transition-all text-[13px] tracking-widest uppercase"
            >
              의료진 상세 보기
            </Link>
          </div>

        </div>
      </div>
    </section>
  );
}
