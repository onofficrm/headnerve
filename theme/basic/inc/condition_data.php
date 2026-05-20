<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 1층 진료과목 페이지 데이터 (co_id 키)
 */
function maekrak_condition_url($co_id)
{
    return G5_BBS_URL . '/content.php?co_id=' . urlencode($co_id);
}

function maekrak_conditions_co_ids()
{
    return array('headache', 'dizziness', 'autonomic', 'peripheral', 'brainfog');
}

function maekrak_is_condition_co_id($co_id)
{
    return in_array($co_id, maekrak_conditions_co_ids(), true);
}

function maekrak_get_condition_by_co_id($co_id)
{
    $all = maekrak_conditions_data();
    return isset($all[$co_id]) ? $all[$co_id] : null;
}

function maekrak_sub_condition_url($parent_co_id, $slug)
{
    return G5_BBS_URL . '/content.php?co_id=' . urlencode($parent_co_id . '_' . $slug);
}

function maekrak_conditions_data()
{
    $dept_url = G5_URL . '/#maekrak_dept';

    return array(
        'headache' => array(
            'co_id' => 'headache',
            'page_name' => '두통',
            'hero_copy' => '반복되는 두통, 통증이 아니라 원인을 봐야 합니다',
            'hero_desc' => '맥락한의원은 두통을 단순 통증으로 보지 않고 두개경추 구조, 자율신경, 뇌 에너지 균형의 문제로 함께 분석합니다.',
            'visual_keywords' => array('편두통', '경추성두통', '자율신경', '두개경추'),
            'meta_title' => '두통 | 맥락한의원',
            'meta_description' => '반복되는 두통을 두개경추 구조, 자율신경, 뇌 에너지 균형의 관점에서 분석하는 맥락한의원 두통 진료과목 안내입니다.',
            'canonical' => maekrak_condition_url('headache'),
            'ai_anchor' => '두통은 머리 부위에 발생하는 통증을 말하며, 편두통·긴장형두통·군발두통처럼 두통 자체가 질환인 일차성 두통과 다른 질환의 증상으로 나타나는 이차성 두통으로 나눌 수 있습니다. 만성적으로 반복되는 두통은 통증 억제만으로 해결되지 않는 경우가 많기 때문에 원인 평가가 필요합니다.',
            'clinic_view' => '맥락한의원은 반복되는 두통을 자율신경 기능 문제와 두개경추 구조 문제, 뇌 에너지 불균형이 함께 만든 신호로 봅니다.',
            'causes' => array(
                array('title' => '두개경추 구조 문제', 'desc' => '머리와 목이 만나는 부위의 정렬·긴장이 두통 패턴에 영향을 줄 수 있습니다.'),
                array('title' => '자율신경 불균형', 'desc' => '혈압·혈류 조절 이상이 두통과 함께 나타나는 경우가 많습니다.'),
                array('title' => '뇌 에너지 대사 불안정', 'desc' => '뇌에 필요한 에너지 공급이 불안정하면 두통이 반복될 수 있습니다.'),
                array('title' => '경막 긴장과 후두하근 문제', 'desc' => '후두부·목 주변 긴장이 두통을 유발하거나 악화시킬 수 있습니다.'),
            ),
            'subtypes' => array(
                array('name' => '편두통', 'desc' => '박동성 통증, 빛·소리 과민 등이 동반될 수 있습니다.', 'tags' => array('박동성', '메스꺼움'), 'slug' => 'migraine'),
                array('name' => '긴장형두통', 'desc' => '머리를 조이는 듯한 압박감이 양쪽에 나타날 수 있습니다.', 'tags' => array('압박감', '목·어깨'), 'slug' => 'tension'),
                array('name' => '군발두통', 'desc' => '한쪽 눈 주변의 극심한 통증이 주기적으로 반복될 수 있습니다.', 'tags' => array('눈 주변', '주기적'), 'slug' => 'cluster'),
                array('name' => '경추성두통', 'desc' => '목 움직임·자세와 함께 두통이 심해지는 경우를 봅니다.', 'tags' => array('경추', '자세'), 'slug' => 'cervicogenic'),
                array('name' => '약물과용두통', 'desc' => '진통제 사용이 잦을 때 두통이 오히려 지속될 수 있습니다.', 'tags' => array('진통제', '만성'), 'slug' => 'medication'),
                array('name' => '소아편두통', 'desc' => '소아·청소년의 두통 패턴을 성장 단계에 맞게 살핍니다.', 'tags' => array('소아', '성장'), 'slug' => 'pediatric'),
                array('name' => '생리두통', 'desc' => '호르몬 변화와 함께 나타나는 두통을 함께 확인합니다.', 'tags' => array('호르몬', '주기'), 'slug' => 'menstrual'),
                array('name' => '수험생두통', 'desc' => '장시간 집중·수면 부족과 연관된 두통을 봅니다.', 'tags' => array('집중', '수면'), 'slug' => 'student'),
            ),
            'checklist' => array(
                '신경과나 대학병원 검사는 정상인데 두통이 계속됩니다',
                '진통제를 먹어도 효과가 점점 줄어듭니다',
                '두통과 함께 어지럼증, 메스꺼움, 빛·소리 과민이 있습니다',
                '목과 어깨가 굳으면 두통이 심해집니다',
                '두통약에 의존하는 것이 걱정됩니다',
                '두통이 반복되어 일상생활과 업무에 지장이 있습니다',
            ),
            'programs' => array(
                'functional' => array('두맥탕', '자율신경 안정 치료'),
                'structural' => array('두개경추 약침', '추나 치료'),
            ),
            'program_note' => '두통은 통증 억제와 함께 두개경추·자율신경·뇌 에너지 균형을 함께 살피는 방향으로 진료합니다.',
            'blog_category' => '두통',
        ),
        'dizziness' => array(
            'co_id' => 'dizziness',
            'page_name' => '어지럼증',
            'hero_copy' => '검사에서는 정상인데 어지럽다면, 귀만 볼 문제가 아닐 수 있습니다',
            'hero_desc' => '맥락한의원은 어지럼증을 귀의 문제만이 아니라 경추 고유수용성 감각 이상과 자율신경 불균형의 관점에서 함께 봅니다.',
            'visual_keywords' => array('현훈', '경추', '전정', '자율신경'),
            'meta_title' => '어지럼증 | 맥락한의원',
            'meta_description' => '검사 정상인데도 지속되는 어지럼증을 경추·자율신경·전정 기능의 관점에서 안내하는 맥락한의원 어지럼증 진료과목 페이지입니다.',
            'canonical' => maekrak_condition_url('dizziness'),
            'ai_anchor' => '어지럼증은 자신이나 주변이 움직이는 것처럼 느껴지거나 균형을 잡기 어렵고 머리가 붕 뜨는 듯한 감각이 지속되는 증상입니다. 귀, 눈, 경추, 자율신경계 등 여러 시스템이 균형 감각에 관여하기 때문에 원인을 종합적으로 살펴야 합니다.',
            'clinic_view' => '빙빙 도는 회전성 어지럼증은 귀 문제일 가능성이 높지만, 몸이 붕 뜨는 느낌이나 물 위를 걷는 듯한 비회전성 어지럼증은 경추성 어지럼증이나 자율신경성 현기증과 관련될 수 있습니다.',
            'causes' => array(
                array('title' => '경추 고유수용성 감각 이상', 'desc' => '목·경추 정보 처리 이상이 어지럼·불안정감으로 이어질 수 있습니다.'),
                array('title' => '자율신경성 혈류 조절 문제', 'desc' => '기립·자세 변화 시 혈압·혈류 조절이 흔들리면 어지럼이 나타날 수 있습니다.'),
                array('title' => '전정기관 문제', 'desc' => '회전성 어지럼·메니에르·이석증 등 귀 전정과 연관될 수 있습니다.'),
                array('title' => '두통과 동반되는 신경계 불균형', 'desc' => '두통과 어지럼이 함께 반복되면 신경계 전반을 함께 봅니다.'),
            ),
            'subtypes' => array(
                array('name' => '경추성어지럼', 'desc' => '목 움직임·자세와 함께 어지럼이 심해지는 경우입니다.', 'tags' => array('경추', '자세'), 'slug' => 'cervical'),
                array('name' => '메니에르', 'desc' => '어지럼·난청·이명이 함께 나타날 수 있습니다.', 'tags' => array('이명', '청력'), 'slug' => 'meniere'),
                array('name' => 'BPPV 이석증', 'desc' => '특정 자세에서 짧게 심해지는 회전성 어지럼입니다.', 'tags' => array('자세', '회전'), 'slug' => 'bppv'),
                array('name' => '전정신경염', 'desc' => '갑작스러운 심한 회전성 어지럼 후에도 불안정감이 남을 수 있습니다.', 'tags' => array('회전', '만성'), 'slug' => 'vestibular'),
            ),
            'checklist' => array(
                '이비인후과 검사에서 이상이 없다는 말을 들었습니다',
                '빙빙 도는 것보다 몸이 붕 뜨는 느낌이 있습니다',
                '목을 움직이거나 자세를 바꾸면 어지럼증이 심해집니다',
                '앉았다 일어날 때 머리가 핑 돌거나 압이 찹니다',
                '두통과 어지럼증이 함께 반복됩니다',
                '대학병원 검사도 정상인데 증상이 계속됩니다',
            ),
            'programs' => array(
                'functional' => array('두맥탕', '자율신경 안정 치료'),
                'structural' => array('후두하근 약침', '경추 추나'),
            ),
            'program_note' => '어지럼증은 귀·경추·자율신경을 함께 보고, 기능 회복과 구조 치료를 병행하는 방향으로 진료합니다.',
            'blog_category' => '어지럼증',
        ),
        'autonomic' => array(
            'co_id' => 'autonomic',
            'page_name' => '자율신경',
            'hero_copy' => '검사에서는 정상인데 몸은 계속 힘들다면 자율신경을 확인해야 합니다',
            'hero_desc' => '맥락한의원은 자율신경 문제를 단순 교감신경 항진이 아니라 몸이 잘못된 균형점에 적응한 기능적 문제로 봅니다.',
            'visual_keywords' => array('두근거림', '불면', '호흡', '소화'),
            'meta_title' => '자율신경 | 맥락한의원',
            'meta_description' => '검사 정상인데도 지속되는 두근거림·불면·소화장애 등을 자율신경 균형의 관점에서 안내하는 맥락한의원 자율신경 진료과목 페이지입니다.',
            'canonical' => maekrak_condition_url('autonomic'),
            'ai_anchor' => '자율신경계는 심장박동, 호흡, 소화, 혈압, 체온처럼 의식적으로 조절할 수 없는 신체 기능을 자동으로 조율하는 신경계입니다. 자율신경 균형이 흔들리면 여러 장기 검사에서는 이상이 없어도 두근거림, 호흡곤란, 소화장애, 불면, 어지럼증 같은 증상이 함께 나타날 수 있습니다.',
            'clinic_view' => '자율신경 불균형은 단순히 교감신경이 높거나 낮은 문제가 아니라, 몸이 생존을 위해 잘못된 동적 평형 상태에 머무는 문제입니다. 치료 목표는 증상 억제가 아니라 올바른 균형점 회복입니다.',
            'causes' => array(
                array('title' => '만성 스트레스와 수면 불균형', 'desc' => '장기적인 긴장·수면 부족이 자율신경 리듬을 흐트러뜨릴 수 있습니다.'),
                array('title' => '경추·흉추 주변 교감신경 자극', 'desc' => '목·가슴 주변 긴장이 교감신경 활성과 연관될 수 있습니다.'),
                array('title' => '과도한 디지털 자극', 'desc' => '집중·각성 상태가 지속되면 회복 리듬이 깨질 수 있습니다.'),
                array('title' => '잘못된 자세와 호흡 패턴', 'desc' => '얕은 호흡·자세 습관이 자율신경 반응에 영향을 줄 수 있습니다.'),
            ),
            'subtypes' => array(
                array('name' => '자율신경실조증', 'desc' => '여러 증상이 교차하며 검사에서는 이상이 없는 경우가 많습니다.', 'tags' => array('복합증상', '기능'), 'slug' => 'dysautonomia'),
                array('name' => '기립성저혈압', 'desc' => '일어날 때 어지럼·눈앞이 캄캄해지는 증상과 연관됩니다.', 'tags' => array('기립', '어지럼'), 'slug' => 'orthostatic'),
                array('name' => '공황장애', 'desc' => '갑작스러운 두근거림·호흡곤란·불안 발작을 함께 살핍니다.', 'tags' => array('공황', '불안'), 'slug' => 'panic'),
                array('name' => '불안장애', 'desc' => '지속적인 긴장·불안과 신체 증상이 함께 나타날 수 있습니다.', 'tags' => array('불안', '긴장'), 'slug' => 'anxiety'),
                array('name' => '불면', 'desc' => '잠들기 어렵거나 자주 깨는 패턴을 수면·자율신경과 함께 봅니다.', 'tags' => array('수면', '피로'), 'slug' => 'insomnia'),
            ),
            'checklist' => array(
                '심장이 두근거리는데 심장 검사는 정상입니다',
                '숨이 막히는 느낌이 있지만 호흡기 검사는 정상입니다',
                '소화가 안 되고 손발이 차며 피로가 심합니다',
                '잠들기 어렵거나 자주 깹니다',
                '두통, 어지럼증, 피로가 함께 반복됩니다',
                '공황이나 불안 증상이 있는데 원인을 알고 싶습니다',
            ),
            'programs' => array(
                'functional' => array('심맥탕', '수면·호흡·생활 리듬 관리'),
                'structural' => array('교감신경절 주변 약침', '경추·흉추 추나'),
            ),
            'program_note' => '자율신경 진료는 증상 억제보다 몸의 균형점을 회복하는 기능 치료와 구조 치료를 함께 진행합니다.',
            'blog_category' => '자율신경',
        ),
        'peripheral' => array(
            'co_id' => 'peripheral',
            'page_name' => '말초신경병증',
            'hero_copy' => '손발 저림과 작열감, 혈액순환만의 문제가 아닐 수 있습니다',
            'hero_desc' => '맥락한의원은 말초신경병증을 말초 혈류, 신경 영양 공급, 신경 포착 문제를 함께 봐야 하는 신경 회복의 문제로 접근합니다.',
            'visual_keywords' => array('저림', '작열감', '말초혈류', '신경포착'),
            'meta_title' => '말초신경병증 | 맥락한의원',
            'meta_description' => '손발 저림·시림·작열감을 말초 혈류와 신경 회복의 관점에서 안내하는 맥락한의원 말초신경병증 진료과목 페이지입니다.',
            'canonical' => maekrak_condition_url('peripheral'),
            'ai_anchor' => '말초신경병증은 뇌와 척수를 제외한 말초신경이 손상되어 저림, 시림, 작열감, 감각 이상이 나타나는 질환입니다. 당뇨, 항암치료, 음주 등이 대표 원인이지만 원인을 명확히 찾지 못하는 경우도 많습니다.',
            'clinic_view' => '손발 저림과 다리 감각 이상이 오래 지속된다면 단순 혈액순환 문제가 아니라 신경 자체의 회복 환경을 확인해야 합니다. 말초신경 회복에는 혈류와 영양 공급, 그리고 신경이 눌린 통로를 풀어주는 치료가 함께 필요합니다.',
            'causes' => array(
                array('title' => '말초 혈류 저하', 'desc' => '손발로 가는 혈류가 줄면 저림·감각 이상이 나타날 수 있습니다.'),
                array('title' => '신경 영양 공급 부족', 'desc' => '신경이 회복·유지되기 위한 영양 환경이 부족할 수 있습니다.'),
                array('title' => '신경 포착과 압박', 'desc' => '허리·골반·하지 통로에서 신경이 눌리면 증상이 지속될 수 있습니다.'),
                array('title' => '당뇨·항암 후 신경 손상', 'desc' => '대사 질환·항암 치료 이후 말초신경 손상이 흔합니다.'),
            ),
            'subtypes' => array(
                array('name' => '말초신경병증', 'desc' => '원인이 명확하지 않아도 손발 감각 이상이 지속되는 경우입니다.', 'tags' => array('저림', '감각이상'), 'slug' => 'general'),
                array('name' => '당뇨병성 말초신경병증', 'desc' => '당뇨와 함께 손발 저림·작열감이 나타나는 경우를 봅니다.', 'tags' => array('당뇨', '말초'), 'slug' => 'diabetic'),
                array('name' => '항암 후 말초신경병증 CIPN', 'desc' => '항암 치료 후 손발 저림·감각 이상이 남는 경우입니다.', 'tags' => array('항암', 'CIPN'), 'slug' => 'cipn'),
            ),
            'checklist' => array(
                '발끝이나 손끝이 저리고 시립니다',
                '발바닥이 타는 듯하거나 전기가 오는 느낌이 있습니다',
                '밤에 저림과 작열감이 심해져 잠을 방해합니다',
                '허리디스크 치료를 받았는데 발바닥 증상은 낫지 않습니다',
                '항암치료 후 손발 저림과 감각 이상이 생겼습니다',
                '감각이 점점 무뎌지는 느낌이 듭니다',
            ),
            'programs' => array(
                'functional' => array('통맥탕'),
                'structural' => array('말초신경 약침', '침 치료', '신경 포착 부위 치료'),
            ),
            'program_note' => '말초신경병증은 혈류·영양·신경 포착을 함께 보는 신경 회복 중심의 진료를 진행합니다.',
            'blog_category' => '말초신경',
        ),
        'brainfog' => array(
            'co_id' => 'brainfog',
            'page_name' => '브레인포그',
            'hero_copy' => '머리가 멍하고 집중이 안 된다면 의지 문제가 아닐 수 있습니다',
            'hero_desc' => '맥락한의원은 브레인포그를 정신력 문제가 아니라 뇌 혈류 공급, 에너지 대사, 두개경추 구조 문제로 인한 기능 저하로 봅니다.',
            'visual_keywords' => array('집중력', '뇌혈류', '피로', '에너지'),
            'meta_title' => '브레인포그 | 맥락한의원',
            'meta_description' => '머리 멍함·집중력 저하를 뇌 혈류·에너지 대사·두개경추 구조의 관점에서 안내하는 맥락한의원 브레인포그 진료과목 페이지입니다.',
            'canonical' => maekrak_condition_url('brainfog'),
            'ai_anchor' => '브레인포그는 뇌에 안개가 낀 것처럼 사고가 흐릿해지고 집중력, 기억력, 언어 처리 능력이 떨어지는 상태를 말합니다. MRI 검사에서 구조적 이상이 없더라도 뇌 혈류 공급, 에너지 대사, 수면 회복 기능의 문제로 나타날 수 있습니다.',
            'clinic_view' => '브레인포그는 의지 부족이나 단순 피로가 아닙니다. 뇌에 혈액과 에너지가 원활하게 공급되지 않고 노폐물 배출이 잘 되지 않는 환경이 지속될 때 나타나는 기능적 문제입니다.',
            'causes' => array(
                array('title' => '두개경추 부정렬', 'desc' => '머리·목 정렬 이상이 뇌 혈류·긴장에 영향을 줄 수 있습니다.'),
                array('title' => '자율신경 불균형', 'desc' => '각성·회복 리듬이 깨지면 집중·인지 기능이 떨어질 수 있습니다.'),
                array('title' => '뇌 에너지 대사 저하', 'desc' => '뇌에 필요한 에너지 공급이 불안정하면 멍함이 지속될 수 있습니다.'),
                array('title' => '수면 회복 기능 저하', 'desc' => '수면의 질이 낮으면 낮 동안 인지 기능이 떨어질 수 있습니다.'),
            ),
            'subtypes' => array(
                array('name' => '코로나 후유증 브레인포그', 'desc' => '감염 이후 집중·기억·피로가 함께 지속되는 경우입니다.', 'tags' => array('후유증', '피로'), 'slug' => 'longcovid'),
                array('name' => '만성피로 브레인포그', 'desc' => '만성 피로와 함께 머리가 흐릿한 상태가 이어집니다.', 'tags' => array('만성피로', '집중'), 'slug' => 'fatigue'),
                array('name' => '수면장애 연관 브레인포그', 'desc' => '불면·수면 질 저하와 함께 인지 기능이 떨어지는 경우입니다.', 'tags' => array('수면', '불면'), 'slug' => 'sleep'),
            ),
            'checklist' => array(
                '책을 읽어도 내용이 머리에 들어오지 않습니다',
                '말하다가 단어가 잘 떠오르지 않습니다',
                '커피 없이는 오전을 버티기 어렵습니다',
                '잠을 자도 아침에 머리가 무겁고 멍합니다',
                '코로나 이후 집중력과 기억력이 떨어졌습니다',
                '만성피로와 함께 머리가 흐릿한 느낌이 계속됩니다',
            ),
            'programs' => array(
                'functional' => array('두맥탕', '총명공진단', '뇌 에너지 회복 관리'),
                'structural' => array('두개경추 약침', '추나 치료'),
            ),
            'program_note' => '브레인포그는 뇌 혈류·에너지·수면 회복을 함께 보는 기능 치료와 두개경추 구조 치료를 병행합니다.',
            'blog_category' => '브레인포그',
        ),
    );
}
