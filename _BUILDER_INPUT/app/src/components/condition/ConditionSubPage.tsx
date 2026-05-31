import { ReactNode } from 'react';
import { CheckCircle2, ChevronRight, ArrowLeft, ArrowRight } from 'lucide-react';
import { Link } from 'react-router-dom';
import { BOARD_URLS } from '../../lib/boardUrls';

export type ConditionTreatment = {
  title: string;
  description: string;
};

export type ConditionCase = {
  title?: string;
  body: string;
};

export type ConditionFaq = {
  q: string;
  a: string;
};

type ConditionSubPageProps = {
  parentLabel: string;
  parentHref: string;
  title: string;
  anchorQuote: string;
  perspective: string | string[];
  symptoms: string[];
  cause: ReactNode;
  treatments: ConditionTreatment[];
  prognosis?: string;
  cases: ConditionCase[];
  faqs: ConditionFaq[];
};

export function ConditionSubPage({
  parentLabel,
  parentHref,
  title,
  anchorQuote,
  perspective,
  symptoms,
  cause,
  treatments,
  prognosis,
  cases,
  faqs,
}: ConditionSubPageProps) {
  const perspectiveParagraphs = Array.isArray(perspective) ? perspective : [perspective];

  return (
    <div className="bg-white min-h-[calc(100vh-80px)] pb-24">
      <div className="bg-maekrak-navy px-6 md:px-12 lg:px-24 py-16 md:py-20 relative overflow-hidden">
        <div className="absolute right-0 top-0 bottom-0 w-2/5 bg-gradient-to-br from-transparent to-[#4a8fa8]/15" />
        <div className="relative z-10 max-w-7xl mx-auto">
          <div className="flex items-center gap-2 text-[13px] font-medium text-white/60 mb-6">
            <Link to={parentHref} className="hover:text-white transition-colors">
              {parentLabel}
            </Link>
            <ChevronRight className="w-4 h-4" />
            <span className="text-[#7ec8e0]">{title}</span>
          </div>
          <h1 className="font-serif text-[32px] md:text-[42px] font-medium text-white leading-[1.3] mb-6">
            {title}
          </h1>
          <div className="bg-white/10 border border-white/20 p-6 rounded-xl max-w-3xl">
            <p className="text-[16px] text-white/90 leading-[1.7] break-keep font-light">
              &quot;{anchorQuote}&quot;
            </p>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-16 md:py-24">
        <section className="mb-20">
          <div className="p-8 md:p-10 rounded-2xl bg-gray-50 border border-gray-100">
            <h3 className="text-[18px] font-bold text-maekrak-blue mb-4">맥락한의원의 관점</h3>
            <div className="text-[16px] md:text-[18px] text-gray-800 leading-[1.8] break-keep space-y-4">
              {perspectiveParagraphs.map((paragraph) => (
                <p key={paragraph}>{paragraph}</p>
              ))}
            </div>
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">
            이런 증상이 있다면 의심하세요
          </h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {symptoms.map((item) => (
              <div
                key={item}
                className="flex items-start gap-4 p-5 rounded-xl bg-white border border-gray-200"
              >
                <CheckCircle2 className="w-5 h-5 text-maekrak-blue shrink-0 mt-0.5" strokeWidth={2} />
                <span className="text-[15px] md:text-[16px] text-gray-700 leading-[1.5] break-keep">
                  {item}
                </span>
              </div>
            ))}
          </div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">
            왜 생기는가 — 한의학적 원인
          </h2>
          <div className="prose prose-lg max-w-none text-gray-800 leading-[1.8] break-keep">{cause}</div>
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">
            맥락한의원에서는 어떻게 치료하나요
          </h2>
          <div className="space-y-6 mb-12">
            {treatments.map((treatment) => (
              <div
                key={treatment.title}
                className="p-6 rounded-xl border border-gray-200 bg-white shadow-sm"
              >
                <h4 className="text-[18px] font-bold text-maekrak-navy mb-3">{treatment.title}</h4>
                <p className="text-[15px] text-gray-600 leading-[1.6] break-keep whitespace-pre-line">
                  {treatment.description}
                </p>
              </div>
            ))}
          </div>
          {prognosis && (
            <div className="p-6 rounded-xl bg-blue-50/50">
              <h4 className="font-bold text-gray-900 mb-3">예상 경과</h4>
              <p className="text-[15px] text-gray-600 leading-[1.6] break-keep whitespace-pre-line">
                {prognosis}
              </p>
            </div>
          )}
        </section>

        <section className="mb-20">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">
            실제 치료 사례 요약
          </h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            {cases.map((item, idx) => (
              <div key={item.title ?? idx} className="p-8 rounded-xl bg-gray-50 border border-gray-100">
                {item.title && <div className="text-maekrak-blue font-bold mb-3">{item.title}</div>}
                <p className="text-[15px] text-gray-800 leading-[1.7] break-keep">{item.body}</p>
              </div>
            ))}
          </div>
          <div className="text-center">
            <a
              href={BOARD_URLS.column}
              className="inline-flex items-center text-[15px] font-medium text-maekrak-blue hover:text-[#7ec8e0] transition-colors border-b border-current pb-0.5"
            >
              자세한 사례 보기 (블로그) <ArrowRight className="w-4 h-4 ml-1" />
            </a>
          </div>
        </section>

        <section className="mb-24">
          <h2 className="text-[24px] md:text-[28px] font-bold text-gray-900 mb-8 tracking-tight">
            자주 묻는 질문 FAQ
          </h2>
          <div className="space-y-4">
            {faqs.map((faq) => (
              <div key={faq.q} className="p-6 rounded-xl border border-gray-200">
                <h4 className="text-[16px] font-bold text-gray-900 mb-2 flex items-start gap-2">
                  <span className="text-maekrak-blue">Q.</span> {faq.q}
                </h4>
                <p className="text-[15px] text-gray-600 leading-[1.6] pl-6 break-keep whitespace-pre-line">
                  <span className="font-bold text-gray-400 mr-2">A.</span> {faq.a}
                </p>
              </div>
            ))}
          </div>
        </section>

        <div className="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100">
          <Link
            to={parentHref}
            className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors"
          >
            <ArrowLeft className="w-4 h-4 mr-2" /> {parentLabel} 전체 보기
          </Link>
          <div className="flex gap-4">
            <a
              href={BOARD_URLS.column}
              className="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition-colors"
            >
              블로그 글 보기 <ArrowRight className="w-4 h-4 ml-2" />
            </a>
            <a
              href="https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-maekrak-navy text-white hover:bg-[#1a3276] transition-colors font-medium"
            >
              상담 예약하기
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}
