<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('headnerve_newwin_device_sql')) {
    function headnerve_newwin_device_sql()
    {
        if (defined('G5_IS_MOBILE') && G5_IS_MOBILE) {
            return "nw_device IN ( 'both', 'mobile' )";
        }

        return "nw_device IN ( 'both', 'pc' )";
    }
}

if (!function_exists('headnerve_should_show_newwin')) {
    /**
     * @param string $builder_project_id 빌더 프로젝트 ID (standalone 홈 출력 시)
     */
    function headnerve_should_show_newwin($builder_project_id = '')
    {
        if (defined('_INDEX_')) {
            return true;
        }

        if ($builder_project_id !== '' && function_exists('onoff_builder_get_home_bridge_id')) {
            return onoff_builder_get_home_bridge_id() === $builder_project_id;
        }

        return false;
    }
}

if (!function_exists('headnerve_fetch_newwin_rows')) {
    function headnerve_fetch_newwin_rows()
    {
        global $g5;

        if (empty($g5['new_win_table'])) {
            return array();
        }

        $pop_division = defined('_SHOP_') ? 'shop' : 'comm';
        $device_sql = headnerve_newwin_device_sql();
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

if (!function_exists('headnerve_capture_newwin_layer')) {
    /**
     * @param bool $use_jquery true: 그누보드 head(common.js) 환경, false: 빌더 standalone 등
     * @return string 출력 HTML (팝업 없으면 빈 문자열)
     */
    function headnerve_capture_newwin_layer($use_jquery = true)
    {
        ob_start();
        headnerve_render_newwin_layer($use_jquery);

        return (string) ob_get_clean();
    }
}

if (!function_exists('headnerve_render_newwin_layer')) {
    function headnerve_render_newwin_layer($use_jquery = true)
    {
        global $g5;

        if (!defined('_GNUBOARD_') || empty($g5['new_win_table'])) {
            return;
        }

        $rows = headnerve_fetch_newwin_rows();
        if (!count($rows)) {
            return;
        }
        ?>

<!-- 팝업레이어 시작 { -->
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
    function headnerveSetCookie(name, value, expirehours) {
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
            headnerveSetCookie(ckName, '1', expHours);
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
<!-- } 팝업레이어 끝 -->
        <?php
    }
}

if (!function_exists('headnerve_newwin_stylesheet_tag')) {
    function headnerve_newwin_stylesheet_tag()
    {
        if (!defined('G5_CSS_URL')) {
            return '';
        }

        return '<link rel="stylesheet" href="' . G5_CSS_URL . '/headnerve-newwin.css">';
    }
}

if (!function_exists('headnerve_inject_newwin_into_html')) {
    /**
     * 빌더 standalone 전체 HTML에 팝업레이어 삽입
     */
    function headnerve_inject_newwin_into_html($html, $builder_project_id = '')
    {
        if (!headnerve_should_show_newwin($builder_project_id)) {
            return $html;
        }

        $markup = headnerve_capture_newwin_layer(false);
        if ($markup === '') {
            return $html;
        }

        $css_tag = headnerve_newwin_stylesheet_tag();
        if ($css_tag !== '' && stripos($html, 'headnerve-newwin.css') === false) {
            $html = preg_replace('#</head>#i', $css_tag . "\n</head>", $html, 1);
        }

        if (preg_match('#<body[^>]*>#i', $html)) {
            return preg_replace('#<body([^>]*)>#i', '<body$1>' . "\n" . $markup, $html, 1);
        }

        return $markup . $html;
    }
}
