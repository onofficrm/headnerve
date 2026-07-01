<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

include_once(G5_LIB_PATH.'/headnerve_nav.lib.php');

$mf_float_items = headnerve_floating_menu_items();
?>

<div class="maekrak-float" id="maekrakFloat">
    <div class="maekrak-float__panel" id="maekrakFloatPanel" aria-hidden="true">
        <nav class="maekrak-float__menu" aria-label="빠른 메뉴">
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
    </div>
    <button
        type="button"
        class="maekrak-float__toggle"
        id="maekrakFloatToggle"
        aria-expanded="false"
        aria-controls="maekrakFloatPanel"
        aria-label="빠른 메뉴"
    >
        <span class="maekrak-float__toggle-icon maekrak-float__toggle-icon--open" aria-hidden="true">☰</span>
        <span class="maekrak-float__toggle-icon maekrak-float__toggle-icon--close" aria-hidden="true">✕</span>
    </button>
</div>
<div class="maekrak-float__backdrop" id="maekrakFloatBackdrop" hidden></div>

<script>
(function () {
    function scrollTopSmooth() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    var floatRoot = document.getElementById('maekrakFloat');
    var panel = document.getElementById('maekrakFloatPanel');
    var toggle = document.getElementById('maekrakFloatToggle');
    var backdrop = document.getElementById('maekrakFloatBackdrop');
    var topBtn = document.getElementById('maekrakFloatTop');
    var footerTop = document.getElementById('maekrakFooterTop');

    function isMobileFloat() {
        return window.matchMedia('(max-width: 767px)').matches;
    }

    function setFloatOpen(open) {
        if (!floatRoot || !panel || !toggle) {
            return;
        }
        floatRoot.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        panel.setAttribute('aria-hidden', open ? 'false' : 'true');
        if (backdrop) {
            backdrop.hidden = !open;
        }
    }

    function closeFloatMenu() {
        if (isMobileFloat()) {
            setFloatOpen(false);
        }
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            if (!isMobileFloat()) {
                return;
            }
            setFloatOpen(!floatRoot.classList.contains('is-open'));
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', closeFloatMenu);
    }

    if (panel) {
        panel.addEventListener('click', function (event) {
            if (!isMobileFloat()) {
                return;
            }
            if (event.target.closest('a')) {
                closeFloatMenu();
            }
        });
    }

    if (topBtn) {
        topBtn.addEventListener('click', function () {
            scrollTopSmooth();
            closeFloatMenu();
        });
    }

    if (footerTop) {
        footerTop.addEventListener('click', scrollTopSmooth);
    }

    window.addEventListener('resize', function () {
        if (!isMobileFloat()) {
            setFloatOpen(false);
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeFloatMenu();
        }
    });
})();
</script>
