<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

global $member;

define('ICRM_HUB_ACTIVE', true);
define('ICRM_MEMBER_PUBLISH', true);

$action_url = G5_PLUGIN_URL . '/icrm_member/action.php';

if (is_file(G5_LIB_PATH . '/icrm-content.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-content.lib.php';
}
icrm_content_bootstrap();

include G5_PLUGIN_PATH . '/icrm_hub/admin/views/content-publish.php';
