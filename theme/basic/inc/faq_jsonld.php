<?php
if (!defined('_GNUBOARD_')) exit;

function maekrak_render_faq_jsonld($faq_list)
{
    if (empty($faq_list) || !is_array($faq_list)) {
        return;
    }

    $entities = array();
    foreach ($faq_list as $faq) {
        if (empty($faq['q']) || empty($faq['a'])) {
            continue;
        }
        $entities[] = array(
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $faq['a'],
            ),
        );
    }

    if (!$entities) {
        return;
    }

    $json = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $entities,
    );
    echo '<script type="application/ld+json">' . json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}
