<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/disease_template.php';

$page = maekrak_get_disease_by_co_id($co_id);

if (!$page) {
    echo '<p class="maekrak-dis-error">질환 상세 페이지 데이터를 찾을 수 없습니다.</p>';
    return;
}

maekrak_render_disease_page($page);
