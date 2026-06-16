<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('onoff_builder_popup_layer_css_url')) {
    function onoff_builder_popup_layer_css_url()
    {
        if (defined('ONOFF_BUILDER_ASSETS_URL')) {
            return ONOFF_BUILDER_ASSETS_URL . '/css/popup-layer.css';
        }
        if (defined('G5_CSS_URL')) {
            return G5_CSS_URL . '/headnerve-newwin.css';
        }

        return '';
    }
}

if (!function_exists('onoff_builder_popup_layer_stylesheet_tag')) {
    function onoff_builder_popup_layer_stylesheet_tag()
    {
        $url = onoff_builder_popup_layer_css_url();
        if ($url === '') {
            return '';
        }

        return '<link rel="stylesheet" href="' . $url . '">';
    }
}

if (!function_exists('onoff_builder_popup_layer_device_sql')) {
    function onoff_builder_popup_layer_device_sql()
    {
        if (defined('G5_IS_MOBILE') && G5_IS_MOBILE) {
            return "nw_device IN ( 'both', 'mobile' )";
        }

        return "nw_device IN ( 'both', 'pc' )";
    }
}

if (!function_exists('onoff_builder_project_popup_layer_enabled')) {
    /**
     * 프로젝트별 팝업레이어 노출 여부 (imports.json 의 popup_layer)
     *
     * @param string $project_id
     */
    function onoff_builder_project_popup_layer_enabled($project_id = '')
    {
        $project_id = function_exists('onoff_builder_sanitize_project_id')
            ? onoff_builder_sanitize_project_id($project_id)
            : trim((string) $project_id);

        $meta = ($project_id !== '' && function_exists('onoff_builder_get_import'))
            ? onoff_builder_get_import($project_id)
            : null;

        if (is_array($meta) && array_key_exists('popup_layer', $meta) && $meta['popup_layer'] === false) {
            return false;
        }

        if (defined('_INDEX_')) {
            return true;
        }

        if ($project_id !== '' && function_exists('onoff_builder_get_home_bridge_id')) {
            if (onoff_builder_get_home_bridge_id() === $project_id) {
                return true;
            }
        }

        if (is_array($meta) && !empty($meta['popup_layer'])) {
            return true;
        }

        return false;
    }
}

if (!function_exists('onoff_builder_fetch_popup_layers')) {
    function onoff_builder_fetch_popup_layers()
    {
        global $g5;

        if (empty($g5['new_win_table'])) {
            return array();
        }

        $pop_division = defined('_SHOP_') ? 'shop' : 'comm';
        $device_sql = onoff_builder_popup_layer_device_sql();
        $time_sql = "'".G5_TIME_YMDHIS."' between nw_begin_time and nw_end_time";

        $queries = array(
            " select * from {$g5['new_win_table']}
               where {$time_sql}
                 and {$device_sql}
                 and nw_division IN ( 'both', '".$pop_division."' )
               order by nw_id asc ",
            " select * from {$g5['new_win_table']}
               where {$time_sql}
                 and {$device_sql}
               order by nw_id asc ",
        );

        foreach ($queries as $sql) {
            $result = sql_query($sql, false);
            if ($result === false) {
                continue;
            }

            $rows = array();
            while ($nw = sql_fetch_array($result)) {
                if (isset($_COOKIE["hd_pops_{$nw['nw_id']}"]) && $_COOKIE["hd_pops_{$nw['nw_id']}"]) {
                    continue;
                }
                $rows[] = $nw;
            }

            if (count($rows)) {
                return $rows;
            }
        }

        return array();
    }
}

if (!function_exists('onoff_builder_popup_layers_to_bootstrap')) {
    function onoff_builder_popup_layers_to_bootstrap($rows)
    {
        $layers = array();

        foreach ((array) $rows as $nw) {
            $layers[] = array(
                'id'            => (int) $nw['nw_id'],
                'top'           => (int) $nw['nw_top'],
                'left'          => (int) $nw['nw_left'],
                'width'         => (int) $nw['nw_width'],
                'height'        => (int) $nw['nw_height'],
                'disableHours'  => (int) $nw['nw_disable_hours'],
                'subject'       => isset($nw['nw_subject']) ? (string) $nw['nw_subject'] : '',
                'html'          => conv_content($nw['nw_content'], 1),
                'cookieName'    => 'hd_pops_'.$nw['nw_id'],
            );
        }

        return array(
            'cssUrl' => onoff_builder_popup_layer_css_url(),
            'layers' => $layers,
        );
    }
}

if (!function_exists('onoff_builder_popup_layer_bootstrap_script')) {
    function onoff_builder_popup_layer_bootstrap_script($rows)
    {
        if (!count($rows)) {
            return '';
        }

        $payload = onoff_builder_popup_layers_to_bootstrap($rows);
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if ($json === false) {
            return '';
        }

        return '<script>window.__ONOFF_BUILDER_POPUP__='.$json.';</script>';
    }
}

