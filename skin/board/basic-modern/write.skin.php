<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
$board_skin_modifier = '--basic-modern';
include_once(G5_SKIN_PATH.'/board/g5b-shared/write.skin.php');
