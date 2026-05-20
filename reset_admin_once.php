<?php
/**
 * 최고관리자 비밀번호 1회 재설정 + (선택) 관리자 자동 로그인
 *
 * 1) 재설정: https://도메인/reset_admin_once.php?token=maekrak_reset_2026
 * 2) 바로 로그인: 위 URL 뒤에 &login=1 추가
 * 완료 후 이 파일을 서버에서 삭제하세요.
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

foreach (array('session', 'tmp') as $subdir) {
    $dir = G5_DATA_PATH . '/' . $subdir;
    if (!is_dir($dir)) {
        @mkdir($dir, G5_DIR_PERMISSION, true);
    }
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

$tmp_test = false;
$tmp_file = G5_DATA_PATH . '/tmp/tmp-write-test-' . time();
$fh = @fopen($tmp_file, 'w');
if ($fh) {
    $tmp_test = (bool) @fwrite($fh, 'ok');
    @fclose($fh);
    @unlink($tmp_file);
}

$session_dir = session_save_path() ?: sys_get_temp_dir();
$session_writable = is_writable($session_dir);

if (isset($_GET['login']) && $_GET['login'] === '1' && $ok) {
    if (! (defined('SKIP_SESSION_REGENERATE_ID') && SKIP_SESSION_REGENERATE_ID)) {
        session_regenerate_id(false);
    }
    set_session('ss_mb_id', $mb['mb_id']);
    generate_mb_key($mb);
    if (function_exists('update_auth_session_token')) {
        update_auth_session_token($mb['mb_datetime']);
    }
    goto_url(G5_ADMIN_URL);
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>관리자 비밀번호 재설정</h1>';
echo '<p>아이디: <strong>' . htmlspecialchars($mb_id) . '</strong></p>';
echo '<p>비밀번호: <strong>' . htmlspecialchars(RESET_ADMIN_PASS) . '</strong></p>';
echo '<p>cf_admin: <strong>' . htmlspecialchars($config['cf_admin']) . '</strong></p>';
echo '<p>비밀번호 검증: ' . ($ok ? '<span style="color:green">성공</span>' : '<span style="color:red">실패</span>') . '</p>';
echo '<p>data/tmp 쓰기: ' . ($tmp_test ? '<span style="color:green">가능</span>' : '<span style="color:red">불가 (관리자 로그인 차단 원인)</span>') . '</p>';
echo '<p>세션 저장 경로: <code>' . htmlspecialchars($session_dir) . '</code> — ' . ($session_writable ? '<span style="color:green">쓰기 가능</span>' : '<span style="color:red">쓰기 불가</span>') . '</p>';
echo '<hr>';
echo '<p><strong>/adm/ 주소에는 로그인 폼이 없습니다.</strong> 아래 중 하나로 접속하세요.</p>';
echo '<ol>';
echo '<li><a href="' . G5_BBS_URL . '/login.php?url=' . urlencode(G5_ADMIN_URL) . '">회원 로그인</a> → admin / 2580 입력 → 관리자 페이지 이동</li>';
echo '<li><a href="?token=' . urlencode(RESET_TOKEN) . '&amp;login=1"><strong>관리자 자동 로그인 (바로 /adm/ 이동)</strong></a></li>';
echo '</ol>';
echo '<p style="color:red"><strong>작업 후 reset_admin_once.php 파일을 서버에서 삭제하세요.</strong></p>';
