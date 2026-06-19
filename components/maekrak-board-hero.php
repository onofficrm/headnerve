<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

global $board, $bo_table, $title_msg, $wr_id;

$board_name = isset($board['bo_subject']) ? get_text($board['bo_subject']) : '커뮤니티';

$hero_labels = array(
    'notice' => '맥락한의원의 소식과 안내를 전합니다.',
    'news'   => '언론과 대외 활동 소식을 모았습니다.',
    'column' => '원장이 전하는 건강 이야기입니다.',
    'reviews'=> '환자분들이 직접 작성해주신 소중한 치료후기입니다.',
);
$hero_board_sub = isset($hero_labels[$bo_table]) ? $hero_labels[$bo_table] : '';

$is_write_hero = (basename($_SERVER['SCRIPT_NAME']) === 'write.php' && !empty($title_msg));
$is_review_view = ($bo_table === 'reviews' && !empty($wr_id) && !$is_write_hero);

if ($is_review_view) {
    return;
}

if ($bo_table === 'reviews' && !$is_write_hero) {
    $hero_title = '치료 사례';
    $hero_sub = '실제 환자분들의 생생한 치료 경험을 확인하세요';
    ?>
<section class="reviews-page-head" aria-label="치료후기">
    <p class="reviews-page-head__eyebrow">Clinic OS</p>
    <h2 class="reviews-page-head__title"><?php echo $hero_title; ?></h2>
    <?php if ($hero_sub !== '') { ?>
    <p class="reviews-page-head__desc"><?php echo get_text($hero_sub); ?></p>
    <?php } ?>
</section>
    <?php
    return;
}

if ($is_write_hero) {
    $hero_title = get_text($title_msg);
    $hero_sub = $board_name;
    if ($hero_board_sub !== '') {
        $hero_sub .= ' · '.$hero_board_sub;
    }
    $hero_eyebrow = '글쓰기';
} else {
    $hero_title = $board_name;
    $hero_sub = $hero_board_sub;
    $hero_eyebrow = '커뮤니티';
}
?>

<section class="maekrak-board-hero" aria-label="<?php echo $hero_title; ?> 소개">
    <div class="maekrak-board-hero__gradient" aria-hidden="true"></div>
    <div class="maekrak-board-hero__inner">
        <p class="maekrak-board-hero__eyebrow"><?php echo $hero_eyebrow; ?></p>
        <h1 class="maekrak-board-hero__title"><?php echo $hero_title; ?></h1>
        <?php if ($hero_sub !== '') { ?>
        <p class="maekrak-board-hero__desc"><?php echo get_text($hero_sub); ?></p>
        <?php } ?>
    </div>
</section>
