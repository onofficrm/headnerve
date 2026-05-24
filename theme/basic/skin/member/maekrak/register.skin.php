<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

$maekrak_auth_title = '회원가입';
$maekrak_auth_desc = '약관에 동의하신 후 회원가입을 진행해 주세요.';
include_once($member_skin_path.'/_layout_top.php');
?>

<nav class="maekrak-auth-tabs" aria-label="회원 메뉴">
    <a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a>
    <a href="<?php echo G5_BBS_URL ?>/register.php" class="is-active">회원가입</a>
</nav>

<div class="register">
    <form name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

        <?php @include_once(get_social_skin_path().'/social_register.skin.php'); ?>

        <section id="fregister_term">
            <h2>(필수) 회원가입약관</h2>
            <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
            <fieldset class="fregister_agree">
                <label class="maekrak-auth-check">
                    <input type="checkbox" name="agree" value="1" id="agree11" required>
                    <span>회원가입약관에 동의합니다.</span>
                </label>
            </fieldset>
        </section>

        <section id="fregister_private" class="fregister_terms">
            <h2>(필수) 개인정보 수집 및 이용</h2>
            <div>
                <table>
                    <caption>개인정보 수집 및 이용</caption>
                    <thead>
                    <tr>
                        <th>목적</th>
                        <th>항목</th>
                        <th>보유기간</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>이용자 식별 및 본인여부 확인</td>
                        <td>아이디, 이름, 비밀번호</td>
                        <td>회원 탈퇴 시까지</td>
                    </tr>
                    <tr>
                        <td>고객서비스 이용에 관한 통지, CS 대응</td>
                        <td>이메일, 휴대폰번호</td>
                        <td>회원 탈퇴 시까지</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <fieldset class="fregister_agree">
                <label class="maekrak-auth-check">
                    <input type="checkbox" name="agree2" value="1" id="agree21" required>
                    <span>개인정보 수집 및 이용에 동의합니다.</span>
                </label>
            </fieldset>
        </section>

        <button type="submit" class="maekrak-auth-btn">다음 단계</button>
        <a href="<?php echo G5_BBS_URL ?>/login.php" class="maekrak-auth-btn-outline">이미 계정이 있으신가요? 로그인</a>
    </form>
</div>

<script>
function fregister_submit(f) {
    if (!f.agree.checked) {
        alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
        f.agree.focus();
        return false;
    }
    if (!f.agree2.checked) {
        alert("개인정보 수집 및 이용의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
        f.agree2.focus();
        return false;
    }
    return true;
}
</script>

<?php include_once($member_skin_path.'/_layout_bottom.php'); ?>
