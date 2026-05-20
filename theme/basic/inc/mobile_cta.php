<?php
if (!defined('_GNUBOARD_')) exit;
if (!G5_IS_MOBILE || !defined('_INDEX_')) return;

include_once(G5_THEME_PATH . '/inc/site_config.php');
?>
<aside class="maekrak-mobile-cta" aria-label="빠른 상담">
    <a href="<?php echo MK_RESERVE_URL; ?>" class="maekrak-mobile-cta-btn maekrak-mobile-cta-reserve">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        <span>예약하기</span>
    </a>
    <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-mobile-cta-btn maekrak-mobile-cta-call">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <span>전화상담</span>
    </a>
    <a href="<?php echo MK_KAKAO_URL; ?>" class="maekrak-mobile-cta-btn maekrak-mobile-cta-kakao" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-comment" aria-hidden="true"></i>
        <span>카카오톡</span>
    </a>
</aside>
