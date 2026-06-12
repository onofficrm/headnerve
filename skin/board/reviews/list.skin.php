<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_SKIN_PATH.'/board/_inc/g5b-thumb.php');
include_once(G5_SKIN_PATH.'/board/reviews/reviews-helper.php');

$thumb_w = 480;
$thumb_h = 480;
$reviews_categories = array(
    '두통,편두통' => '두통',
    '어지럼증' => '어지럼증',
    '자율신경' => '자율신경',
    '말초신경' => '말초신경병증',
    '브레인포그' => '브레인포그',
);

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div class="board-wrap board-wrap--reviews" id="bo_gall" style="width:<?php echo $width; ?>">

    <?php if ($is_category) { ?>
    <nav class="reviews-cate" id="bo_cate" aria-label="치료후기 분류">
        <ul id="bo_cate_ul">
            <li<?php echo $sca === '' ? ' id="bo_cate_on"' : ''; ?>><a href="<?php echo get_pretty_url($bo_table); ?>">전체</a></li>
            <?php foreach ($reviews_categories as $label => $category_value) {
                $is_current_category = ($sca === $category_value || $sca === $label);
                $category_url = get_pretty_url($bo_table, '', 'sca='.urlencode($category_value));
            ?>
            <li<?php echo $is_current_category ? ' id="bo_cate_on"' : ''; ?>><a href="<?php echo $category_url; ?>"><?php echo get_text($label); ?></a></li>
            <?php } ?>
        </ul>
    </nav>
    <?php } ?>

    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <?php if ($is_checkbox) { ?>
    <div class="reviews-list__chkall all_chk chk_box">
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
        <label for="chkall"><span></span><b>현재 페이지 전체선택</b></label>
    </div>
    <?php } ?>

    <div class="reviews-list">
        <?php if (count($list) == 0) { ?>
        <p class="reviews-list__empty">등록된 치료후기가 없습니다.</p>
        <?php } else { ?>
        <ul class="reviews-list__grid">
        <?php for ($i = 0; $i < count($list); $i++) {
            $is_secret = isset($list[$i]['wr_option']) && strstr($list[$i]['wr_option'], 'secret');
            $thumb_html = g5b_list_thumb_html($bo_table, $list[$i]['wr_id'], $thumb_w, $thumb_h, $list[$i]['subject'], $is_secret, $list[$i]['is_notice'], true);
        ?>
            <li class="reviews-list__item">
                <?php if ($is_checkbox) { ?>
                <div class="reviews-list__chk chk_box">
                    <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="selec_chk">
                    <label for="chk_wr_id_<?php echo $i ?>"><span></span><b class="sound_only"><?php echo $list[$i]['subject'] ?></b></label>
                </div>
                <?php } ?>
                <a href="<?php echo $list[$i]['href'] ?>" class="reviews-card">
                    <span class="reviews-card__thumb"><?php echo $thumb_html; ?></span>
                    <span class="reviews-card__body">
                        <?php if ($is_category && $list[$i]['ca_name']) { ?>
                        <span class="reviews-card__cate"><?php echo get_text($list[$i]['ca_name']); ?></span>
                        <?php } ?>
                        <span class="reviews-card__title"><?php echo get_text($list[$i]['subject']); ?></span>
                        <span class="reviews-card__meta">
                            <time class="reviews-card__date" datetime="<?php echo $list[$i]['datetime']; ?>"><?php echo reviews_format_date($list[$i]['wr_datetime']); ?></time>
                            <span class="reviews-card__hit">조회 <?php echo number_format((int) $list[$i]['wr_hit']); ?></span>
                        </span>
                    </span>
                </a>
            </li>
        <?php } ?>
        </ul>
        <?php } ?>
    </div>

    <nav class="reviews-paging" aria-label="치료후기 페이지"><?php echo $write_pages; ?></nav>

    <?php if ($write_href || $admin_href) { ?>
    <footer class="reviews-list__actions">
        <ul class="btn_bo_user">
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_b01 btn">관리</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="reviews-btn reviews-btn--primary">글쓰기</a></li><?php } ?>
        </ul>
    </footer>
    <?php } ?>
    </form>
</div>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;
    for (var i = 0; i < f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]") f.elements[i].checked = sw;
    }
}
function fboardlist_submit(f) {
    var chk_count = 0;
    for (var i = 0; i < f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked) chk_count++;
    }
    if (!chk_count) { alert(document.pressed + "할 게시물을 하나 이상 선택하세요."); return false; }
    if(document.pressed == "선택복사") { select_copy("copy"); return; }
    if(document.pressed == "선택이동") { select_copy("move"); return; }
    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?")) return false;
        f.removeAttribute("target");
        f.action = g5_bbs_url+"/board_list_update.php";
    }
    return true;
}
function select_copy(sw) {
    var f = document.fboardlist;
    window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");
    f.sw.value = sw; f.target = "move"; f.action = g5_bbs_url+"/move.php"; f.submit();
}
</script>
<?php } ?>
