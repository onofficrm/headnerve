<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

global $member;

$templates = icrm_member_board_templates();
$my_boards = icrm_member_board_list_manageable(!empty($member['mb_id']) ? $member['mb_id'] : '');
$remaining = icrm_member_board_max_per_month() - icrm_member_board_month_count(!empty($member['mb_id']) ? $member['mb_id'] : '');
if ($remaining < 0) {
    $remaining = 0;
}
$action_url = icrm_member_url('action.php');
$edit_table = isset($_GET['edit']) ? preg_replace('/[^a-z0-9_]/', '', strtolower((string) $_GET['edit'])) : '';
?>
<div class="icc-module">
    <p class="icc-muted" style="margin:0 0 16px;line-height:1.6">
        게시판을 추가하거나 내가 만든 게시판을 수정할 수 있습니다.
        이번 달 추가 남은 횟수: <strong><?php echo (int) $remaining; ?></strong> / <?php echo (int) icrm_member_board_max_per_month(); ?>
        (레벨 <?php echo (int) icrm_member_board_min_level(); ?> 이상)
    </p>

    <h3 class="icrm-member-board-section-title">새 게시판 만들기</h3>
    <form class="icrm-member-board-form" id="icrm-member-board-form" autocomplete="off">
        <div class="icrm-field">
            <label for="imb_bo_table">게시판 ID</label>
            <input type="text" id="imb_bo_table" name="bo_table" required pattern="[a-z0-9_]{2,20}" maxlength="20" placeholder="column">
            <p class="icc-muted" style="margin:6px 0 0;font-size:12px">영문 소문자·숫자·_ · 생성 후 ID는 변경할 수 없습니다.</p>
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

    <h3 class="icrm-member-board-section-title">내 게시판</h3>
    <?php if ($my_boards === array()) { ?>
    <p class="icc-muted" style="margin:0;line-height:1.6">아직 만든 게시판이 없습니다. 위에서 새 게시판을 추가하세요.</p>
    <?php } else { ?>
    <ul class="icrm-member-board-manage-list">
        <?php foreach ($my_boards as $row) {
            $bt = isset($row['bo_table']) ? $row['bo_table'] : '';
            $is_editing = ($edit_table !== '' && $edit_table === $bt);
            ?>
        <li class="icrm-member-board-manage-item<?php echo $is_editing ? ' is-editing' : ''; ?>" data-bo-table="<?php echo icrm_member_h($bt); ?>">
            <div class="icrm-member-board-manage-item__head">
                <div>
                    <strong><?php echo icrm_member_h($row['bo_subject'] ?? $bt); ?></strong>
                    <span class="icrm-member-board-manage-item__meta">
                        <code><?php echo icrm_member_h($bt); ?></code>
                        · <?php echo icrm_member_h($templates[$row['template']]['label'] ?? $row['template']); ?>
                        · <?php echo icrm_member_h($row['updated_at'] ?: $row['created_at']); ?>
                    </span>
                </div>
                <div class="icrm-member-board-manage-item__actions">
                    <a class="icc-btn icc-btn--sm" href="<?php echo icrm_member_h($row['board_url']); ?>" target="_blank" rel="noopener">보기</a>
                    <button type="button" class="icc-btn icc-btn--sm icrm-member-board-edit-toggle" data-bo-table="<?php echo icrm_member_h($bt); ?>"><?php echo $is_editing ? '닫기' : '수정'; ?></button>
                </div>
            </div>
            <form class="icrm-member-board-edit-form<?php echo $is_editing ? ' is-open' : ''; ?>" data-bo-table="<?php echo icrm_member_h($bt); ?>" hidden="<?php echo $is_editing ? 'false' : 'true'; ?>">
                <input type="hidden" name="bo_table" value="<?php echo icrm_member_h($bt); ?>">
                <div class="icrm-field">
                    <label>게시판 ID</label>
                    <input type="text" value="<?php echo icrm_member_h($bt); ?>" readonly>
                </div>
                <div class="icrm-field">
                    <label for="imb_edit_subject_<?php echo icrm_member_h($bt); ?>">게시판 이름</label>
                    <input type="text" id="imb_edit_subject_<?php echo icrm_member_h($bt); ?>" name="bo_subject" required maxlength="80" value="<?php echo icrm_member_h($row['bo_subject'] ?? ''); ?>">
                </div>
                <div class="icrm-field">
                    <label for="imb_edit_template_<?php echo icrm_member_h($bt); ?>">템플릿</label>
                    <select id="imb_edit_template_<?php echo icrm_member_h($bt); ?>" name="template">
                        <?php foreach ($templates as $key => $tpl) { ?>
                        <option value="<?php echo icrm_member_h($key); ?>"<?php echo ($row['template'] ?? '') === $key ? ' selected' : ''; ?>><?php echo icrm_member_h($tpl['label']); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="icrm-member-board-edit-form__actions">
                    <button type="submit" class="icc-btn icc-btn--primary">저장</button>
                    <button type="button" class="icc-btn icrm-member-board-edit-cancel">취소</button>
                </div>
                <p class="icp-msg icrm-member-board-edit-msg" role="status"></p>
            </form>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
</div>

<script>
(function() {
    var actionUrl = <?php echo json_encode($action_url); ?>;
    var createForm = document.getElementById('icrm-member-board-form');
    var createMsg = document.getElementById('imb_msg');

    if (createForm) {
        createForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!confirm('새 게시판을 만듭니다. 계속할까요?')) return;
            var fd = new FormData(createForm);
            fd.append('action', 'board_create');
            createMsg.textContent = '생성 중…';
            createMsg.className = 'icp-msg';
            fetch(actionUrl, { method: 'POST', credentials: 'same-origin', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (!data.ok) throw new Error(data.error || (data.result && data.result.message) || '실패');
                    var res = data.result || {};
                    createMsg.textContent = res.message || '완료';
                    createMsg.className = 'icp-msg is-ok';
                    setTimeout(function() { location.href = <?php echo json_encode(icrm_member_url(array('m' => 'setup', 'tab' => 'boards'))); ?>; }, 900);
                })
                .catch(function(err) {
                    createMsg.textContent = err.message || '요청 실패';
                    createMsg.className = 'icp-msg is-err';
                });
        });
    }

    function closeEditForms(exceptForm) {
        document.querySelectorAll('.icrm-member-board-edit-form').forEach(function(form) {
            if (exceptForm && form === exceptForm) return;
            form.hidden = true;
            form.classList.remove('is-open');
            var item = form.closest('.icrm-member-board-manage-item');
            if (item) item.classList.remove('is-editing');
            var toggle = item ? item.querySelector('.icrm-member-board-edit-toggle') : null;
            if (toggle) toggle.textContent = '수정';
        });
    }

    document.querySelectorAll('.icrm-member-board-edit-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var item = btn.closest('.icrm-member-board-manage-item');
            var form = item ? item.querySelector('.icrm-member-board-edit-form') : null;
            if (!form) return;
            var willOpen = form.hidden;
            closeEditForms(willOpen ? form : null);
            if (willOpen) {
                form.hidden = false;
                form.classList.add('is-open');
                item.classList.add('is-editing');
                btn.textContent = '닫기';
            }
        });
    });

    document.querySelectorAll('.icrm-member-board-edit-cancel').forEach(function(btn) {
        btn.addEventListener('click', function() {
            closeEditForms();
        });
    });

    document.querySelectorAll('.icrm-member-board-edit-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!confirm('게시판 설정을 저장합니다. 계속할까요?')) return;
            var msg = form.querySelector('.icrm-member-board-edit-msg');
            var fd = new FormData(form);
            fd.append('action', 'board_update');
            if (msg) {
                msg.textContent = '저장 중…';
                msg.className = 'icp-msg icrm-member-board-edit-msg';
            }
            fetch(actionUrl, { method: 'POST', credentials: 'same-origin', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (!data.ok) throw new Error(data.error || (data.result && data.result.message) || '실패');
                    if (msg) {
                        msg.textContent = (data.result && data.result.message) || '저장되었습니다.';
                        msg.className = 'icp-msg icrm-member-board-edit-msg is-ok';
                    }
                    setTimeout(function() { location.reload(); }, 900);
                })
                .catch(function(err) {
                    if (msg) {
                        msg.textContent = err.message || '요청 실패';
                        msg.className = 'icp-msg icrm-member-board-edit-msg is-err';
                    }
                });
        });
    });
})();
</script>
