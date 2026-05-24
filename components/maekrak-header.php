<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/headnerve_nav.lib.php');

$maekrak_nav = headnerve_nav_menu_items();
$maekrak_booking_url = headnerve_nav_booking_url();
$maekrak_tel_href = headnerve_nav_tel_href();
$maekrak_site_title = isset($g5_site_title) ? $g5_site_title : (function_exists('g5site_cfg') ? g5site_cfg('site_name', $config['cf_title']) : $config['cf_title']);
$maekrak_logo_inline = G5_PATH.'/components/maekrak-logo-inline.php';
$maekrak_logo_url = '';
if (isset($g5_logo_url) && $g5_logo_url !== '' && !preg_match('/\.svg$/i', $g5_logo_url)) {
    $maekrak_logo_url = $g5_logo_url;
} elseif (isset($g5_logo_url) && $g5_logo_url !== '' && preg_match('/\.svg$/i', $g5_logo_url) && is_file(G5_PATH.parse_url($g5_logo_url, PHP_URL_PATH))) {
    $maekrak_logo_url = $g5_logo_url;
}
?>

<!-- 상단 시작 { -->
<div id="hd">
    <header id="siteHeader" class="maekrak-header site-header is-scrolled">
        <h1 id="hd_h1" class="sound_only"><?php echo $g5['title']; ?></h1>
        <div id="skip_to_container" class="site-header__skip">
            <a href="#container">본문 바로가기</a>
        </div>

        <div class="maekrak-header__inner">
            <a href="<?php echo G5_URL; ?>" class="maekrak-header__logo-link" aria-label="<?php echo get_text($maekrak_site_title); ?> 홈">
                <?php if ($maekrak_logo_url) { ?>
                <img src="<?php echo $maekrak_logo_url; ?>" alt="<?php echo get_text($maekrak_site_title); ?>" class="maekrak-header__logo-img" decoding="async">
                <?php } elseif (is_file($maekrak_logo_inline)) { ?>
                <?php include $maekrak_logo_inline; ?>
                <?php } else { ?>
                <span class="maekrak-header__logo-text"><?php echo get_text($maekrak_site_title); ?></span>
                <?php } ?>
            </a>

            <div class="maekrak-header__cluster">
                <nav class="maekrak-header__gnb" aria-label="메인메뉴">
                    <ul class="maekrak-header__gnb-list">
                        <?php foreach ($maekrak_nav as $row) {
                            $has_sub = !empty($row['sub']);
                        ?>
                        <li class="maekrak-header__gnb-item<?php echo $has_sub ? ' has-sub' : ''; ?>">
                            <a href="<?php echo $row['href']; ?>" class="maekrak-header__gnb-link"><?php echo get_text($row['name']); ?></a>
                            <?php if ($has_sub) { ?>
                            <ul class="maekrak-header__gnb-sub">
                                <?php foreach ($row['sub'] as $row2) { ?>
                                <li><a href="<?php echo $row2['href']; ?>" class="maekrak-header__gnb-sub-link"><?php echo get_text($row2['name']); ?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>

                <div class="maekrak-header__actions">
                    <?php if (!$is_member) { ?>
                    <a href="<?php echo G5_BBS_URL; ?>/login.php" class="maekrak-header__btn maekrak-header__btn--ghost">로그인</a>
                    <?php } ?>
                    <a href="<?php echo $maekrak_booking_url; ?>" class="maekrak-header__btn maekrak-header__btn--primary" target="_blank" rel="noopener noreferrer">상담 예약하기</a>
                    <button type="button" class="site-header__menu-btn maekrak-header__menu-btn" aria-controls="siteMobileNav" aria-expanded="false" title="전체메뉴">
                        <span class="maekrak-header__menu-icon" aria-hidden="true"></span>
                        <span class="sound_only">전체메뉴열기</span>
                    </button>
                </div>
            </div>
        </div>

        <div id="siteMobileNav" class="maekrak-header__mobile site-header__mobile-nav" aria-hidden="true">
            <div class="maekrak-header__mobile-head">
                <?php if ($maekrak_logo_url) { ?>
                <img src="<?php echo $maekrak_logo_url; ?>" alt="<?php echo get_text($maekrak_site_title); ?>" class="maekrak-header__mobile-logo" decoding="async">
                <?php } elseif (is_file($maekrak_logo_inline)) { ?>
                <?php include $maekrak_logo_inline; ?>
                <?php } else { ?>
                <strong class="maekrak-header__mobile-title"><?php echo get_text($maekrak_site_title); ?></strong>
                <?php } ?>
                <button type="button" class="site-header__mobile-close maekrak-header__mobile-close" title="메뉴 닫기">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <span class="sound_only">메뉴 닫기</span>
                </button>
            </div>
            <div class="maekrak-header__mobile-body">
                <?php foreach ($maekrak_nav as $row) { ?>
                <div class="maekrak-header__mobile-group">
                    <a href="<?php echo $row['href']; ?>" class="maekrak-header__mobile-link"><?php echo get_text($row['name']); ?></a>
                    <?php if (!empty($row['sub'])) { ?>
                    <ul class="maekrak-header__mobile-sub">
                        <?php foreach ($row['sub'] as $row2) { ?>
                        <li><a href="<?php echo $row2['href']; ?>"><?php echo get_text($row2['name']); ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="maekrak-header__mobile-foot">
                <?php if ($is_member) { ?>
                <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=<?php echo G5_BBS_URL; ?>/register_form.php" class="maekrak-header__btn maekrak-header__btn--ghost maekrak-header__btn--block">정보수정</a>
                <a href="<?php echo G5_BBS_URL; ?>/logout.php" class="maekrak-header__btn maekrak-header__btn--ghost maekrak-header__btn--block">로그아웃</a>
                <?php if ($is_admin) { ?>
                <a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="maekrak-header__btn maekrak-header__btn--ghost maekrak-header__btn--block">관리자</a>
                <?php } ?>
                <?php } else { ?>
                <a href="<?php echo G5_BBS_URL; ?>/login.php" class="maekrak-header__btn maekrak-header__btn--ghost maekrak-header__btn--block">로그인</a>
                <?php } ?>
                <div class="maekrak-header__mobile-cta-row">
                    <a href="<?php echo $maekrak_tel_href; ?>" class="maekrak-header__btn maekrak-header__btn--ghost maekrak-header__btn--block">전화상담</a>
                    <a href="<?php echo $maekrak_booking_url; ?>" class="maekrak-header__btn maekrak-header__btn--primary maekrak-header__btn--block" target="_blank" rel="noopener noreferrer">예약하기</a>
                </div>
            </div>
        </div>
        <div class="site-header__overlay maekrak-header__overlay" aria-hidden="true"></div>
    </header>
</div>
<!-- } 상단 끝 -->
