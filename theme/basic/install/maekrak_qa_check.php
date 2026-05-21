<?php
/**
 * 맥락한의원 URL QA (읽기 전용)
 * /theme/basic/install/maekrak_qa_check.php?key=mrk_qa_20260520
 */
define('MAEKRAK_QA_KEY', 'mrk_qa_20260520');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_THEME_PATH . '/inc/disease_builder.php';
include_once G5_THEME_PATH . '/inc/condition_data.php';

if (!defined('_GNUBOARD_')) {
    die('load failed');
}

$allowed = ($is_admin === 'super');
if (!$allowed && MAEKRAK_QA_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_QA_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

$base = rtrim(G5_URL, '/');
$checks = array(
    array('홈', $base . '/'),
    array('블로그', $base . '/bbs/board.php?bo_table=blog'),
);

foreach (maekrak_conditions_co_ids() as $co_id) {
    $checks[] = array('1층 ' . $co_id, maekrak_condition_url($co_id));
}

foreach (maekrak_disease_subtype_map() as $parent => $subs) {
    foreach ($subs as $co_id) {
        $checks[] = array('2층 ' . $co_id, G5_BBS_URL . '/content.php?co_id=' . urlencode($co_id));
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>맥락한의원 URL QA</h1><table border="1" cellpadding="6"><tr><th>구분</th><th>URL</th><th>HTTP</th><th>마커</th></tr>';

foreach ($checks as $row) {
    $label = $row[0];
    $url = $row[1];
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => true,
    ));
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $marker = '—';
    if ($code === 200 && is_string($body)) {
        if (strpos($label, '1층') === 0 && strpos($body, 'maekrak-cond') !== false) {
            $marker = 'OK cond';
        } elseif (strpos($label, '2층') === 0 && strpos($body, 'maekrak-dis') !== false) {
            $marker = 'OK dis';
        } elseif ($label === '홈' && strpos($body, 'maekrak-main--home') !== false) {
            $marker = 'OK home';
        } elseif ($label === '블로그' && strpos($body, 'maekrak-board-blog') !== false) {
            $marker = 'OK blog';
        } else {
            $marker = 'WARN';
        }
    } elseif ($code !== 200) {
        $marker = 'FAIL';
    }

    echo '<tr><td>' . htmlspecialchars($label) . '</td><td><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($url) . '</a></td><td>' . $code . '</td><td>' . htmlspecialchars($marker) . '</td></tr>';
}

echo '</table><p>완료 후 이 파일을 삭제하세요.</p>';
