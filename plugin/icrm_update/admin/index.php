<?php
define('G5_IS_ADMIN', true);
require_once __DIR__ . '/../../../common.php';

if ($is_admin !== 'super') {
    alert('최고관리자만 접근 가능합니다.', G5_URL);
}

if (is_file(G5_LIB_PATH . '/icrm-point.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-point.lib.php';
}
if (is_file(G5_LIB_PATH . '/seo-meta.lib.php')) {
    include_once G5_LIB_PATH . '/seo-meta.lib.php';
}

if (!is_file(G5_LIB_PATH . '/icrm-update.lib.php') && is_file(G5_LIB_PATH . '/icrm-update-bootstrap.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-update-bootstrap.lib.php';
    icrm_update_bootstrap_install();
}

if (is_file(G5_LIB_PATH . '/onoff-update.lib.php')) {
    include_once G5_LIB_PATH . '/onoff-update.lib.php';
}
if (is_file(G5_LIB_PATH . '/icrm-update.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-update.lib.php';
}
if (is_file(G5_LIB_PATH . '/icrm-builder-deploy.lib.php')) {
    include_once G5_LIB_PATH . '/icrm-builder-deploy.lib.php';
}

$admin_url = G5_PLUGIN_URL . '/icrm_update/admin/index.php';
$action_url = G5_PLUGIN_URL . '/icrm_update/admin/action.php';
$status = function_exists('icrm_update_check_status') ? icrm_update_check_status() : array(
    'ready' => false,
    'message' => '업데이트 모듈이 없습니다. iCRM 라이선스 설정 후 새로고침하세요.',
);
$builder_status = function_exists('icrm_builder_deploy_check_status') ? icrm_builder_deploy_check_status() : array(
    'ready' => false,
    'message' => '빌더 배포 모듈이 없습니다.',
);

function icu_h($s)
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iCRM 업데이트</title>
<style>
:root{--icu-bg:#eef2f7;--icu-panel:#fff;--icu-top:#1e293b;--icu-accent:#2563eb;--icu-good:#15803d;--icu-warn:#b45309;--icu-border:#d7dee8;--icu-muted:#64748b}
*{box-sizing:border-box}
body{margin:0;background:var(--icu-bg);color:#0f172a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,'Malgun Gothic',sans-serif;font-size:14px;line-height:1.5}
.icu-top{background:var(--icu-top);color:#fff;padding:14px 20px;display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}
.icu-top h1{margin:0;font-size:18px;font-weight:600}
.icu-top a{color:#cbd5e1;text-decoration:none;font-size:13px}
.icu-wrap{max-width:720px;margin:24px auto;padding:0 16px 40px}
.icu-card{background:var(--icu-panel);border:1px solid var(--icu-border);border-radius:10px;padding:20px 22px;margin-bottom:16px}
.icu-card h2{margin:0 0 12px;font-size:16px}
.icu-row{display:flex;justify-content:space-between;gap:12px;padding:8px 0;border-bottom:1px solid #eef2f7}
.icu-row:last-child{border-bottom:0}
.icu-label{color:var(--icu-muted)}
.icu-val{font-weight:600;text-align:right}
.icu-badge{display:inline-block;padding:2px 8px;border-radius:999px;font-size:12px;font-weight:600}
.icu-badge--ok{background:#dcfce7;color:var(--icu-good)}
.icu-badge--warn{background:#fef3c7;color:var(--icu-warn)}
.icu-badge--muted{background:#f1f5f9;color:var(--icu-muted)}
.icu-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:16px}
.icu-btn{border:0;border-radius:8px;padding:10px 18px;font-size:14px;font-weight:600;cursor:pointer}
.icu-btn--primary{background:var(--icu-accent);color:#fff}
.icu-btn--ghost{background:#fff;border:1px solid var(--icu-border);color:#334155}
.icu-btn:disabled{opacity:.55;cursor:not-allowed}
.icu-msg{margin-top:12px;padding:10px 12px;border-radius:8px;font-size:13px;display:none}
.icu-msg.on{display:block}
.icu-msg--ok{background:#ecfdf5;border:1px solid #6ee7b7;color:#065f46}
.icu-msg--err{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}
.icu-hint{color:var(--icu-muted);font-size:13px;margin:0 0 12px}
.icu-log{margin-top:12px;max-height:180px;overflow:auto;background:#f8fafc;border:1px solid var(--icu-border);border-radius:8px;padding:10px;font-size:12px;display:none}
.icu-log.on{display:block}
</style>
</head>
<body>
<header class="icu-top">
    <h1>iCRM 업데이트</h1>
    <a href="<?php echo icu_h(G5_ADMIN_URL); ?>">← 관리자 홈</a>
</header>

<div class="icu-wrap">
    <div class="icu-card">
        <h2>현재 상태</h2>
        <p class="icu-hint">iCRM 중앙 서버에서 최신 기능을 받아옵니다. 버튼 한 번이면 됩니다.</p>

        <div class="icu-row">
            <span class="icu-label">라이선스</span>
            <span class="icu-val">
                <?php if (!empty($status['license_ok'])) { ?>
                    <span class="icu-badge icu-badge--ok">연결됨</span>
                <?php } else { ?>
                    <span class="icu-badge icu-badge--warn">미설정</span>
                <?php } ?>
            </span>
        </div>
        <div class="icu-row">
            <span class="icu-label">이 사이트 버전</span>
            <span class="icu-val"><code><?php echo icu_h($status['local_release'] ?: '(없음)'); ?></code></span>
        </div>
        <div class="icu-row">
            <span class="icu-label">iCRM 최신 버전</span>
            <span class="icu-val"><code><?php echo icu_h($status['remote_release'] ?: '-'); ?></code></span>
        </div>
        <div class="icu-row">
            <span class="icu-label">업데이트</span>
            <span class="icu-val">
                <?php if (!empty($status['update_available'])) { ?>
                    <span class="icu-badge icu-badge--warn">새 버전 있음</span>
                <?php } elseif (!empty($status['ready'])) { ?>
                    <span class="icu-badge icu-badge--ok">최신</span>
                <?php } else { ?>
                    <span class="icu-badge icu-badge--muted">확인 불가</span>
                <?php } ?>
            </span>
        </div>

        <?php if (empty($status['license_ok'])) { ?>
        <p class="icu-hint" style="margin-top:12px;color:#b45309">먼저 <a href="<?php echo icu_h(function_exists('icrm_admin_page_url') ? icrm_admin_page_url('seo', array('tab' => 'settings')) : (G5_PLUGIN_URL . '/icrm_hub/admin/index.php?m=seo&tab=settings')); ?>">iCRM AI 관리 → SEO 메타 → iCRM 연동</a>에서 라이선스 키를 저장하세요.</p>
        <?php } elseif (empty($status['ready']) && !empty($status['message'])) { ?>
        <p class="icu-hint icu-hint--err" style="margin-top:12px"><?php echo icu_h($status['message']); ?></p>
        <?php } ?>

        <div class="icu-actions">
            <button type="button" class="icu-btn icu-btn--primary" id="icu-pull" <?php echo empty($status['ready']) ? 'disabled' : ''; ?>>
                <?php echo !empty($status['update_available']) ? '지금 업데이트' : '다시 확인 · 업데이트'; ?>
            </button>
            <button type="button" class="icu-btn icu-btn--ghost" id="icu-refresh">상태 새로고침</button>
        </div>

        <div class="icu-msg" id="icu-msg"></div>
        <pre class="icu-log" id="icu-log"></pre>
    </div>

    <div class="icu-card">
        <h2>자동 업데이트</h2>
        <p class="icu-hint">기본값 켜짐 — 최고관리자가 <?php echo icu_h(function_exists('icrm_update_check_interval_hours') ? icrm_update_check_interval_hours() : 24); ?>시간마다 로그인하면 자동으로 최신 버전을 적용합니다. 별도 CLI 작업은 필요 없습니다.</p>
    </div>

    <div class="icu-card">
        <h2>빌더 디자인 업데이트</h2>
        <p class="icu-hint">빌더에서 제작한 랜딩·독립 페이지를 iCRM에서 받아 적용합니다. FTP 없이 버튼 한 번으로 반영됩니다.</p>

        <div class="icu-row">
            <span class="icu-label">적용된 디자인</span>
            <span class="icu-val"><code><?php echo icu_h($builder_status['local_release'] ?: '(없음)'); ?></code></span>
        </div>
        <div class="icu-row">
            <span class="icu-label">iCRM 최신 디자인</span>
            <span class="icu-val"><code><?php echo icu_h($builder_status['remote_release'] ?: '-'); ?></code></span>
        </div>
        <?php if (!empty($builder_status['project_name'])) { ?>
        <div class="icu-row">
            <span class="icu-label">프로젝트</span>
            <span class="icu-val"><?php echo icu_h($builder_status['project_name']); ?> <code><?php echo icu_h($builder_status['project_id']); ?></code></span>
        </div>
        <?php } ?>
        <div class="icu-row">
            <span class="icu-label">상태</span>
            <span class="icu-val">
                <?php if (!empty($builder_status['update_available'])) { ?>
                    <span class="icu-badge icu-badge--warn">새 디자인 있음</span>
                <?php } elseif (!empty($builder_status['ready'])) { ?>
                    <span class="icu-badge icu-badge--ok">최신</span>
                <?php } else { ?>
                    <span class="icu-badge icu-badge--muted">확인 불가</span>
                <?php } ?>
            </span>
        </div>
        <?php if (!empty($builder_status['page_url'])) { ?>
        <div class="icu-row">
            <span class="icu-label">미리보기 URL</span>
            <span class="icu-val"><a href="<?php echo icu_h($builder_status['page_url']); ?>" target="_blank" rel="noopener"><?php echo icu_h($builder_status['page_url']); ?></a></span>
        </div>
        <?php } ?>
        <?php if (!empty($builder_status['home_url'])) { ?>
        <div class="icu-row">
            <span class="icu-label">홈 URL</span>
            <span class="icu-val"><a href="<?php echo icu_h($builder_status['home_url']); ?>" target="_blank" rel="noopener"><?php echo icu_h($builder_status['home_url']); ?></a></span>
        </div>
        <?php } ?>
        <?php if (!empty($builder_status['remote_release']) && !empty($builder_status['preview_url'])) { ?>
        <div class="icu-row">
            <span class="icu-label">새 디자인 미리보기</span>
            <span class="icu-val"><a href="<?php echo icu_h($builder_status['preview_url']); ?>" target="_blank" rel="noopener">적용 전 미리보기 ↗</a></span>
        </div>
        <?php } ?>
        <?php if (!empty($builder_status['history']) && is_array($builder_status['history'])) { ?>
        <div class="icu-row" style="flex-direction:column;align-items:stretch">
            <span class="icu-label" style="margin-bottom:6px">이전 릴리스</span>
            <ul style="margin:0;padding-left:18px;font-size:13px">
                <?php foreach (array_slice($builder_status['history'], 0, 5) as $hist) {
                    if (empty($hist['release_id'])) {
                        continue;
                    }
                    ?>
                <li><code><?php echo icu_h($hist['release_id']); ?></code>
                    <?php if (!empty($hist['project_name'])) { ?> — <?php echo icu_h($hist['project_name']); ?><?php } ?>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <?php if (empty($builder_status['license_ok'])) { ?>
        <p class="icu-hint" style="margin-top:12px;color:#b45309">먼저 iCRM 라이선스를 설정하세요.</p>
        <?php } elseif (empty($builder_status['ready']) && !empty($builder_status['message'])) { ?>
        <p class="icu-hint icu-hint--err" style="margin-top:12px"><?php echo icu_h($builder_status['message']); ?></p>
        <?php } ?>

        <div class="icu-actions">
            <button type="button" class="icu-btn icu-btn--primary" id="icb-pull" <?php echo empty($builder_status['ready']) || empty($builder_status['update_available']) ? 'disabled' : ''; ?>>
                빌더 디자인 적용
            </button>
            <button type="button" class="icu-btn icu-btn--ghost" id="icb-rollback" <?php echo empty($builder_status['history']) ? 'disabled' : ''; ?>>이전 버전 복구</button>
            <button type="button" class="icu-btn icu-btn--ghost" id="icb-refresh">상태 새로고침</button>
        </div>

        <div class="icu-msg" id="icb-msg"></div>
        <pre class="icu-log" id="icb-log"></pre>
    </div>
</div>

<script>
(function () {
    var actionUrl = <?php echo json_encode($action_url, JSON_UNESCAPED_UNICODE); ?>;

    function showMsg(text, ok) {
        var el = document.getElementById('icu-msg');
        el.textContent = text;
        el.className = 'icu-msg on ' + (ok ? 'icu-msg--ok' : 'icu-msg--err');
    }

    function setBusy(busy) {
        document.getElementById('icu-pull').disabled = busy;
        document.getElementById('icu-refresh').disabled = busy;
    }

    function refreshStatus() {
        setBusy(true);
        fetch(actionUrl + '?action=status', { credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.ok) {
                    showMsg(data.error || '상태 확인 실패', false);
                    return;
                }
                var st = data.status || {};
                if (st.ready) {
                    location.reload();
                    return;
                }
                showMsg(st.message || 'iCRM 중앙 서버에 연결할 수 없습니다.', false);
            })
            .catch(function () { showMsg('네트워크 오류', false); })
            .finally(function () { setBusy(false); });
    }

    function runPull() {
        if (!confirm('iCRM에서 최신 파일을 받아 적용합니다. 계속할까요?')) {
            return;
        }
        setBusy(true);
        showMsg('업데이트 진행 중…', true);
        var fd = new FormData();
        fd.append('action', 'pull');
        fetch(actionUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                var res = data.result || {};
                var log = document.getElementById('icu-log');
                if (res.changed && res.changed.length) {
                    log.textContent = res.changed.join('\n');
                    log.className = 'icu-log on';
                }
                if (data.ok) {
                    showMsg(res.message || '완료', true);
                    setTimeout(function () { location.reload(); }, 1200);
                } else {
                    showMsg(res.message || data.error || '실패', false);
                }
            })
            .catch(function () { showMsg('네트워크 오류', false); })
            .finally(function () { setBusy(false); });
    }

    document.getElementById('icu-pull').addEventListener('click', runPull);
    document.getElementById('icu-refresh').addEventListener('click', refreshStatus);

    function showBuilderMsg(text, ok) {
        var el = document.getElementById('icb-msg');
        el.textContent = text;
        el.className = 'icu-msg on ' + (ok ? 'icu-msg--ok' : 'icu-msg--err');
    }

    function setBuilderBusy(busy) {
        var pull = document.getElementById('icb-pull');
        var refresh = document.getElementById('icb-refresh');
        var rollback = document.getElementById('icb-rollback');
        if (pull) pull.disabled = busy;
        if (refresh) refresh.disabled = busy;
        if (rollback) rollback.disabled = busy;
    }

    function refreshBuilderStatus() {
        setBuilderBusy(true);
        fetch(actionUrl + '?action=builder_status', { credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.ok) {
                    showBuilderMsg(data.error || '상태 확인 실패', false);
                    return;
                }
                location.reload();
            })
            .catch(function () { showBuilderMsg('네트워크 오류', false); })
            .finally(function () { setBuilderBusy(false); });
    }

    function runBuilderPull() {
        if (!confirm('iCRM에서 빌더 디자인을 받아 적용합니다. 계속할까요?')) {
            return;
        }
        setBuilderBusy(true);
        showBuilderMsg('빌더 디자인 적용 중…', true);
        var fd = new FormData();
        fd.append('action', 'builder_pull');
        fetch(actionUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                var res = data.result || {};
                var log = document.getElementById('icb-log');
                if (res.changed && res.changed.length) {
                    log.textContent = res.changed.join('\n');
                    log.className = 'icu-log on';
                }
                if (data.ok) {
                    var msg = res.message || '완료';
                    if (res.page_url) {
                        msg += ' — ' + res.page_url;
                    }
                    showBuilderMsg(msg, true);
                    setTimeout(function () { location.reload(); }, 1500);
                } else {
                    showBuilderMsg(res.message || data.error || '실패', false);
                }
            })
            .catch(function () { showBuilderMsg('네트워크 오류', false); })
            .finally(function () { setBuilderBusy(false); });
    }

    var icbPull = document.getElementById('icb-pull');
    var icbRefresh = document.getElementById('icb-refresh');
    if (icbPull) icbPull.addEventListener('click', runBuilderPull);

    function runBuilderRollback() {
        if (!confirm('직전에 적용했던 빌더 디자인으로 복구합니다. 계속할까요?')) {
            return;
        }
        setBuilderBusy(true);
        showBuilderMsg('복구 진행 중…', true);
        var fd = new FormData();
        fd.append('action', 'builder_rollback');
        fetch(actionUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                var res = data.result || {};
                if (data.ok) {
                    showBuilderMsg(res.message || '복구 완료', true);
                    setTimeout(function () { location.reload(); }, 1500);
                } else {
                    showBuilderMsg(res.message || data.error || '복구 실패', false);
                }
            })
            .catch(function () { showBuilderMsg('네트워크 오류', false); })
            .finally(function () { setBuilderBusy(false); });
    }

    var icbRollback = document.getElementById('icb-rollback');
    if (icbRollback) icbRollback.addEventListener('click', runBuilderRollback);
    if (icbRefresh) icbRefresh.addEventListener('click', refreshBuilderStatus);
})();
</script>
</body>
</html>
