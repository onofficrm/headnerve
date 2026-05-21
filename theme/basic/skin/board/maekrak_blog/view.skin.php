<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="' . $board_skin_url . '/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<main class="maekrak-board-blog maekrak-board-blog--view" id="maekrak_board_blog_view">
    <section class="maekrak-board-hero maekrak-board-hero--compact">
        <div class="maekrak-board-hero-inner">
            <nav class="maekrak-board-breadcrumb" aria-label="breadcrumb">
                <ol>
                    <li><a href="<?php echo G5_URL; ?>">홈</a></li>
                    <li><a href="<?php echo get_pretty_url($bo_table); ?>">블로그·사례</a></li>
                    <li aria-current="page">글보기</li>
                </ol>
            </nav>
        </div>
    </section>

    <article class="maekrak-board-article" id="bo_v" style="width:<?php echo $width; ?>">
        <div class="maekrak-board-article-card">
            <header class="maekrak-board-article-head">
                <?php if ($category_name) { ?>
                <span class="maekrak-blog-cards-cat"><?php echo $view['ca_name']; ?></span>
                <?php } ?>
                <h1 class="maekrak-board-article-title"><?php echo get_text($view['wr_subject']); ?></h1>
                <div class="maekrak-board-article-meta">
                    <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $view['name']; ?></span>
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('Y.m.d', strtotime($view['wr_datetime'])); ?></span>
                    <span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']); ?></span>
                </div>
                <div class="maekrak-board-article-actions">
                    <a href="<?php echo $list_href; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-sm"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
                    <?php if ($write_href) { ?><a href="<?php echo $write_href; ?>" class="maekrak-btn maekrak-btn-outline maekrak-btn-sm">글쓰기</a><?php } ?>
                    <?php if ($update_href) { ?><a href="<?php echo $update_href; ?>" class="maekrak-btn maekrak-btn-outline maekrak-btn-sm">수정</a><?php } ?>
                    <?php if ($delete_href) { ?><a href="<?php echo $delete_href; ?>" class="maekrak-btn maekrak-btn-outline maekrak-btn-sm" onclick="del(this.href); return false;">삭제</a><?php } ?>
                </div>
            </header>

            <div class="maekrak-board-article-body">
                <?php
                if (!empty($view['file']['count'])) {
                    echo '<div class="maekrak-board-article-images">';
                    foreach ($view['file'] as $view_file) {
                        if (!empty($view_file['view'])) {
                            echo get_file_thumbnail($view_file);
                        }
                    }
                    echo '</div>';
                }
                ?>
                <div id="bo_v_con" class="maekrak-board-content"><?php echo get_view_thumbnail($view['content']); ?></div>
            </div>

            <?php if ($prev_href || $next_href) { ?>
            <nav class="maekrak-board-nav-posts" aria-label="이전·다음 글">
                <?php if ($prev_href) { ?>
                <a href="<?php echo $prev_href; ?>" class="maekrak-board-nav-post maekrak-board-nav-post--prev">
                    <span class="maekrak-board-nav-label">이전 글</span>
                    <span class="maekrak-board-nav-subject"><?php echo $prev_wr_subject; ?></span>
                </a>
                <?php } ?>
                <?php if ($next_href) { ?>
                <a href="<?php echo $next_href; ?>" class="maekrak-board-nav-post maekrak-board-nav-post--next">
                    <span class="maekrak-board-nav-label">다음 글</span>
                    <span class="maekrak-board-nav-subject"><?php echo $next_wr_subject; ?></span>
                </a>
                <?php } ?>
            </nav>
            <?php } ?>
        </div>
    </article>

    <section class="maekrak-board-cta">
        <div class="maekrak-board-inner maekrak-board-cta-inner">
            <h2 class="maekrak-board-cta-title">비슷한 증상으로 상담이 필요하신가요?</h2>
            <div class="maekrak-board-cta-actions">
                <a href="<?php echo defined('MK_RESERVE_URL') ? MK_RESERVE_URL : G5_BBS_URL . '/qalist.php'; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-xl"<?php echo function_exists('maekrak_reserve_link_attr') ? maekrak_reserve_link_attr() : ''; ?>>상담 예약</a>
                <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-outline maekrak-btn-xl">전화 문의</a>
            </div>
        </div>
    </section>
</main>

<script>
jQuery(function($) {
    $("#bo_v_con img").viewimageresize();
});
</script>
