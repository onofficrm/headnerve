<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/disease_builder.php';

/**
 * 2층 질환 상세 페이지 데이터 (co_id 키)
 */
function maekrak_disease_url($co_id)
{
    return G5_BBS_URL . '/content.php?co_id=' . urlencode($co_id);
}

function maekrak_diseases_co_ids()
{
    return array_keys(maekrak_diseases_data());
}

function maekrak_is_disease_co_id($co_id)
{
    return maekrak_get_disease_by_co_id($co_id) !== null;
}

function maekrak_get_disease_by_co_id($co_id)
{
    $all = maekrak_diseases_data();
    return isset($all[$co_id]) ? $all[$co_id] : null;
}

/**
 * 2층 치료 사례 목록 — cases 배열 또는 단일 case 호환
 */
function maekrak_disease_cases($page)
{
    if (!empty($page['cases']) && is_array($page['cases'])) {
        return $page['cases'];
    }
    if (!empty($page['case']) && is_array($page['case'])) {
        return array($page['case']);
    }
    return array();
}

/**
 * 1층 parent co_id + subtype slug → 2층 disease co_id
 */
function maekrak_disease_co_id_for_subtype($parent_co_id, $slug)
{
    $map = maekrak_disease_subtype_map();
    return isset($map[$parent_co_id][$slug]) ? $map[$parent_co_id][$slug] : null;
}

