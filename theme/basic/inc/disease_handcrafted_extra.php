<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 2층 질환 수작업 보강 (9차) — builder 템플릿 대체
 */
function maekrak_diseases_handcrafted_extra()
{
    $tension = array(
        'co_id' => 'tension_headache',
        'page_name' => '긴장형두통',
        'parent_co_id' => 'headache',
        'parent_name' => '두통',
        'hero_copy' => '머리를 조이는 압박감, 목·어깨 긴장과 함께 오는 경우가 많습니다',
        'hero_desc' => '맥락한의원은 긴장형두통을 단순 스트레스 두통이 아니라 후두하근·경추 긴장과 자율신경 과민이 겹친 신경계 반응으로 봅니다.',
        'visual_keywords' => array('압박감', '후두하근', '경추', '자율신경'),
        'meta_title' => '긴장형두통 | 맥락한의원',
        'meta_description' => '양쪽 머리를 조이는 듯한 긴장형두통을 두개경추·후두부 긴장·자율신경 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('tension_headache'),
        'ai_anchor' => '긴장형두통은 양쪽 관자놀이·후두부에 띠를 두른 듯한 압박감이 나타나는 일차성 두통으로, 스트레스·수면 부족·목·어깨 긴장과 연관되는 경우가 많습니다.',
        'clinic_view' => '압박감만 완화하는 것보다, 왜 목·후두부 긴장과 자율신경 반응이 함께 유지되는지 확인하는 것이 재발을 줄이는 데 중요합니다.',
        'symptoms' => array(
            '양쪽 머리를 띠로 조이는 듯한 압박감이 있습니다',
            '목·어깨·후두부가 함께 뻣뻣하거나 결립니다',
            '스트레스·수면 부족 후 두통이 심해집니다',
            '박동성보다 누르는 듯한 통증이 지속됩니다',
            '진통제를 자주 복용하게 됩니다',
            '집중·업무 시 통증이 악화됩니다',
        ),
        'why_intro' => '긴장형두통은 근육 긴장만의 문제가 아닐 때가 많습니다. 후두하근과 경추 주변 긴장이 신경 과민을 유지하고, 자율신경 불균형이 통증 패턴을 반복시킬 수 있습니다.',
        'why_body' => '장시간 같은 자세, 얕은 호흡, 스크린 집중은 후두부·목 긴장을 키웁니다. 이 상태가 오래가면 뇌·막 주변 긴장과 혈류 조절 문제가 겹쳐 압박형 두통으로 나타날 수 있습니다.',
        'why_cards' => array(
            array('title' => '후두하근·경추 긴장', 'desc' => '후두부 압박감의 구조적 원인이 될 수 있습니다.'),
            array('title' => '자율신경 과민', 'desc' => '긴장 상태가 몸에 고착되면 통증이 반복될 수 있습니다.'),
            array('title' => '수면·스트레스', 'desc' => '회복 리듬이 깨지면 증상이 악화될 수 있습니다.'),
            array('title' => '자세·호흡', 'desc' => '얕은 호흡과 자세 습관이 목 부담을 키울 수 있습니다.'),
        ),
        'blog_category' => '두통',
    );

    $cervicogenic = array(
        'co_id' => 'cervicogenic_hd',
        'page_name' => '경추성두통',
        'parent_co_id' => 'headache',
        'parent_name' => '두통',
        'hero_copy' => '목을 움직이거나 자세를 바꿀 때 두통이 심해진다면 경추를 함께 봐야 합니다',
        'hero_desc' => '맥락한의원은 경추성두통을 목·두개경추 구조 문제와 후두부 긴장, 자율신경 반응의 연결로 분석합니다.',
        'visual_keywords' => array('경추', '자세', '후두부', 'C1·C2'),
        'meta_title' => '경추성두통 | 맥락한의원',
        'meta_description' => '목 움직임·자세와 연관된 경추성두통을 두개경추·후두부 긴장 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('cervicogenic_hd'),
        'ai_anchor' => '경추성두통은 목·경추의 움직임, 자세, 후두부·상부 경추 주변 구조 문제와 연관되어 두통이 유발·악화되는 유형으로 이해됩니다.',
        'clinic_view' => '두통만 치료하기보다 목·두개경추 정렬과 후두하근 긴장, 일상 자세를 함께 보는 것이 재발 관리에 도움이 됩니다.',
        'symptoms' => array(
            '목을 돌리거나 굽힐 때 두통이 심해집니다',
            '후두부·목덜미에서 시작해 머리로 퍼지는 통증이 있습니다',
            '장시간 책상 작업 후 두통이 악화됩니다',
            '어깨·목 결림과 두통이 함께 반복됩니다',
            '이미지·MRI에서 이상이 없다는 설명을 들었습니다',
            '마사지 후 일시 완화되다가 다시 심해집니다',
        ),
        'why_intro' => '경추는 머리의 위치 정보와 혈류·신경 신호에 큰 영향을 줍니다. C1·C2 주변 긴장과 잘못된 자세 습관이 후두부 통증으로 이어질 수 있습니다.',
        'why_body' => '고개를 앞으로 내민 자세, 스크린 집중, 수면 시 높은 베개 등은 경추 부담을 키웁니다. 구조적 부담이 오래가면 후두하근·경막 주변 긴장과 두통이 함께 유지될 수 있습니다.',
        'why_cards' => array(
            array('title' => 'C1·C2·후두하근', 'desc' => '상부 경추 긴장이 후두통과 연결될 수 있습니다.'),
            array('title' => '자세·VDU 작업', 'desc' => '장시간 고정 자세가 부담을 키울 수 있습니다.'),
            array('title' => '고유수용성 감각', 'desc' => '목 위치 감각 이상이 통증을 유지시킬 수 있습니다.'),
            array('title' => '자율신경', 'desc' => '긴장 반응이 혈류·통증에 영향을 줄 수 있습니다.'),
        ),
        'blog_category' => '두통',
    );

    $cervical_diz = array(
        'co_id' => 'cervical_dizziness',
        'page_name' => '경추성어지럼',
        'parent_co_id' => 'dizziness',
        'parent_name' => '어지럼증',
        'hero_copy' => '빙빙 도는 느낌보다 몸이 붕 뜨고 불안정할 때, 경추를 확인해야 합니다',
        'hero_desc' => '맥락한의원은 경추성어지럼을 경추 고유수용성 감각 이상과 자율신경성 혈류 조절 문제의 관점에서 봅니다.',
        'visual_keywords' => array('비회전성', '경추', '균형', '자율신경'),
        'meta_title' => '경추성어지럼 | 맥락한의원',
        'meta_description' => '몸이 붕 뜨는 경추성어지럼을 경추·자율신경·전정 기능의 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('cervical_dizziness'),
        'ai_anchor' => '경추성어지럼은 회전성 어지럼보다 몸이 붕 뜨거나 물 위를 걷는 듯한 비회전성 어지럼·불안정감이 주된 경우가 많으며, 목·경추의 위치 감각 처리 이상과 연관될 수 있습니다.',
        'clinic_view' => '귀 전정만 보지 않고, 목 움직임·자세와 함께 나타나는지, 기립 시 악화되는지를 함께 확인합니다.',
        'symptoms' => array(
            '빙빙 도는 느낌보다 머리가 붕 뜹니다',
            '목을 움직이면 어지럼이 심해집니다',
            '앉았다 일어날 때 불안정감이 있습니다',
            '이비인후과 검사는 정상이었습니다',
            '두통·목 결림과 함께 반복됩니다',
            '넓은 공간·밝은 곳에서 불편함이 큽니다',
        ),
        'why_intro' => '균형은 귀의 전정, 시각, 경추의 위치 정보가 함께 맞춰질 때 안정됩니다. 경추 정보가 흐트러지면 비회전성 어지럼·불안정감이 나타날 수 있습니다.',
        'why_body' => '경추 긴장과 자세 문제는 자율신경성 혈류 조절 이상과 겹치기 쉽습니다. 구조·기능·생활 습관을 함께 보는 치료가 도움이 될 수 있습니다.',
        'why_cards' => array(
            array('title' => '경추 고유수용성', 'desc' => '목 위치 정보 처리 이상이 어지럼으로 이어질 수 있습니다.'),
            array('title' => '자율신경·혈류', 'desc' => '기립·자세 변화 시 어지럼이 악화될 수 있습니다.'),
            array('title' => '후두·상부 경추', 'desc' => '후두부 긴장이 증상과 연관될 수 있습니다.'),
            array('title' => '두통 동반', 'desc' => '두통·어지럼이 함께면 신경계 전반을 봅니다.'),
        ),
        'blog_category' => '어지럼증',
    );

    $panic = array(
        'co_id' => 'panic_disorder',
        'page_name' => '공황장애',
        'parent_co_id' => 'autonomic',
        'parent_name' => '자율신경',
        'hero_copy' => '갑작스러운 두근거림·호흡곤란, 몸의 비상 반응이 반복될 때',
        'hero_desc' => '맥락한의원은 공황 증상을 자율신경 조절 회로·경추·흉추 긴장, 생활 리듬의 관점에서 함께 봅니다.',
        'visual_keywords' => array('공황', '두근거림', '호흡', '불안'),
        'meta_title' => '공황장애 | 맥락한의원',
        'meta_description' => '공황장애 증상을 자율신경 균형·경추 긴장·생활 리듬 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('panic_disorder'),
        'ai_anchor' => '공황장애는 갑작스러운 극심한 불안과 함께 두근거림, 호흡곤란, chest tightness, 어지럼, 발한 등이 10분 내외로 나타났다가 완화되는 발작이 반복되는 상태를 말합니다.',
        'clinic_view' => '불안만 다루기보다, 몸이 비상 모드에 고착된 자율신경 반응과 경추·흉추 긴장, 수면·호흡 패턴을 함께 살핍니다.',
        'symptoms' => array(
            '갑자기 심장이 빠르게 뛰고 숨이 막힙니다',
            '죽을 것 같은 공포감이 듭니다',
            '어지럼·실신할 것 같은 느낌이 동반됩니다',
            '손발이 차고 땀이 납니다',
            '발작 후 피로·불안이 남습니다',
            '심장·폐 검사에서는 이상이 없었습니다',
        ),
        'why_intro' => '공황은 심리적 요인과 자율신경계의 과도한 각성 반응이 함께 작용하는 경우가 많습니다. 몸이 위험 신호에 과민하게 반응하도록 고착될 수 있습니다.',
        'why_body' => '경추·흉추 교감신경절 주변 긴장, 수면 부족, 카페인, 얕은 호흡은 발작을 촉진·유지할 수 있습니다. 심맥탕·약침·추나와 생활 관리를 병행하는 방향을 고려합니다.',
        'why_cards' => array(
            array('title' => '자율신경 과각성', 'desc' => '비상 반응이 쉽게 켜지는 상태일 수 있습니다.'),
            array('title' => '경추·흉추 긴장', 'desc' => '교감신경 자극과 연관될 수 있습니다.'),
            array('title' => '호흡·수면', 'desc' => '얕은 호흡과 수면 부족이 악화 요인이 될 수 있습니다.'),
            array('title' => '불안 고착', 'desc' => '발작 경험이 예기 불안을 키울 수 있습니다.'),
        ),
        'blog_category' => '자율신경',
    );

    $diabetic = array(
        'co_id' => 'diabetic_neuropathy',
        'page_name' => '당뇨성신경병증',
        'parent_co_id' => 'peripheral',
        'parent_name' => '말초신경병증',
        'hero_copy' => '당뇨와 함께 손발 저림·작열감이 오래가면 말초 회복 환경을 봐야 합니다',
        'hero_desc' => '맥락한의원은 당뇨성신경병증을 혈당 관리와 함께 말초 혈류·신경 영양 공급 회복의 관점에서 봅니다.',
        'visual_keywords' => array('당뇨', '저림', '말초혈류', '통맥탕'),
        'meta_title' => '당뇨성신경병증 | 맥락한의원',
        'meta_description' => '당뇨성신경병증의 저림·작열감을 말초 혈류·신경 회복 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('diabetic_neuropathy'),
        'ai_anchor' => '당뇨성신경병증은 당뇨로 인한 말초신경 손상으로 손발 저림, 감각 둔화, 작열감, 통증이 나타날 수 있는 합병증입니다.',
        'clinic_view' => '혈당·당화혈색소 관리는 주치의와 병행하고, 말초 혈류와 신경 회복 환경을 한의학적으로 함께 돕는 방향을 고려합니다.',
        'symptoms' => array(
            '손끝·발끝이 저리거나 감각이 둔해집니다',
            '밤에 작열감·통증이 심해집니다',
            '양말·신발 감각이 이상합니다',
            '당뇨 진단 후 증상이 점점 심해졌습니다',
            '균형·보행에 불편함이 생깁니다',
            '상처 회복이 더딥니다',
        ),
        'why_intro' => '당뇨는 말초 혈관·신경에 영향을 줍니다. 혈당만 조절해도 증상이 남는 경우, 말초 영양·혈류 공급을 함께 살필 필요가 있습니다.',
        'why_body' => '통맥탕·말초신경 약침·침 치료로 말초 회복 환경을 개선하는 방향을 고려합니다. 당뇨 약·인슐린 등 기존 치료는 임의 중단하지 않습니다.',
        'why_cards' => array(
            array('title' => '말초 혈류 저하', 'desc' => '영양·산소 공급이 줄면 감각 이상이 지속될 수 있습니다.'),
            array('title' => '신경 영양', 'desc' => '신경 회복에 필요한 환경을 돕는 치료를 고려합니다.'),
            array('title' => '당뇨 병행 관리', 'desc' => '혈당 관리는 주치의와 함께합니다.'),
            array('title' => '생활·운동', 'desc' => '말초 순환에 도움이 되는 습관을 함께 봅니다.'),
        ),
        'blog_category' => '말초신경',
    );

    $longcovid = array(
        'co_id' => 'longcovid_brainfog',
        'page_name' => '장기코로나브레인포그',
        'parent_co_id' => 'brainfog',
        'parent_name' => '브레인포그',
        'hero_copy' => '코로나 이후 머리 멍함·피로가 남아 있다면 뇌 에너지 회복을 봐야 합니다',
        'hero_desc' => '맥락한의원은 장기코로나 후 브레인포그를 뇌 에너지·혈류·자율신경·수면 리듬의 관점에서 봅니다.',
        'visual_keywords' => array('장기코로나', '피로', '집중력', '뇌 에너지'),
        'meta_title' => '장기코로나 브레인포그 | 맥락한의원',
        'meta_description' => '장기코로나 이후 브레인포그·피로를 뇌 에너지 회복 관점에서 안내하는 맥락한의원 상세 페이지입니다.',
        'canonical' => maekrak_disease_url('longcovid_brainfog'),
        'ai_anchor' => '장기코로나 후유증으로 피로, 집중력 저하, 머리 멍함, 수면 문제, 두통 등이 수주~수개월 이상 지속되는 경우를 말하며, 브레인포그는 그중 인지·에너지 관련 증상을 가리킵니다.',
        'clinic_view' => '의지나 능력 문제가 아니라, 뇌에 필요한 에너지·혈류 공급과 자율신경·수면 회복이 불안정한 상태로 이해하고 치료 방향을 세웁니다.',
        'symptoms' => array(
            '코로나 이후 피로가 쉽게 가지 않습니다',
            '머리가 멍하고 집중이 잘 안 됩니다',
            '가벼운 일에도 에너지가 빨리 소진됩니다',
            '수면을 해도 개운하지 않습니다',
            '두통·어지럼이 함께 나타날 수 있습니다',
            '업무·공부 복귀가 어렵습니다',
        ),
        'why_intro' => '감염 이후 몸의 회복 리듬이 깨지면 뇌 에너지 대사와 자율신경, 수면이 함께 흔들릴 수 있습니다. 증상만 겨딜하기보다 회복 환경을 만드는 것이 중요합니다.',
        'why_body' => '두맥탕·총명공진단·약침·추나와 수면·활동량 조절을 단계적으로 병행하는 방향을 고려합니다. 개인별 경과는 다릅니다.',
        'why_cards' => array(
            array('title' => '뇌 에너지 대사', 'desc' => '뇌로 가는 연료·혈류 공급을 살핍니다.'),
            array('title' => '자율신경·수면', 'desc' => '회복 리듬이 깨지면 증상이 지속될 수 있습니다.'),
            array('title' => '만성 피로', 'desc' => '무리한 활동보다 단계적 회복이 필요할 수 있습니다.'),
            array('title' => '두통·어지럼 동반', 'desc' => '신경계 전반을 함께 평가합니다.'),
        ),
        'blog_category' => '브레인포그',
    );

    foreach (array(&$tension, &$cervicogenic, &$cervical_diz, &$panic, &$diabetic, &$longcovid) as &$page) {
        $profile = maekrak_disease_parent_profile($page['parent_co_id']);
        $page['treatments'] = array($profile['herb'], $profile['acu'], $profile['chuna'], $profile['life']);
        $page['treatment_note'] = '치료 목표는 증상 완화와 함께 재발·악화 요인을 줄이는 것입니다. 개인별 경과와 소요 기간은 다를 수 있습니다.';
        $page['case'] = array(
            'title' => $page['page_name'] . ' 상담 사례',
            'patient_type' => $page['page_name'] . ' 증상 환자',
            'before' => $page['page_name'] . '으로 일상·업무에 지장',
            'history' => '검사 정상 안내 또는 자가 관리 한계',
            'assessment' => $profile['view_extra'] . ' 관점에서 평가',
            'treatment_direction' => $profile['herb']['title'] . '·약침·추나와 생활 관리',
            'progress' => '증상 패턴을 단계적으로 확인하며 조정',
        );
        $page['faq'] = array(
            array('q' => $page['page_name'] . '도 한의원에서 치료할 수 있나요?', 'a' => '증상 패턴과 검사·치료 이력을 확인한 뒤 치료 방향을 고려할 수 있습니다.'),
            array('q' => $page['parent_name'] . ' 페이지와 무엇이 다른가요?', 'a' => $page['parent_name'] . '은 전체 개요이고, 이 페이지는 ' . $page['page_name'] . '에 초점을 맞춘 안내입니다.'),
            array('q' => '치료 기간은 얼마나 걸리나요?', 'a' => '증상 기간·동반 증상·생활 습관에 따라 다릅니다. 초기 상담에서 계획을 세우는 것이 좋습니다.'),
        );
    }
    unset($page);

    $tension['related'] = array(
        array('co_id' => 'migraine', 'name' => '편두통'),
        array('co_id' => 'cervicogenic_hd', 'name' => '경추성두통'),
        array('co_id' => 'medication_headache', 'name' => '약물과용두통'),
    );
    $cervicogenic['related'] = array(
        array('co_id' => 'tension_headache', 'name' => '긴장형두통'),
        array('co_id' => 'migraine', 'name' => '편두통'),
        array('co_id' => 'cervical_dizziness', 'name' => '경추성어지럼'),
    );
    $cervical_diz['related'] = array(
        array('co_id' => 'bppv', 'name' => 'BPPV 이석증'),
        array('co_id' => 'meniere', 'name' => '메니에르'),
        array('co_id' => 'cervicogenic_hd', 'name' => '경추성두통'),
    );
    $panic['related'] = array(
        array('co_id' => 'dysautonomia', 'name' => '자율신경실조증'),
        array('co_id' => 'anxiety_disorder', 'name' => '불안장애'),
        array('co_id' => 'insomnia_disorder', 'name' => '불면'),
    );
    $diabetic['related'] = array(
        array('co_id' => 'peripheral_neuro', 'name' => '말초신경병증'),
        array('co_id' => 'cipn', 'name' => '항암치료후신경병증'),
    );
    $longcovid['related'] = array(
        array('co_id' => 'fatigue_brainfog', 'name' => '만성피로브레인포그'),
        array('co_id' => 'sleep_brainfog', 'name' => '수면저하브레인포그'),
    );

    return array(
        'tension_headache' => $tension,
        'cervicogenic_hd' => $cervicogenic,
        'cervical_dizziness' => $cervical_diz,
        'panic_disorder' => $panic,
        'diabetic_neuropathy' => $diabetic,
        'longcovid_brainfog' => $longcovid,
    );
}
