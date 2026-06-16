<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!is_file(G5_LIB_PATH.'/headnerve-newwin.lib.php')) {
    include_once G5_LIB_PATH.'/headnerve-newwin.lib.php';
}

headnerve_render_newwin_layer(true);
