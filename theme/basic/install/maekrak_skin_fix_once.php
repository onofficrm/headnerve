<?php
define('MAEKRAK_SKIN_FIX_KEY', 'mrk_skin_fix_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_') || !isset($_GET['key']) || $_GET['key'] !== MAEKRAK_SKIN_FIX_KEY) {
    die('invalid');
}

include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

$ids = array_merge(maekrak_conditions_co_ids(), maekrak_diseases_co_ids());
$lines = array();

foreach ($ids as $co_id) {
    $skin = in_array($co_id, maekrak_diseases_co_ids(), true) ? 'theme/maekrak_disease' : 'theme/maekrak_condition';
    $esc_id = sql_escape_string($co_id);
    $esc_skin = sql_escape_string($skin);
    sql_query(" UPDATE {$g5['content_table']} SET co_skin = '{$esc_skin}', co_mobile_skin = '{$esc_skin}' WHERE co_id = '{$esc_id}' ");

    if (function_exists('g5_delete_cache')) {
        g5_delete_cache('content-' . $co_id . '-' . g5_cache_secret_key());
    }
    if (isset($g5_object)) {
        $g5_object->delete('content', $co_id, 'content');
    }

    $row = sql_fetch(" SELECT co_skin FROM {$g5['content_table']} WHERE co_id = '{$esc_id}' ");
    $lines[] = $co_id . ' => ' . ($row['co_skin'] ?? '?');
}

header('Content-Type: text/plain; charset=utf-8');
echo implode("\n", $lines);
