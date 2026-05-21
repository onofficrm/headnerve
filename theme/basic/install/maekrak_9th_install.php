<?php
/**
 * 맥락한의원 9차 install (1회): 정적 페이지, 블로그 보강, 캐시
 * /theme/basic/install/maekrak_9th_install.php?key=mrk_9th_20260520
 */
define('MAEKRAK_9TH_INSTALL_KEY', 'mrk_9th_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_LIB_PATH . '/uri.lib.php';
include_once G5_THEME_PATH . '/inc/site_config.php';
include_once G5_THEME_PATH . '/inc/static_pages_data.php';
include_once G5_THEME_PATH . '/inc/blog_samples_data.php';
include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_9TH_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_9TH_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

$lines = array();
$skin_static = 'theme/maekrak_page';
$skin_disease = 'theme/maekrak_disease';
$placeholder = '<!-- maekrak -->';

foreach (maekrak_static_pages_config() as $co_id => $page) {
    $co_id = preg_replace('/[^a-z0-9_]/i', '', $co_id);
    $subject = sql_escape_string($page['subject']);
    $body = sql_escape_string($page['html']);
    $seo = sql_escape_string(generate_seo_title($page['seo']));
    $esc_skin = sql_escape_string($skin_static);

    $exists = sql_fetch(" SELECT co_id FROM {$g5['content_table']} WHERE co_id = '{$co_id}' ");

    if ($exists && $exists['co_id']) {
        sql_query(" UPDATE {$g5['content_table']} SET
            co_subject = '{$subject}',
            co_content = '{$body}',
            co_mobile_content = '{$body}',
            co_skin = '{$esc_skin}',
            co_mobile_skin = '{$esc_skin}',
            co_html = '1',
            co_seo_title = '{$seo}'
            WHERE co_id = '{$co_id}' ");
        $lines[] = 'static updated: ' . $co_id;
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
        $lines[] = 'static inserted: ' . $co_id;
    }

    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
}

$bo_table = defined('MK_BLOG_BOARD') ? MK_BLOG_BOARD : 'blog';
$write_table = $g5['write_prefix'] . $bo_table;
$board = get_board_db($bo_table, true);
$admin = get_admin('super');
$mb_id = !empty($admin['mb_id']) ? $admin['mb_id'] : '';
$wr_name = !empty($admin['mb_name']) ? addslashes($admin['mb_name']) : addslashes('맥락한의원');

if (!empty($board['bo_table'])) {
    $categories = '두통|어지럼증|자율신경|말초신경|브레인포그|편두통|군발두통|사례|건강정보';
    sql_query(" UPDATE {$g5['board_table']} SET bo_category_list = '" . sql_escape_string($categories) . "' WHERE bo_table = '" . sql_escape_string($bo_table) . "' ");

    $blog_inserted = 0;
    foreach (maekrak_blog_sample_posts() as $post) {
        $key = sql_escape_string($post['key']);
        $exists = sql_fetch(" SELECT wr_id FROM {$write_table} WHERE wr_2 = '{$key}' AND wr_is_comment = 0 LIMIT 1 ");
        if ($exists && $exists['wr_id']) {
            continue;
        }

        $ca_name = sql_escape_string($post['ca_name']);
        $wr_subject = sql_escape_string($post['wr_subject']);
        $wr_content = sql_escape_string($post['wr_content']);
        $wr_seo_title = sql_escape_string(exist_seo_title_recursive('bbs', generate_seo_title($post['wr_subject']), $write_table, 0));

        sql_query(" INSERT INTO {$write_table} SET
            wr_num = (SELECT IFNULL(MIN(wr_num) - 1, -1) FROM {$write_table} AS sq),
            wr_reply = '', wr_comment = 0,
            ca_name = '{$ca_name}',
            wr_option = 'html1',
            wr_subject = '{$wr_subject}',
            wr_content = '{$wr_content}',
            wr_seo_title = '{$wr_seo_title}',
            mb_id = '{$mb_id}',
            wr_name = '{$wr_name}',
            wr_datetime = '" . G5_TIME_YMDHIS . "',
            wr_last = '" . G5_TIME_YMDHIS . "',
            wr_ip = '127.0.0.1',
            wr_1 = 'maekrak_sample',
            wr_2 = '{$key}' ");
        $wr_id = sql_insert_id();
        sql_query(" UPDATE {$write_table} SET wr_parent = '{$wr_id}' WHERE wr_id = '{$wr_id}' ");
        sql_query(" INSERT INTO {$g5['board_new_table']} (bo_table, wr_id, wr_parent, bn_datetime, mb_id)
            VALUES ('" . sql_escape_string($bo_table) . "', '{$wr_id}', '{$wr_id}', '" . G5_TIME_YMDHIS . "', '{$mb_id}') ");
        $blog_inserted++;
    }
    $lines[] = 'blog new posts: ' . (int) $blog_inserted;
}

foreach (maekrak_diseases_data() as $co_id => $page) {
    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
}
foreach (maekrak_conditions_co_ids() as $co_id) {
    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
}

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('menu');
    g5_delete_cache('board');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>9차 install 완료</h1><ul>';
foreach ($lines as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul>';
echo '<p>사이트맵: <a href="' . G5_THEME_URL . '/sitemap_maekrak.php">' . G5_THEME_URL . '/sitemap_maekrak.php</a></p>';
echo '<p><strong>이 install 파일을 서버에서 삭제하세요.</strong></p>';
