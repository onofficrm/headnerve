<?php
/**
 * 빌더 standalone HTML — SEO 메타·lang·경로별 robots 주입
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('onoff_builder_request_path')) {
    function onoff_builder_request_path()
    {
        $uri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '/';
        $path = parse_url($uri, PHP_URL_PATH);
        if (!is_string($path) || $path === '') {
            return '/';
        }

        return $path;
    }
}

if (!function_exists('onoff_builder_escape_attr')) {
    function onoff_builder_escape_attr($str)
    {
        return htmlspecialchars((string) $str, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('onoff_builder_site_base_url')) {
    function onoff_builder_site_base_url()
    {
        if (function_exists('g5site_cfg')) {
            $configured = trim((string) g5site_cfg('icrm_site_base_url', ''));
            if ($configured !== '' && preg_match('#^https?://#i', $configured)) {
                return rtrim($configured, '/');
            }
        }
        if (defined('G5_URL') && G5_URL !== '') {
            return rtrim(G5_URL, '/');
        }

        return '';
    }
}

if (!function_exists('onoff_builder_abs_url')) {
    function onoff_builder_abs_url($url)
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '';
        }
        if (preg_match('#^https?://#i', $url)) {
            return $url;
        }
        $base = onoff_builder_site_base_url();
        if ($base === '') {
            return $url;
        }

        return $base . '/' . ltrim($url, '/');
    }
}

if (!function_exists('onoff_builder_force_html_lang_ko')) {
    function onoff_builder_force_html_lang_ko($html)
    {
        $html = (string) $html;
        if ($html === '') {
            return $html;
        }

        if (preg_match('#<html\b[^>]*\blang\s*=#i', $html)) {
            $replaced = preg_replace(
                '#(<html\b[^>]*\blang\s*=\s*)(["\'])[^"\']*\2#i',
                '$1$2ko$2',
                $html,
                1
            );

            return is_string($replaced) ? $replaced : $html;
        }

        $replaced = preg_replace('#<html\b#i', '<html lang="ko"', $html, 1);

        return is_string($replaced) ? $replaced : $html;
    }
}

if (!function_exists('onoff_builder_path_robots_directive')) {
    /**
     * 빌더·공개 경로별 robots (로그인·다국어 잔여 URL)
     *
     * @return string 비어 있으면 기본값 사용
     */
    function onoff_builder_path_robots_directive($path = null)
    {
        if ($path === null) {
            $path = onoff_builder_request_path();
        }
        $path = '/' . ltrim((string) $path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/') ?: '/';
        }

        if (preg_match('#^/login(?:$|/)#i', $path)) {
            return 'noindex,nofollow';
        }
        if (preg_match('#^/(?:en|zh-hans)(?:$|/)#i', $path)) {
            return 'noindex,nofollow';
        }

        return '';
    }
}

if (!function_exists('onoff_builder_should_inject_home_seo')) {
    function onoff_builder_should_inject_home_seo()
    {
        if (defined('_INDEX_') && _INDEX_) {
            return true;
        }

        $path = onoff_builder_request_path();
        $path = '/' . ltrim((string) $path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/') ?: '/';
        }

        return $path === '/' || $path === '/index.php';
    }
}

if (!function_exists('onoff_builder_load_home_seo_meta')) {
    function onoff_builder_load_home_seo_meta()
    {
        if (!function_exists('g5b_seo_meta_get') && defined('G5_LIB_PATH') && is_file(G5_LIB_PATH . '/seo-meta.lib.php')) {
            include_once G5_LIB_PATH . '/seo-meta.lib.php';
        }
        if (!function_exists('g5b_seo_meta_get')) {
            return array();
        }

        $meta = g5b_seo_meta_get('pages', '/');

        return is_array($meta) ? $meta : array();
    }
}

