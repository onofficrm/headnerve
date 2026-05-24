<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

$maekrak_auth_title = '로그인';
$maekrak_auth_desc = '맥락한의원 회원 서비스를 이용하세요.';
include_once($member_skin_path.'/_layout_top.php');
?>

<nav class="maekrak-auth-tabs" aria-label="회원 메뉴">
    <a href="<?php echo G5_BBS_URL ?>/login.php" class="is-active">로그인</a>
    <a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a>
</nav>

<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value="<?php echo $login_url ?>">

    <div class="maekrak-auth-field">
        <label for="login_id">아이디</label>
        <input type="text" name="mb_id" id="login_id" required class="frm_input" maxlength="20" placeholder="아이디를 입력하세요" autocomplete="username">
    </div>
    <div class="maekrak-auth-field">
        <label for="login_pw">비밀번호</label>
        <input type="password" name="mb_password" id="login_pw" required class="frm_input" maxlength="20" placeholder="비밀번호를 입력하세요" autocomplete="current-password">
    </div>

    <div class="maekrak-auth-row">
        <label class="maekrak-auth-check">
            <input type="checkbox" name="auto_login" id="login_auto_login">
            <span>자동 로그인</span>
        </label>
        <div class="maekrak-auth-links">
            <a href="<?php echo G5_BBS_URL ?>/password_lost.php">아이디 · 비밀번호 찾기</a>
        </div>
    </div>

    <button type="submit" class="maekrak-auth-btn">로그인</button>
    <a href="<?php echo G5_BBS_URL ?>/register.php" class="maekrak-auth-btn-outline">회원가입</a>
</form>

<?php
if (function_exists('social_check_login_before')) {
    $social_login_html = isset($social_login_html) ? $social_login_html : social_check_login_before();
    if ($social_login_html) {
        echo '<div class="maekrak-auth-divider">또는</div>';
        echo $social_login_html;
    }
}
?>

<script>
jQuery(function($) {
    $("#login_auto_login").on("click", function() {
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});
function flogin_submit(f) {
    if ($(document.body).triggerHandler('login_sumit', [f, 'flogin']) !== false) {
        return true;
    }
    return false;
}
</script>

<?php include_once($member_skin_path.'/_layout_bottom.php'); ?>
