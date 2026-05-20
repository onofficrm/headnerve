<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit;

if (G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_MSHOP_PATH . '/index.php');
    return;
}

include_once(G5_THEME_MOBILE_PATH . '/head.php');
include_once(G5_THEME_PATH . '/inc/main_content.php');
include_once(G5_THEME_MOBILE_PATH . '/tail.php');
