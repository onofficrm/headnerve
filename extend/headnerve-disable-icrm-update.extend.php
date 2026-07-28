<?php
/**
 * 맥락한의원(headnerve) — iCRM 중앙 g5-update 차단
 *
 * 이 사이트는 SEO·홈·스킨 커스텀이 많으므로 중앙 패키지 업데이트가
 * 파일을 덮어쓰지 않도록 잠급니다. (_site.config 값이 바뀌어도 유지)
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!defined('HEADNERVE_ICRM_UPDATE_DISABLED')) {
    define('HEADNERVE_ICRM_UPDATE_DISABLED', true);
}

if (!function_exists('icrm_update_is_enabled')) {
    function icrm_update_is_enabled()
    {
        return false;
    }
}

if (!function_exists('icrm_update_maybe_auto_sync')) {
    function icrm_update_maybe_auto_sync()
    {
        return;
    }
}

if (!function_exists('icrm_update_pull')) {
    /**
     * @param bool        $dryRun
     * @param string|null $bundle
     * @return array
     */
    function icrm_update_pull($dryRun = false, $bundle = null)
    {
        return array(
            'success'          => false,
            'message'          => '이 사이트(headnerve)는 iCRM 중앙 업데이트가 비활성화되어 있습니다.',
            'update_available' => false,
            'blocked'          => true,
        );
    }
}
