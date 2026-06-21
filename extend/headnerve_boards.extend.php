<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 커뮤니티 게시판 스킨 고정 + 맥락한의원 브랜드 토큰 (기존 onoff-g5-base 스킨만 사용)
 *
 * notice  → basic-notice
 * free    → post-thumb (legacy iCRM fallback)
 * news    → basic-modern
 * column  → post-thumb
 * reviews → reviews
 */
if (is_file(G5_LIB_PATH.'/headnerve-board-meta.lib.php')) {
    include_once G5_LIB_PATH.'/headnerve-board-meta.lib.php';
}

if (function_exists('add_event') && function_exists('headnerve_board_apply_meta_on_write')) {
    add_event('write_update_after', 'headnerve_board_apply_meta_on_write', 8, 5);
}

if (!function_exists('headnerve_board_normalize_view_content')) {
    function headnerve_board_normalize_view_content($content)
    {
        if (!function_exists('headnerve_is_g5b_board') || !headnerve_is_g5b_board()) {
            return $content;
        }

        if (function_exists('g5b_normalize_board_content_alignment')) {
            $content = g5b_normalize_board_content_alignment($content);
        }
        if (function_exists('g5b_normalize_board_content_links')) {
            $content = g5b_normalize_board_content_links($content);
        }

        return $content;
    }
}

if (function_exists('add_replace')) {
    add_replace('get_view_thumbnail', 'headnerve_board_normalize_view_content', 10, 1);
}

if (!function_exists('headnerve_is_g5b_board')) {
    function headnerve_is_g5b_board()
    {
        global $bo_table;

        return !empty($bo_table)
            && isset($GLOBALS['headnerve_board_skin_map'][$bo_table]);
    }
}

$GLOBALS['headnerve_board_skin_map'] = array(
    'free' => array(
        'bo_skin'         => 'post-thumb',
        'bo_mobile_skin'  => 'post-thumb',
    ),
    'notice' => array(
        'bo_skin'         => 'basic-notice',
        'bo_mobile_skin'  => 'basic-notice',
    ),
    'news' => array(
        'bo_skin'         => 'basic-modern',
        'bo_mobile_skin'  => 'basic-modern',
    ),
    'column' => array(
        'bo_skin'         => 'post-thumb',
        'bo_mobile_skin'  => 'post-thumb',
    ),
    'reviews' => array(
        'bo_skin'         => 'reviews',
        'bo_mobile_skin'  => 'reviews',
    ),
);

if (empty($bo_table) || empty($board['bo_table'])) {
    return;
}

if (!isset($GLOBALS['headnerve_board_skin_map'][$bo_table])) {
    return;
}

$headnerve_skin = $GLOBALS['headnerve_board_skin_map'][$bo_table];
$board['bo_skin'] = $headnerve_skin['bo_skin'];
$board['bo_mobile_skin'] = $headnerve_skin['bo_mobile_skin'];

// 그누보드 테마 헤더·default.css 충돌 방지 → 베이스 템플릿 레이아웃 (bbs/board.php 연동)
if (!defined('G5_USE_BASE_HEAD')) {
    define('G5_USE_BASE_HEAD', true);
}
$board['bo_include_head'] = '';
$board['bo_include_tail'] = '';
$g5['body_script'] = ' class="headnerve-g5b-board"';

if (G5_IS_MOBILE) {
    $board_skin_path = get_skin_path('board', $board['bo_mobile_skin']);
    $board_skin_url  = get_skin_url('board', $board['bo_mobile_skin']);
} else {
    $board_skin_path = get_skin_path('board', $board['bo_skin']);
    $board_skin_url  = get_skin_url('board', $board['bo_skin']);
}

// CSS는 extend 로드 순서상 G5_CSS_VER 정의 전일 수 있음 → common_header 에서 enqueue
if (!function_exists('headnerve_board_enqueue_styles')) {
    function headnerve_board_enqueue_styles()
    {
        global $bo_table;

        if (empty($bo_table) || !isset($GLOBALS['headnerve_board_skin_map'][$bo_table])) {
            return;
        }

        $css_ver = defined('G5_CSS_VER') ? G5_CSS_VER : '1';
        add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/custom.css?ver='.$css_ver.'">', 5);
        add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/g5b-board.css?ver='.$css_ver.'">', 6);

        $headnerve_primary = '#0B2744';
        if (function_exists('g5site_cfg')) {
            $cfg_primary = g5site_cfg('primary_color', '');
            if ($cfg_primary !== '' && preg_match('/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6})$/', $cfg_primary)) {
                $headnerve_primary = $cfg_primary;
            }
        }
        add_stylesheet(
            '<style>:root{--color-primary:'.$headnerve_primary.';--color-secondary:#5C6573;--color-on-primary:#fff;--board-content-link:#2e75b6;--board-content-link-hover:#1a5f99;}</style>',
            7
        );
        add_stylesheet(
            '<style>'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con a.board-content-link,'
            .'body.headnerve-g5b-board .board-wrap .board-view__content a.board-content-link{'
            .'color:#2e75b6!important;text-decoration:underline!important;text-decoration-color:#2e75b6!important;'
            .'text-underline-offset:0.18em;text-decoration-thickness:2px;font-weight:600;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con a.board-content-link:hover,'
            .'body.headnerve-g5b-board .board-wrap .board-view__content a.board-content-link:hover{'
            .'color:#1a5f99!important;text-decoration-color:#1a5f99!important;}'
            .'</style>',
            51
        );
        add_stylesheet(
            '<style>'
            .'body.headnerve-g5b-board{padding-top:80px;}'
            .'body.headnerve-g5b-board > hr{display:none;}'
            .'body.headnerve-g5b-board #wrapper{padding-top:0;}'
            .'body.headnerve-g5b-board .maekrak-board-hero{display:block;width:100%;background-color:#0f172a;}'
            .'body.headnerve-g5b-board #container_wr{display:block;width:100%;max-width:1200px;margin:0 auto;padding:0 var(--space-md,1rem) .75rem;}'
            .'body.headnerve-g5b-board #container{float:none;width:100%;max-width:100%;min-height:0;margin-bottom:0;flex:none;}'
            .'body.headnerve-g5b-board #container .board-wrap{max-width:100%;margin:0 auto;}'
            .'body.headnerve-g5b-board #hd_login_msg{display:none;}'
            .'body.headnerve-g5b-board #aside{display:none!important;}'
            .'body.headnerve-g5b-board .site-g5-widgets--tail{display:none!important;}'
            .'body.headnerve-g5b-board #siteDock{display:none!important;}'
            .'</style>',
            8
        );
    }
}
add_event('common_header', 'headnerve_board_enqueue_styles', 1);
