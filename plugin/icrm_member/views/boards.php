<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

global $member;

$templates = icrm_member_board_templates();
$recent = icrm_member_board_list_recent(8);
$remaining = icrm_member_board_max_per_month() - icrm_member_board_month_count(!empty($member['mb_id']) ? $member['mb_id'] : '');
if ($remaining < 0) {
    $remaining = 0;
}
$action_url = icrm_member_url('action.php');
?>
<div class="icc-module">
    <p class="icc-muted" style="margin:0 0 16px;line-height:1.6">
        새 게시판 코너를 만듭니다. 이번 달 남은 횟수: <strong><?php echo (int) $remaining; ?></strong> / <?php echo (int) icrm_member_board_max_per_month(); ?>
        (레벨 <?php echo (int) icrm_member_board_min_level(); ?> 이상)
    </p>

    <form class="icrm-member-board-form" id="icrm-member-board-form" autocomplete="off">
        <div class="icrm-field">
            <label for="imb_bo_table">게시판 ID</label>
            <input type="text" id="imb_bo_table" name="bo_table" required pattern="[a-z0-9_]{2,20}" maxlength="20" placeholder="column">
            <p class="icc-muted" style="margin:6px 0 0;font-size:12px">영문 소문자·숫자·_ · URL: /bbs/board.php?bo_table=...</p>
        </div>
        <div class="icrm-field">
            <label for="imb_bo_subject">게시판 이름</label>
            <input type="text" id="imb_bo_subject" name="bo_subject" required maxlength="80" placeholder="건강 칼럼">
        </div>
        <div class="icrm-field">
            <label for="imb_template">템플릿</label>
            <select id="imb_template" name="template">
                <?php foreach ($templates as $key => $tpl) { ?>
                <option value="<?php echo icrm_member_h($key); ?>"><?php echo icrm_member_h($tpl['label']); ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="icc-btn icc-btn--primary" <?php echo $remaining < 1 ? 'disabled' : ''; ?>>게시판 만들기</button>
        <p class="icp-msg" id="imb_msg" role="status" style="margin-top:12px"></p>
    </form>

    <?php if ($recent !== array()) { ?>
    <h3 style="margin:28px 0 10px;font-size:15px">최근 생성</h3>
    <ul class="icrm-member-board-list">
        <?php foreach ($recent as $row) {
            $bt = isset($row['bo_table']) ? $row['bo_table'] : '';
            $url = $bt !== '' ? G5_BBS_URL . '/board.php?bo_table=' . rawurlencode($bt) : '#';
            ?>
        <li>
            <strong><?php echo icrm_member_h($row['bo_subject'] ?? $bt); ?></strong>
            <code><?php echo icrm_member_h($bt); ?></code>
            · <?php echo icrm_member_h($row['created_at'] ?? ''); ?>
            <?php if ($bt !== '') { ?>
            · <a href="<?php echo icrm_member_h($url); ?>" target="_blank" rel="noopener">보기</a>
            <?php } ?>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
</div>

<script>
(function() {
    var form = document.getElementById('icrm-member-board-form');
    var msg = document.getElementById('imb_msg');
    if (!form) return;
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (!confirm('새 게시판을 만듭니다. 계속할까요?')) return;
        var fd = new FormData(form);
        fd.append('action', 'board_create');
        msg.textContent = '생성 중…';
        fetch(<?php echo json_encode($action_url); ?>, { method: 'POST', credentials: 'same-origin', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (!data.ok) throw new Error(data.error || (data.result && data.result.message) || '실패');
                var res = data.result || {};
                msg.textContent = (res.message || '완료') + (res.board_url ? ' · ' + res.board_url : '');
                msg.className = 'icp-msg is-ok';
                setTimeout(function() { location.reload(); }, 1200);
            })
            .catch(function(err) {
                msg.textContent = err.message || '요청 실패';
                msg.className = 'icp-msg is-err';
            });
    });
})();
</script>
