<?php
if (!defined('_GNUBOARD_')) exit;

if (!defined('MK_CLINIC_NAME')) {
    define('MK_CLINIC_NAME', '맥락한의원');
    define('MK_CLINIC_BADGE', '두통신경플래너 맥락한의원');
    define('MK_CLINIC_TEL', '02-6959-7252');
    define('MK_CLINIC_TEL_LINK', '0269597252');
    define('MK_CLINIC_ADDRESS', '서울시 중구 서소문로 134, 2층 맥락한의원');
    define('MK_CLINIC_HOURS_WEEKDAY', '10:00 ~ 20:00');
    define('MK_CLINIC_HOURS_SAT', '10:00 ~ 14:00');
    define('MK_CLINIC_HOURS_SUN', '일요일, 공휴일');
    define('MK_CLINIC_LUNCH', '14:00 ~ 15:00');
    define('MK_CLINIC_SAT_LUNCH_NOTE', '토요일은 점심시간 없이 진료합니다.');
    define('MK_CLINIC_PARKING', '옆건물 주차장 주차지원');
    define('MK_CLINIC_TRANSPORT', '시청역 8번 출구 1분 거리');
    define('MK_BLOG_BOARD', 'blog');
    define('MK_RESERVE_URL', 'https://m.booking.naver.com/booking/13/bizes/1120036?theme=place&service-target=map-pc&lang=ko&area=plt&map-search=1');
    define('MK_KAKAO_URL', 'https://pf.kakao.com/_PxdavG/chat');
    /**
     * 카카오맵 JavaScript 키 (비우면 관리자 cf_kakao_js_apikey 사용, maekrak_local_config.php 권장)
     */
    if (!defined('MK_KAKAO_MAP_APP_KEY')) {
        define('MK_KAKAO_MAP_APP_KEY', 'a99bd18dd8875fd56c2406a14b68766c');
    }
    define('MK_MAP_URL', 'https://map.kakao.com/link/search/' . rawurlencode('맥락한의원 서울시 중구 서소문로 134'));
    define('MK_OG_IMAGE_URL', G5_THEME_URL . '/img/og-maekrak.svg');
    define('MK_SITEMAP_URL', G5_THEME_URL . '/sitemap_maekrak.php');
    /** 홈 히어로 이미지 basename (theme/basic/img/hero/{name}.svg|jpg) */
    define('MK_HERO_HOME', 'home');
}

$maekrak_local_config = dirname(__FILE__) . '/maekrak_local_config.php';
if (is_file($maekrak_local_config)) {
    include_once $maekrak_local_config;
}

include_once dirname(__FILE__) . '/map_embed.php';
include_once dirname(__FILE__) . '/hero_helper.php';

if (!function_exists('maekrak_condition_url')) {
    include_once dirname(__FILE__) . '/condition_data.php';
}
if (!function_exists('maekrak_disease_url')) {
    include_once dirname(__FILE__) . '/disease_data.php';
}

$maekrak_departments = array(
    array('id' => 'headache', 'title' => '두통', 'desc' => '편두통, 긴장형두통, 군발두통, 경추성두통을 통증 억제가 아닌 원인 분석의 관점에서 봅니다.', 'tags' => array('편두통', '긴장형두통', '경추성두통'), 'link' => maekrak_condition_url('headache')),
    array('id' => 'dizziness', 'title' => '어지럼증', 'desc' => '귀만 보는 것이 아니라 경추 고유수용성 감각과 자율신경 불균형을 함께 확인합니다.', 'tags' => array('현훈', '어지러움', '자율신경'), 'link' => maekrak_condition_url('dizziness')),
    array('id' => 'autonomic', 'title' => '자율신경', 'desc' => '두근거림, 호흡곤란, 소화장애, 불면처럼 검사에서 잘 드러나지 않는 기능 문제를 봅니다.', 'tags' => array('두근거림', '불면', '소화장애'), 'link' => maekrak_condition_url('autonomic')),
    array('id' => 'peripheral', 'title' => '말초신경병증', 'desc' => '손발 저림, 시림, 작열감이 오래 지속된다면 혈류와 신경 회복 환경을 함께 살핍니다.', 'tags' => array('저림', '시림', '작열감'), 'link' => maekrak_condition_url('peripheral')),
    array('id' => 'brainfog', 'title' => '브레인포그', 'desc' => '머리가 멍하고 집중이 안 되는 증상을 의지 문제가 아닌 뇌 에너지 공급 문제로 봅니다.', 'tags' => array('집중력 저하', '머리 멍함', '피로'), 'link' => maekrak_condition_url('brainfog')),
);

$maekrak_philosophy = array(
    array('icon' => 'bone', 'title' => '두개경추 구조', 'text' => '머리와 목이 만나는 부위의 정렬과 긴장을 심층적으로 진단하고 확인합니다.'),
    array('icon' => 'pulse', 'title' => '자율신경 균형', 'text' => '검사에서는 정상이지만 신체 기능이 저하되어 나타나는 자율신경계 불균형을 살핍니다.'),
    array('icon' => 'brain', 'title' => '뇌 에너지 회복', 'text' => '뇌에 필요한 혈류가 안정적으로 공급되고 에너지가 회복될 수 있는 체내 환경을 만듭니다.'),
);

