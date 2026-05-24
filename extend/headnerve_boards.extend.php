<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 커뮤니티 게시판 스킨 고정 + 맥락한의원 브랜드 토큰 (기존 onoff-g5-base 스킨만 사용)
 *
 * notice  → basic-notice
 * news    → basic-modern
 * column  → post-thumb
 */
if (!function_exists('headnerve_is_g5b_board')) {
    function headnerve_is_g5b_board()
    {
        global $bo_table;

        return !empty($bo_table)
            && isset($GLOBALS['headnerve_board_skin_map'][$bo_table]);
    }
}

$GLOBALS['headnerve_board_skin_map'] = array(
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

        $headnerve_primary = '#0B2744';
        if (function_exists('g5site_cfg')) {
            $cfg_primary = g5site_cfg('primary_color', '');
            if ($cfg_primary !== '' && preg_match('/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6})$/', $cfg_primary)) {
                $headnerve_primary = $cfg_primary;
            }
        }
        add_stylesheet(
            '<style>:root{--color-primary:'.$headnerve_primary.';--color-secondary:#5C6573;--color-on-primary:#fff;}</style>',
            6
        );
        add_stylesheet(
            '<style>'
            .'body.headnerve-g5b-board #container_wr,body.headnerve-g5b-board #container{float:none;width:100%;max-width:100%;}'
            .'body.headnerve-g5b-board #container .board-wrap{max-width:1100px;margin:0 auto;}'
            .'body.headnerve-g5b-board #hd_login_msg{display:none;}'
            .'</style>',
            7
        );
    }
}
add_event('common_header', 'headnerve_board_enqueue_styles', 1);
