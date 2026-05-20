<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="' . $latest_skin_url . '/style.css">', 0);

$list_count = (is_array($list) && $list) ? count($list) : 0;
$bo_subject = isset($bo_subject) ? $bo_subject : '블로그';
?>

<div class="maekrak-blog-cards">
    <ul class="maekrak-blog-cards-list">
    <?php
    if ($list_count > 0) {
        for ($i = 0; $i < $list_count; $i++) {
            if (!isset($list[$i]) || !is_array($list[$i])) continue;

            $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
            $subject = isset($list[$i]['subject']) ? $list[$i]['subject'] : '';
            $datetime = isset($list[$i]['datetime2']) ? $list[$i]['datetime2'] : '';
            $is_notice = !empty($list[$i]['is_notice']);
            $icon_secret = !empty($list[$i]['icon_secret']);
            $icon_new = !empty($list[$i]['icon_new']);
            $summary = '';
            if (!empty($list[$i]['wr_content'])) {
                $summary = cut_str(strip_tags($list[$i]['wr_content']), 120);
            }
    ?>
        <li class="maekrak-blog-cards-item">
            <a href="<?php echo $wr_href; ?>" class="maekrak-blog-cards-link">
                <div class="maekrak-blog-cards-body">
                    <?php if ($icon_secret) { ?><i class="fa fa-lock" aria-hidden="true"></i><?php } ?>
                    <span class="maekrak-blog-cards-cat"><?php echo $bo_subject; ?></span>
                    <h3 class="maekrak-blog-cards-subject">
                        <?php echo $is_notice ? '<strong>' . $subject . '</strong>' : $subject; ?>
                    </h3>
                    <?php if ($summary) { ?>
                    <p class="maekrak-blog-cards-summary"><?php echo $summary; ?></p>
                    <?php } ?>
                    <div class="maekrak-blog-cards-meta">
                        <span><?php echo $datetime; ?></span>
                        <span class="maekrak-blog-cards-read">Read More <i class="fa fa-long-arrow-right"></i></span>
                    </div>
                </div>
            </a>
        </li>
    <?php
        }
    } else {
    ?>
        <li class="maekrak-blog-cards-empty">
            등록된 글이 없습니다. 게시판 <strong><?php echo isset($bo_table) ? $bo_table : 'free'; ?></strong>을 확인하거나
            <code>inc/site_config.php</code>의 <code>MK_BLOG_BOARD</code>를 수정해 주세요.
        </li>
    <?php } ?>
    </ul>
    <?php if ($list_count > 0 && isset($bo_table)) { ?>
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="maekrak-blog-cards-more maekrak-blog-cards-more--mobile">블로그 전체보기</a>
    <?php } ?>
</div>
