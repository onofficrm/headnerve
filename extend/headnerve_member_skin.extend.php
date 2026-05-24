<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 회원 스킨을 테마 maekrak으로 고정 (관리자에서 theme/maekrak 미적용 시에도 동작)
 */
$headnerve_member_skin = G5_IS_MOBILE ? 'theme/maekrak' : 'theme/maekrak';
$headnerve_member_skin_path = get_skin_path('member', $headnerve_member_skin);

if (is_dir($headnerve_member_skin_path) && is_file($headnerve_member_skin_path.'/login.skin.php')) {
    $member_skin_path = $headnerve_member_skin_path;
    $member_skin_url = get_skin_url('member', $headnerve_member_skin);
}
