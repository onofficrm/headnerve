<?php
/**
 * iCRM 회원 포털 — 사이트 하단 링크
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (is_file(G5_PATH . '/_site.config.php')) {
    include_once G5_PATH . '/_site.config.php';
}

if (!is_file(G5_LIB_PATH . '/icrm-member.lib.php')) {
    return;
}

include_once G5_LIB_PATH . '/icrm-member.lib.php';

if (!icrm_member_enabled()) {
    return;
}

if (!function_exists('icrm_member_site_nav')) {
    function icrm_member_site_nav()
    {
        global $is_admin;

        if (defined('G5_IS_ADMIN') && G5_IS_ADMIN) {
            return;
        }
        if (!icrm_member_can_access()) {
            return;
        }

        $url = icrm_member_url('home');
        echo '<div class="icrm-member-site-nav" style="margin:0.75rem 0;padding:0.7rem 1rem;background:#f0fdfa;border:1px solid #99f6e4;border-radius:10px;font-size:13px;line-height:1.5">';
        echo '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" style="color:#0f766e;font-weight:800;text-decoration:none">iCRM 내 홈페이지</a>';
        echo ' <span style="color:#64748b">— ';
        $links = array();
        if (icrm_member_can_module('setup')) {
            $links[] = '<a href="' . htmlspecialchars(icrm_member_url('setup'), ENT_QUOTES, 'UTF-8') . '" style="color:#0d9488">홈페이지 구성</a>';
        }
        if (icrm_member_can_module('publish')) {
            $links[] = '<a href="' . htmlspecialchars(icrm_member_url('publish'), ENT_QUOTES, 'UTF-8') . '" style="color:#0d9488">콘텐츠 발행</a>';
        }
        echo implode(' · ', $links);
        echo '</span></div>';
    }
}

if (function_exists('add_event')) {
    add_event('tail_sub', 'icrm_member_site_nav', 35, 0);
}
