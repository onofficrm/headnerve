<?php
/**
 * co_id 20자 초과 보정 + 2층 content 재등록 (7차, 1회)
 * /theme/basic/install/maekrak_co_id_fix_install.php?key=mrk_coid_fix_20260520
 */
define('MAEKRAK_COID_FIX_KEY', 'mrk_coid_fix_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_LIB_PATH . '/uri.lib.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_COID_FIX_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_COID_FIX_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

$obsolete = array(
    'cervicogenic_headache', 'cervicogenic_headach',
    'orthostatic_hypotension', 'orthostatic_hypotensi',
    'peripheral_neuropathy', 'peripheral_neuropath',
);

$lines = array();
foreach ($obsolete as $old) {
    $esc = sql_escape_string($old);
    sql_query(" DELETE FROM {$g5['content_table']} WHERE co_id = '{$esc}' ");
    $lines[] = 'deleted: ' . $old;
    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $old . '-' . g5_cache_secret_key());
    }
}

$pages = maekrak_diseases_data();
$skin = 'theme/maekrak_disease';
$content = '<!-- maekrak_disease: theme template renders this page -->';

foreach ($pages as $co_id => $page) {
    $co_id = preg_replace('/[^a-z0-9_]/i', '', $co_id);
    if (strlen($co_id) > 20) {
        $lines[] = 'ERROR too long: ' . $co_id;
        continue;
    }

    $subject = sql_escape_string($page['page_name']);
    $body = sql_escape_string($content);
    $seo = sql_escape_string(generate_seo_title($page['page_name']));
    $esc_skin = sql_escape_string($skin);

    $exists = sql_fetch(" SELECT co_id FROM {$g5['content_table']} WHERE co_id = '{$co_id}' ");

    if ($exists && $exists['co_id']) {
        sql_query(" UPDATE {$g5['content_table']} SET
            co_subject = '{$subject}',
            co_content = '{$body}',
            co_mobile_content = '{$body}',
            co_skin = '{$esc_skin}',
            co_mobile_skin = '{$esc_skin}',
            co_html = '1',
            co_tag_filter_use = '1',
            co_seo_title = '{$seo}'
            WHERE co_id = '{$co_id}' ");
        $lines[] = 'updated: ' . $co_id;
    } else {
        sql_query(" INSERT INTO {$g5['content_table']} SET
            co_id = '{$co_id}',
            co_subject = '{$subject}',
            co_content = '{$body}',
            co_mobile_content = '{$body}',
            co_skin = '{$esc_skin}',
            co_mobile_skin = '{$esc_skin}',
            co_html = '1',
            co_tag_filter_use = '1',
            co_seo_title = '{$seo}' ");
        $lines[] = 'inserted: ' . $co_id;
    }

    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>co_id 보정 완료</h1><ul>';
foreach ($lines as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul><p><strong>이 install 파일을 서버에서 삭제하세요.</strong></p>';