if (!function_exists('onoff_builder_capture_popup_layer_markup')) {
    function onoff_builder_capture_popup_layer_markup($use_jquery = false)
    {
        ob_start();
        onoff_builder_render_popup_layer_markup($use_jquery);

        return (string) ob_get_clean();
    }
}

if (!function_exists('onoff_builder_render_popup_layer_markup')) {
    function onoff_builder_render_popup_layer_markup($use_jquery = false)
    {
        global $g5;

        if (!defined('_GNUBOARD_') || empty($g5['new_win_table'])) {
            return;
        }

        $rows = onoff_builder_fetch_popup_layers();
        if (!count($rows)) {
            return;
        }
        ?>

<!-- onoff-builder 팝업레이어 시작 { -->
<div id="hd_pop">
    <h2>팝업레이어 알림</h2>

<?php foreach ($rows as $nw) { ?>
    <div id="hd_pops_<?php echo $nw['nw_id']; ?>" class="hd_pops" style="top:<?php echo $nw['nw_top']; ?>px;left:<?php echo $nw['nw_left']; ?>px">
        <div class="hd_pops_con" style="width:<?php echo $nw['nw_width']; ?>px;height:<?php echo $nw['nw_height']; ?>px">
            <?php echo conv_content($nw['nw_content'], 1); ?>
        </div>
        <div class="hd_pops_footer">
            <button type="button" class="hd_pops_reject hd_pops_<?php echo $nw['nw_id']; ?> <?php echo $nw['nw_disable_hours']; ?>"><strong><?php echo $nw['nw_disable_hours']; ?></strong>시간 동안 다시 열람하지 않습니다.</button>
            <button type="button" class="hd_pops_close hd_pops_<?php echo $nw['nw_id']; ?>">닫기<?php if ($use_jquery) { ?> <i class="fa fa-times" aria-hidden="true"></i><?php } ?></button>
        </div>
    </div>
<?php } ?>
</div>

<?php if ($use_jquery) { ?>
<script>
$(function() {
    $(".hd_pops_reject").click(function() {
        var id = $(this).attr('class').split(' ');
        var ck_name = id[1];
        var exp_time = parseInt(id[2], 10);
        $("#"+id[1]).css("display", "none");
        set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
    });
    $('.hd_pops_close').click(function() {
        var idb = $(this).attr('class').split(' ');
        $('#'+idb[1]).css('display','none');
    });
    $("#hd").css("z-index", 1000);
});
</script>
<?php } else { ?>
<script>
(function () {
    function onoffBuilderSetPopupCookie(name, value, expirehours) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (60 * 60 * 1000 * expirehours));
        document.cookie = name + '=' + encodeURIComponent(value) + '; path=/; expires=' + expires.toUTCString() + ';';
    }

    document.querySelectorAll('.hd_pops_reject').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var parts = this.className.split(/\s+/);
            var ckName = parts[1];
            var expHours = parseInt(parts[2], 10) || 24;
            var layer = document.getElementById(ckName);
            if (layer) {
                layer.style.display = 'none';
            }
            onoffBuilderSetPopupCookie(ckName, '1', expHours);
        });
    });

    document.querySelectorAll('.hd_pops_close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var parts = this.className.split(/\s+/);
            var layer = document.getElementById(parts[1]);
            if (layer) {
                layer.style.display = 'none';
            }
        });
    });
})();
</script>
<?php } ?>
<!-- } onoff-builder 팝업레이어 끝 -->
        <?php
    }
}

if (!function_exists('onoff_builder_inject_popup_layer_into_html')) {
    function onoff_builder_inject_popup_layer_into_html($html, $project_id = '')
    {
        if (!onoff_builder_project_popup_layer_enabled($project_id)) {
            return $html;
        }

        $rows = onoff_builder_fetch_popup_layers();
        if (!count($rows)) {
            return $html;
        }

        $markup = onoff_builder_capture_popup_layer_markup(false);
        if ($markup === '') {
            return $html;
        }

        $css_tag = onoff_builder_popup_layer_stylesheet_tag();
        $bootstrap = onoff_builder_popup_layer_bootstrap_script($rows);
        $head_inject = '';
        if ($css_tag !== '' && stripos($html, 'popup-layer.css') === false && stripos($html, 'headnerve-newwin.css') === false) {
            $head_inject .= $css_tag . "\n";
        }
        if ($bootstrap !== '' && stripos($html, '__ONOFF_BUILDER_POPUP__') === false) {
            $head_inject .= $bootstrap . "\n";
        }
        if ($head_inject !== '' && stripos($html, '</head>') !== false) {
            $html = preg_replace('#</head>#i', $head_inject . '</head>', $html, 1);
        }

        if (preg_match('#<body[^>]*>#i', $html)) {
            return preg_replace('#<body([^>]*)>#i', '<body$1>' . "\n" . $markup, $html, 1);
        }

        return $markup . $html;
    }
}
