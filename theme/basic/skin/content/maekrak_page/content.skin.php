<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="' . $content_skin_url . '/style.css">', 0);
?>
<article id="ctt" class="ctt_<?php echo $co_id; ?> maekrak-static-page">
    <div class="maekrak-static-inner">
        <header class="maekrak-static-head">
            <h1><?php echo get_text($g5['title']); ?></h1>
        </header>
        <div id="ctt_con" class="maekrak-static-body">
            <?php echo $str; ?>
        </div>
    </div>
</article>
