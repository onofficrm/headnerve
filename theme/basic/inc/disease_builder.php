<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 1층 subtype → 2층 co_id 매핑 (전체 23개)
 */
function maekrak_disease_subtype_map()
{
    return array(
        'headache' => array(
            'migraine' => 'migraine',
            'tension' => 'tension_headache',
            'cluster' => 'cluster_headache',
            'cervicogenic' => 'cervicogenic_hd',
            'medication' => 'medication_headache',
            'pediatric' => 'pediatric_headache',
            'menstrual' => 'menstrual_headache',
            'student' => 'student_headache',
        ),
        'dizziness' => array(
            'cervical' => 'cervical_dizziness',
            'meniere' => 'meniere',
            'bppv' => 'bppv',
            'vestibular' => 'vestibular_neuritis',
        ),
        'autonomic' => array(
            'dysautonomia' => 'dysautonomia',
            'orthostatic' => 'orthostatic_hp',
            'panic' => 'panic_disorder',
            'anxiety' => 'anxiety_disorder',
            'insomnia' => 'insomnia_disorder',
        ),
        'peripheral' => array(
            'general' => 'peripheral_neuro',
            'diabetic' => 'diabetic_neuropathy',
            'cipn' => 'cipn',
        ),
        'brainfog' => array(
            'longcovid' => 'longcovid_brainfog',
            'fatigue' => 'fatigue_brainfog',
            'sleep' => 'sleep_brainfog',
        ),
    );
}

function maekrak_disease_parent_profile($parent_co_id)
{
    $profiles = array(
        'headache' => array(
            'blog' => '두통',
            'visual' => array('두개경추', '자율신경', '뇌 에너지', '후두하근'),
            'herb' => array('title' => '두맥탕', 'desc' => '두통 패턴과 체질에 맞춰 신경계 균형과 뇌 에너지 안정화를 돕는 한약 프로그램입니다.', 'goal' => '발작·통증 완화와 재발 요인 관리'),
            'acu' => array('title' => '약침', 'desc' => '후두하근, C1·C2 분절, 경막 긴장과 연관된 부위를 치료합니다.', 'goal' => '신경 과민·구조적 긴장 완화'),
            'chuna' => array('title' => '추나', 'desc' => '두개경추 정렬을 회복해 구조적 부담을 줄이는 치료입니다.', 'goal' => '목·두개경추 부담 감소'),
            'life' => array('title' => '생활 관리', 'desc' => '수면, 식사, 카페인, 스트레스 패턴을 함께 관리합니다.', 'goal' => '유발 요인 조절'),
            'view_extra' => '두개경추 구조, 자율신경, 뇌 에너지 균형',
        ),
        'dizziness' => array(
            'blog' => '어지럼증',
            'visual' => array('경추', '전정', '자율신경', '혈류'),
            'herb' => array('title' => '두맥탕', 'desc' => '어지럼 패턴과 체질에 맞춰 전정·자율신경·경추 기능 회복을 돕는 한약 프로그램입니다.', 'goal' => '어지럼 빈도·강도 완화'),
            'acu' => array('title' => '약침', 'desc' => '후두하근, 경추 고유수용성 감각과 연관된 부위를 치료합니다.', 'goal' => '경추·후두부 긴장 완화'),
            'chuna' => array('title' => '추나', 'desc' => '경추 정렬과 자세 부담을 줄이는 치료입니다.', 'goal' => '경추성 어지럼 부담 감소'),
            'life' => array('title' => '생활 관리', 'desc' => '기립 속도, 수면, 스트레스, 카페인을 함께 관리합니다.', 'goal' => '유발·악화 요인 조절'),
            'view_extra' => '경추 고유수용성 감각, 자율신경, 전정 기능',
        ),
        'autonomic' => array(
            'blog' => '자율신경',
            'visual' => array('두근거림', '호흡', '소화', '불면'),
            'herb' => array('title' => '심맥탕', 'desc' => '교감·부교감신경 균형과 전신 순환 회복을 목표로 하는 한약 프로그램입니다.', 'goal' => '자율신경 균형 회복'),
            'acu' => array('title' => '약침', 'desc' => '경추·흉추 교감신경절 주변 긴장을 완화하는 치료입니다.', 'goal' => '교감신경 과자극 완화'),
            'chuna' => array('title' => '추나', 'desc' => '경추·흉추 정렬 이상이 있는 경우 구조적 부담을 줄입니다.', 'goal' => '구조적 부담 감소'),
            'life' => array('title' => '생활 관리', 'desc' => '수면, 호흡, 카페인, 디지털 자극, 스트레스 반응을 관리합니다.', 'goal' => '생활 리듬 회복'),
            'view_extra' => '자율신경 조절 회로, 경추·흉추 긴장, 생활 리듬',
        ),
        'peripheral' => array(
            'blog' => '말초신경',
            'visual' => array('저림', '작열감', '말초혈류', '신경회복'),
            'herb' => array('title' => '통맥탕', 'desc' => '말초 혈류와 신경 영양 공급 회복을 돕는 한약 프로그램입니다.', 'goal' => '저림·감각 이상 완화'),
            'acu' => array('title' => '말초신경 약침', 'desc' => '말초 혈류와 신경 포착 부위를 함께 치료합니다.', 'goal' => '신경 회복 환경 개선'),
            'chuna' => array('title' => '침·추나', 'desc' => '허리·골반·하지 통로의 구조적 부담을 줄이는 치료입니다.', 'goal' => '신경 포착·압박 완화'),
            'life' => array('title' => '생활 관리', 'desc' => '혈당, 영양, 수면, 운동 습관을 함께 관리합니다.', 'goal' => '말초 회복 환경 유지'),
            'view_extra' => '말초 혈류, 신경 영양, 신경 포착',
        ),
        'brainfog' => array(
            'blog' => '브레인포그',
            'visual' => array('집중력', '뇌혈류', '피로', '수면'),
            'herb' => array('title' => '두맥탕', 'desc' => '뇌 에너지·혈류 회복과 인지 기능 안정화를 돕는 한약 프로그램입니다.', 'goal' => '멍함·집중력 저하 완화'),
            'acu' => array('title' => '두개경추 약침', 'desc' => '두개경추·후두부 긴장과 뇌 혈류에 영향을 주는 부위를 치료합니다.', 'goal' => '뇌 혈류·긴장 완화'),
            'chuna' => array('title' => '추나', 'desc' => '두개경추 정렬과 목·머리 부담을 줄이는 치료입니다.', 'goal' => '구조적 부담 감소'),
            'life' => array('title' => '생활 관리', 'desc' => '수면, 카페인, 회복 리듬, 스트레스를 함께 관리합니다.', 'goal' => '인지·회복 리듬 회복'),
            'view_extra' => '뇌 혈류, 에너지 대사, 수면 회복',
        ),
    );

    return isset($profiles[$parent_co_id]) ? $profiles[$parent_co_id] : $profiles['headache'];
}

