<?php
include_once(dirname(__DIR__) . '/_common.php');
include_once(dirname(__DIR__) . '/bootstrap.php');

onoff_builder_require_admin(defined('G5_ADMIN_URL') ? G5_ADMIN_URL : G5_URL);

$project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
$enabled = !empty($_POST['popup_layer']);

if (!onoff_builder_set_import_popup_layer($project_id, $enabled)) {
    header('Location: ' . onoff_builder_admin_url('list.php?msg=' . urlencode('팝업레이어 설정 저장에 실패했습니다.')));
    exit;
}

header('Location: ' . onoff_builder_admin_url('list.php?msg=' . urlencode('팝업레이어 설정을 저장했습니다.')));
exit;
