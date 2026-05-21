<?php
/**
 * 8차 런칭 마무리 (1회): 메뉴·캐시·질환 URL 리다이렉트
 * /theme/basic/install/maekrak_launch_final_install.php?key=mrk_final_20260520
 */
define('MAEKRAK_FINAL_INSTALL_KEY', 'mrk_final_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_LIB_PATH . '/uri.lib.php';
include_once G5_THEME_PATH . '/inc/site_config.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_FINAL_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_FINAL_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

$lines = array();

if (defined('MK_BLOG_BOARD') && MK_BLOG_BOARD) {
    $blog_url = get_pretty_url(MK_BLOG_BOARD);
    sql_query(" UPDATE {$g5['menu_table']} SET me_link = '" . sql_escape_string($blog_url) . "' WHERE me_code = '50' OR me_name = '블로그' ");
    $lines[] = '메뉴 블로그 → ' . $blog_url;
}

if (defined('MK_RESERVE_URL') && MK_RESERVE_URL) {
    $reserve = sql_escape_string(MK_RESERVE_URL);
    sql_query(" UPDATE {$g5['menu_table']} SET me_link = '{$reserve}', me_target = 'blank' WHERE me_name LIKE '%예약%' OR me_link LIKE '%qalist%' ");
    $lines[] = '메뉴 예약 링크 → 네이버 예약';
}

$redirects = array(
    'cervicogenic_headach' => 'cervicogenic_hd',
    'orthostatic_hypotensi' => 'orthostatic_hp',
    'peripheral_neuropath' => 'peripheral_neuro',
);

foreach ($redirects as $old_id => $new_id) {
    $old_id = preg_replace('/[^a-z0-9_]/i', '', $old_id);
    $new_id = preg_replace('/[^a-z0-9_]/i', '', $new_id);
    if (strlen($old_id) > 20 || strlen($new_id) > 20) {
        continue;
    }
    $dest = G5_BBS_URL . '/content.php?co_id=' . urlencode($new_id);
    $body = '<p>페이지 주소가 변경되었습니다. <a href="' . htmlspecialchars($dest) . '">새 페이지로 이동</a></p>'
        . '<script>location.replace(' . json_encode($dest) . ');</script>';
    $esc_id = sql_escape_string($old_id);
    $esc_body = sql_escape_string($body);
    $esc_subject = sql_escape_string('페이지 이동');
    $exists = sql_fetch(" SELECT co_id FROM {$g5['content_table']} WHERE co_id = '{$esc_id}' ");
    if ($exists && $exists['co_id']) {
        sql_query(" UPDATE {$g5['content_table']} SET co_content = '{$esc_body}', co_mobile_content = '{$esc_body}', co_html = '1' WHERE co_id = '{$esc_id}' ");
        $lines[] = 'redirect update: ' . $old_id . ' → ' . $new_id;
    } else {
        sql_query(" INSERT INTO {$g5['content_table']} SET
            co_id = '{$esc_id}',
            co_subject = '{$esc_subject}',
            co_content = '{$esc_body}',
            co_mobile_content = '{$esc_body}',
            co_skin = 'basic',
            co_mobile_skin = 'basic',
            co_html = '1',
            co_tag_filter_use = '1' ");
        $lines[] = 'redirect insert: ' . $old_id . ' → ' . $new_id;
    }
    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $old_id . '-' . g5_cache_secret_key());
    }
}

foreach (maekrak_diseases_data() as $co_id => $page) {
    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
}

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('menu');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>8차 런칭 마무리</h1><ul>';
foreach ($lines as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul><p><strong>이 install 파일을 서버에서 삭제하세요.</strong></p>';
