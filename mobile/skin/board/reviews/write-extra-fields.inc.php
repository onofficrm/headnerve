<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

$reviews_patient = isset($wr_1) ? get_text($wr_1) : '';
$reviews_doctor = isset($wr_2) ? get_text($wr_2) : '이재성';
$reviews_summary = isset($wr_3) ? get_text($wr_3) : '';
?>
<div class="board-write-form__row write_div reviews-write-extra">
    <label for="wr_1" class="board-write-form__label">환자</label>
    <input type="text" name="wr_1" value="<?php echo $reviews_patient; ?>" id="wr_1" class="frm_input full_input board-write-form__control" maxlength="50" placeholder="예: 홍길동 님">
</div>
<div class="board-write-form__row write_div reviews-write-extra">
    <label for="wr_2" class="board-write-form__label">담당 원장</label>
    <input type="text" name="wr_2" value="<?php echo $reviews_doctor; ?>" id="wr_2" class="frm_input full_input board-write-form__control" maxlength="50" placeholder="이재성">
</div>
<div class="board-write-form__row write_div reviews-write-extra">
    <label for="wr_3" class="board-write-form__label">요약</label>
    <textarea name="wr_3" id="wr_3" class="frm_input full_input board-write-form__control" rows="4" maxlength="500" placeholder="치료 후기 요약 (목록·상단 박스에 표시)"><?php echo $reviews_summary; ?></textarea>
</div>
