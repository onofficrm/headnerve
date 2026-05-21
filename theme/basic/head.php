<?php
if (!defined('_GNUBOARD_')) exit;

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/head.php');
    return;
}

if (G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH . '/shop.head.php');
    return;
}

include_once(G5_THEME_PATH . '/inc/site_config.php');
include_once(G5_THEME_PATH . '/inc/menu_render.php');

$maekrak_condition_page = null;
$maekrak_disease_page = null;
$maekrak_blog_board = false;
if (!defined('_INDEX_') && !empty($bo_table) && defined('MK_BLOG_BOARD') && $bo_table === MK_BLOG_BOARD) {
    $maekrak_blog_board = true;
}
if (!defined('_INDEX_') && !empty($co_id)) {
    if (maekrak_is_disease_co_id($co_id)) {
        $maekrak_disease_page = maekrak_get_disease_by_co_id($co_id);
    } elseif (maekrak_is_condition_co_id($co_id)) {
        $maekrak_condition_page = maekrak_get_condition_by_co_id($co_id);
    }
}

if (defined('_INDEX_')) {
    $g5['html_script'] = ' class="maekrak-home-page"';
    $g5['body_script'] = ' class="maekrak-site maekrak-site--home maekrak-home-page"';
    if (!empty($maekrak_home_meta['meta_title'])) {
        $g5['title'] = $maekrak_home_meta['meta_title'];
    }
} elseif ($maekrak_disease_page) {
    $g5['title'] = $maekrak_disease_page['meta_title'];
    $g5['body_script'] = ' class="maekrak-site maekrak-site--disease"';
} elseif ($maekrak_condition_page) {
    $g5['title'] = $maekrak_condition_page['meta_title'];
    $g5['body_script'] = ' class="maekrak-site maekrak-site--condition"';
} elseif ($maekrak_blog_board) {
    $g5['body_script'] = ' class="maekrak-site maekrak-site--blog"';
} else {
    $g5['body_script'] = ' class="maekrak-site"';
}

$maekrak_reserve_anchor = !empty($maekrak_disease_page) ? '#maekrak_dis_cta' : (!empty($maekrak_condition_page) ? '#maekrak_cond_cta' : '#maekrak_cta');

include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');

$menu_datas = get_menu_db(0, true);
$use_fallback_nav = true;
foreach ($menu_datas as $row) {
    if (!empty($row)) {
        $use_fallback_nav = false;
        break;
    }
}
if ($use_fallback_nav) {
    $menu_datas = maekrak_get_fallback_menu();
}
?>

<header id="maekrak_hd" class="maekrak-header maekrak-header--solid<?php echo defined('_INDEX_') ? ' maekrak-header--home' : ''; ?>">
    <h1 id="hd_h1" class="sound_only"><?php echo $g5['title']; ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if (defined('_INDEX_')) {
        include G5_BBS_PATH . '/newwin.inc.php';
    } ?>

    <div class="maekrak-header-bar">
        <div class="maekrak-header-inner">
            <div class="maekrak-logo">
                <a href="<?php echo G5_URL; ?>" id="header-logo">
                    <span class="maekrak-logo-mark">M</span>
                    <span class="maekrak-logo-text"><?php echo MK_CLINIC_NAME; ?></span>
                </a>
            </div>

            <nav id="maekrak_gnb" class="maekrak-gnb" aria-label="주요 메뉴">
                <ul class="maekrak-gnb-list">
                    <?php maekrak_render_gnb_menu($menu_datas); ?>
                </ul>
                <a href="<?php echo $maekrak_reserve_anchor; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-reserve">상담 예약</a>
            </nav>

            <button type="button" class="maekrak-header-toggle" id="maekrak_gnb_open" aria-expanded="false" aria-controls="maekrak_gnb_drawer">
                <i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">메뉴</span>
            </button>
        </div>
    </div>

    <div id="maekrak_gnb_drawer" class="maekrak-gnb-drawer" hidden>
        <button type="button" class="maekrak-gnb-drawer-close" id="maekrak_gnb_close"><i class="fa fa-times"></i></button>
        <ul>
            <?php maekrak_render_drawer_menu($menu_datas); ?>
        </ul>
        <div class="maekrak-drawer-actions">
            <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-gray"><i class="fa fa-phone"></i> 전화상담</a>
            <a href="<?php echo MK_KAKAO_URL; ?>" class="maekrak-btn maekrak-btn-gray" target="_blank" rel="noopener noreferrer"><i class="fa fa-comment"></i> 카카오톡</a>
            <a href="<?php echo $maekrak_reserve_anchor; ?>" class="maekrak-btn maekrak-btn-primary">예약하기</a>
        </div>
    </div>
    <div class="maekrak-gnb-overlay" id="maekrak_gnb_overlay" hidden></div>
</header>

<script>
$(function() {
    var $header = $('#maekrak_hd');
    function onScroll() {
        $header.toggleClass('maekrak-header--scrolled', $(window).scrollTop() > 24);
    }
    $(window).on('scroll', onScroll);
    onScroll();

    function closeDrawer() {
        $('#maekrak_gnb_drawer, #maekrak_gnb_overlay').prop('hidden', true);
        $('#maekrak_gnb_open').attr('aria-expanded', 'false');
    }
    $('#maekrak_gnb_open').on('click', function() {
        $('#maekrak_gnb_drawer, #maekrak_gnb_overlay').prop('hidden', false);
        $(this).attr('aria-expanded', 'true');
    });
    $('#maekrak_gnb_close, #maekrak_gnb_overlay').on('click', closeDrawer);
    $('#maekrak_gnb_drawer a').on('click', closeDrawer);
});
</script>

<div id="wrapper" class="maekrak-wrapper">
    <div id="container_wr" class="maekrak-container-wr">
        <div id="container" class="maekrak-container">
        <?php if (!defined('_INDEX_') && empty($maekrak_condition_page) && empty($maekrak_disease_page) && empty($maekrak_blog_board)) { ?>
            <h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2>
        <?php } ?>
