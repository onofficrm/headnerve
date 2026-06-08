<?php
require_once __DIR__ . '/../../common.php';

if (is_file(G5_PATH . '/_site.config.php')) {
    include_once G5_PATH . '/_site.config.php';
}
if (is_file(G5_LIB_PATH . '/icrm-member.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-member.lib.php';
}

if (!function_exists('icrm_member_enabled') || !icrm_member_enabled()) {
    if (function_exists('alert')) {
        alert('iCRM 회원 메뉴가 비활성화되어 있습니다.', G5_URL);
    }
    exit;
}

if (is_file(G5_LIB_PATH . '/icrm-admin-shell.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-admin-shell.lib.php';
}
if (is_file(G5_LIB_PATH . '/icrm-member.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-member.lib.php';
}
if (is_file(G5_LIB_PATH . '/icrm-member-board.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-member-board.lib.php';
}

$m = isset($_GET['m']) ? preg_replace('/[^a-z_]/', '', $_GET['m']) : 'home';

if ($m === 'design') {
    header('Location: ' . icrm_member_url(array('m' => 'setup', 'tab' => 'design')), true, 302);
    exit;
}
if ($m === 'boards') {
    header('Location: ' . icrm_member_url(array('m' => 'setup', 'tab' => 'boards')), true, 302);
    exit;
}

$modules = icrm_member_modules();
if (!isset($modules[$m])) {
    $m = 'home';
}

icrm_member_require($m);

define('ICRM_MEMBER_ACTIVE', true);

icrm_member_shell_begin($m);

switch ($m) {
    case 'setup':
        include __DIR__ . '/views/setup.php';
        break;
    case 'publish':
        include __DIR__ . '/views/publish.php';
        break;
    case 'home':
    default:
        include __DIR__ . '/views/home.php';
        break;
}

icrm_member_shell_end();
