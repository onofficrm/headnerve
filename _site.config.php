<?php
/**
 * 사이트 공통 설정 (새 프로젝트마다 이 파일만 우선 수정)
 * 경로: /_site.config.php
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

$site_config = array(
    'site_name'           => '맥락한의원',
    'site_desc'           => '두통·어지럼증·자율신경·말초신경병증·브레인포그 맥락 치료',
    'company_name'        => '맥락한의원',
    'ceo_name'            => '이재성',
    'business_no'         => '573-93-02056',
    'phone'               => '02-6959-7252',
    'kakao_url'           => 'http://pf.kakao.com/_PxdavG',
    'email'               => 'macnac.kclinic@gmail.com',
    'address'             => '서울시 중구 서소문로 134, 2층',
    'primary_color'       => '#0B2744',
    'secondary_color'     => '#5C6573',
    'logo_path'           => '/img/logo/logo.svg',
    'og_image'            => '/img/common/og-image.jpg',
    /* SEO (components/seo-meta.php) */
    'seo_title'           => '',
    'seo_description'     => '',
    'main_keyword'        => '',
    'sub_keywords'        => '',
    'robots'              => 'index,follow',
    /* JSON-LD #organization 고정 타입 (게시글 Schema 유형과 분리) */
    'schema_organization_type' => 'MedicalOrganization',
    'consultation_text'   => '상담문의',
    'footer_desc'         => '두통·어지럼증·자율신경·말초신경병증·브레인포그 맥락 치료',
    /* 문의 폼 → inquiry 게시판 (proc/inquiry-submit.php) */
    'inquiry_bo_table'        => 'inquiry',
    'inquiry_notify_enabled'  => true,
    'inquiry_notify_email'    => 'admin@example.com',  /* 운영 시 실제 수신 주소로 변경 */
    'inquiry_notify_name'     => '관리자',
    /* 텔레그램 알림 — 운영 시 토큰·채팅 ID 입력 후 enabled true */
    'inquiry_notify_telegram_enabled'  => false,
    'inquiry_notify_telegram_bot_token' => '',
    'inquiry_notify_telegram_chat_id'   => '',
    /* 웹훅 알림 (Slack/Discord 등) — 추후 확장 */
    'inquiry_notify_webhook_enabled' => false,
    'inquiry_notify_webhook_url'     => '',
    /* 문의 접수 완료 페이지 (상대 경로) */
    'inquiry_thanks_url'      => '/page/inquiry-thanks.php',
    /* 홈(/) — onoff-builder-bridge 프로젝트 ID (비우면 headnerve-main 시도) */
    'home_builder_bridge_id'  => 'headnerve-main',
    /* 전환·방문 추적 ID — 비우면 출력 안 함 */
    'gtm_id'              => '',
    'ga4_id'              => '',
    'meta_pixel_id'       => '',
    'naver_analytics_id'  => '',
    'kakao_pixel_id'      => '',
    /* 선택 항목 (비워 두면 기본값 사용) */
    'fax'                 => '',
    'sales_no'            => '',
    'privacy_manager'     => '',
    'kakao_map_key'       => '',
    'kakao_map_lat'       => '37.5665',
    'kakao_map_lng'       => '126.9780',
    /* Google Maps — 내 주변 찾기 (components/maps, page/map-locator.php) */
    'google_maps_api_key'       => '',
    'map_default_lat'           => '10.3157',
    'map_default_lng'           => '123.8854',
    'map_default_zoom'          => 13,
    'map_use_current_location'  => true,
    'map_default_radius_km'     => 5,
    'map_unit'                  => 'km',
    'map_placeholder_title'     => 'Google Maps API 키가 설정되지 않았습니다.',
    'map_placeholder_desc'      => '_site.config.php에서 google_maps_api_key 값을 입력하면 지도가 표시됩니다.',
    /* onoff-update */
    'seo_feed_enabled'          => true,
    'sitemap_static_pages'      => '',
    'sitemap_exclude_pages'     => '',
    'sitemap_exclude_boards'    => 'inquiry',
    'sitemap_max_posts_per_board' => '500',
    'sitemap_rss_item_limit'    => '50',
    'icrm_builtin'              => true,
    'icrm_site_base_url'        => 'https://headnerve.com',
    'icrm_secret_token'         => '',
    'icrm_allowed_ips'          => '',
    'icrm_css_only_when_markup' => false,
    'icrm_update_enabled'       => false, /* headnerve: 중앙 업데이트 비활성 (커스텀 보호) */
    'icrm_update_api_base_url'  => 'https://icrm.co.kr/api/g5-update',
    'icrm_update_bundle'        => 'icrm-full',
    'icrm_update_auto_sync'     => false,
    'icrm_update_check_hours'   => '24',
    'icrm_builder_deploy_api_base_url' => 'https://icrm.co.kr/api/builder-deploy',
    'icrm_hub_enabled'          => true,
    'icrm_hub_geo_button'       => true,
    'icrm_point_billing_enabled' => true,
    'icrm_point_cost_multiplier' => '6',
    'icrm_point_api_base_url'    => 'https://icrm.co.kr/api/site',
    'icrm_point_auto_sync'       => true,
    'icrm_point_sync_hours'      => '1',
    'seo_meta_builtin'          => true,
    'g5b_seo_post_faq_visible'  => true,
    'icrm_license_key'          => '',
    'icrm_seo_api_base_url'     => 'https://icrm.co.kr/api/seo-meta',
    'rank_check_builtin'         => true,
    'icrm_rank_api_base_url'     => 'https://icrm.co.kr/api/rank-check',
    'content_collector_builtin'      => true,
    'icrm_content_api_base_url'      => 'https://icrm.co.kr/api/content-collector',
    'icrm_content_default_bo_table'  => 'column',
    'icrm_content_default_mb_id'     => '',
    'onoff_builder_bridge_enabled' => true,

    /* onoff-update */
    'builder_deploy_member_enabled' => true,
    'builder_deploy_min_level'      => '2',
    'builder_deploy_auto_home'        => true,
    'icrm_member_enabled'           => true,
    'icrm_member_min_level'           => '2',
    'icrm_member_board_min_level'     => '5',
    'icrm_member_board_max_per_month' => '3',

    /* onoff-update */
    'platform_member_skin'           => '',
    'platform_outlogin_skin'         => '',
    'platform_board_skin_column'     => 'onoff-column',
    'platform_skin_applied_at'       => '',

);

