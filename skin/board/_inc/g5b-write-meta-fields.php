<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('headnerve_board_meta_can_edit') || !headnerve_board_meta_can_edit($bo_table)) {
    return;
}

$g5b_meta_datetime = '';
$g5b_meta_hit = 0;

if ($w === 'u' && !empty($write['wr_datetime'])) {
    $g5b_meta_datetime = headnerve_board_meta_datetime_local($write['wr_datetime']);
    $g5b_meta_hit = isset($write['wr_hit']) ? (int) $write['wr_hit'] : 0;
} else {
    $g5b_meta_datetime = headnerve_board_meta_datetime_local(G5_TIME_YMDHIS);
}
?>

<div class="board-write-form__row write_div board-write-form__meta">
    <span class="board-write-form__label">게시 정보</span>
    <p class="board-write-form__hint board-write-form__meta-note">관리자 전용 · 목록·본문에 표시되는 작성일과 조회수를 설정합니다.</p>
    <div class="board-write-form__meta-grid">
        <div class="board-write-form__field">
            <label for="g5b_wr_datetime" class="board-write-form__label board-write-form__label--inline">작성일</label>
            <input type="datetime-local" name="g5b_wr_datetime" id="g5b_wr_datetime" class="frm_input board-write-form__control" value="<?php echo htmlspecialchars($g5b_meta_datetime, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="board-write-form__field">
            <label for="g5b_wr_hit" class="board-write-form__label board-write-form__label--inline">조회수</label>
            <input type="number" name="g5b_wr_hit" id="g5b_wr_hit" class="frm_input board-write-form__control" min="0" step="1" value="<?php echo (int) $g5b_meta_hit; ?>">
        </div>
    </div>
</div>
