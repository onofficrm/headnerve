<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

/**
 * 빌더 Header.tsx 와 동일한 메뉴 (HashRouter: /#/path)
 */
if (!function_exists('headnerve_spa_href')) {
    function headnerve_spa_href($path)
    {
        return G5_URL.'/#'.ltrim($path, '/');
    }
}

if (!function_exists('headnerve_board_href')) {
    function headnerve_board_href($bo_table)
    {
        return G5_BBS_URL.'/board.php?bo_table='.urlencode($bo_table);
    }
}

if (!function_exists('headnerve_nav_menu_items')) {
    function headnerve_nav_menu_items()
    {
        return array(
            array('name' => '맥락한의원소개', 'href' => headnerve_spa_href('/about')),
            array(
                'name' => '치료 프로그램',
                'href' => headnerve_spa_href('/programs'),
                'sub' => array(
                    array('name' => '두통', 'href' => headnerve_spa_href('/headache')),
                    array('name' => '어지럼증', 'href' => headnerve_spa_href('/dizziness')),
                    array('name' => '말초신경병증', 'href' => headnerve_spa_href('/neuropathy')),
                    array('name' => '자율신경', 'href' => headnerve_spa_href('/autonomic')),
                    array('name' => '브레인포그', 'href' => headnerve_spa_href('/brainfog')),
                ),
            ),
            array(
                'name' => '후기',
                'href' => headnerve_board_href('reviews'),
            ),
            array(
                'name' => '두통',
                'href' => headnerve_spa_href('/headache'),
                'sub' => array(
                    array('name' => '편두통', 'href' => headnerve_spa_href('/headache/migraine')),
                    array('name' => '긴장형 두통', 'href' => headnerve_spa_href('/headache/tension')),
                    array('name' => '약물과용 두통', 'href' => headnerve_spa_href('/headache/medication-overuse')),
                    array('name' => '경추성 두통', 'href' => headnerve_spa_href('/headache/cervicogenic')),
                    array('name' => '군발성 두통', 'href' => headnerve_spa_href('/headache/cluster')),
                    array('name' => '생리 두통', 'href' => headnerve_spa_href('/headache/menstrual')),
                    array('name' => '소아 편두통', 'href' => headnerve_spa_href('/headache/pediatric')),
                    array('name' => '수험생 두통', 'href' => headnerve_spa_href('/headache/student')),
                ),
            ),
            array(
                'name' => '어지럼증',
                'href' => headnerve_spa_href('/dizziness'),
                'sub' => array(
                    array('name' => '경추성 어지럼증', 'href' => headnerve_spa_href('/dizziness/cervicogenic')),
                    array('name' => '메니에르병', 'href' => headnerve_spa_href('/dizziness/menieres')),
                    array('name' => '이석증', 'href' => headnerve_spa_href('/dizziness/bppv')),
                    array('name' => '전정신경염', 'href' => headnerve_spa_href('/dizziness/vestibular-neuritis')),
                ),
            ),
            array(
                'name' => '자율신경',
                'href' => headnerve_spa_href('/autonomic'),
                'sub' => array(
                    array('name' => '자율신경실조증', 'href' => headnerve_spa_href('/autonomic/dysautonomia')),
                    array('name' => '기립성저혈압', 'href' => headnerve_spa_href('/autonomic/orthostatic-hypotension')),
                    array('name' => '공항/불안장애', 'href' => headnerve_spa_href('/autonomic/panic-anxiety')),
                    array('name' => '불면', 'href' => headnerve_spa_href('/autonomic/insomnia')),
                ),
            ),
            array(
                'name' => '말초신경병증',
                'href' => headnerve_spa_href('/neuropathy'),
                'sub' => array(
                    array('name' => '특발성 말초신경병증', 'href' => headnerve_spa_href('/neuropathy/idiopathic')),
                    array('name' => '당뇨병성 말초신경병증', 'href' => headnerve_spa_href('/neuropathy/diabetic')),
                    array('name' => '항암후 말초신경병증', 'href' => headnerve_spa_href('/neuropathy/chemo')),
                ),
            ),
            array(
                'name' => '브레인포그',
                'href' => headnerve_spa_href('/brainfog'),
                'sub' => array(
                    array('name' => '코로나 후유증 브레인포그', 'href' => headnerve_spa_href('/brainfog/post-covid')),
                    array('name' => '만성피로 브레인포그', 'href' => headnerve_spa_href('/brainfog/chronic-fatigue')),
                    array('name' => '수험생 브레인포그', 'href' => headnerve_spa_href('/brainfog/students')),
                ),
            ),
            array(
                'name' => '커뮤니티',
                'href' => headnerve_board_href('notice'),
                'sub' => array(
                    array('name' => '공지사항', 'href' => headnerve_board_href('notice')),
                    array('name' => '뉴스', 'href' => headnerve_board_href('news')),
                    array('name' => '블로그', 'href' => headnerve_board_href('column')),
                ),
            ),
        );
    }
}

