<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_SKIN_PATH.'/board/_inc/g5b-seo-view.php');
include_once(G5_SKIN_PATH.'/board/reviews/reviews-helper.php');

$patient_name = reviews_patient_name($view);
$doctor_name = reviews_doctor_name($view);
$summary_html = reviews_summary($view);
$review_date = reviews_format_date($view['wr_datetime']);
$booking_url = reviews_booking_url();
$tel_href = reviews_tel_href();
$phone_label = reviews_phone_label();
$list_url = reviews_list_url($bo_table, $sca);

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<article class="board-wrap board-wrap--reviews board-view reviews-view" id="bo_v" style="width:<?php echo $width; ?>">

    <nav class="reviews-breadcrumb" aria-label="breadcrumb">
        <a href="<?php echo G5_URL; ?>">홈</a>
        <span aria-hidden="true">&gt;</span>
        <a href="<?php echo $list_url; ?>">치료후기</a>
        <?php if ($category_name) { ?>
        <span aria-hidden="true">&gt;</span>
        <span><?php echo get_text($view['ca_name']); ?></span>
        <?php } ?>
    </nav>

    <div class="reviews-view__card">
        <header class="reviews-view__head">
            <div class="reviews-view__meta-row">
                <span class="reviews-view__badge">치료 사례</span>
                <time class="reviews-view__date" datetime="<?php echo $view['wr_datetime']; ?>"><?php echo $review_date; ?></time>
            </div>
            <h1 class="reviews-view__title"><?php echo get_text($view['wr_subject']); ?></h1>
        </header>

        <div class="reviews-view__info">
            <div class="reviews-view__info-item">
                <span class="reviews-view__info-label">환자</span>
                <span class="reviews-view__info-value"><?php echo $patient_name; ?></span>
            </div>
            <div class="reviews-view__info-item">
                <span class="reviews-view__info-label">담당 원장</span>
                <span class="reviews-view__info-value"><?php echo $doctor_name; ?></span>
            </div>
        </div>

        <?php if ($summary_html !== '') { ?>
        <div class="reviews-view__summary">
            <?php echo $summary_html; ?>
        </div>
        <?php } ?>

        <div class="reviews-view__content" id="bo_v_con">
            <?php
            $v_img_count = count($view['file']);
            if ($v_img_count) {
                echo '<div class="reviews-view__images">';
                foreach ($view['file'] as $view_file) {
                    if (!empty($view_file['view'])) {
                        echo get_file_thumbnail($view_file);
                    }
                }
                echo '</div>';
            }
            echo get_view_thumbnail($view['content']);
            ?>
        </div>

        <div class="reviews-view__cta">
            <h2 class="reviews-view__cta-title">비슷한 고민이 있으신가요?</h2>
            <p class="reviews-view__cta-desc">맥락한의원에서 1:1 맞춤 상담을 받아보세요</p>
            <div class="reviews-view__cta-actions">
                <a href="<?php echo $booking_url; ?>" class="reviews-btn reviews-btn--primary" target="_blank" rel="noopener noreferrer">진료 예약하기</a>
                <a href="<?php echo $tel_href; ?>" class="reviews-btn reviews-btn--outline">전화 상담하기</a>
            </div>
        </div>

        <?php if ($update_href || $delete_href || $write_href) { ?>
        <div class="reviews-view__admin">
            <a href="<?php echo $list_href ?>" class="reviews-view__admin-link">목록</a>
            <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="reviews-view__admin-link">수정</a><?php } ?>
            <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="reviews-view__admin-link" onclick="del(this.href); return false;">삭제</a><?php } ?>
        </div>
        <?php } ?>
    </div>

    <aside class="reviews-doctor-card">
        <div class="reviews-doctor-card__avatar" aria-hidden="true">이</div>
        <div class="reviews-doctor-card__body">
            <p class="reviews-doctor-card__name"><?php echo $doctor_name; ?> <span class="reviews-doctor-card__role">doctor</span></p>
            <p class="reviews-doctor-card__field">두통·어지럼증·자율신경·말초신경·브레인포그 전문</p>
        </div>
        <a href="<?php echo function_exists('headnerve_spa_href') ? headnerve_spa_href('/about') : G5_URL.'/#/about'; ?>" class="reviews-doctor-card__link">의료진 소개 더보기 →</a>
    </aside>

    <?php
    g5b_seo_view_footer($view, $board, $bo_table, (int) $wr_id, array(
        'article'    => true,
        'breadcrumb' => true,
        'related'    => true,
        'related_title' => '관련 후기',
        'related_limit' => 3,
    ));
    ?>

    <?php if ($prev_href || $next_href) { ?>
    <nav class="reviews-view__nav" aria-label="이전글 다음글">
        <ul>
            <?php if ($prev_href) { ?><li><span class="reviews-view__nav-label">이전글</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject; ?></a></li><?php } ?>
            <?php if ($next_href) { ?><li><span class="reviews-view__nav-label">다음글</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject; ?></a></li><?php } ?>
        </ul>
    </nav>
    <?php } ?>
</article>

<script>
$(function() {
    $("#bo_v_con").viewimageresize();
});
</script>
