export function BlogPreviewSection() {
  const cases = [
    {
      id: 1,
      tag: '케이스 01 · 40대 남성 · 두통',
      quote: '"수술 예약까지 잡았는데 10회 치료 후 80% 호전됐습니다"',
      summary:
        '신경외과 교수에게 1년 치료 받았지만 증상이 악화되어 서울성모병원 신경외과 수술 예약까지 잡아둔 상태로 내원. 맥락한의원 치료 10회만에 초진 대비 증상 80% 감소. 현재 수술 없이 치료 지속 중.',
      result: '치료 결과 · 10회 / 증상 80% 감소 · 수술 취소',
    },
    {
      id: 2,
      tag: '케이스 02 · 30대 남성 · 경추성 어지럼증',
      quote: '"응급실을 반복하다 지금은 증상의 10%만 남았습니다"',
      summary:
        '증상 악화 시마다 응급실 내원. MRI·MRA 정상 판정. 신경과 처방약은 복용 중에만 효과. 맥락한의원 치료 후 두통·어지럼·호흡곤란 모두 90% 감소, 치료 지속 중.',
      result: '치료 결과 · 증상 90% 감소 · 응급실 재방 없음',
    },
    {
      id: 3,
      tag: '케이스 03 · 50대 남성 · 편두통',
      quote: '"30분 거리에서 매 회 내원, 편두통·목 통증 모두 소실"',
      summary:
        '대기업 계열사 대표. 유명 신경과 주사 치료 후 재악화. 목 가동 범위 제한 동반. 블로그를 보고 30~40분 차로 내원. 현재 편두통·목 통증 모두 소실 후 치료 종결.',
      result: '치료 결과 · 편두통·목 통증 소실 · 치료 종결',
    },
  ];

  return (
    <section className="maekrak-snap-section py-20 px-6 md:px-12 bg-[#2d4a6b]" id="cases">
      <div className="max-w-7xl mx-auto w-full flex flex-col justify-center h-full">
        <div className="mb-10">
          <div className="text-[12px] font-bold tracking-[0.22em] uppercase text-[#7ec8e0] mb-4">실제 치료 사례</div>
          <h2 className="font-serif text-[26px] md:text-[34px] font-medium text-white tracking-tight break-keep">
            다른 병원에서 낫지 않아 찾아오신 분들
          </h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          {cases.map((c) => (
            <div
              key={c.id}
              className="flex flex-col bg-white/7 border border-white/10 p-7 rounded-lg hover:bg-white/10 transition-colors h-full"
            >
              <span className="text-[11px] font-bold tracking-widest text-[#7ec8e0] mb-3 uppercase">{c.tag}</span>
              <p className="font-serif text-[15px] text-white/90 mb-4 leading-snug break-keep">{c.quote}</p>
              <p className="text-[13px] leading-relaxed mb-6 font-light text-white/55 break-keep flex-1">{c.summary}</p>
              <div className="text-[12px] text-[#7ec8e0]/90 border-t border-white/10 pt-3 font-medium">{c.result}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
