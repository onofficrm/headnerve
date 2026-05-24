<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/headnerve_nav.lib.php');

$mf_float_items = headnerve_floating_menu_items();
?>

<nav class="maekrak-float" id="maekrakFloat" aria-label="빠른 메뉴">
    <?php foreach ($mf_float_items as $item) {
        $ext = !empty($item['external']);
    ?>
    <a href="<?php echo $item['href']; ?>" class="maekrak-float__item"<?php echo $ext ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
        <span class="maekrak-float__icon maekrak-float__icon--<?php echo $item['icon']; ?>" aria-hidden="true"></span>
        <span class="maekrak-float__label"><?php echo get_text($item['label']); ?></span>
    </a>
    <?php } ?>
    <button type="button" class="maekrak-float__top" id="maekrakFloatTop" title="상단으로">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
        <span>상단으로</span>
    </button>
</nav>

<script>
(function () {
    function scrollTopSmooth() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    var topBtn = document.getElementById('maekrakFloatTop');
    var footerTop = document.getElementById('maekrakFooterTop');
    if (topBtn) topBtn.addEventListener('click', scrollTopSmooth);
    if (footerTop) footerTop.addEventListener('click', scrollTopSmooth);
})();
</script>
