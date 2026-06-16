<?php
include_once(dirname(__DIR__) . '/_common.php');
include_once(dirname(__DIR__) . '/bootstrap.php');

header('Content-Type: application/json; charset=utf-8');

$project_id = isset($_GET['project_id']) ? $_GET['project_id'] : '';
if ($project_id !== '' && !onoff_builder_project_popup_layer_enabled($project_id)) {
    echo json_encode(array('ok' => true, 'layers' => array(), 'cssUrl' => ''), JSON_UNESCAPED_UNICODE);
    exit;
}

$rows = onoff_builder_fetch_popup_layers();
$payload = onoff_builder_popup_layers_to_bootstrap($rows);

echo json_encode(array_merge(array('ok' => true), $payload), JSON_UNESCAPED_UNICODE);