if (!function_exists('onoff_builder_build_home_seo_head_markup')) {
    function onoff_builder_build_home_seo_head_markup()
    {
        $meta = onoff_builder_load_home_seo_meta();
        $base = onoff_builder_site_base_url();
        $site_name = function_exists('g5site_cfg') ? g5site_cfg('site_name', '맥락한의원') : '맥락한의원';
        $company = function_exists('g5site_cfg') ? g5site_cfg('company_name', $site_name) : $site_name;
        $site_desc = function_exists('g5site_cfg') ? g5site_cfg('site_desc', '') : '';
        $seo_desc_cfg = function_exists('g5site_cfg') ? g5site_cfg('seo_description', '') : '';

        $title = isset($meta['title']) ? trim((string) $meta['title']) : '';
        if ($title === '' && function_exists('g5site_cfg')) {
            $title = trim((string) g5site_cfg('seo_title', ''));
        }
        if ($title === '') {
            $title = $site_name;
        }

        $description = isset($meta['description']) ? trim((string) $meta['description']) : '';
        if ($description === '') {
            $description = $seo_desc_cfg !== '' ? $seo_desc_cfg : $site_desc;
        }

        $keywords = isset($meta['keywords']) ? trim((string) $meta['keywords']) : '';
        if ($keywords === '' && function_exists('g5site_cfg')) {
            $main_kw = g5site_cfg('main_keyword', '');
            $sub_kw = g5site_cfg('sub_keywords', '');
            if (is_array($sub_kw)) {
                $sub_kw = implode(', ', array_filter(array_map('trim', $sub_kw)));
            }
            $keywords = implode(', ', array_filter(array($main_kw, $sub_kw)));
        }

        $robots = isset($meta['robots']) ? trim((string) $meta['robots']) : '';
        if ($robots === '' && function_exists('g5site_cfg')) {
            $robots = g5site_cfg('robots', 'index,follow');
        }
        if ($robots === '') {
            $robots = 'index,follow';
        }
        $path_robots = onoff_builder_path_robots_directive();
        if ($path_robots !== '') {
            $robots = $path_robots;
        }

        $canonical = isset($meta['canonical']) ? trim((string) $meta['canonical']) : '';
        if ($canonical === '') {
            $canonical = $base !== '' ? $base . '/' : '/';
        } else {
            $canonical = onoff_builder_abs_url($canonical);
        }

        $og_image = isset($meta['og_image']) ? trim((string) $meta['og_image']) : '';
        if ($og_image === '' && function_exists('g5site_cfg_url')) {
            $og_image = g5site_cfg_url('og_image', '');
        }
        $og_image = onoff_builder_abs_url($og_image);

        $logo = function_exists('g5site_cfg_url') ? g5site_cfg_url('logo_path', '') : '';
        $logo = onoff_builder_abs_url($logo);
        $phone = function_exists('g5site_cfg') ? g5site_cfg('phone', '') : '';
        $email = function_exists('g5site_cfg') ? g5site_cfg('email', '') : '';
        $address = function_exists('g5site_cfg') ? g5site_cfg('address', '') : '';
        $org_type = function_exists('g5site_cfg')
            ? preg_replace('/[^a-zA-Z]/', '', (string) g5site_cfg('schema_organization_type', 'MedicalOrganization'))
            : 'MedicalOrganization';
        if ($org_type === '') {
            $org_type = 'MedicalOrganization';
        }

        $lines = array();
        $lines[] = '<!-- onoff-builder seo-meta -->';

        if ($description !== '') {
            $lines[] = '<meta name="description" content="' . onoff_builder_escape_attr($description) . '">';
        }
        if ($keywords !== '') {
            $lines[] = '<meta name="keywords" content="' . onoff_builder_escape_attr($keywords) . '">';
        }
        $lines[] = '<meta name="robots" content="' . onoff_builder_escape_attr($robots) . '">';
        if ($canonical !== '') {
            $lines[] = '<link rel="canonical" href="' . onoff_builder_escape_attr($canonical) . '">';
        }

        $lines[] = '<meta property="og:type" content="website">';
        $lines[] = '<meta property="og:site_name" content="' . onoff_builder_escape_attr($site_name) . '">';
        $lines[] = '<meta property="og:title" content="' . onoff_builder_escape_attr($title) . '">';
        if ($description !== '') {
            $lines[] = '<meta property="og:description" content="' . onoff_builder_escape_attr($description) . '">';
        }
        if ($canonical !== '') {
            $lines[] = '<meta property="og:url" content="' . onoff_builder_escape_attr($canonical) . '">';
        }
        if ($og_image !== '') {
            $lines[] = '<meta property="og:image" content="' . onoff_builder_escape_attr($og_image) . '">';
        }

        $lines[] = '<meta name="twitter:card" content="summary_large_image">';
        $lines[] = '<meta name="twitter:title" content="' . onoff_builder_escape_attr($title) . '">';
        if ($description !== '') {
            $lines[] = '<meta name="twitter:description" content="' . onoff_builder_escape_attr($description) . '">';
        }
        if ($og_image !== '') {
            $lines[] = '<meta name="twitter:image" content="' . onoff_builder_escape_attr($og_image) . '">';
        }

        if ($base !== '') {
            $org = array(
                '@type' => $org_type,
                '@id'   => $base . '#organization',
                'name'  => $company,
                'url'   => $base,
            );
            if ($logo !== '') {
                $org['logo'] = $logo;
            }
            if ($email !== '') {
                $org['email'] = $email;
            }
            if ($phone !== '') {
                $org['telephone'] = $phone;
            }
            if ($address !== '' && $address !== '주소를 입력하세요') {
                $org['address'] = array(
                    '@type'         => 'PostalAddress',
                    'streetAddress' => $address,
                );
            }

            $website = array(
                '@type'       => 'WebSite',
                '@id'         => $base . '#website',
                'url'         => $base,
                'name'        => $site_name,
                'description' => $description,
                'publisher'   => array('@id' => $base . '#organization'),
                'inLanguage'  => 'ko',
            );

            $graph = array(
                '@context' => 'https://schema.org',
                '@graph'   => array($org, $website),
            );
            $json = json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            if ($json !== false) {
                $lines[] = '<script type="application/ld+json">' . str_replace('</', '<\/', $json) . '</script>';
            }
        }

        $faq = isset($meta['faq']) && is_array($meta['faq']) ? $meta['faq'] : array();
        if (!empty($faq) && function_exists('g5b_seo_meta_build_faq_jsonld')) {
            $faq_block = g5b_seo_meta_build_faq_jsonld($faq);
            if ($faq_block !== '') {
                $lines[] = $faq_block;
            }
        }

        return array(
            'title' => $title,
            'markup' => implode("\n", $lines),
        );
    }
}

