<?php
/**
 * 맥락한의원 블로그 샘플 글 등록 (7차, 1회)
 * /theme/basic/install/maekrak_blog_samples_install.php?key=mrk_blog_samples_20260520
 */
define('MAEKRAK_BLOG_SAMPLES_KEY', 'mrk_blog_samples_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_LIB_PATH . '/uri.lib.php';
include_once G5_THEME_PATH . '/inc/blog_samples_data.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_BLOG_SAMPLES_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_BLOG_SAMPLES_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

include_once G5_THEME_PATH . '/inc/site_config.php';
$bo_table = defined('MK_BLOG_BOARD') ? MK_BLOG_BOARD : 'blog';

$board = get_board_db($bo_table, true);
if (empty($board['bo_table'])) {
    die('blog 게시판이 없습니다. 5차 blog install을 먼저 실행하세요.');
}

$categories = '두통|어지럼증|자율신경|말초신경|브레인포그|편두통|군발두통|사례|건강정보';
sql_query(" UPDATE {$g5['board_table']} SET bo_category_list = '" . sql_escape_string($categories) . "' WHERE bo_table = '" . sql_escape_string($bo_table) . "' ");

$write_table = $g5['write_prefix'] . $bo_table;
$admin = get_admin('super');
$mb_id = !empty($admin['mb_id']) ? $admin['mb_id'] : '';
$wr_name = !empty($admin['mb_name']) ? addslashes($admin['mb_name']) : addslashes('맥락한의원');
$wr_email = !empty($admin['mb_email']) ? addslashes($admin['mb_email']) : '';

$lines = array();
$inserted = 0;
$skipped = 0;

foreach (maekrak_blog_sample_posts() as $post) {
    $key = sql_escape_string($post['key']);
    $exists = sql_fetch(" SELECT wr_id FROM {$write_table} WHERE wr_2 = '{$key}' AND wr_is_comment = 0 LIMIT 1 ");
    if ($exists && $exists['wr_id']) {
        $skipped++;
        $lines[] = 'skip: ' . $post['wr_subject'];
        continue;
    }

    $ca_name = sql_escape_string($post['ca_name']);
    $wr_subject = sql_escape_string($post['wr_subject']);
    $wr_content = sql_escape_string($post['wr_content']);
    $wr_seo_title = sql_escape_string(exist_seo_title_recursive('bbs', generate_seo_title($post['wr_subject']), $write_table, 0));
    $marker = sql_escape_string('maekrak_sample');

    $sql = " INSERT INTO {$write_table} SET
        wr_num = (SELECT IFNULL(MIN(wr_num) - 1, -1) FROM {$write_table} AS sq),
        wr_reply = '',
        wr_comment = 0,
        ca_name = '{$ca_name}',
        wr_option = 'html1',
        wr_subject = '{$wr_subject}',
        wr_content = '{$wr_content}',
        wr_seo_title = '{$wr_seo_title}',
        wr_link1 = '',
        wr_link2 = '',
        wr_hit = 0,
        wr_good = 0,
        wr_nogood = 0,
        mb_id = '{$mb_id}',
        wr_password = '',
        wr_name = '{$wr_name}',
        wr_email = '{$wr_email}',
        wr_homepage = '',
        wr_datetime = '" . G5_TIME_YMDHIS . "',
        wr_last = '" . G5_TIME_YMDHIS . "',
        wr_ip = '127.0.0.1',
        wr_1 = '{$marker}',
        wr_2 = '{$key}' ";
    sql_query($sql);

    $wr_id = sql_insert_id();
    sql_query(" UPDATE {$write_table} SET wr_parent = '{$wr_id}' WHERE wr_id = '{$wr_id}' ");
    sql_query(" INSERT INTO {$g5['board_new_table']} (bo_table, wr_id, wr_parent, bn_datetime, mb_id)
        VALUES ('" . sql_escape_string($bo_table) . "', '{$wr_id}', '{$wr_id}', '" . G5_TIME_YMDHIS . "', '{$mb_id}') ");

    $inserted++;
    $lines[] = 'ok: [' . $post['ca_name'] . '] ' . $post['wr_subject'];
}

$count = sql_fetch(" SELECT COUNT(*) AS cnt FROM {$write_table} WHERE wr_is_comment = 0 ");
sql_query(" UPDATE {$g5['board_table']} SET bo_count_write = '" . (int) $count['cnt'] . "' WHERE bo_table = '" . sql_escape_string($bo_table) . "' ");

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('board');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>블로그 샘플 글 등록</h1>';
echo '<p>신규 ' . (int) $inserted . '건, 스킵 ' . (int) $skipped . '건 (전체 글 ' . (int) $count['cnt'] . '건)</p>';
echo '<ul>';
foreach ($lines as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul><p><a href="' . get_pretty_url($bo_table) . '">블로그 목록</a></p>';
echo '<p><strong>이 install 파일을 서버에서 삭제하세요.</strong></p>';
