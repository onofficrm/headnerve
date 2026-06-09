<?php
if (!defined('_GNUBOARD_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

$maekrak_auth_title = '비밀번호 확인';
$maekrak_auth_desc = ($url === 'member_leave.php')
    ? '비밀번호를 입력하시면 회원탈퇴가 완료됩니다.'
    : '회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다.';
include_once($member_skin_path.'/_layout_top.php');
?>

<form name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post">
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="w" value="u">

    <div class="maekrak-auth-field">
        <label for="mb_confirm_id">회원아이디</label>
        <input type="text" id="mb_confirm_id" class="frm_input" value="<?php echo get_text($member['mb_id']); ?>" readonly>
    </div>

    <div class="maekrak-auth-field">
        <label for="confirm_mb_password">비밀번호<strong class="sound_only">필수</strong></label>
        <input type="password" name="mb_password" id="confirm_mb_password" required class="required frm_input" maxlength="20" placeholder="비밀번호를 입력하세요" autocomplete="current-password">
    </div>

    <button type="submit" id="btn_submit" class="maekrak-auth-btn">확인</button>
    <a href="<?php echo G5_URL; ?>" class="maekrak-auth-btn-outline">취소</a>
</form>

<script>
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;
    return true;
}
</script>

<?php include_once($member_skin_path.'/_layout_bottom.php'); ?>
