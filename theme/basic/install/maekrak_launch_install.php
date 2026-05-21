<?php
/**
 * 맥락한의원 런칭 마무리 (1회): 메뉴 블로그 URL, 카카오 JS 키 DB 반영
 * /theme/basic/install/maekrak_launch_install.php?key=mrk_launch_20260520
 */
define('MAEKRAK_LAUNCH_INSTALL_KEY', 'mrk_launch_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_LAUNCH_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_LAUNCH_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

include_once G5_THEME_PATH . '/inc/site_config.php';

$lines = array();

$blog_url = get_pretty_url('blog');
$esc_url = sql_escape_string($blog_url);
sql_query(" UPDATE {$g5['menu_table']} SET me_link = '{$esc_url}' WHERE me_code = '50' OR me_name = '블로그' ");
$lines[] = '메뉴 블로그 URL → ' . $blog_url;

if (defined('MK_KAKAO_MAP_APP_KEY') && MK_KAKAO_MAP_APP_KEY !== '') {
    $esc_key = sql_escape_string(MK_KAKAO_MAP_APP_KEY);
    sql_query(" UPDATE {$g5['config_table']} SET cf_kakao_js_apikey = '{$esc_key}' ");
    $lines[] = 'cf_kakao_js_apikey DB 반영 완료';
}

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('menu');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>런칭 마무리 완료</h1><ul>';
foreach ($lines as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul><p><strong>이 install 파일을 서버에서 삭제하세요.</strong></p>';
