<?php
if (!defined('_GNUBOARD_')) exit;
$maekrak_auth_title = isset($maekrak_auth_title) ? $maekrak_auth_title : $g5['title'];
$maekrak_auth_desc = isset($maekrak_auth_desc) ? $maekrak_auth_desc : '';
$maekrak_home = G5_URL;
$maekrak_builder = G5_URL . '/plugin/onoff-builder-bridge/page.php?id=headnerve-main';
?>
<div class="maekrak-auth<?php echo !empty($maekrak_auth_wide) ? ' maekrak-auth--wide' : ''; ?>">
    <header class="maekrak-auth-header">
        <a href="<?php echo $maekrak_builder; ?>" class="maekrak-auth-logo">
            <span class="maekrak-auth-logo-mark">M</span>
            <span class="maekrak-auth-logo-text">맥락한의원</span>
        </a>
        <a href="<?php echo $maekrak_home; ?>" class="maekrak-auth-home">홈으로</a>
    </header>
    <main class="maekrak-auth-main">
        <div class="maekrak-auth-card">
            <?php if ($maekrak_auth_title) { ?>
            <div class="maekrak-auth-head">
                <p class="maekrak-auth-label">Member</p>
                <h1 class="maekrak-auth-title"><?php echo get_text($maekrak_auth_title); ?></h1>
                <?php if ($maekrak_auth_desc) { ?>
                <p class="maekrak-auth-desc"><?php echo $maekrak_auth_desc; ?></p>
                <?php } ?>
            </div>
            <?php } ?>
