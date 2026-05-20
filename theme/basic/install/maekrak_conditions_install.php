<?php
/**
 * 맥락한의원 1층 진료과목 content DB 등록 (1회 실행)
 *
 * 접속: /theme/basic/install/maekrak_conditions_install.php
 * 관리자 로그인 후 실행하거나, 아래 INSTALL_KEY를 설정한 뒤 ?key=값 으로 실행
 * 실행 후 이 파일을 서버에서 삭제하세요.
 */
define('MAEKRAK_CONDITION_INSTALL_KEY', ''); // 예: 'your-secret-once' — 비우면 최고관리자만 실행 가능

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_')) {
    die('GNUBOARD common load failed');
}

$allowed = false;
if ($is_admin === 'super') {
    $allowed = true;
}
if (MAEKRAK_CONDITION_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_CONDITION_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

include_once G5_THEME_PATH . '/inc/condition_data.php';

$pages = maekrak_conditions_data();
$skin = 'maekrak_condition';
$done = array();
$errors = array();

foreach ($pages as $co_id => $page) {
    $co_id = preg_replace('/[^a-z0-9_]/i', '', $co_id);
    $subject = sql_escape_string($page['page_name']);
    $content = sql_escape_string('<!-- maekrak_condition: theme template renders this page -->');
    $seo = sql_escape_string(generate_seo_title($page['page_name']));

    $exists = sql_fetch(" SELECT co_id FROM {$g5['content_table']} WHERE co_id = '{$co_id}' ");

    if ($exists && $exists['co_id']) {
        $sql = " UPDATE {$g5['content_table']} SET
                    co_subject = '{$subject}',
                    co_content = '{$content}',
                    co_mobile_content = '{$content}',
                    co_skin = '{$skin}',
                    co_mobile_skin = '{$skin}',
                    co_html = '1',
                    co_tag_filter_use = '1',
                    co_seo_title = '{$seo}'
                 WHERE co_id = '{$co_id}' ";
        sql_query($sql);
        $done[] = "updated: {$co_id}";
    } else {
        $sql = " INSERT INTO {$g5['content_table']} SET
                    co_id = '{$co_id}',
                    co_subject = '{$subject}',
                    co_content = '{$content}',
                    co_mobile_content = '{$content}',
                    co_skin = '{$skin}',
                    co_mobile_skin = '{$skin}',
                    co_html = '1',
                    co_tag_filter_use = '1',
                    co_seo_title = '{$seo}' ";
        sql_query($sql);
        $done[] = "inserted: {$co_id}";
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>맥락한의원 진료과목 content 등록 완료</h1><ul>';
foreach ($done as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul>';
echo '<p>관리자 &gt; 환경설정 &gt; 내용관리에서 스킨이 <strong>maekrak_condition</strong> 인지 확인하세요.</p>';
echo '<p>메뉴 URL 예: ' . htmlspecialchars(maekrak_condition_url('headache')) . '</p>';
echo '<p><strong>보안: 이 install 파일을 서버에서 삭제하세요.</strong></p>';
