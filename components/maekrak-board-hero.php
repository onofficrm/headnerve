<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

global $board, $bo_table;

$hero_title = isset($board['bo_subject']) ? get_text($board['bo_subject']) : '커뮤니티';
$hero_desc = function_exists('g5site_cfg') ? g5site_cfg('site_desc', '') : '';
$hero_image = function_exists('headnerve_board_hero_image')
    ? headnerve_board_hero_image($bo_table)
    : G5_URL.'/img/main/board-hero.png';

$hero_labels = array(
    'notice' => '맥락한의원의 소식과 안내를 전합니다.',
    'news'   => '언론과 대외 활동 소식을 모았습니다.',
    'column' => '원장이 전하는 건강 이야기입니다.',
);
$hero_sub = isset($hero_labels[$bo_table]) ? $hero_labels[$bo_table] : $hero_desc;
?>

<section class="maekrak-board-hero" aria-label="<?php echo $hero_title; ?> 소개">
    <div class="maekrak-board-hero__media" style="background-image:url('<?php echo $hero_image; ?>')"></div>
    <div class="maekrak-board-hero__overlay"></div>
    <div class="maekrak-board-hero__inner">
        <p class="maekrak-board-hero__eyebrow">Community</p>
        <h2 class="maekrak-board-hero__title"><?php echo $hero_title; ?></h2>
        <?php if ($hero_sub !== '') { ?>
        <p class="maekrak-board-hero__desc"><?php echo get_text($hero_sub); ?></p>
        <?php } ?>
    </div>
</section>
