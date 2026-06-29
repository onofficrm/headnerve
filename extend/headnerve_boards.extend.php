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

if (!function_exists('headnerve_board_sanitize_view_html')) {
    function headnerve_board_sanitize_view_html($html)
    {
        $html = (string) $html;
        $html = preg_replace_callback('#<img\b[^>]*>#iu', function ($matches) {
            $tag = $matches[0];
            if (!preg_match('#\bsrc\s*=\s*(["\']?)([^"\'\s>]*)\1#iu', $tag, $src_match)) {
                return '';
            }
            $src = trim(html_entity_decode((string) $src_match[2], ENT_QUOTES, 'UTF-8'));
            if ($src === '' || $src === '\\' || $src === '%5C' || preg_match('#^(?:\\\\|%5c)+$#iu', $src)) {
                return '';
            }

            return $tag;
        }, $html);
        $html = preg_replace_callback('#<a\b([^>]*)>(.*?)</a>#isu', function ($matches) {
            $attrs = (string) $matches[1];
            $body = (string) $matches[2];
            if (!preg_match('#\bhref\s*=\s*(["\']?)([^"\'\s>]*)\1#iu', $attrs, $href_match)) {
                return strip_tags($body);
            }
            $href = trim(html_entity_decode((string) $href_match[2], ENT_QUOTES, 'UTF-8'));
            if ($href === '' || $href === '\\' || $href === '%5C' || preg_match('#^(?:\\\\|%5c)+$#iu', $href)) {
                return strip_tags($body);
            }

            return '<a' . $attrs . '>' . $body . '</a>';
        }, $html);
        $html = preg_replace('#<(p|div|span)\b[^>]*>\s*(?:&nbsp;|\s|<br\s*/?>)*</\1>#iu', '', $html);

        return trim($html);
    }
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

        if (function_exists('headnerve_board_sanitize_view_html')) {
            $content = headnerve_board_sanitize_view_html($content);
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
if (!function_exists('headnerve_board_asset_ver')) {
    function headnerve_board_asset_ver($path, $fallback = '1')
    {
        if (is_file($path)) {
            return (string) filemtime($path);
        }

        return (string) $fallback;
    }
}

if (!function_exists('headnerve_board_enqueue_styles')) {
    function headnerve_board_enqueue_styles()
    {
        global $bo_table;

        if (empty($bo_table) || !isset($GLOBALS['headnerve_board_skin_map'][$bo_table])) {
            return;
        }

        $css_ver = defined('G5_CSS_VER') ? G5_CSS_VER : '1';
        $css_path = defined('G5_CSS_PATH') ? G5_CSS_PATH : G5_PATH.'/css';
        $custom_ver = headnerve_board_asset_ver($css_path.'/custom.css', $css_ver);
        $board_ver = headnerve_board_asset_ver($css_path.'/g5b-board.css', $css_ver);
        add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/custom.css?ver='.$custom_ver.'">', 5);
        add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/g5b-board.css?ver='.$board_ver.'">', 6);

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

if (!function_exists('headnerve_board_inject_late_content_style')) {
    function headnerve_board_inject_late_content_style($buffer)
    {
        if (strpos($buffer, 'headnerve-g5b-board') === false || strpos($buffer, 'headnerve-g5b-content-style') !== false) {
            return $buffer;
        }

        $style = '<style id="headnerve-g5b-content-style">'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con,body.headnerve-g5b-board .board-wrap .board-view__content{font-size:1rem;line-height:1.85;word-break:keep-all;overflow-wrap:anywhere;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con p,body.headnerve-g5b-board .board-wrap .board-view__content p{margin:0 0 1.15rem;color:#334155;line-height:1.9;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con h2,body.headnerve-g5b-board .board-wrap .board-view__content h2{margin:2.45rem 0 1rem;padding-bottom:.65rem;border-bottom:1px solid rgba(15,39,68,.12);color:#0b2744;font-size:clamp(1.35rem,2.6vw,1.75rem);font-weight:750;line-height:1.38;letter-spacing:-.035em;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con h3,body.headnerve-g5b-board .board-wrap .board-view__content h3{margin:2rem 0 .75rem;color:#0b2744;font-size:clamp(1.12rem,2.2vw,1.35rem);font-weight:700;line-height:1.45;letter-spacing:-.025em;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con blockquote,body.headnerve-g5b-board .board-wrap .board-view__content blockquote{margin:1.65rem 0;padding:1.1rem 1.25rem 1.1rem 1.35rem;border-left:4px solid #7aa6b8;border-radius:0 18px 18px 0;background:#f2f8f9;color:#284557;line-height:1.85;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con blockquote p,body.headnerve-g5b-board .board-wrap .board-view__content blockquote p{margin-bottom:.7rem;color:inherit;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con blockquote p:last-child,body.headnerve-g5b-board .board-wrap .board-view__content blockquote p:last-child{margin-bottom:0;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con hr,body.headnerve-g5b-board .board-wrap .board-view__content hr{display:block!important;height:1px;margin:2.2rem 0;border:0;background:linear-gradient(90deg,transparent,rgba(15,39,68,.16),transparent);}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con ul,body.headnerve-g5b-board .board-wrap #bo_v_con ol,body.headnerve-g5b-board .board-wrap .board-view__content ul,body.headnerve-g5b-board .board-wrap .board-view__content ol{margin:1rem 0 1.35rem;padding-left:1.45rem;color:#334155;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con li,body.headnerve-g5b-board .board-wrap .board-view__content li{margin:.42rem 0;line-height:1.85;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con strong,body.headnerve-g5b-board .board-wrap .board-view__content strong{color:#17324d;font-weight:700;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con table,body.headnerve-g5b-board .board-wrap .board-view__content table{width:100%;margin:1.5rem 0;border-collapse:collapse;border-spacing:0;border:1px solid rgba(15,39,68,.12);border-radius:16px;background:#fff;color:#334155;font-size:.95rem;line-height:1.65;overflow:hidden;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con th,body.headnerve-g5b-board .board-wrap #bo_v_con td,body.headnerve-g5b-board .board-wrap .board-view__content th,body.headnerve-g5b-board .board-wrap .board-view__content td{padding:.85rem 1rem;border:1px solid rgba(15,39,68,.1);vertical-align:top;text-align:left;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con th,body.headnerve-g5b-board .board-wrap .board-view__content th{background:#f4f8fb;color:#0b2744;font-weight:700;}'
            .'body.headnerve-g5b-board .board-wrap #bo_v_con a[href]:not(.view_image):not(.icrm-cta-button):not([class*="btn"]),body.headnerve-g5b-board .board-wrap .board-view__content a[href]:not(.view_image):not(.icrm-cta-button):not([class*="btn"]){color:#2e75b6!important;text-decoration:underline!important;text-underline-offset:.18em;text-decoration-thickness:2px;font-weight:600;}'
            .'@media (max-width:768px){body.headnerve-g5b-board .board-wrap #bo_v_con,body.headnerve-g5b-board .board-wrap .board-view__content{overflow-x:auto;-webkit-overflow-scrolling:touch;}body.headnerve-g5b-board .board-wrap #bo_v_con table,body.headnerve-g5b-board .board-wrap .board-view__content table{display:block;min-width:620px;max-width:100%;overflow-x:auto;white-space:normal;}body.headnerve-g5b-board .board-wrap #bo_v_con th,body.headnerve-g5b-board .board-wrap #bo_v_con td,body.headnerve-g5b-board .board-wrap .board-view__content th,body.headnerve-g5b-board .board-wrap .board-view__content td{padding:.72rem .82rem;}}'
            .'</style>';

        return preg_replace('#</head>#i', $style . PHP_EOL . '</head>', $buffer, 1);
    }
}
add_replace('html_process_buffer', 'headnerve_board_inject_late_content_style', 20, 1);
