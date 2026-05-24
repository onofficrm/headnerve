export function AboutHeroSection() {
  return (
    <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-20 md:py-24 relative overflow-hidden">
      <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
      <div className="relative z-10 max-w-7xl mx-auto">
        <div className="text-[12px] md:text-[13px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">
          맥락한의원 소개
        </div>
        <h1 className="font-serif text-[28px] md:text-[36px] lg:text-[44px] font-medium text-white leading-[1.45] mb-6 break-keep">
          머리와 목의 <em className="not-italic text-[#7ec8e0]">구조적 맥락</em>에서<br />
          두통의 원인을 읽습니다
        </h1>
        <p className="text-[15px] md:text-[16px] text-white/60 max-w-xl leading-[1.9] break-keep font-light">
          맥락한의원은 진통제와 주사로 증상을 덮는 방식 대신,
          두개경추 구조와 자율신경의 불균형이라는 근본 원인을 찾아 치료합니다.
          침구과 전문의 이재성 원장이 직접 진료합니다.
        </p>
      </div>
    </div>
  );
}
