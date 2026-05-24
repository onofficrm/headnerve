import { useEffect } from 'react';
import { AboutHeroSection } from './AboutHeroSection';
import { AboutTabNav } from './AboutTabNav';
import { AboutPhilosophySection } from './AboutPhilosophySection';
import { AboutDoctorSection } from './AboutDoctorSection';
import { AboutStrengthSection } from './AboutStrengthSection';
import { AboutCaseStrip } from './AboutCaseStrip';
import { AboutCtaBlock } from './AboutCtaBlock';

export function About() {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <div className="bg-white min-h-screen">
      <AboutHeroSection />
      <AboutTabNav />
      <div id="philosophy">
        <AboutPhilosophySection />
      </div>
      <div id="doctor">
        <AboutDoctorSection />
      </div>
      <div id="strength">
        <AboutStrengthSection />
        <AboutCaseStrip />
        <AboutCtaBlock />
      </div>
    </div>
  );
}
