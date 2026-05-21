<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 히어로 이미지·accent·variant (10차)
 */
function maekrak_hero_img_dir()
{
    return G5_THEME_PATH . '/img/hero';
}

function maekrak_hero_img_url($basename)
{
    $basename = preg_replace('/[^a-z0-9_\-]/i', '', $basename);
    if ($basename === '') {
        return '';
    }
    $dir = maekrak_hero_img_dir();
    foreach (array('webp', 'jpg', 'jpeg', 'png', 'svg') as $ext) {
        $path = $dir . '/' . $basename . '.' . $ext;
        if (is_file($path)) {
            return G5_THEME_URL . '/img/hero/' . $basename . '.' . $ext;
        }
    }
    return '';
}

function maekrak_condition_accent($co_id)
{
    $map = array(
        'headache' => '#0d6e6e',
        'dizziness' => '#1a5f9e',
        'autonomic' => '#5c4d9e',
        'peripheral' => '#8b4513',
        'brainfog' => '#2d6a4f',
    );
    return isset($map[$co_id]) ? $map[$co_id] : '#002B5B';
}

function maekrak_disease_accent($parent_co_id)
{
    return maekrak_condition_accent($parent_co_id);
}

function maekrak_hero_image_for_page($page)
{
    if (!empty($page['hero_image'])) {
        $url = maekrak_hero_img_url($page['hero_image']);
        if ($url !== '') {
            return $url;
        }
        if (preg_match('#^https?://#i', $page['hero_image'])) {
            return $page['hero_image'];
        }
    }
    if (!empty($page['parent_co_id'])) {
        $url = maekrak_hero_img_url($page['parent_co_id']);
        if ($url !== '') {
            return $url;
        }
    }
    if (!empty($page['co_id'])) {
        static $cond_ids = array('headache', 'dizziness', 'autonomic', 'peripheral', 'brainfog');
        if (in_array($page['co_id'], $cond_ids, true)) {
            $url = maekrak_hero_img_url($page['co_id']);
            if ($url !== '') {
                return $url;
            }
        }
    }
    return '';
}

function maekrak_hero_variant_class($page)
{
    if (empty($page['hero_variant'])) {
        if (!empty($page['parent_co_id']) && !empty($page['co_id'])) {
            return 'maekrak-dis-variant--' . $page['parent_co_id'] . '-' . preg_replace('/[^a-z0-9_\-]/i', '', $page['co_id']);
        }
        return '';
    }
    return 'maekrak-dis-variant--' . preg_replace('/[^a-z0-9_\-]/i', '', $page['hero_variant']);
}

/**
 * @param array $opts context, image_url, alt, keywords, decorative, fetchpriority
 */
