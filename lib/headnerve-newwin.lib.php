<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

$onoff_popup_layer_lib = defined('ONOFF_BUILDER_PATH')
    ? ONOFF_BUILDER_PATH . '/lib/popup-layer.php'
    : '';

if ($onoff_popup_layer_lib !== '' && is_file($onoff_popup_layer_lib)) {
    include_once $onoff_popup_layer_lib;
}

if (!function_exists('headnerve_newwin_device_sql')) {
    function headnerve_newwin_device_sql()
    {
        return function_exists('onoff_builder_popup_layer_device_sql')
            ? onoff_builder_popup_layer_device_sql()
            : "nw_device IN ( 'both', 'pc' )";
    }
}

if (!function_exists('headnerve_should_show_newwin')) {
    function headnerve_should_show_newwin($builder_project_id = '')
    {
        return function_exists('onoff_builder_project_popup_layer_enabled')
            ? onoff_builder_project_popup_layer_enabled($builder_project_id)
            : defined('_INDEX_');
    }
}

if (!function_exists('headnerve_fetch_newwin_rows')) {
    function headnerve_fetch_newwin_rows()
    {
        return function_exists('onoff_builder_fetch_popup_layers')
            ? onoff_builder_fetch_popup_layers()
            : array();
    }
}

if (!function_exists('headnerve_capture_newwin_layer')) {
    function headnerve_capture_newwin_layer($use_jquery = true)
    {
        return function_exists('onoff_builder_capture_popup_layer_markup')
            ? onoff_builder_capture_popup_layer_markup($use_jquery)
            : '';
    }
}

if (!function_exists('headnerve_render_newwin_layer')) {
    function headnerve_render_newwin_layer($use_jquery = true)
    {
        if (function_exists('onoff_builder_render_popup_layer_markup')) {
            onoff_builder_render_popup_layer_markup($use_jquery);
        }
    }
}

if (!function_exists('headnerve_newwin_stylesheet_tag')) {
    function headnerve_newwin_stylesheet_tag()
    {
        return function_exists('onoff_builder_popup_layer_stylesheet_tag')
            ? onoff_builder_popup_layer_stylesheet_tag()
            : '';
    }
}

if (!function_exists('headnerve_inject_newwin_into_html')) {
    function headnerve_inject_newwin_into_html($html, $builder_project_id = '')
    {
        return function_exists('onoff_builder_inject_popup_layer_into_html')
            ? onoff_builder_inject_popup_layer_into_html($html, $builder_project_id)
            : $html;
    }
}
