<?php
if (!defined('_GNUBOARD_')) exit;

// 공지사항 목록은 블로그(column) 목록과 동일한 썸네일형 UI를 사용합니다.
$board_skin_path = get_skin_path('board', 'post-thumb');
$board_skin_url = get_skin_url('board', 'post-thumb');
include $board_skin_path.'/list.skin.php';
return;