function maekrak_render_hero_visual($opts)
{
    $context = isset($opts['context']) ? $opts['context'] : 'page';
    $image_url = isset($opts['image_url']) ? $opts['image_url'] : '';
    $alt = isset($opts['alt']) ? $opts['alt'] : '맥락한의원';
    $keywords = isset($opts['keywords']) && is_array($opts['keywords']) ? $opts['keywords'] : array();
    $decorative = !empty($opts['decorative']);
    $fetchpriority = !empty($opts['fetchpriority']) ? 'high' : '';
    $variant_class = isset($opts['variant_class']) ? $opts['variant_class'] : '';

    $wrap_class = 'maekrak-hero-visual-wrap maekrak-hero-visual-wrap--' . $context;
    if ($variant_class !== '') {
        $wrap_class .= ' ' . htmlspecialchars($variant_class, ENT_QUOTES, 'UTF-8');
    }
    if ($image_url !== '') {
        $wrap_class .= ' maekrak-hero-visual-wrap--has-img';
    }

    $aria = $decorative ? ' aria-hidden="true"' : '';
    $img_attr = $decorative ? ' alt="" role="presentation"' : ' alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"';
    if ($fetchpriority === 'high') {
        $img_attr .= ' fetchpriority="high"';
    } else {
        $img_attr .= ' loading="lazy"';
    }

    echo '<div class="' . $wrap_class . '"' . $aria . '>';
    if ($image_url !== '') {
        echo '<div class="maekrak-hero-visual-photo">';
        echo '<img class="maekrak-hero-visual-img" src="' . htmlspecialchars($image_url, ENT_QUOTES, 'UTF-8') . '" width="800" height="500"' . $img_attr . '>';
        echo '<span class="maekrak-hero-visual-overlay"></span>';
        echo '</div>';
    }
    echo '<div class="maekrak-hero-visual-fallback">';
    if ($context === 'home') {
        echo '<div class="maekrak-hero-visual-panel">';
        echo '<span class="maekrak-hero-visual-mesh"></span>';
        echo '<span class="maekrak-hero-visual-orb maekrak-hero-visual-orb--a"></span>';
        echo '<span class="maekrak-hero-visual-orb maekrak-hero-visual-orb--b"></span>';
        echo '<span class="maekrak-hero-visual-arc"></span>';
        echo '<div class="maekrak-hero-visual-glow"></div>';
        echo '<div class="maekrak-hero-visual-ring maekrak-hero-visual-ring--1"></div>';
        echo '<div class="maekrak-hero-visual-ring maekrak-hero-visual-ring--2"></div>';
        echo '<div class="maekrak-hero-visual-line"></div>';
        if ($keywords) {
            echo '<ul class="maekrak-hero-keywords">';
            foreach ($keywords as $kw) {
                echo '<li>' . $kw . '</li>';
            }
            echo '</ul>';
        }
        echo '<p class="maekrak-hero-visual-caption">Functional Neuro · Structural Care</p>';
        echo '</div>';
    } elseif ($context === 'condition' || $context === 'disease') {
        $card_class = $context === 'condition' ? 'maekrak-cond-hero-visual-card' : 'maekrak-dis-hero-visual-card';
        echo '<div class="' . $card_class . '">';
        foreach ($keywords as $kw) {
            echo '<span>' . $kw . '</span>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}

/**
 * SNS·검색용 OG 이미지 (theme/basic/img/og-maekrak.{jpg|png|webp|svg})
 */
function maekrak_og_image_url()
{
    if (defined('MK_OG_IMAGE_URL') && MK_OG_IMAGE_URL && preg_match('#^https?://#i', MK_OG_IMAGE_URL)) {
        return MK_OG_IMAGE_URL;
    }
    $dir = G5_THEME_PATH . '/img';
    foreach (array('jpg', 'jpeg', 'png', 'webp', 'svg') as $ext) {
        $path = $dir . '/og-maekrak.' . $ext;
        if (is_file($path)) {
            return G5_THEME_URL . '/img/og-maekrak.' . $ext;
        }
    }
    return defined('MK_OG_IMAGE_URL') ? MK_OG_IMAGE_URL : '';
}

/** Google Analytics 4 (MK_GA4_MEASUREMENT_ID 정의 시에만 출력) */
function maekrak_render_ga4()
{
    if (!defined('MK_GA4_MEASUREMENT_ID') || MK_GA4_MEASUREMENT_ID === '') {
        return;
    }
    $id = preg_replace('/[^A-Z0-9\-]/i', '', MK_GA4_MEASUREMENT_ID);
    if ($id === '') {
        return;
    }
    echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"></script>' . PHP_EOL;
    echo '<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("js",new Date());gtag("config","' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '");</script>' . PHP_EOL;
}

/** 블로그 카테고리 → 기본 썸네일 (히어로 SVG) */
function maekrak_blog_default_thumb_url($ca_name)
{
    $map = array(
        '두통' => 'headache',
        '어지럼증' => 'dizziness',
        '자율신경' => 'autonomic',
        '말초신경' => 'peripheral',
        '브레인포그' => 'brainfog',
        '편두통' => 'headache',
        '군발두통' => 'headache',
        '사례' => 'home',
        '건강정보' => 'home',
    );
    $key = isset($map[$ca_name]) ? $map[$ca_name] : 'home';
    return maekrak_hero_img_url($key);
}
