<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/headnerve_nav.lib.php');

$mf_site_name = function_exists('g5site_cfg') ? g5site_cfg('site_name', '맥락한의원') : '맥락한의원';
$mf_phone = function_exists('g5site_cfg') ? g5site_cfg('phone', '02-6959-7252') : '02-6959-7252';
$mf_tel_href = headnerve_nav_tel_href();
$mf_address = headnerve_footer_address();
$mf_year = date('Y');
$mf_logo_inline = G5_PATH.'/components/maekrak-logo-inline.php';
?>

<footer id="siteFooter" class="maekrak-footer site-footer">
    <div class="maekrak-footer__inner">
        <div class="maekrak-footer__grid">
            <div class="maekrak-footer__brand">
                <a href="<?php echo G5_URL; ?>" class="maekrak-footer__logo-link">
                    <?php if (is_file($mf_logo_inline)) {
                        include $mf_logo_inline;
                    } else {
                        echo '<span class="maekrak-footer__logo-text">'.get_text($mf_site_name).'</span>';
                    } ?>
                </a>
                <div class="maekrak-footer__info">
                    <p>주소: <?php echo get_text($mf_address); ?></p>
                    <p>전화: <a href="<?php echo $mf_tel_href; ?>"><?php echo get_text($mf_phone); ?></a></p>
                    <div class="maekrak-footer__hours">
                        <p>평일 10:00 - 20:00 (점심 14-15)</p>
                        <p>토요일 10:00 - 14:00 (점심시간 없음)</p>
                        <p class="maekrak-footer__hours-off">휴진: 일요일, 공휴일</p>
                    </div>
                </div>
            </div>

            <div class="maekrak-footer__links">
                <div class="maekrak-footer__col">
                    <h3 class="maekrak-footer__col-title">바로가기</h3>
                    <ul>
                        <li><a href="<?php echo headnerve_spa_href('/about'); ?>">맥락한의원 소개</a></li>
                        <li><a href="<?php echo headnerve_spa_href('/programs'); ?>">치료 프로그램</a></li>
                        <li><a href="<?php echo headnerve_board_href('reviews'); ?>">치료후기</a></li>
                        <li><a href="<?php echo headnerve_board_href('notice'); ?>">공지사항</a></li>
                        <li><a href="<?php echo headnerve_board_href('column'); ?>">블로그</a></li>
                        <li><a href="<?php echo G5_URL; ?>/#consult">상담 예약</a></li>
                    </ul>
                </div>
                <div class="maekrak-footer__col">
                    <h3 class="maekrak-footer__col-title">약관 및 정책</h3>
                    <ul>
                        <li><a href="<?php echo headnerve_spa_href('/privacy'); ?>" class="maekrak-footer__link--emph">개인정보처리방침</a></li>
                        <li><a href="<?php echo headnerve_spa_href('/terms'); ?>">이용약관</a></li>
                        <li><a href="<?php echo headnerve_spa_href('/non-covered'); ?>">비급여 진료비 안내</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="maekrak-footer__bottom">
            <p class="maekrak-footer__copy">&copy; <?php echo $mf_year; ?> <?php echo get_text($mf_site_name); ?>. All rights reserved.</p>
            <button type="button" class="maekrak-footer__top" id="maekrakFooterTop" title="상단으로" aria-label="상단으로">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</footer>
