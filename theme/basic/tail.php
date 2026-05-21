<?php
if (!defined('_GNUBOARD_')) exit;

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/tail.php');
    return;
}

if (G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH . '/shop.tail.php');
    return;
}

include_once(G5_THEME_PATH . '/inc/site_config.php');
?>

        </div><!-- #container -->
    </div><!-- #container_wr -->
</div><!-- #wrapper -->

<footer id="footer" class="maekrak-footer">
    <div class="maekrak-footer-inner">
        <div class="maekrak-footer-top">
            <div class="maekrak-footer-brand">
                <strong><?php echo MK_CLINIC_NAME; ?></strong>
                <div class="maekrak-footer-contact">
                    <p>주소: <?php echo MK_CLINIC_ADDRESS; ?></p>
                    <p>전화: <a href="<?php echo maekrak_tel_href(); ?>"><?php echo MK_CLINIC_TEL; ?></a></p>
                    <div class="maekrak-footer-hours">
                        <p>평일 <?php echo MK_CLINIC_HOURS_WEEKDAY; ?> (점심 <?php echo str_replace(' ', '', MK_CLINIC_LUNCH); ?>)</p>
                        <p>토요일 <?php echo MK_CLINIC_HOURS_SAT; ?> (점심시간 없음)</p>
                        <p class="maekrak-footer-closed">휴진: <?php echo MK_CLINIC_HOURS_SUN; ?></p>
                    </div>
                </div>
            </div>
            <div class="maekrak-footer-menus">
                <div class="maekrak-footer-menu">
                    <h3>바로가기</h3>
                    <ul>
                        <li><a href="<?php echo get_pretty_url('content', 'company'); ?>">맥락한의원 소개</a></li>
                        <li><a href="<?php echo G5_URL; ?>/#maekrak_program">치료 프로그램</a></li>
                        <li><a href="<?php echo get_pretty_url(MK_BLOG_BOARD); ?>">사례 및 블로그</a></li>
                        <li><a href="<?php echo MK_RESERVE_URL; ?>"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약</a></li>
                    </ul>
                </div>
                <div class="maekrak-footer-menu">
                    <h3>약관 및 정책</h3>
                    <ul>
                        <li><a href="<?php echo get_pretty_url('content', 'privacy'); ?>" class="maekrak-footer-em">개인정보처리방침</a></li>
                        <li><a href="<?php echo get_pretty_url('content', 'provision'); ?>">이용약관</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="maekrak-footer-bottom">
            <p class="maekrak-footer-copy">&copy; <?php echo date('Y'); ?> <?php echo MK_CLINIC_NAME; ?>. All rights reserved.</p>
            <button type="button" id="top_btn" class="maekrak-footer-top" title="상단으로">↑</button>
        </div>
    </div>
</footer>

<?php include_once(G5_THEME_PATH . '/inc/mobile_cta.php'); ?>

<script>
$(function() {
    $('#top_btn, .maekrak-footer-top').on('click', function() {
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