function maekrak_diseases_handcrafted_data()
{
    include_once G5_THEME_PATH . '/inc/disease_handcrafted_extra.php';

    $core = array(
        'migraine' => array(
            'co_id' => 'migraine',
            'page_name' => '편두통',
            'parent_co_id' => 'headache',
            'parent_name' => '두통',
            'hero_copy' => '반복되는 편두통, 통증 신호만 끄는 것으로는 부족할 수 있습니다',
            'hero_desc' => '맥락한의원은 편두통을 단순 혈관성 통증이 아니라 두개경추 구조, 자율신경, 뇌 에너지 불균형이 함께 만든 신경계 신호로 봅니다.',
            'visual_keywords' => array('박동성 통증', '빛·소리 과민', '두개경추', '뇌 에너지'),
            'meta_title' => '편두통 | 맥락한의원',
            'meta_description' => '반복되는 편두통을 두개경추·자율신경·뇌 에너지 균형의 관점에서 설명하는 맥락한의원 편두통 상세 안내입니다.',
            'canonical' => maekrak_disease_url('migraine'),
            'ai_anchor' => '편두통은 머리 한쪽에 박동성 통증이 4시간에서 72시간 지속되며, 구역감, 구토, 빛이나 소리 과민을 동반할 수 있는 신경계 질환입니다. 일부 환자는 빛 번짐, 시야 왜곡, 시야 제한 같은 전조 증상을 경험하기도 합니다.',
            'clinic_view' => '편두통은 뇌가 에너지 위기 상황에서 보내는 신호입니다. 통증을 억제하는 것도 필요할 수 있지만, 왜 편두통 발작이 반복되는지 원인을 확인해야 재발을 줄이는 치료 방향을 세울 수 있습니다.',
            'symptoms' => array(
                '머리 한쪽 또는 양쪽에 박동성 통증이 반복됩니다',
                '두통과 함께 구역감이나 구토가 있습니다',
                '빛, 소리, 냄새에 예민해집니다',
                '두통 전 눈앞이 번쩍이거나 시야가 흐려집니다',
                '생리 전후로 두통이 심해집니다',
                '진통제나 트립탄 효과가 점점 줄어듭니다',
                '두통 때문에 일상생활이나 업무가 어렵습니다',
            ),
            'why_intro' => '기존에는 편두통을 뇌가 예민해서 생기는 질환으로 설명하는 경우가 많습니다. 하지만 맥락한의원은 편두통을 뇌 에너지 공급 불안정, 자율신경 불균형, 두개경추 구조 문제의 연결로 봅니다.',
            'why_body' => '뇌에 필요한 연료 공급이 불안정하거나 소비가 과도해지면 뇌는 혈류를 늘리려 하고, 이 과정에서 혈관 확장과 신경 과민 반응이 두통으로 나타날 수 있습니다. 또한 후두하근과 C1·C2 주변의 긴장, 경막 긴장, 삼차신경혈관계의 과활성도 편두통 발작과 연결될 수 있습니다.',
            'why_cards' => array(
                array('title' => '뇌 에너지 공급 불안정', 'desc' => '에너지 소비와 공급의 불균형이 발작 신호로 이어질 수 있습니다.'),
                array('title' => '자율신경 불균형', 'desc' => '혈류 조절·각성 상태가 두통 패턴과 연결될 수 있습니다.'),
                array('title' => '두개경추·후두하근 긴장', 'desc' => 'C1·C2 주변 구조적 부담이 신경 과민을 유지시킬 수 있습니다.'),
                array('title' => '삼차신경혈관계 과활성', 'desc' => '혈관·신경 반응이 함께 과해지면 박동성 통증이 반복될 수 있습니다.'),
            ),
            'hero_image' => 'headache',
            'treatments' => array(
                array('title' => '두맥탕', 'desc' => '체질과 두통 패턴에 맞춰 신경계 불균형을 해소하고 뇌 에너지를 안정시킵니다. 에너지 안정화는 4주 이후, 발작 빈도 감소는 6~8주부터 체감하는 경우가 많습니다.', 'goal' => '자율신경 균형·뇌 에너지 안정화'),
                array('title' => '약침', 'desc' => '경막 긴장과 삼차신경혈관 과활성을 다룹니다. 후두하근 트리거포인트와 C1·C2 분절에 시술해 당겨지는 힘을 해소합니다. 시술 후 긴장 완화는 즉각 느끼는 경우가 많고, 발작 빈도 감소는 3~4회 이후부터 확인됩니다.', 'goal' => '삼차신경혈관·경막 긴장 완화'),
                array('title' => '추나', 'desc' => '두개경추 정렬이 회복되면 뇌척수액 순환이 원활해지고 경막 이완 상태를 구조적으로 유지할 수 있습니다. 약침 이후 이완된 상태에서 교정합니다.', 'goal' => '두개경추 정렬·구조 유지'),
                array('title' => '생활 관리', 'desc' => '수면, 식사, 카페인, 스트레스 패턴을 함께 관리합니다. 첫 4주 집중 치료 후 재평가·안정기·유지 치료를 진행합니다.', 'goal' => '유발 요인 조절·재발 관리'),
            ),
            'treatment_note' => '증상 호전은 4주 이내에 나타나는 경우가 많고, 완치까지는 3~6개월이 걸릴 수 있습니다. 편두통 기간, 동반 증상, 약물과용 여부에 따라 차이가 있습니다.',
            'cases' => array(
                array(
                    'title' => '10년간 전조·구토 동반 편두통',
                    'patient_type' => '시야 전조 후 극심한 두통 환자',
                    'before' => '빛 번짐·시야 흐림 후 20~30분 뒤 두통, 구토해야 끝나 일상 불가',
                    'history' => '10년간 신경과 약 의존, 이대로 살 수 없어 내원',
                    'assessment' => '두개경추·경추 기능 이상, 자율신경·뇌 에너지 불균형',
                    'treatment_direction' => '두맥탕·약침·추나, 3주차부터 강도 50% 감소',
                    'progress' => '집중 치료 후 발작 없어짐, 안정·유지 치료 3개월 종결',
                ),
                array(
                    'title' => '출산 이후 심해진 편두통',
                    'patient_type' => '출산 후 두통 악화 환자',
                    'before' => '아조비·트립탄도 효과 없어 일상 불가',
                    'history' => '출산 이후 두통 심화, 근본 치료 목적으로 내원',
                    'assessment' => '호르몬 변동과 겹친 경추·자율신경·뇌 에너지 문제',
                    'treatment_direction' => '두맥탕·약침·추나 4주 집중 치료',
                    'progress' => '4주 후 강도·빈도 50% 감소, 이후 발작 없어짐·4개월 종결',
                ),
            ),
            'faq' => array(
                array(
                    'q' => 'MRI 결과는 정상인데 편두통이 맞나요?',
                    'a' => 'MRI는 종양·출혈 등을 확인하는 검사입니다. 정상이라는 것은 그런 병이 없다는 뜻이지, 편두통 원인이 없다는 뜻이 아닙니다. 경추 기능 이상, 자율신경 불균형, 대사 문제는 MRI에 나타나지 않을 수 있습니다.',
                ),
                array(
                    'q' => '항CGRP 주사를 맞고 있는데 한의원 치료를 같이 받을 수 있나요?',
                    'a' => '가능합니다. 주사로 발작 빈도를 낮춘 상태에서 근본 원인을 함께 다루면 치료 속도가 빨라지는 경우도 있습니다. 복용·주사 중인 약은 임의로 중단하지 마세요.',
                ),
                array(
                    'q' => '생리 전후에 편두통이 심해집니다. 호르몬 문제 아닌가요?',
                    'a' => '호르몬 변동은 대표적인 트리거입니다. 평소 뇌 에너지 기반을 안정시키면 같은 호르몬 변동에도 발작으로 이어지지 않는 상태를 만드는 방향을 고려할 수 있습니다.',
                ),
                array(
                    'q' => '편두통이 10년 이상 됐는데 좋아질 수 있나요?',
                    'a' => '만성화 기간이 길수록 회복에 시간이 걸릴 수 있습니다. 경추 문제가 주된 분들은 기간과 무관하게 구조 교정에 반응하는 경우가 많아, 4주 집중 치료 후 경과를 함께 확인합니다.',
                ),
            ),
            'related' => array(
                array('co_id' => 'cluster_headache', 'name' => '군발두통'),
                array('co_id' => 'tension_headache', 'name' => '긴장형두통'),
                array('co_id' => 'cervicogenic_hd', 'name' => '경추성두통'),
            ),
            'blog_category' => '편두통',
        ),
        'cluster_headache' => array(
            'co_id' => 'cluster_headache',
            'page_name' => '군발두통',
            'parent_co_id' => 'headache',
            'parent_name' => '두통',
            'hero_copy' => '한쪽 눈 주위의 극심한 통증, 삼차자율신경계를 함께 봐야 합니다',
            'hero_desc' => '맥락한의원은 군발두통을 삼차신경과 자율신경계의 동시 과흥분, 그리고 두개경추 구조 문제의 관점에서 분석합니다.',
            'visual_keywords' => array('삼차신경', '자율신경', '눈 주위 통증', '두개경추'),
            'meta_title' => '군발두통 | 맥락한의원',
            'meta_description' => '군발두통을 삼차자율신경·두개경추·자율신경 균형의 관점에서 설명하는 맥락한의원 군발두통 상세 안내입니다.',
            'canonical' => maekrak_disease_url('cluster_headache'),
            'ai_anchor' => '군발두통은 한쪽 눈 주위에 극심한 통증이 15분에서 3시간씩 반복되며, 같은 쪽 눈물, 코막힘, 눈꺼풀 처짐, 충혈을 동반할 수 있는 삼차자율신경 두통입니다. 통증 강도가 매우 강하고 일정 기간 집중적으로 반복되는 특징이 있습니다.',
            'clinic_view' => '군발두통의 핵심은 삼차신경과 자율신경계의 동시 과흥분입니다. 맥락한의원은 군발두통을 삼차경추신경복합체와 교감·부교감신경 불균형의 관점에서 보고, 발작이 반복되는 구조적 원인을 함께 확인합니다.',
            'symptoms' => array(
                '한쪽 눈 주위나 관자놀이에 송곳으로 찌르는 듯한 통증이 옵니다',
                '통증이 15분에서 3시간 안에 끝나지만 하루에도 여러 번 반복됩니다',
                '통증과 함께 눈물, 충혈, 코막힘이 나타납니다',
                '몇 주에서 몇 달간 매일 반복되다가 갑자기 사라집니다',
                '음주 후 발작이 시작되는 경우가 있습니다',
                '통증이 너무 심해 가만히 누워 있기 어렵습니다',
            ),
            'why_intro' => '군발두통은 삼차신경핵과 상부경추 신경이 만나는 삼차경추신경복합체의 과흥분과 관련될 수 있습니다. 이 부위가 예민해지면 작은 자극에도 극심한 통증 신호가 만들어질 수 있습니다.',
            'why_body' => '군발두통 발작 중 나타나는 눈물, 코막힘, 충혈은 자율신경계 반응과 연결됩니다. 두개경추 구조 문제와 교감·부교감신경 불균형이 함께 작용하면 군발 기간이 반복될 수 있습니다.',
            'why_cards' => array(
                array('title' => '삼차경추신경복합체 과흥분', 'desc' => '삼차신경과 상부경추 신경의 과민 반응이 극심한 통증을 유발할 수 있습니다.'),
                array('title' => '자율신경계 반응', 'desc' => '눈물·코막힘·충혈 등 삼차자율신경 증상이 동반될 수 있습니다.'),
                array('title' => '두개경추 구조 문제', 'desc' => '구조적 부담이 신경 과민 상태를 유지시킬 수 있습니다.'),
                array('title' => '교감·부교감 불균형', 'desc' => '발작 사이에도 신경계 긴장이 남아 군발 기간이 반복될 수 있습니다.'),
            ),
            'hero_image' => 'headache',
            'treatments' => array(
                array('title' => '두맥탕', 'desc' => '체질과 두통 패턴에 맞춰 교감신경 과흥분을 완화하고 삼차자율신경계 균형을 회복합니다. 군발 기간 단축과 다음 군발기 발작 강도 감소가 목표입니다.', 'goal' => '군발 기간·강도 완화'),
                array('title' => '약침', 'desc' => 'TCC가 위치한 두개경추와 삼차신경 분지 경로에 시술해 과흥분된 삼차신경 감각 역치를 높입니다.', 'goal' => '삼차경추신경복합체 과민 완화'),
                array('title' => '추나', 'desc' => '두개경추 정렬이 회복되면 TCC 기계적 자극이 줄고 약침으로 낮춘 신경 과민이 안정적으로 유지됩니다.', 'goal' => '두개경추 정렬·구조 유지'),
                array('title' => '생활 관리', 'desc' => '군발 기간 유발 요인, 수면 리듬, 음주 등을 함께 관리합니다. 첫 4주 집중 후 재평가·안정·유지 치료를 진행합니다.', 'goal' => '유발 요인·재발 관리'),
            ),
            'treatment_note' => '증상 호전은 4주 이내에 나타나는 경우가 많고, 완치까지 3~6개월이 걸릴 수 있습니다. 군발 기간, 약물 사용, 동반 질환에 따라 차이가 있습니다.',
            'cases' => array(
                array(
                    'title' => '군발기 매일 극심한 두통',
                    'patient_type' => '30대 남성',
                    'before' => '오전 증상 시 눈물·콧물·코막힘과 눈 뒤 찌르는 통증 2시간, 응급실 수준',
                    'history' => '병원에서 해줄 수 있는 게 없다는 안내 후 내원',
                    'assessment' => 'TCC·두개경추 과흥분, 자율신경 불균형',
                    'treatment_direction' => '두맥탕·약침·추나',
                    'progress' => '2주 후 매일→이틀에 한 번, 강도 감소·일상 가능, 검사 정상 확인 후 종결',
                ),
                array(
                    'title' => '눈꺼풀 처짐까지 동반된 군발두통',
                    'patient_type' => '매년 군발을 겪는 환자',
                    'before' => '아침 진통제 1~2알, 하루 5~6알 복용 수준의 매일 두통',
                    'history' => '이번 군발기에 눈꺼풀 처짐 추가',
                    'assessment' => '삼차자율신경 과흥분·두개경추 구조 문제',
                    'treatment_direction' => '두맥탕·약침·추나',
                    'progress' => '3주차 눈꺼풀 처짐 완화 시작, 진통제 감소, 3개월 후 종결',
                ),
            ),
            'faq' => array(
                array(
                    'q' => '군발두통인지 편두통인지 구별이 안 됩니다.',
                    'a' => '편두통은 욱신거리고 군발두통은 찌릅니다. 편두통은 가만히 누우려 하고, 군발두통은 통증이 너무 세 가만히 있기 어렵습니다. 같은 쪽 눈물·콧물·코막힘·눈꺼풀 처짐이 동반되면 군발두통 가능성이 높습니다.',
                ),
                array(
                    'q' => '군발기가 지나면 치료를 안 해도 되지 않나요?',
                    'a' => '군발기가 끝났다는 것은 증상이 없다는 뜻이지, 삼차자율신경 과흥분이 사라진 뜻이 아닙니다. 이 기간에 치료를 유지해야 다음 군발기 예방에 도움이 될 수 있습니다.',
                ),
                array(
                    'q' => '술을 끊으면 군발두통이 낫나요?',
                    'a' => '금주는 군발 기간 발작 빈도를 줄이는 데 도움이 될 수 있으나, 알코올은 악화 요인일 뿐 근본 원인은 아닙니다. 과흥분 상태가 남으면 금주만으로는 부족할 수 있습니다.',
                ),
                array(
                    'q' => '스테로이드 처방을 받았는데 한의원 치료와 병행해도 되나요?',
                    'a' => '가능합니다. 스테로이드 단기 투여는 군발 기간 초반 발작 억제에 도움이 될 수 있으며, 맥락한의원 치료와 충돌하지 않습니다.',
                ),
            ),
            'related' => array(
                array('co_id' => 'migraine', 'name' => '편두통'),
                array('co_id' => 'tension_headache', 'name' => '긴장형두통'),
                array('co_id' => 'cervicogenic_hd', 'name' => '경추성두통'),
            ),
            'blog_category' => '군발두통',
        ),
        'dysautonomia' => array(
            'co_id' => 'dysautonomia',
            'page_name' => '자율신경실조증',
            'parent_co_id' => 'autonomic',
            'parent_name' => '자율신경',
            'hero_copy' => '검사에서는 정상인데 몸은 계속 힘들다면, 조절 회로를 봐야 합니다',
            'hero_desc' => '맥락한의원은 자율신경실조증을 단순한 스트레스 문제가 아니라 몸이 잘못된 균형점에 머무는 기능적 문제로 봅니다.',
            'visual_keywords' => array('두근거림', '호흡', '소화', '불면'),
            'meta_title' => '자율신경실조증 | 맥락한의원',
            'meta_description' => '검사 정상인데도 지속되는 자율신경실조증을 조절 회로·경추·생활 리듬의 관점에서 설명하는 맥락한의원 상세 안내입니다.',
            'canonical' => maekrak_disease_url('dysautonomia'),
            'ai_anchor' => '자율신경실조증은 심장박동, 호흡, 소화, 혈압, 체온 등을 조절하는 자율신경계의 균형이 흔들리면서 두근거림, 호흡곤란, 소화장애, 어지럼증, 불면, 피로 같은 증상이 반복되는 상태를 말합니다. 여러 검사에서 구조적 이상이 없어도 기능적 조절 문제로 증상이 나타날 수 있습니다.',
            'clinic_view' => '자율신경 불균형은 단순히 교감신경이 항진된 상태만을 의미하지 않습니다. 몸이 생명 유지를 위해 잘못된 방향으로 동적 평형을 맞춘 상태이며, 치료의 목표는 증상을 억제하는 것이 아니라 올바른 균형점을 회복하도록 돕는 것입니다.',
            'symptoms' => array(
                '이유 없이 심장이 두근거리거나 가슴이 답답합니다',
                '숨이 깊게 쉬어지지 않고 호흡이 불편합니다',
                '소화가 잘 안 되고 스트레스를 받으면 배가 불편합니다',
                '손발이 차거나 얼굴에 열이 오릅니다',
                '잠들기 어렵거나 자주 깹니다',
                '자도 피로가 풀리지 않습니다',
                '두통, 어지럼증, 불안감이 함께 반복됩니다',
            ),
            'why_intro' => '자율신경은 외부 환경 변화에 맞춰 몸을 자동으로 조절하는 시스템입니다. 만성 스트레스, 수면 부족, 과도한 디지털 자극, 잘못된 자세와 호흡 패턴이 반복되면 자율신경은 비상 상태를 정상 상태로 인식할 수 있습니다.',
            'why_body' => '이때 심장, 호흡기, 소화기 검사에서는 이상이 없지만 몸은 계속 긴장 상태에 머물게 됩니다. 경추와 흉추 주변의 근육 긴장도 교감신경절을 자극해 자율신경 불균형을 유지시키는 요인이 될 수 있습니다.',
            'why_cards' => array(
                array('title' => '만성 스트레스·수면 부족', 'desc' => '회복 리듬이 깨지면 조절 기능이 흔들릴 수 있습니다.'),
                array('title' => '교감신경절 자극', 'desc' => '경추·흉추 주변 긴장이 자율신경 반응을 유지시킬 수 있습니다.'),
                array('title' => '디지털·각성 과다', 'desc' => '집중·각성 상태가 지속되면 균형점이 어긋날 수 있습니다.'),
                array('title' => '호흡·자세 패턴', 'desc' => '얕은 호흡과 자세 습관이 자율신경에 영향을 줄 수 있습니다.'),
            ),
            'treatments' => array(
                array('title' => '심맥탕', 'desc' => '교감신경·부교감신경 균형과 전신 순환 회복을 목표로 하는 한약 프로그램입니다.', 'goal' => '자율신경 균형 회복'),
                array('title' => '약침', 'desc' => '경추·흉추 교감신경절 주변 긴장을 완화하는 치료입니다.', 'goal' => '교감신경 과자극 완화'),
                array('title' => '추나', 'desc' => '경추와 흉추 정렬 이상이 있는 경우 구조적 부담을 줄이는 치료입니다.', 'goal' => '구조적 부담 감소'),
                array('title' => '생활 관리', 'desc' => '수면, 호흡, 카페인, 디지털 자극, 스트레스 반응 패턴을 관리합니다.', 'goal' => '생활 리듬 회복'),
            ),
            'treatment_note' => '치료 목표는 증상 억제가 아니라 몸이 올바른 균형점을 찾도록 돕는 것입니다. 개인별 경과는 다를 수 있습니다.',
            'case' => array(
                'title' => '검사 정상, 복합 신체 증상',
                'patient_type' => '자율신경실조증 의심 환자',
                'before' => '두근거림·호흡 답답함·소화 불편·불면·피로가 함께 지속',
                'history' => '심장·호흡·소화 검사에서 구조적 이상 없음 안내',
                'assessment' => '장기 자체 문제보다 조절 회로·자율신경 균형 문제로 평가',
                'treatment_direction' => '심맥탕·약침·추나와 수면·호흡·생활 관리 병행',
                'progress' => '증상 패턴과 일상 영향을 단계적으로 확인하며 계획 조정',
            ),
            'faq' => array(
                array(
                    'q' => '검사에서는 정상인데 왜 증상이 계속되나요?',
                    'a' => '일반 검사는 장기의 구조적 이상을 확인하는 데 초점이 있습니다. 자율신경 문제는 조절 기능의 문제이기 때문에 검사에서 잘 드러나지 않을 수 있습니다.',
                ),
                array(
                    'q' => '공황장애와 자율신경실조증은 관련이 있나요?',
                    'a' => '공황 증상과 자율신경 불균형은 서로 영향을 줄 수 있습니다. 두근거림, 호흡 불편, 불안감이 함께 반복된다면 몸의 조절 상태를 확인해볼 필요가 있습니다.',
                ),
                array(
                    'q' => '생활 습관도 함께 봐야 하나요?',
                    'a' => '수면, 카페인, 호흡, 자세, 디지털 자극은 자율신경에 영향을 줄 수 있어 치료와 함께 관리하는 것이 도움이 됩니다.',
                ),
            ),
            'related' => array(
                array('co_id' => 'orthostatic_hp', 'name' => '기립성저혈압'),
                array('co_id' => 'panic_disorder', 'name' => '공황장애'),
                array('co_id' => 'insomnia_disorder', 'name' => '불면'),
            ),
            'blog_category' => '자율신경',
        ),
    );

    return array_merge(maekrak_diseases_handcrafted_extra(), $core);
}

function maekrak_diseases_data()
{
    static $cache = null;
    if ($cache !== null) {
        return $cache;
    }

    $handcrafted = maekrak_diseases_handcrafted_data();
    $generated = maekrak_diseases_generated_from_conditions(array_keys($handcrafted));
    $cache = array_merge($generated, $handcrafted);

    return $cache;
}

/**
 * 관련 질환 링크 URL
 */
function maekrak_disease_related_url($item)
{
    if (!empty($item['co_id']) && maekrak_is_disease_co_id($item['co_id'])) {
        return maekrak_disease_url($item['co_id']);
    }
    if (!empty($item['parent']) && !empty($item['slug'])) {
        $future = maekrak_disease_co_id_for_subtype($item['parent'], $item['slug']);
        if ($future) {
            return maekrak_disease_url($future);
        }
        return G5_BBS_URL . '/content.php?co_id=' . urlencode($item['parent'] . '_' . $item['slug']);
    }
    return '#';
}
