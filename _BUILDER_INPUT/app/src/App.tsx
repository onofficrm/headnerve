/**
 * @license
 * SPDX-License-Identifier: Apache-2.0
 */

import { HashRouter, Routes, Route } from 'react-router-dom';
import { Layout } from './components/layout/Layout';
import { Home } from './pages/Home';
import { About } from './pages/About';
import { Headache } from './pages/Headache';
import { Migraine } from './pages/Headache/Migraine';
import { TensionHeadache } from './pages/Headache/TensionHeadache';
import { MedicationOveruseHeadache } from './pages/Headache/MedicationOveruseHeadache';
import { CervicogenicHeadache } from './pages/Headache/CervicogenicHeadache';
import { ClusterHeadache } from './pages/Headache/ClusterHeadache';
import { MenstrualHeadache } from './pages/Headache/MenstrualHeadache';
import { PediatricMigraine } from './pages/Headache/PediatricMigraine';
import { StudentHeadache } from './pages/Headache/StudentHeadache';
import { Dizziness } from './pages/Dizziness';
import { CervicogenicDizziness } from './pages/Dizziness/CervicogenicDizziness';
import { MenieresDisease } from './pages/Dizziness/MenieresDisease';
import { BPPV } from './pages/Dizziness/BPPV';
import { VestibularNeuritis } from './pages/Dizziness/VestibularNeuritis';
import { Autonomic } from './pages/Autonomic';
import { Dysautonomia } from './pages/Autonomic/Dysautonomia';
import { OrthostaticHypotension } from './pages/Autonomic/OrthostaticHypotension';
import { PanicAnxiety } from './pages/Autonomic/PanicAnxiety';
import { Insomnia } from './pages/Autonomic/Insomnia';
import { Neuropathy } from './pages/Neuropathy';
import { Idiopathic } from './pages/Neuropathy/Idiopathic';
import { Diabetic } from './pages/Neuropathy/Diabetic';
import { Chemo } from './pages/Neuropathy/Chemo';
import { Brainfog } from './pages/Brainfog';
import { PostCovid } from './pages/Brainfog/PostCovid';
import { ChronicFatigue } from './pages/Brainfog/ChronicFatigue';
import { Students } from './pages/Brainfog/Students';
import { Programs } from './pages/Programs';

export default function App() {
  return (
    <HashRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="about" element={<About />} />
          <Route path="headache">
            <Route index element={<Headache />} />
            <Route path="migraine" element={<Migraine />} />
            <Route path="tension" element={<TensionHeadache />} />
            <Route path="medication-overuse" element={<MedicationOveruseHeadache />} />
            <Route path="cervicogenic" element={<CervicogenicHeadache />} />
            <Route path="cluster" element={<ClusterHeadache />} />
            <Route path="menstrual" element={<MenstrualHeadache />} />
            <Route path="pediatric" element={<PediatricMigraine />} />
            <Route path="student" element={<StudentHeadache />} />
          </Route>
          <Route path="dizziness">
            <Route index element={<Dizziness />} />
            <Route path="cervicogenic" element={<CervicogenicDizziness />} />
            <Route path="menieres" element={<MenieresDisease />} />
            <Route path="bppv" element={<BPPV />} />
            <Route path="vestibular-neuritis" element={<VestibularNeuritis />} />
          </Route>
          <Route path="autonomic">
            <Route index element={<Autonomic />} />
            <Route path="dysautonomia" element={<Dysautonomia />} />
            <Route path="orthostatic-hypotension" element={<OrthostaticHypotension />} />
            <Route path="panic-anxiety" element={<PanicAnxiety />} />
            <Route path="insomnia" element={<Insomnia />} />
          </Route>
          <Route path="neuropathy">
            <Route index element={<Neuropathy />} />
            <Route path="idiopathic" element={<Idiopathic />} />
            <Route path="diabetic" element={<Diabetic />} />
            <Route path="chemo" element={<Chemo />} />
          </Route>
          <Route path="brainfog">
            <Route index element={<Brainfog />} />
            <Route path="post-covid" element={<PostCovid />} />
            <Route path="chronic-fatigue" element={<ChronicFatigue />} />
            <Route path="students" element={<Students />} />
          </Route>
          {/* Main programs index */ }
          <Route path="programs" element={<Programs />} />
          {/* Mock routes for future expansion to satisfy links */}
          <Route path="blog" element={<div className="h-screen flex items-center justify-center p-20 text-center"><h1 className="text-2xl font-bold">블로그/사례 페이지 (준비 중)</h1></div>} />
          <Route path="location" element={<div className="h-screen flex items-center justify-center p-20 text-center"><h1 className="text-2xl font-bold">진료시간 및 오시는 길 (준비 중)</h1></div>} />
          <Route path="*" element={<div className="h-screen flex items-center justify-center p-20 text-center"><h1 className="text-2xl font-bold">페이지를 찾을 수 없습니다</h1></div>} />
        </Route>
      </Routes>
    </HashRouter>
  );
}
