<?php
if (!defined('_GNUBOARD_')) exit;

if (G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH . '/shop.tail.php');
    return;
}

include_once(G5_THEME_PATH . '/inc/site_config.php');
?>

    </div>
</div>

<footer id="maekrak_ft" class="maekrak-footer maekrak-footer--mobile">
    <div class="maekrak-footer-inner">
        <strong><?php echo MK_CLINIC_NAME; ?></strong>
        <p><?php echo MK_CLINIC_ADDRESS; ?><br>
        <a href="<?php echo maekrak_tel_href(); ?>"><?php echo MK_CLINIC_TEL; ?></a></p>
        <div class="maekrak-footer-links">
            <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보</a>
            <a href="<?php echo get_device_change_url(); ?>">PC버전</a>
        </div>
        <p class="maekrak-footer-copy">&copy; <?php echo date('Y'); ?> <?php echo MK_CLINIC_NAME; ?></p>
    </div>
</footer>

<?php include_once(G5_THEME_PATH . '/inc/mobile_cta.php'); ?>

<script>
jQuery(function($) {
    $('html, body').on('click', '#top_btn', function() {
        $('html, body').animate({ scrollTop: 0 }, 500);
        return false;
    });
    if (typeof font_resize === 'function') {
        font_resize('container', get_cookie('ck_font_resize_rmv_class'), get_cookie('ck_font_resize_add_class'));
    }
});
</script>

<?php
if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
include_once(G5_THEME_PATH . '/tail.sub.php');
