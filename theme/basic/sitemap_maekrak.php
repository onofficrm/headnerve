<?php
/**
 * 맥락한의원 URL 사이트맵 (XML)
 * /theme/basic/sitemap_maekrak.php
 */
$g5_path = realpath(__DIR__ . '/../..');
chdir($g5_path);
include_once $g5_path . '/common.php';
include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';

if (!defined('_GNUBOARD_')) {
    header('HTTP/1.0 500 Internal Server Error');
    exit;
}

$base = rtrim(G5_URL, '/');
$urls = array(
    array('loc' => $base . '/', 'priority' => '1.0'),
    array('loc' => get_pretty_url(defined('MK_BLOG_BOARD') ? MK_BLOG_BOARD : 'blog'), 'priority' => '0.8'),
);

foreach (maekrak_conditions_co_ids() as $co_id) {
    $urls[] = array('loc' => maekrak_condition_url($co_id), 'priority' => '0.9');
}

foreach (maekrak_diseases_co_ids() as $co_id) {
    $urls[] = array('loc' => maekrak_disease_url($co_id), 'priority' => '0.85');
}

foreach (array('company', 'privacy', 'provision') as $co_id) {
    $urls[] = array('loc' => get_pretty_url('content', $co_id), 'priority' => '0.5');
}

$lastmod = date('Y-m-d');

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo '  <url>' . "\n";
    echo '    <loc>' . htmlspecialchars($u['loc'], ENT_XML1) . '</loc>' . "\n";
    echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
    echo '    <changefreq>weekly</changefreq>' . "\n";
    echo '    <priority>' . $u['priority'] . '</priority>' . "\n";
    echo '  </url>' . "\n";
}
echo '</urlset>';
