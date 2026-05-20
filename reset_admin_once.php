<?php
/**
 * 최고관리자 비밀번호 1회 재설정 (사용 후 반드시 삭제)
 *
 * 사용법:
 * 1. 브라우저에서 접속: https://도메인/reset_admin_once.php?token=maekrak_reset_2026
 * 2. 화면에 "완료" 확인 후 이 파일을 서버에서 삭제
 */
define('RESET_TOKEN', 'maekrak_reset_2026');
define('RESET_ADMIN_ID', 'admin');
define('RESET_ADMIN_PASS', '2580');

if (!isset($_GET['token']) || $_GET['token'] !== RESET_TOKEN) {
    http_response_code(403);
    exit('Forbidden');
}

include_once('./_common.php');

if (!function_exists('get_encrypt_string')) {
    exit('그누보드 common 로드 실패');
}

$mb_id = RESET_ADMIN_ID;
$hash = get_encrypt_string(RESET_ADMIN_PASS);
$hash = sql_escape_string($hash);
$certify = G5_TIME_YMDHIS;

$sql = " UPDATE {$g5['member_table']}
            SET mb_password = '{$hash}',
                mb_email_certify = '{$certify}',
                mb_intercept_date = '',
                mb_leave_date = '',
                mb_level = '10'
            WHERE mb_id = '{$mb_id}' ";
sql_query($sql);

$cnt = sql_fetch(" SELECT COUNT(*) AS cnt FROM {$g5['member_table']} WHERE mb_id = '{$mb_id}' ");
if (!$cnt['cnt']) {
    $sql = " INSERT INTO {$g5['member_table']}
                SET mb_id = '{$mb_id}',
                    mb_password = '{$hash}',
                    mb_name = '최고관리자',
                    mb_nick = '최고관리자',
                    mb_email = 'admin@localhost',
                    mb_level = '10',
                    mb_datetime = '{$certify}',
                    mb_email_certify = '{$certify}',
                    mb_ip = '127.0.0.1' ";
    sql_query($sql);
}

sql_query(" UPDATE {$g5['config_table']} SET cf_admin = '{$mb_id}' ");

$mb = get_member($mb_id);
$ok = login_password_check($mb, RESET_ADMIN_PASS, $mb['mb_password']);

header('Content-Type: text/html; charset=utf-8');
echo '<h1>관리자 비밀번호 재설정</h1>';
echo '<p>아이디: <strong>' . htmlspecialchars($mb_id) . '</strong></p>';
echo '<p>비밀번호: <strong>' . htmlspecialchars(RESET_ADMIN_PASS) . '</strong></p>';
echo '<p>cf_admin: <strong>' . htmlspecialchars($config['cf_admin']) . '</strong></p>';
echo '<p>비밀번호 검증: ' . ($ok ? '<span style="color:green">성공</span>' : '<span style="color:red">실패 — 관리자에게 문의</span>') . '</p>';
echo '<p><a href="' . G5_BBS_URL . '/login.php?url=' . urlencode(G5_ADMIN_URL) . '">관리자 로그인 페이지로 이동</a></p>';
echo '<p style="color:red"><strong>보안을 위해 지금 즉시 reset_admin_once.php 파일을 서버에서 삭제하세요.</strong></p>';
