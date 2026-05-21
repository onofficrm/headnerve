<?php
/**
 * 내용관리 co_skin → theme/maekrak_* (1회)
 * /theme/basic/install/maekrak_skin_fix_once.php?key=mrk_skin_fix_20260520
 */
define('MAEKRAK_SKIN_FIX_KEY', 'mrk_skin_fix_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_')) {
    die('GNUBOARD common load failed');
}

if (!isset($_GET['key']) || $_GET['key'] !== MAEKRAK_SKIN_FIX_KEY) {
    die('invalid key');
}

include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

$updates = array();
foreach (maekrak_conditions_co_ids() as $cid) {
    $updates[$cid] = array('theme/maekrak_condition', 'theme/maekrak_condition');
}
foreach (maekrak_diseases_co_ids() as $did) {
    $updates[$did] = array('theme/maekrak_disease', 'theme/maekrak_disease');
}

$lines = array();
foreach ($updates as $co_id => $skins) {
    $esc_id = sql_escape_string($co_id);
    $esc_skin = sql_escape_string($skins[0]);
    $esc_mobile = sql_escape_string($skins[1]);
    sql_query(" UPDATE {$g5['content_table']} SET
        co_skin = '{$esc_skin}',
        co_mobile_skin = '{$esc_mobile}'
        WHERE co_id = '{$esc_id}' ");
    $row = sql_fetch(" SELECT co_skin, co_mobile_skin FROM {$g5['content_table']} WHERE co_id = '{$esc_id}' ");
    $lines[] = $co_id . ' => ' . ($row ? $row['co_skin'] . ' / ' . $row['co_mobile_skin'] : 'NOT FOUND');
}

header('Content-Type: text/plain; charset=utf-8');
echo implode("\n", $lines);
