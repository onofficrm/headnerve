<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/hero_helper.php';
add_stylesheet('<link rel="stylesheet" href="' . $board_skin_url . '/style.css">', 0);

$list_count = is_array($list) ? count($list) : 0;
?>
<main class="maekrak-board-blog" id="maekrak_board_blog_list">
    <section class="maekrak-board-hero" aria-labelledby="maekrak_board_blog_title">
        <div class="maekrak-board-hero-inner">
            <nav class="maekrak-board-breadcrumb" aria-label="breadcrumb">
                <ol>
                    <li><a href="<?php echo G5_URL; ?>">홈</a></li>
                    <li aria-current="page">블로그·사례</li>
                </ol>
            </nav>
            <p class="maekrak-board-hero-label">Blog</p>
            <h1 id="maekrak_board_blog_title" class="maekrak-board-hero-title"><?php echo get_text($board['bo_subject']); ?></h1>
            <p class="maekrak-board-hero-desc">두통·어지럼증·자율신경 등 신경계 진료와 관련된 건강 정보, 치료 사례를 전합니다.</p>
        </div>
    </section>

    <section class="maekrak-board-body">
        <div class="maekrak-board-inner">
            <?php if ($is_category) { ?>
            <nav class="maekrak-board-cate" aria-label="카테고리">
                <ul id="bo_cate_ul">
                    <?php echo $category_option; ?>
                </ul>
            </nav>
            <?php } ?>

            <div class="maekrak-board-toolbar">
                <p class="maekrak-board-total">총 <strong><?php echo number_format($total_count); ?></strong>건</p>
                <ul class="maekrak-board-actions">
                    <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href; ?>" class="maekrak-board-icon-btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i></a></li><?php } ?>
                    <li>
                        <button type="button" class="maekrak-board-icon-btn btn_bo_sch" title="검색"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </li>
                    <?php if ($write_href) { ?><li><a href="<?php echo $write_href; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-sm">글쓰기</a></li><?php } ?>
                    <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href; ?>" class="maekrak-board-icon-btn" title="관리자"><i class="fa fa-cog" aria-hidden="true"></i></a></li><?php } ?>
                </ul>
            </div>

            <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
                <input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
                <input type="hidden" name="stx" value="<?php echo $stx; ?>">
                <input type="hidden" name="spt" value="<?php echo $spt; ?>">
                <input type="hidden" name="sca" value="<?php echo $sca; ?>">
                <input type="hidden" name="sst" value="<?php echo $sst; ?>">
                <input type="hidden" name="sod" value="<?php echo $sod; ?>">
                <input type="hidden" name="page" value="<?php echo $page; ?>">
                <input type="hidden" name="sw" value="">

                <?php if ($is_checkbox) { ?>
                <div class="maekrak-board-admin-chk">
                    <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
                    <label for="chkall">전체선택</label>
                </div>
                <?php } ?>

                <ul class="maekrak-blog-cards-list maekrak-board-card-list">
                <?php
                for ($i = 0; $i < $list_count; $i++) {
                    $wr_href = $list[$i]['href'];
                    $subject = $list[$i]['subject'];
                    $datetime = $list[$i]['datetime2'];
                    $summary = '';
                    if (!empty($list[$i]['content'])) {
                        $summary = cut_str(strip_tags($list[$i]['content']), 120);
                    }
                    $cate = !empty($list[$i]['ca_name']) ? $list[$i]['ca_name'] : $board['bo_subject'];
                    $thumb_url = '';
                    if (!empty($list[$i]['file']['count']) && !empty($list[$i]['file'][0]['path']) && !empty($list[$i]['file'][0]['file'])) {
                        $thumb_url = $list[$i]['file'][0]['path'] . '/' . $list[$i]['file'][0]['file'];
                    }
                    if ($thumb_url === '') {
                        $thumb_url = maekrak_blog_default_thumb_url($cate);
                    }
                ?>
                    <li class="maekrak-blog-cards-item">
                        <?php if ($is_checkbox) { ?>
                        <label class="maekrak-board-item-chk sound_only">
                            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id']; ?>">
                            <?php echo $subject; ?>
                        </label>
                        <?php } ?>
                        <a href="<?php echo $wr_href; ?>" class="maekrak-blog-cards-link">
                            <?php if ($thumb_url) { ?>
                            <div class="maekrak-blog-cards-thumb">
                                <img src="<?php echo htmlspecialchars($thumb_url, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="280" height="175" loading="lazy">
                            </div>
                            <?php } ?>
                            <div class="maekrak-blog-cards-body">
                                <span class="maekrak-blog-cards-cat"><?php echo $cate; ?></span>
                                <h2 class="maekrak-blog-cards-subject"><?php echo $subject; ?></h2>
                                <?php if ($summary) { ?>
                                <p class="maekrak-blog-cards-summary"><?php echo $summary; ?></p>
                                <?php } ?>
                                <div class="maekrak-blog-cards-meta">
                                    <span><?php echo $datetime; ?></span>
                                    <span class="maekrak-blog-cards-read">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($list_count === 0) { ?>
                    <li class="maekrak-blog-cards-empty">등록된 글이 없습니다.</li>
                <?php } ?>
                </ul>

                <?php if ($is_checkbox) { ?>
                <div class="maekrak-board-admin-btns">
                    <button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button>
                </div>
                <?php } ?>
            </form>

            <?php if ($write_pages) { ?>
            <nav class="maekrak-board-paging" aria-label="페이지"><?php echo $write_pages; ?></nav>
            <?php } ?>
        </div>
    </section>
</main>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;
    for (var i = 0; i < f.length; i++) {
        if (f.elements[i].name === "chk_wr_id[]") f.elements[i].checked = sw;
    }
}
function fboardlist_submit(f) {
    var chk_count = 0;
    for (var i = 0; i < f.length; i++) {
        if (f.elements[i].name === "chk_wr_id[]" && f.elements[i].checked) chk_count++;
    }
    if (!chk_count) { alert("하나 이상 선택하세요."); return false; }
    if (document.pressed === "선택삭제") {
        if (!confirm("선택한 게시물을 삭제하시겠습니까?")) return false;
        f.removeAttribute("target");
        f.action = g5_bbs_url + "/board_list_update.php";
    }
    return true;
}
</script>
<?php } ?>

<script>
jQuery(function($) {
    $(".btn_bo_sch").on("click", function() {
        $(".maekrak-board-sch").toggle();
    });
});
</script>

<!-- 게시판 검색 -->
<div class="maekrak-board-sch">
    <fieldset>
        <legend>게시판 검색</legend>
        <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
            <input type="hidden" name="sca" value="<?php echo $sca; ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <select name="sfl" id="sfl">
                <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject'); ?>>제목</option>
                <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            </select>
            <label for="stx" class="sound_only">검색어</label>
            <input type="text" name="stx" value="<?php echo stripslashes($stx); ?>" id="stx" placeholder="검색어를 입력하세요">
            <button type="submit" class="maekrak-btn maekrak-btn-primary maekrak-btn-sm">검색</button>
        </form>
    </fieldset>
</div>
