<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/condition_template.php';

$page = maekrak_get_condition_by_co_id($co_id);

if (!$page) {
    echo '<p class="maekrak-cond-error">진료과목 페이지 데이터를 찾을 수 없습니다.</p>';
    return;
}

maekrak_render_condition_page($page);
