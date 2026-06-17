<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('onoff_builder_seo_feed_enabled')) {
    function onoff_builder_seo_feed_enabled()
    {
        return !function_exists('g5site_cfg_bool') || g5site_cfg_bool('seo_feed_enabled', true);
    }
}

if (!function_exists('onoff_builder_seo_feed_base_url')) {
    function onoff_builder_seo_feed_base_url()
    {
        if (function_exists('seofeed_get_base_url')) {
            $url = seofeed_get_base_url();
            if ($url !== '') {
                return $url;
            }
        }

        if (function_exists('icrm_detect_request_base_url')) {
            $url = icrm_detect_request_base_url();
            if ($url !== '') {
                return rtrim($url, '/');
            }
        }

        return defined('G5_URL') ? rtrim(G5_URL, '/') : '';
    }
}

if (!function_exists('onoff_builder_seo_feed_sitemap_url')) {
    function onoff_builder_seo_feed_sitemap_url()
    {
        if (function_exists('seofeed_sitemap_url')) {
            return seofeed_sitemap_url();
        }

        return onoff_builder_seo_feed_base_url() . '/sitemap.xml';
    }
}

if (!function_exists('onoff_builder_seo_feed_rss_url')) {
    function onoff_builder_seo_feed_rss_url()
    {
        if (function_exists('seofeed_site_rss_url')) {
            return seofeed_site_rss_url();
        }

        return onoff_builder_seo_feed_base_url() . '/rss.xml';
    }
}

if (!function_exists('onoff_builder_seo_feed_robots_url')) {
    function onoff_builder_seo_feed_robots_url()
    {
        return onoff_builder_seo_feed_base_url() . '/robots.txt';
    }
}

if (!function_exists('onoff_builder_sync_site_base_url_from_request')) {
    /**
     * _site.config icrm_site_base_url 이 비어 있고 G5_URL 과 접속 도메인이 다르면 자동 기록
     */
    function onoff_builder_sync_site_base_url_from_request()
    {
        if (!function_exists('onoff_builder_set_site_config_key') || !function_exists('icrm_detect_request_base_url')) {
            return false;
        }

        if (function_exists('g5site_cfg') && g5site_cfg('icrm_site_base_url', '') !== '') {
            return false;
        }

        $detected = rtrim(icrm_detect_request_base_url(), '/');
        if ($detected === '' || !preg_match('#^https?://#i', $detected)) {
            return false;
        }

        $g5_url = defined('G5_URL') ? rtrim(G5_URL, '/') : '';
        $g5_host = $g5_url !== '' ? parse_url($g5_url, PHP_URL_HOST) : '';
        $det_host = parse_url($detected, PHP_URL_HOST);

        if ($g5_host && $det_host && strtolower((string) $g5_host) === strtolower((string) $det_host)) {
            return false;
        }

        return onoff_builder_set_site_config_key('icrm_site_base_url', $detected);
    }
}

if (!function_exists('onoff_builder_ensure_seo_feed_htaccess')) {
    function onoff_builder_ensure_seo_feed_htaccess()
    {
        if (!defined('G5_PATH') || G5_PATH === '') {
            return false;
        }

        $path = G5_PATH . '/.htaccess';
        $begin = '# onoff-builder seo-feed BEGIN';
        $end = '# onoff-builder seo-feed END';
        $block = $begin . "\n"
            . "<IfModule mod_rewrite.c>\n"
            . "RewriteEngine On\n"
            . "RewriteRule ^sitemap\\.xml$ sitemap.php [L]\n"
            . "RewriteRule ^robots\\.txt$ robots.php [L]\n"
            . "RewriteRule ^rss\\.xml$ rss.php [L]\n"
            . "</IfModule>\n"
            . $end;

        if (is_file($path)) {
            $code = (string) @file_get_contents($path);
            if ($code !== '' && (strpos($code, 'sitemap.php') !== false || strpos($code, $begin) !== false)) {
                return true;
            }
            if (!is_writable($path)) {
                return false;
            }

            return @file_put_contents($path, $block . "\n\n" . $code, LOCK_EX) !== false;
        }

        if (!is_writable(G5_PATH)) {
            return false;
        }

        if (@file_put_contents($path, $block . "\n", LOCK_EX) !== false) {
            return true;
        }

        if (function_exists('update_rewrite_rules')) {
            return update_rewrite_rules();
        }

        return false;
    }
}

if (!function_exists('onoff_builder_enable_public_board_rss')) {
    function onoff_builder_enable_public_board_rss()
    {
        global $g5;

        if (empty($g5['board_table'])) {
            return;
        }

        $exclude = function_exists('seofeed_get_excluded_boards')
            ? seofeed_get_excluded_boards()
            : array('inquiry');

        $result = sql_query(
            " select bo_table from {$g5['board_table']}
               where bo_read_level < 2 ",
            false
        );

        while ($row = sql_fetch_array($result)) {
            $bo_table = preg_replace('/[^a-z0-9_]/', '', $row['bo_table']);
            if ($bo_table === '' || in_array($bo_table, $exclude, true)) {
                continue;
            }
            sql_query(
                " update {$g5['board_table']}
                     set bo_use_rss_view = 1
                   where bo_table = '{$bo_table}' ",
                false
            );
        }
    }
}

if (!function_exists('onoff_builder_inject_seo_feed_head_tags')) {
    function onoff_builder_inject_seo_feed_head_tags($html)
    {
        if (!onoff_builder_seo_feed_enabled()) {
            return $html;
        }

        $rss = onoff_builder_seo_feed_rss_url();
        $tags = '';
        if ($rss !== '' && stripos($html, 'application/rss+xml') === false) {
            $title = function_exists('g5site_cfg')
                ? g5site_cfg('site_name', (isset($GLOBALS['config']['cf_title']) ? $GLOBALS['config']['cf_title'] : 'RSS'))
                : 'RSS';
            $tags .= '<link rel="alternate" type="application/rss+xml" title="'
                . htmlspecialchars($title, ENT_QUOTES, 'UTF-8')
                . '" href="' . htmlspecialchars($rss, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        }

        if ($tags === '' || stripos($html, '</head>') === false) {
            return $html;
        }

        return preg_replace('#</head>#i', $tags . '</head>', $html, 1);
    }
}

if (!function_exists('onoff_builder_bootstrap_seo_feed')) {
    /**
     * onoff-builder 사이트 기본 SEO feed (sitemap.xml · rss.xml · robots.txt)
     */
    function onoff_builder_bootstrap_seo_feed()
    {
        static $ran = false;

        if ($ran || !onoff_builder_seo_feed_enabled()) {
            return;
        }
        $ran = true;

        if (!defined('G5_DATA_PATH')) {
            return;
        }

        if (is_file(G5_LIB_PATH . '/seo-feed.lib.php')) {
            include_once G5_LIB_PATH . '/seo-feed.lib.php';
        }

        $cache_dir = G5_DATA_PATH . '/cache';
        $flag = $cache_dir . '/onoff_builder_seo_feed_installed.flag';

        if (!is_file($flag)) {
            onoff_builder_sync_site_base_url_from_request();
            onoff_builder_ensure_seo_feed_htaccess();
            onoff_builder_enable_public_board_rss();

            if (!is_dir($cache_dir)) {
                @mkdir($cache_dir, G5_DIR_PERMISSION, true);
                @chmod($cache_dir, G5_DIR_PERMISSION);
            }
            @file_put_contents($flag, date('c'));
        }
    }
}

onoff_builder_bootstrap_seo_feed();
