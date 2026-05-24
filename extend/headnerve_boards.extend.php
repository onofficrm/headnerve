<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 커뮤니티 게시판 스킨 고정 + 맥락한의원 브랜드 토큰 (기존 onoff-g5-base 스킨만 사용)
 *
 * notice  → basic-notice
 * news    → basic-modern
 * column  → post-thumb
 */
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

if (G5_IS_MOBILE) {
    $board_skin_path = get_skin_path('board', $board['bo_mobile_skin']);
    $board_skin_url  = get_skin_url('board', $board['bo_mobile_skin']);
} else {
    $board_skin_path = get_skin_path('board', $board['bo_skin']);
    $board_skin_url  = get_skin_url('board', $board['bo_skin']);
}

// 게시판 공통 CSS + 브랜드 색 (--color-primary 등, g5b-board.css 토큰)
add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/custom.css?ver='.G5_CSS_VER.'">', 5);
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