if (!function_exists('onoff_builder_inject_seo_meta_into_html')) {
    function onoff_builder_inject_seo_meta_into_html($html)
    {
        $html = onoff_builder_force_html_lang_ko($html);

        if (!onoff_builder_should_inject_home_seo()) {
            // 홈이 아니어도 lang 교정은 유지. 경로 robots만 필요하면 최소 태그 주입.
            $path_robots = onoff_builder_path_robots_directive();
            if ($path_robots !== '' && stripos((string) $html, '</head>') !== false) {
                $tag = '<meta name="robots" content="' . onoff_builder_escape_attr($path_robots) . '">' . "\n";
                if (stripos((string) $html, 'name="robots"') === false) {
                    $html = preg_replace('#</head>#i', $tag . '</head>', $html, 1);
                }
            }

            return $html;
        }

        if (stripos((string) $html, 'onoff-builder seo-meta') !== false) {
            return $html;
        }

        $built = onoff_builder_build_home_seo_head_markup();
        $markup = isset($built['markup']) ? (string) $built['markup'] : '';
        $title = isset($built['title']) ? trim((string) $built['title']) : '';

        if ($title !== '' && preg_match('#<title[^>]*>.*?</title>#is', (string) $html)) {
            $html = preg_replace(
                '#<title[^>]*>.*?</title>#is',
                '<title>' . onoff_builder_escape_attr($title) . '</title>',
                $html,
                1
            );
        }

        if ($markup === '' || stripos((string) $html, '</head>') === false) {
            return $html;
        }

        // 기존 description이 빌더 기본값만 있으면 교체하지 않고 추가(중복 name=description 방지)
        if (stripos((string) $html, 'name="description"') !== false) {
            $markup = preg_replace('#<meta name="description"[^>]*>\s*#i', '', $markup);
        }
        if (stripos((string) $html, 'rel="canonical"') !== false) {
            $markup = preg_replace('#<link rel="canonical"[^>]*>\s*#i', '', $markup);
        }

        return preg_replace('#</head>#i', $markup . "\n</head>", $html, 1);
    }
}
