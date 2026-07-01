<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('headnerve_floating_menu_css_ver')) {
    function headnerve_floating_menu_css_ver($filename)
    {
        if (function_exists('headnerve_board_asset_ver')) {
            return headnerve_board_asset_ver($filename);
        }

        $css_path = defined('G5_CSS_PATH') ? G5_CSS_PATH : G5_PATH . '/css';
        $path = $css_path . '/' . ltrim((string) $filename, '/');

        if (is_file($path)) {
            return (string) filemtime($path);
        }

        return defined('G5_CSS_VER') ? G5_CSS_VER : '1';
    }
}

if (!function_exists('headnerve_floating_menu_markup')) {
    function headnerve_floating_menu_markup()
    {
        $component = G5_PATH . '/components/maekrak-floating-menu.php';
        if (!is_file($component)) {
            return '';
        }

        ob_start();
        include $component;

        return (string) ob_get_clean();
    }
}

if (!function_exists('headnerve_floating_menu_head_markup')) {
    function headnerve_floating_menu_head_markup()
    {
        $chunks = array();

        if (defined('G5_CSS_URL')) {
            $chunks[] = '<link rel="stylesheet" href="' . G5_CSS_URL . '/custom.css?v=' . headnerve_floating_menu_css_ver('custom.css') . '">';
        }

        if (defined('G5_CSS_URL')) {
            $chunks[] = '<link rel="stylesheet" href="' . G5_CSS_URL . '/font-awesome.min.css">';
        }

        return implode("\n", $chunks);
    }
}

if (!function_exists('headnerve_floating_menu_body_classes')) {
    function headnerve_floating_menu_body_classes()
    {
        return 'headnerve-php-float headnerve-builder-page';
    }
}

if (!function_exists('headnerve_floating_menu_append_body_class')) {
    function headnerve_floating_menu_append_body_class($html)
    {
        $classes = headnerve_floating_menu_body_classes();
        if (stripos((string) $html, 'headnerve-php-float') !== false) {
            return $html;
        }

        if (preg_match('#<body\b([^>]*)>#i', $html, $matches)) {
            $attrs = $matches[1];
            if (preg_match('#\bclass=(["\'])([^"\']*)\1#i', $attrs, $class_match)) {
                $quote = $class_match[1];
                $next_class = trim($class_match[2] . ' ' . $classes);
                $next_attrs = preg_replace(
                    '#\bclass=(["\'])([^"\']*)\1#i',
                    'class=' . $quote . $next_class . $quote,
                    $attrs,
                    1
                );

                return preg_replace(
                    '#<body\b[^>]*>#i',
                    '<body' . $next_attrs . '>',
                    $html,
                    1
                );
            }

            return preg_replace(
                '#<body\b([^>]*)>#i',
                '<body$1 class="' . $classes . '">',
                $html,
                1
            );
        }

        return $html;
    }
}

if (!function_exists('onoff_builder_inject_floating_menu_into_html')) {
    function onoff_builder_inject_floating_menu_into_html($html)
    {
        $markup = headnerve_floating_menu_markup();
        if ($markup === '') {
            return $html;
        }

        $head_markup = headnerve_floating_menu_head_markup();
        if ($head_markup !== '' && stripos((string) $html, 'custom.css') === false && stripos($html, '</head>') !== false) {
            $html = preg_replace('#</head>#i', $head_markup . "\n</head>", $html, 1);
        }

        $html = headnerve_floating_menu_append_body_class($html);

        if (stripos((string) $html, 'id="maekrakFloat"') !== false) {
            return $html;
        }

        if (stripos((string) $html, '</body>') !== false) {
            return preg_replace('#</body>#i', $markup . "\n</body>", $html, 1);
        }

        return $html . $markup;
    }
}
