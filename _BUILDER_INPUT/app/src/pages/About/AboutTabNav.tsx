import React, { useEffect, useState } from 'react';
import { cn } from '../../lib/utils';

export function AboutTabNav() {
  const [activeTab, setActiveTab] = useState('philosophy');

  useEffect(() => {
    const handleScroll = () => {
      const sections = ['philosophy', 'doctor', 'strength'];
      let current = '';
      sections.forEach(id => {
        const el = document.getElementById(id);
        if (el && el.getBoundingClientRect().top < 160) {
          current = id;
        }
      });
      if (current) setActiveTab(current);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollTo = (id: string, e: React.MouseEvent) => {
    e.preventDefault();
    const el = document.getElementById(id);
    if (el) {
      const headerOffset = 80;
      const elementPosition = el.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
  
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    }
  };

  return (
    <nav className="bg-white border-b-2 border-gray-100 flex sticky top-[64px] md:top-[80px] z-40 px-4 md:px-12 lg:px-24 overflow-x-auto scrollbar-hide hide-scrollbar">
      <div className="max-w-7xl mx-auto w-full flex">
        {[
          { id: 'philosophy', label: '대표원장 진료철학' },
          { id: 'doctor', label: '의료진 소개' },
          { id: 'strength', label: '맥락이 다른 이유' },
        ].map(tab => (
          <a
            key={tab.id}
            href={`#${tab.id}`}
            onClick={(e) => scrollTo(tab.id, e)}
            className={cn(
              "whitespace-nowrap px-6 md:px-8 py-4 md:py-5 text-[14px] md:text-[15px] transition-all -mb-[2px] border-b-2",
              activeTab === tab.id 
                ? "text-maekrak-navy font-bold border-maekrak-navy" 
                : "text-gray-500 font-normal border-transparent hover:text-maekrak-navy"
            )}
          >
            {tab.label}
          </a>
        ))}
      </div>
    </nav>
  );
}
