import { useState, useRef, useEffect } from 'react';
import { HeroSection } from './Home/HeroSection';
import { PhilosophySection } from './Home/PhilosophySection';
import { CauseSection } from './Home/CauseSection';
import { DoctorIntroSection } from './Home/DoctorIntroSection';
import { DepartmentsSection } from './Home/DepartmentsSection';
import { TreatmentApproachSection } from './Home/TreatmentApproachSection';
import { BlogPreviewSection } from './Home/BlogPreviewSection';
import { ContactFooterSection } from './Home/ContactFooterSection';

export function Home() {
  const containerRef = useRef<HTMLDivElement>(null);
  const [activeSection, setActiveSection] = useState(0);

  const sections = [
    { id: 'hero', label: 'Home' },
    { id: 'why', label: 'Why' },
    { id: 'cause', label: 'Cause' },
    { id: 'doctor', label: 'Doctor' },
    { id: 'dept', label: 'Clinic' },
    { id: 'flow', label: 'Flow' },
    { id: 'cases', label: 'Cases' },
    { id: 'cta', label: '예약' },
    { id: 'contact', label: 'Contact' },
  ];

  useEffect(() => {
    const handleScroll = () => {
      if (containerRef.current) {
        const { scrollTop, clientHeight } = containerRef.current;
        const index = Math.round(scrollTop / clientHeight);
        setActiveSection(index);
      }
    };

    const container = containerRef.current;
    if (container) {
      container.addEventListener('scroll', handleScroll, { passive: true });
    }
    return () => {
      if (container) container.removeEventListener('scroll', handleScroll);
    };
  }, []);

  const scrollToSection = (index: number) => {
    const target = sections[index];
    const el = target ? document.getElementById(target.id) : null;
    const container = containerRef.current;

    if (el && container) {
      container.scrollTo({ top: el.offsetTop, behavior: 'smooth' });
      return;
    }

    if (container) {
      container.scrollTo({
        top: index * container.clientHeight,
        behavior: 'smooth',
      });
    }
  };

  return (
    <div className="w-full h-full relative" style={{ height: '100dvh', paddingTop: 0 }}>
      <div ref={containerRef} className="maekrak-snap-container bg-white">
        <HeroSection />
        <PhilosophySection />
        <CauseSection />
        <DoctorIntroSection />
        <DepartmentsSection />
        <TreatmentApproachSection />
        <BlogPreviewSection />
        <ContactFooterSection />
      </div>

      <div className="hidden lg:flex fixed right-10 top-1/2 -translate-y-1/2 flex-col gap-6 z-40 items-center">
        {sections.map((sec, idx) => (
          <button
            key={sec.id}
            type="button"
            onClick={() => scrollToSection(idx)}
            className="w-2 h-2 rounded-full transition-all duration-300 relative group flex items-center justify-center cursor-pointer border-none outline-none focus:outline-none bg-transparent p-0 m-0"
            aria-label={`Scroll to ${sec.label}`}
          >
            <div
              className={`absolute w-full h-full rounded-full transition-all duration-300 ${
                activeSection === idx ? 'bg-maekrak-accent scale-[2.5]' : 'bg-gray-300 group-hover:bg-gray-500'
              }`}
            />
            {activeSection === idx && (
              <span className="absolute right-8 text-[11px] font-bold text-gray-800 tracking-widest uppercase opacity-100 transition-opacity whitespace-nowrap">
                {sec.label}
              </span>
            )}
          </button>
        ))}
      </div>
    </div>
  );
}