if (!function_exists('headnerve_nav_booking_url')) {
    function headnerve_nav_booking_url()
    {
        $url = function_exists('g5site_cfg') ? g5site_cfg('naver_booking_url', '') : '';
        if ($url !== '') {
            return $url;
        }

        return 'https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1';
    }
}

if (!function_exists('headnerve_nav_tel_href')) {
    function headnerve_nav_tel_href()
    {
        $phone = function_exists('g5site_cfg') ? g5site_cfg('phone', '02-6959-7252') : '02-6959-7252';
        if (function_exists('g5site_tel_link')) {
            return g5site_tel_link($phone);
        }

        return 'tel:'.preg_replace('/[^0-9+]/', '', $phone);
    }
}

if (!function_exists('headnerve_nav_myinfo_url')) {
    /**
     * 홈페이지 헤더 「내정보」 — 회원정보 수정 (iCRM 관리 포털과 분리)
     */
    function headnerve_nav_myinfo_url()
    {
        return G5_BBS_URL.'/member_confirm.php?url='.urlencode('register_form.php');
    }
}

if (!function_exists('headnerve_nav_auth_payload')) {
    function headnerve_nav_auth_payload()
    {
        global $is_member, $member;

        return array(
            'loggedIn'  => !empty($is_member) && !empty($member['mb_id']),
            'loginUrl'  => G5_BBS_URL.'/login.php',
            'logoutUrl' => G5_BBS_URL.'/logout.php',
            'myInfoUrl' => headnerve_nav_myinfo_url(),
        );
    }
}

if (!function_exists('headnerve_nav_auth_bootstrap_script')) {
    function headnerve_nav_auth_bootstrap_script()
    {
        $payload = headnerve_nav_auth_payload();
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if ($json === false) {
            return '';
        }

        return '<script>window.__HEADNERVE_AUTH__='.$json.';</script>';
    }
}

if (!function_exists('headnerve_footer_address')) {
    function headnerve_footer_address()
    {
        $addr = function_exists('g5site_cfg') ? g5site_cfg('address', '') : '';
        if ($addr !== '' && $addr !== '주소를 입력하세요') {
            return $addr;
        }

        return '서울시 중구 서소문로 134, 2층 맥락한의원';
    }
}

if (!function_exists('headnerve_floating_menu_items')) {
    function headnerve_floating_menu_items()
    {
        $consult_href = G5_URL.'/#consult';
        $kakao = function_exists('g5site_cfg') ? g5site_cfg('kakao_url', '') : '';
        if ($kakao !== '' && $kakao !== '#') {
            $consult_href = $kakao;
        }

        return array(
            array(
                'label'  => '예약하기',
                'href'   => headnerve_nav_booking_url(),
                'external' => true,
                'icon'   => 'naver',
            ),
            array(
                'label'  => '네이버 TV',
                'href'   => function_exists('g5site_cfg') ? g5site_cfg('naver_tv_url', 'https://tv.naver.com/headache123?tab=highlight') : 'https://tv.naver.com/headache123?tab=highlight',
                'external' => true,
                'icon'   => 'naver-tv',
            ),
            array(
                'label'  => '유튜브',
                'href'   => function_exists('g5site_cfg') ? g5site_cfg('youtube_url', 'https://youtube.com/channel/UC_DMpaxnafqqkS3cpdJz7GA?si=ZZfgZMLOaHqHgWGc') : 'https://youtube.com/channel/UC_DMpaxnafqqkS3cpdJz7GA?si=ZZfgZMLOaHqHgWGc',
                'external' => true,
                'icon'   => 'youtube',
            ),
            array(
                'label'  => '블로그',
                'href'   => function_exists('g5site_cfg') ? g5site_cfg('naver_blog_url', 'https://blog.naver.com/rlarnwl67696') : 'https://blog.naver.com/rlarnwl67696',
                'external' => true,
                'icon'   => 'blog',
            ),
            array(
                'label'  => '상담하기',
                'href'   => $consult_href,
                'external' => (strpos($consult_href, 'http') === 0),
                'icon'   => 'kakao',
            ),
        );
    }
}

if (!function_exists('headnerve_board_hero_image')) {
    function headnerve_board_hero_image($bo_table)
    {
        $map = array(
            'notice' => '/img/main/board-hero.png',
            'news'   => '/img/main/board-hero.png',
            'column' => '/img/main/board-hero.png',
            'reviews'=> '/img/main/board-hero.png',
        );

        $rel = isset($map[$bo_table]) ? $map[$bo_table] : '/img/main/board-hero.png';
        if (is_file(G5_PATH.$rel)) {
            return G5_URL.$rel;
        }

        return G5_URL.'/img/main/board-hero.png';
    }
}