$maekrak_targets = array(
    '신경과·대학병원 검사는 정상인데 두통이 계속됩니다',
    '진통제를 먹어도 효과가 점점 줄어듭니다',
    '두통과 어지럼증이 함께 반복됩니다',
    '머리가 멍하고 집중력이 떨어집니다',
    '심장이 두근거리거나 숨이 막히는데 검사에서는 이상이 없습니다',
    '손발 저림과 작열감이 3개월 이상 지속됩니다',
    '목과 어깨 긴장 이후 두통이 심해집니다',
    '약에만 의존하지 않고 원인을 알고 싶습니다',
);

$maekrak_approach = array(
    array('num' => '1단계', 'title' => '상태 확인', 'text' => '증상 패턴, 자율신경 상태, 두개경추 구조 문제를 함께 확인합니다.'),
    array('num' => '2단계', 'title' => '기능 회복', 'text' => '두맥탕, 심맥탕, 통맥탕 등 환자의 상태에 맞춘 한약 치료로 신경계 균형과 에너지 회복을 돕습니다.'),
    array('num' => '3단계', 'title' => '구조 치료', 'text' => '약침, 침, 추나를 통해 경추 주변 긴장과 신경 압박, 혈류 저하 문제를 함께 다룹니다.'),
    array('num' => '4단계', 'title' => '재발 관리', 'text' => '증상을 억제하는 데서 끝나지 않고 반복되는 원인을 줄여 건강한 일상을 유지하는 것을 목표로 합니다.'),
);

$maekrak_programs = array(
    array('title' => '두통 치료 프로그램', 'methods' => array('두맥탕', '약침', '추나')),
    array('title' => '어지럼증 치료 프로그램', 'methods' => array('두맥탕', '약침', '추나')),
    array('title' => '자율신경 치료 프로그램', 'methods' => array('심맥탕', '약침', '추나')),
    array('title' => '말초신경 치료 프로그램', 'methods' => array('통맥탕', '약침', '침 치료')),
    array('title' => '브레인포그 치료 프로그램', 'methods' => array('두맥탕', '총명공진단', '약침', '추나')),
);

$maekrak_doctors = array(
    array('name' => '이재성', 'title' => '대표원장', 'field' => '두통, 어지럼증, 자율신경', 'photo' => ''),
    array('name' => '김윤서', 'title' => '원장', 'field' => '말초신경병증, 브레인포그', 'photo' => ''),
);

$maekrak_home_meta = array(
    'meta_title' => MK_CLINIC_NAME . ' | 두통·어지럼증·자율신경 신경계 한의원',
    'meta_description' => '서울 시청역 인근 맥락한의원. 반복되는 두통·어지럼증·자율신경·말초신경·브레인포그를 두개경추·자율신경·뇌 에너지 균형의 관점에서 진료합니다.',
    'canonical' => G5_URL,
);

function maekrak_tel_href($tel = '')
{
    $tel = $tel ? $tel : MK_CLINIC_TEL_LINK;
    return 'tel:' . preg_replace('/[^0-9+]/', '', $tel);
}

/** 네이버 예약 등 외부 URL일 때 새 탭 속성 */
function maekrak_reserve_link_attr()
{
    return (defined('MK_RESERVE_URL') && preg_match('#^https?://#i', MK_RESERVE_URL))
        ? ' target="_blank" rel="noopener noreferrer"'
        : '';
}

/** 의료진 카드 그리드 (photo URL 있으면 실사진, 없으면 아이콘) */
function maekrak_render_doctor_grid($grid_class = 'maekrak-doctor-grid')
{
    global $maekrak_doctors;
    if (empty($maekrak_doctors) || !is_array($maekrak_doctors)) {
        return;
    }
    $profile_url = get_pretty_url('content', 'company');
    echo '<ul class="' . htmlspecialchars($grid_class, ENT_QUOTES, 'UTF-8') . '">';
    foreach ($maekrak_doctors as $doc) {
        $photo = '';
        if (!empty($doc['photo'])) {
            if (preg_match('#^https?://#i', $doc['photo'])) {
                $photo = $doc['photo'];
            } else {
                $basename = preg_replace('/[^a-z0-9_\-\.]/i', '', $doc['photo']);
                $path = G5_THEME_PATH . '/img/doctors/' . $basename;
                if (is_file($path)) {
                    $photo = G5_THEME_URL . '/img/doctors/' . $basename;
                }
            }
        }
        $photo_class = $photo ? ' maekrak-doctor-photo--has-img' : '';
        echo '<li class="maekrak-doctor-card">';
        echo '<div class="maekrak-doctor-photo' . $photo_class . '" role="img" aria-label="' . htmlspecialchars($doc['name'] . ' ' . $doc['title'], ENT_QUOTES, 'UTF-8') . '">';
        if ($photo) {
            echo '<img src="' . htmlspecialchars($photo, ENT_QUOTES, 'UTF-8') . '" alt="" width="120" height="120" loading="lazy">';
        }
        echo '<i class="fa fa-user-md" aria-hidden="true"></i></div>';
        echo '<h3>' . $doc['name'] . ' <span>' . $doc['title'] . '</span></h3>';
        echo '<p class="maekrak-doctor-divider"></p>';
        echo '<p class="maekrak-doctor-field">주요 진료: ' . $doc['field'] . '</p>';
        echo '<a href="' . $profile_url . '" class="maekrak-btn maekrak-btn-pill">프로필 보기</a>';
        echo '</li>';
    }
    echo '</ul>';
}
