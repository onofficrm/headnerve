<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

if ($config['cf_cert_use'] && ($config['cf_cert_simple'] || $config['cf_cert_ipin'] || $config['cf_cert_hp'])) {
    add_javascript('<script src="'.G5_JS_URL.'/certify.js?v='.G5_JS_VER.'"></script>', 0);
}

$maekrak_auth_title = '아이디 · 비밀번호 찾기';
$maekrak_auth_desc = '가입 시 등록한 이메일로 아이디와 비밀번호 안내를 받을 수 있습니다.';
include_once($member_skin_path.'/_layout_top.php');
?>

<nav class="maekrak-auth-tabs" aria-label="회원 메뉴">
    <a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a>
    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" class="is-active">찾기</a>
</nav>

<div id="find_info" class="<?php if ($config['cf_cert_use'] != 0 && $config['cf_cert_find'] != 0) echo 'cert'; ?>">
    <div class="new_win_con">
        <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
            <input type="hidden" name="cert_no" value="">

            <h3>이메일로 찾기</h3>
            <p class="maekrak-auth-desc" style="text-align:left;margin-bottom:16px;">
                회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br>
                해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
            </p>

            <div class="maekrak-auth-field">
                <label for="mb_email">이메일 주소</label>
                <input type="email" name="mb_email" id="mb_email" required class="required email" placeholder="example@email.com" autocomplete="email">
            </div>

            <?php echo captcha_html(); ?>

            <div class="win_btn">
                <button type="submit" class="maekrak-auth-btn">인증메일 보내기</button>
            </div>
        </form>
    </div>

    <?php if ($config['cf_cert_use'] != 0 && $config['cf_cert_find'] != 0) { ?>
    <div class="maekrak-auth-divider">또는</div>
    <div class="new_win_con find_btn">
        <h3>본인인증으로 찾기</h3>
        <div class="cert_btn">
            <?php if (!empty($config['cf_cert_simple'])) { ?>
            <button type="button" id="win_sa_kakao_cert" class="maekrak-auth-btn-outline win_sa_cert" data-type="" style="margin-top:0">간편인증</button>
            <?php } ?>
            <?php if (!empty($config['cf_cert_hp'])) { ?>
            <button type="button" id="win_hp_cert" class="maekrak-auth-btn-outline" style="margin-top:0">휴대폰 본인확인</button>
            <?php } ?>
            <?php if (!empty($config['cf_cert_ipin'])) { ?>
            <button type="button" id="win_ipin_cert" class="maekrak-auth-btn-outline" style="margin-top:0">아이핀 본인확인</button>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>

<a href="<?php echo G5_BBS_URL ?>/login.php" class="maekrak-auth-btn-outline">로그인으로 돌아가기</a>

<script>
$(function() {
    $("#reg_zip_find").css("display", "inline-block");
    var pageTypeParam = "pageType=find";

    <?php if ($config['cf_cert_use'] && $config['cf_cert_simple']) { ?>
    var url = "<?php echo G5_CERT_URL; ?>/sa/sa.php?verifier=<?php echo $config['cf_cert_simple_id']; ?>&" + pageTypeParam;
    certify_win_open(url);
    <?php } ?>
    <?php if ($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
    var url = "<?php echo G5_CERT_URL; ?>/ipin/ipin.php?" + pageTypeParam;
    certify_win_open(url);
    <?php } ?>
    <?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
    var url = "<?php echo G5_CERT_URL; ?>/hpcert/hpcert.php?" + pageTypeParam;
    certify_win_open(url);
    <?php } ?>
});
function fpasswordlost_submit(f) {
    <?php echo chk_captcha_js(); ?>
    return true;
}
</script>

<?php include_once($member_skin_path.'/_layout_bottom.php'); ?>