/**
 * 설정값 조회 (없거나 비어 있으면 $default)
 *
 * @param string $key
 * @param string $default
 * @return string
 */
if (!function_exists('g5site_cfg')) {
    function g5site_cfg($key, $default = '')
    {
        global $site_config;

        if (!isset($site_config) || !is_array($site_config)) {
            return (string) $default;
        }

        if (!array_key_exists($key, $site_config)) {
            return (string) $default;
        }

        $val = $site_config[$key];

        if ($val === null || $val === false) {
            return (string) $default;
        }

        if (is_string($val)) {
            $val = trim($val);
            return $val !== '' ? $val : (string) $default;
        }

        if (is_bool($val)) {
            return $val ? '1' : '';
        }

        return (string) $val;
    }
}

/**
 * bool 설정값 (true/false/1/0/off)
 *
 * @param string $key
 * @param bool   $default
 * @return bool
 */
if (!function_exists('g5site_cfg_bool')) {
    function g5site_cfg_bool($key, $default = false)
    {
        global $site_config;

        if (!isset($site_config) || !is_array($site_config) || !array_key_exists($key, $site_config)) {
            return (bool) $default;
        }

        $val = $site_config[$key];

        if ($val === true || $val === 1 || $val === '1' || $val === 'on' || $val === 'true') {
            return true;
        }
        if ($val === false || $val === 0 || $val === '0' || $val === 'off' || $val === 'false') {
            return false;
        }

        return (bool) $default;
    }
}

/**
 * URL 또는 사이트 루트 기준 경로
 *
 * @param string $key site_config 키 (logo_path, og_image 등)
 * @param string $default
 * @return string
 */
if (!function_exists('g5site_cfg_url')) {
    function g5site_cfg_url($key, $default = '')
    {
        $path = g5site_cfg($key, $default);

        if ($path === '') {
            return '';
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        if (!defined('G5_URL')) {
            return $path;
        }

        if ($path[0] === '/') {
            return G5_URL . $path;
        }

        return G5_URL . '/' . $path;
    }
}

/**
 * 전화번호 → tel: 링크
 *
 * @param string $phone
 * @return string
 */
if (!function_exists('g5site_tel_link')) {
    function g5site_tel_link($phone = '')
    {
        if ($phone === '') {
            $phone = g5site_cfg('phone', '');
        }

        $digits = preg_replace('/[^0-9+]/', '', $phone);

        return $digits !== '' ? 'tel:' . $digits : '#';
    }
}