function maekrak_build_disease_related($parent, $current_slug, $current_co_id)
{
    $related = array();
    foreach ($parent['subtypes'] as $sub) {
        if ($sub['slug'] === $current_slug) {
            continue;
        }
        $rid = maekrak_disease_co_id_for_subtype($parent['co_id'], $sub['slug']);
        if ($rid && $rid !== $current_co_id) {
            $related[] = array('co_id' => $rid, 'name' => $sub['name']);
        }
    }
    return array_slice($related, 0, 4);
}

function maekrak_build_disease_from_subtype($parent, $subtype, $co_id)
{
    $name = $subtype['name'];
    $parent_name = $parent['page_name'];
    $parent_id = $parent['co_id'];
    $profile = maekrak_disease_parent_profile($parent_id);
    $tag_str = !empty($subtype['tags']) ? implode('·', $subtype['tags']) : $name;

    $symptoms = array(
        $name . ' 증상이 반복되거나 악화되고 있습니다',
        $subtype['desc'],
        '검사에서는 이상이 없다는 설명을 들었지만 증상이 계속됩니다',
        $parent_name . '과 함께 피로·불안·수면 문제가 동반될 수 있습니다',
        '일상생활·업무 집중에 지장이 있습니다',
        '증상 완화를 위한 자가 관리만으로는 한계를 느낍니다',
    );

    $why_cards = array();
    if (!empty($parent['causes'])) {
        foreach (array_slice($parent['causes'], 0, 4) as $cause) {
            $why_cards[] = array('title' => $cause['title'], 'desc' => $cause['desc']);
        }
    }

    return array(
        'co_id' => $co_id,
        'page_name' => $name,
        'parent_co_id' => $parent_id,
        'parent_name' => $parent_name,
        'hero_image' => $parent_id,
        'hero_variant' => $parent_id . '-' . $subtype['slug'],
        'hero_copy' => '반복되는 ' . $name . ', 원인을 함께 확인해야 합니다',
        'hero_desc' => '맥락한의원은 ' . $name . '을 단순 증상이 아니라 ' . $profile['view_extra'] . '의 관점에서 분석합니다. ' . $subtype['desc'],
        'visual_keywords' => $profile['visual'],
        'meta_title' => $name . ' | 맥락한의원',
        'meta_description' => $name . '을 ' . $profile['view_extra'] . '의 관점에서 설명하는 맥락한의원 ' . $name . ' 상세 안내입니다.',
        'canonical' => maekrak_disease_url($co_id),
        'ai_anchor' => $name . '은 ' . $subtype['desc'] . ' 맥락한의원은 ' . $parent['ai_anchor'],
        'clinic_view' => '맥락한의원은 ' . $name . '을 ' . $parent['clinic_view'],
        'symptoms' => $symptoms,
        'why_intro' => $name . '이 반복될 때는 ' . $parent_name . ' 전체 맥락 속에서 ' . $tag_str . '와 연관된 요인을 함께 봐야 합니다.',
        'why_body' => '맥락한의원은 구조적 문제, 자율신경 반응, 뇌·말초 에너지 공급을 함께 확인합니다. 증상만 억제하기보다 왜 ' . $name . '이 반복되는지 평가한 뒤 치료 방향을 세웁니다.',
        'why_cards' => $why_cards,
        'treatments' => array(
            $profile['herb'],
            $profile['acu'],
            $profile['chuna'],
            $profile['life'],
        ),
        'treatment_note' => '치료 목표는 증상 완화와 함께 재발·악화 요인을 줄이는 것입니다. 개인별 경과와 소요 기간은 다를 수 있습니다.',
        'case' => array(
            'title' => $name . ' 상담 사례',
            'patient_type' => $name . ' 증상 환자',
            'before' => $name . '과 ' . $tag_str . ' 관련 증상이 반복되어 일상에 지장',
            'history' => '검사는 정상이나 증상 지속, 자가 관리·약물 효과 한계 경험',
            'assessment' => $profile['view_extra'] . ' 관점에서 원인 후보를 함께 평가',
            'treatment_direction' => $profile['herb']['title'] . '·' . $profile['acu']['title'] . '·' . $profile['chuna']['title'] . '과 생활 관리 병행',
            'progress' => '증상 패턴과 일상 영향을 단계적으로 확인하며 계획 조정',
        ),
        'faq' => array(
            array(
                'q' => $name . '도 한의원에서 치료할 수 있나요?',
                'a' => '증상 패턴과 검사·치료 이력을 확인한 뒤, 구조·기능·생활 요인을 함께 보는 치료 방향을 고려할 수 있습니다.',
            ),
            array(
                'q' => $parent_name . ' 진료과목 페이지와 무엇이 다른가요?',
                'a' => $parent_name . ' 페이지는 전체 개요이고, 이 페이지는 ' . $name . '에 초점을 맞춘 상세 안내입니다.',
            ),
            array(
                'q' => '치료 기간은 얼마나 걸리나요?',
                'a' => '증상 기간, 동반 증상, 생활 습관에 따라 다릅니다. 초기 상담에서 현재 상태를 확인한 뒤 계획을 세우는 것이 좋습니다.',
            ),
        ),
        'related' => maekrak_build_disease_related($parent, $subtype['slug'], $co_id),
        'blog_category' => $profile['blog'],
    );
}

function maekrak_diseases_generated_from_conditions($handcrafted_co_ids)
{
    include_once G5_THEME_PATH . '/inc/condition_data.php';

    $out = array();
    foreach (maekrak_conditions_data() as $parent) {
        foreach ($parent['subtypes'] as $sub) {
            $co_id = maekrak_disease_co_id_for_subtype($parent['co_id'], $sub['slug']);
            if (!$co_id || in_array($co_id, $handcrafted_co_ids, true)) {
                continue;
            }
            $out[$co_id] = maekrak_build_disease_from_subtype($parent, $sub, $co_id);
        }
    }
    return $out;
}
