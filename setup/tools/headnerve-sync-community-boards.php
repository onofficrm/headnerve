<?php
/**
 * 맥락한의원 커뮤니티 게시판 스킨 DB 동기화 (최고관리자 1회 실행)
 *
 * URL: /setup/tools/headnerve-sync-community-boards.php
 * — 게시판이 이미 있을 때 bo_skin / bo_mobile_skin 만 갱신합니다.
 * — 없는 게시판은 /setup/tools/headnerve-provision-reviews-board.php (reviews) 또는 관리자에서 생성
 */
$g5_path = realpath(__DIR__.'/../..');
if (!$g5_path) {
    exit('경로 오류');
}
chdir($g5_path);
include_once($g5_path.'/common.php');

if (!$is_admin || $is_admin !== 'super') {
    alert('최고관리자만 실행할 수 있습니다.', G5_ADMIN_URL);
}

$config_file = G5_PATH.'/setup/headnerve-community-boards.json';
if (!is_file($config_file)) {
    alert('setup/headnerve-community-boards.json 파일이 없습니다.');
}

$data = json_decode(file_get_contents($config_file), true);
if (!is_array($data) || empty($data['boards'])) {
    alert('게시판 설정 JSON을 읽을 수 없습니다.');
}

$results = array();

foreach ($data['boards'] as $item) {
    $bo_table = preg_replace('/[^a-z0-9_]/', '', $item['bo_table']);
    if ($bo_table === '') {
        continue;
    }

    $row = sql_fetch(" select bo_table, bo_subject, bo_skin, bo_mobile_skin from {$g5['board_table']} where bo_table = '{$bo_table}' ");

    if (empty($row['bo_table'])) {
        $results[] = array(
            'bo_table' => $bo_table,
            'status'   => 'missing',
            'message'  => '게시판 없음 — 관리자에서 먼저 생성하세요.',
        );
        continue;
    }

    $bo_skin = sql_real_escape_string($item['skin']);
    $bo_mobile_skin = sql_real_escape_string($item['mobile_skin']);
    $bo_subject = isset($item['title']) ? sql_real_escape_string($item['title']) : '';

    $subject_sql = ($bo_subject !== '') ? ", bo_subject = '{$bo_subject}'" : '';

    sql_query(" update {$g5['board_table']}
        set bo_skin = '{$bo_skin}',
            bo_mobile_skin = '{$bo_mobile_skin}'{$subject_sql}
        where bo_table = '{$bo_table}' ");

    $results[] = array(
        'bo_table' => $bo_table,
        'status'   => 'updated',
        'message'  => "스킨 → PC: {$item['skin']}, MO: {$item['mobile_skin']}".($bo_subject !== '' ? ", 제목 → {$item['title']}" : ''),
    );
}

$g5['title'] = '커뮤니티 게시판 스킨 동기화';
include_once(G5_PATH.'/head.sub.php');
?>
<style>
.sync-result { max-width: 640px; margin: 2rem auto; font-family: sans-serif; }
.sync-result table { width: 100%; border-collapse: collapse; }
.sync-result th, .sync-result td { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; text-align: left; }
.sync-result th { background: #f5f7fa; }
.sync-result .ok { color: #0B2744; }
.sync-result .warn { color: #b45309; }
</style>
<div class="sync-result">
    <h1>커뮤니티 게시판 스킨 동기화</h1>
    <p>extend/headnerve_boards.extend.php 가 런타임에도 동일 스킨을 적용합니다.</p>
    <table>
        <thead>
            <tr><th>bo_table</th><th>상태</th><th>내용</th></tr>
        </thead>
        <tbody>
        <?php foreach ($results as $r) { ?>
            <tr>
                <td><code><?php echo htmlspecialchars($r['bo_table'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                <td class="<?php echo $r['status'] === 'updated' ? 'ok' : 'warn'; ?>">
                    <?php echo $r['status'] === 'updated' ? '완료' : '확인 필요'; ?>
                </td>
                <td><?php echo htmlspecialchars($r['message'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p style="margin-top:1.5rem"><a href="<?php echo G5_ADMIN_URL; ?>/board_list.php">게시판관리로 이동</a></p>
</div>
<?php
include_once(G5_PATH.'/tail.sub.php');
