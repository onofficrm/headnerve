<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 카카오맵 임베드 (홈 #maekrak_info)
 * 키: 환경설정 cf_kakao_js_apikey 또는 MK_KAKAO_MAP_APP_KEY
 */
if (!function_exists('maekrak_kakao_map_app_key')) {
    function maekrak_kakao_map_app_key()
    {
        global $config;

        if (!empty($config['cf_kakao_js_apikey'])) {
            return $config['cf_kakao_js_apikey'];
        }

        if (defined('MK_KAKAO_MAP_APP_KEY') && MK_KAKAO_MAP_APP_KEY !== '') {
            return MK_KAKAO_MAP_APP_KEY;
        }

        return '';
    }
}

if (!function_exists('maekrak_map_external_url')) {
    function maekrak_map_external_url()
    {
        $q = MK_CLINIC_NAME . ' ' . MK_CLINIC_ADDRESS;
        return 'https://map.kakao.com/link/search/' . rawurlencode($q);
    }
}

if (!function_exists('maekrak_render_kakao_map')) {
    function maekrak_render_kakao_map()
{
    $app_key = maekrak_kakao_map_app_key();
    $map_url = maekrak_map_external_url();
    $address = get_text(MK_CLINIC_ADDRESS);
    $clinic = get_text(MK_CLINIC_NAME);

    if ($app_key === '') {
        ?>
    <div class="maekrak-map-placeholder" role="img" aria-label="지도 영역">
        <div class="maekrak-map-placeholder-inner">
            <span class="maekrak-map-placeholder-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            <strong><?php echo $clinic; ?> 위치</strong>
            <p><?php echo $address; ?></p>
            <p class="maekrak-map-placeholder-hint">카카오맵 API 키를 등록하면 이 영역에 지도가 표시됩니다.<br>관리자 <strong>환경설정 → 카카오 JavaScript 키</strong> 또는 <code>MK_KAKAO_MAP_APP_KEY</code></p>
            <a href="<?php echo $map_url; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-sm" target="_blank" rel="noopener noreferrer">카카오맵에서 보기</a>
        </div>
    </div>
        <?php
        return;
    }

    $js_url = G5_THEME_URL . '/js/maekrak-map.js?ver=' . G5_CSS_VER;
    ?>
    <div class="maekrak-kakao-map-wrap">
        <div id="maekrak_kakao_map"
            class="maekrak-kakao-map"
            role="application"
            aria-label="<?php echo $clinic; ?> 카카오맵"
            data-address="<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>"
            data-title="<?php echo htmlspecialchars($clinic, ENT_QUOTES, 'UTF-8'); ?>"
            data-map-url="<?php echo htmlspecialchars($map_url, ENT_QUOTES, 'UTF-8'); ?>"></div>
        <a href="<?php echo $map_url; ?>" class="maekrak-kakao-map-link" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-external-link" aria-hidden="true"></i> 카카오맵에서 크게 보기
        </a>
    </div>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo urlencode($app_key); ?>&libraries=services&autoload=false"></script>
    <script src="<?php echo $js_url; ?>"></script>
    <?php
    }
}
