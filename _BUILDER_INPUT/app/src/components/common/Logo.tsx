import React from 'react';

interface LogoProps {
  className?: string;
}

export function Logo({ className = "w-auto h-10" }: LogoProps) {
  return (
    <svg 
      className={className} 
      viewBox="0 0 1000 240" 
      fill="none" 
      xmlns="http://www.w3.org/2000/svg"
    >
      {/* Box */}
      <path d="M30 145 V30 H220 V145" stroke="currentColor" strokeWidth="16" strokeLinejoin="miter" strokeLinecap="square" />
      <path d="M30 185 V210 H220 V185" stroke="currentColor" strokeWidth="16" strokeLinejoin="miter" strokeLinecap="square" />
      
      {/* Wave */}
      <path d="M0 175 Q 70 130 130 155 T 260 145" stroke="currentColor" strokeWidth="16" strokeLinecap="round" fill="none" />
      
      {/* Needles (Thick parts) */}
      <line x1="70" y1="90" x2="70" y2="130" stroke="currentColor" strokeWidth="8" strokeLinecap="round" />
      <line x1="110" y1="70" x2="110" y2="110" stroke="currentColor" strokeWidth="8" strokeLinecap="round" />
      <line x1="150" y1="85" x2="150" y2="125" stroke="currentColor" strokeWidth="8" strokeLinecap="round" />
      <line x1="190" y1="75" x2="190" y2="115" stroke="currentColor" strokeWidth="8" strokeLinecap="round" />

      {/* Needles (Thin parts descending to wave) */}
      <line x1="70" y1="130" x2="70" y2="145" stroke="currentColor" strokeWidth="3" />
      <line x1="110" y1="110" x2="110" y2="150" stroke="currentColor" strokeWidth="3" />
      <line x1="150" y1="125" x2="150" y2="155" stroke="currentColor" strokeWidth="3" />
      <line x1="190" y1="115" x2="190" y2="155" stroke="currentColor" strokeWidth="3" />

      {/* Text Main */}
      <text 
        x="270" 
        y="145" 
        fontSize="130" 
        fontWeight="900" 
        fontFamily="Pretendard, 'Malgun Gothic', 'Apple SD Gothic Neo', sans-serif" 
        fill="currentColor" 
        letterSpacing="-0.04em"
      >
        맥락한의원
      </text>

      {/* Text Sub */}
      <text 
        x="285" 
        y="200" 
        fontSize="28" 
        fontWeight="500" 
        fontFamily="Pretendard, 'Malgun Gothic', 'Apple SD Gothic Neo', sans-serif" 
        fill="currentColor" 
        letterSpacing="0.08em"
      >
        MACNAC KOREAN MEDICINE CLINIC
      </text>
    </svg>
  );
}
