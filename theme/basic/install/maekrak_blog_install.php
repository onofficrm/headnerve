<?php
/**
 * 맥락한의원 블로그 게시판 등록 (5차, 1회 실행)
 * /theme/basic/install/maekrak_blog_install.php?key=mrk_blog_5th_20260520
 */
define('MAEKRAK_BLOG_INSTALL_KEY', 'mrk_blog_5th_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_')) {
    die('GNUBOARD common load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_BLOG_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_BLOG_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

$bo_table = 'blog';
$skin = 'theme/maekrak_blog';
$gr_id = 'community';
$categories = '두통|어지럼증|자율신경|말초신경|브레인포그|사례|건강정보';

$gr = sql_fetch(" SELECT gr_id FROM {$g5['group_table']} WHERE gr_id = '" . sql_escape_string($gr_id) . "' ");
if (!$gr) {
    sql_query(" INSERT INTO {$g5['group_table']} SET gr_id = '" . sql_escape_string($gr_id) . "', gr_subject = '커뮤니티' ");
}

$write_table = $g5['write_prefix'] . $bo_table;
$table_exists = sql_fetch(" SHOW TABLES LIKE '" . sql_escape_string($write_table) . "' ");

if (!$table_exists) {
    $sql_file = G5_ADMIN_PATH . '/sql_write.sql';
    if (!is_file($sql_file)) {
        die('sql_write.sql not found');
    }
    $file = file($sql_file);
    $sql = implode("\n", $file);
    $sql = preg_replace('/__TABLE_NAME__/', $write_table, $sql);
    $sql = preg_replace('/;\s*$/', '', trim($sql));
    sql_query($sql, false);
}

$exists = sql_fetch(" SELECT bo_table FROM {$g5['board_table']} WHERE bo_table = '" . sql_escape_string($bo_table) . "' ");

$board_fields = "
    gr_id = '" . sql_escape_string($gr_id) . "',
    bo_subject = '블로그·사례',
    bo_device = 'both',
    bo_list_level = '1',
    bo_read_level = '1',
    bo_write_level = '10',
    bo_reply_level = '10',
    bo_comment_level = '10',
    bo_html_level = '10',
    bo_link_level = '10',
    bo_upload_level = '10',
    bo_download_level = '1',
    bo_use_category = '1',
    bo_category_list = '" . sql_escape_string($categories) . "',
    bo_use_dhtml_editor = '1',
    bo_use_sideview = '0',
    bo_use_secret = '0',
    bo_use_good = '0',
    bo_use_nogood = '0',
    bo_table_width = '100',
    bo_subject_len = '80',
    bo_mobile_subject_len = '40',
    bo_page_rows = '12',
    bo_mobile_page_rows = '10',
    bo_new = '24',
    bo_hot = '100',
    bo_image_width = '900',
    bo_skin = '" . sql_escape_string($skin) . "',
    bo_mobile_skin = '" . sql_escape_string($skin) . "',
    bo_include_head = '_head.php',
    bo_include_tail = '_tail.php',
    bo_upload_count = '4',
    bo_upload_size = '10485760',
    bo_use_search = '1',
    bo_order = '1'
";

if ($exists && $exists['bo_table']) {
    sql_query(" UPDATE {$g5['board_table']} SET {$board_fields} WHERE bo_table = '" . sql_escape_string($bo_table) . "' ");
    $action = 'updated';
} else {
    sql_query(" INSERT INTO {$g5['board_table']} SET bo_table = '" . sql_escape_string($bo_table) . "', {$board_fields} ");
    $action = 'inserted';
}

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('board');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>맥락한의원 블로그 게시판 등록 완료</h1>';
echo '<p>게시판 ID: <strong>' . htmlspecialchars($bo_table) . '</strong> (' . htmlspecialchars($action) . ')</p>';
echo '<p>스킨: <strong>' . htmlspecialchars($skin) . '</strong></p>';
echo '<p><code>inc/site_config.php</code>의 <code>MK_BLOG_BOARD</code>를 <strong>blog</strong>로 설정하세요.</p>';
echo '<ul>';
echo '<li><a href="' . get_pretty_url($bo_table) . '">블로그 목록</a></li>';
echo '<li><a href="' . G5_ADMIN_URL . '/board_form.php?w=u&amp;bo_table=' . $bo_table . '">관리자 게시판 설정</a></li>';
echo '</ul>';
echo '<p><strong>보안: 이 install 파일을 서버에서 삭제하세요.</strong></p>';
