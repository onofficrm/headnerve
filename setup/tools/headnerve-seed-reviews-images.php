<?php
/**
 * 치료후기(reviews) 샘플 썸네일 이미지 첨부 (최고관리자 1회)
 *
 * URL: /setup/tools/headnerve-seed-reviews-images.php
 * — 로그인(최고관리자) 후 브라우저에서 실행
 * — setup/assets/reviews/review-sample-01.jpg … 06.jpg → 글 첨부파일(bf_no=0)
 * — 이미 첨부가 있는 글은 건너뜀
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

$bo_table = 'reviews';
$assets_dir = G5_PATH.'/setup/assets/reviews';
$sample_count = 6;
$results = array();

function headnerve_reviews_images_log(array &$results, $step, $status, $message)
{
    $results[] = array('step' => $step, 'status' => $status, 'message' => $message);
}

function headnerve_reviews_images_escape($value)
{
    return sql_real_escape_string($value);
}

function headnerve_reviews_images_attach($bo_table, $wr_id, $source_path, $source_name)
{
    global $g5;

    $board_path = G5_DATA_PATH.'/file/'.$bo_table;
    if (!is_dir($board_path)) {
        @mkdir($board_path, G5_DIR_PERMISSION, true);
        @chmod($board_path, G5_DIR_PERMISSION);
    }

    if (!is_file($source_path)) {
        return array('ok' => false, 'skip' => false, 'message' => '원본 파일 없음: '.$source_name);
    }

    $bo_esc = headnerve_reviews_images_escape($bo_table);
    $wr_id = (int) $wr_id;
    $has_file = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '{$bo_esc}' and wr_id = '{$wr_id}' and bf_no = '0' and bf_file != '' ");
    if (!empty($has_file['bf_file'])) {
        return array('ok' => false, 'skip' => true, 'message' => 'wr_id '.$wr_id.' — 이미 첨부 있음');
    }

    $timg = @getimagesize($source_path);
    $bf_width = isset($timg[0]) ? (int) $timg[0] : 0;
    $bf_height = isset($timg[1]) ? (int) $timg[1] : 0;
    $bf_type = isset($timg[2]) ? (int) $timg[2] : 0;
    $filesize = (int) filesize($source_path);

    $filename = get_safe_filename($source_name);
    $chars_array = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
    shuffle($chars_array);
    $shuffle = implode('', $chars_array);
    $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    $dest_name = md5(sha1($remote_addr)).'_'.substr($shuffle, 0, 8).'_'.replace_filename($filename);
    $dest_path = $board_path.'/'.$dest_name;

    if (!@copy($source_path, $dest_path)) {
        return array('ok' => false, 'skip' => false, 'message' => 'wr_id '.$wr_id.' — 파일 복사 실패');
    }
    @chmod($dest_path, G5_FILE_PERMISSION);

    $source_esc = headnerve_reviews_images_escape($source_name);
    $dest_esc = headnerve_reviews_images_escape($dest_name);

    sql_query(" insert into {$g5['board_file_table']} set
        bo_table = '{$bo_esc}',
        wr_id = '{$wr_id}',
        bf_no = '0',
        bf_source = '{$source_esc}',
        bf_file = '{$dest_esc}',
        bf_content = '',
        bf_fileurl = '',
        bf_thumburl = '',
        bf_storage = '',
        bf_download = 0,
        bf_filesize = '{$filesize}',
        bf_width = '{$bf_width}',
        bf_height = '{$bf_height}',
        bf_type = '{$bf_type}',
        bf_datetime = '".G5_TIME_YMDHIS."' ");

    $write_table = $g5['write_prefix'].$bo_table;
    $cnt_row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_esc}' and wr_id = '{$wr_id}' ");
    $file_cnt = isset($cnt_row['cnt']) ? (int) $cnt_row['cnt'] : 1;
    sql_query(" update {$write_table} set wr_file = '{$file_cnt}' where wr_id = '{$wr_id}' ");

    return array('ok' => true, 'skip' => false, 'message' => 'wr_id '.$wr_id.' — '.$source_name.' 첨부 완료');
}

if (!is_dir($assets_dir)) {
    headnerve_reviews_images_log($results, 'assets', 'warn', 'setup/assets/reviews 폴더가 없습니다.');
} else {
    headnerve_reviews_images_log($results, 'assets', 'ok', '샘플 이미지 폴더 확인');
}

$write_table = $g5['write_prefix'].$bo_table;
$sql = " select w.wr_id, w.wr_subject, w.wr_datetime,
        ( select count(*) from {$g5['board_file_table']} f
          where f.bo_table = '".headnerve_reviews_images_escape($bo_table)."'
            and f.wr_id = w.wr_id and f.bf_file != '' ) as file_cnt
    from {$write_table} w
    where w.wr_is_comment = 0
    order by w.wr_datetime desc, w.wr_id desc
    limit {$sample_count} ";
$result = sql_query($sql);

$attached = 0;
$skipped = 0;
$idx = 0;

while ($row = sql_fetch_array($result)) {
    $idx++;
    $sample_name = sprintf('review-sample-%02d.jpg', $idx);
    $source_path = $assets_dir.'/'.$sample_name;

    if ((int) $row['file_cnt'] > 0) {
        $skipped++;
        headnerve_reviews_images_log($results, 'post-'.$idx, 'skip', 'wr_id '.$row['wr_id'].' — '.$row['wr_subject'].' (기존 첨부)');
        continue;
    }

    $outcome = headnerve_reviews_images_attach($bo_table, $row['wr_id'], $source_path, $sample_name);
    if (!empty($outcome['skip'])) {
        $skipped++;
        headnerve_reviews_images_log($results, 'post-'.$idx, 'skip', $outcome['message']);
    } elseif (!empty($outcome['ok'])) {
        $attached++;
        headnerve_reviews_images_log($results, 'post-'.$idx, 'ok', $outcome['message']);
    } else {
        headnerve_reviews_images_log($results, 'post-'.$idx, 'warn', $outcome['message']);
    }
}

if ($idx === 0) {
    headnerve_reviews_images_log($results, 'posts', 'warn', '첨부할 치료후기 글이 없습니다.');
} else {
    headnerve_reviews_images_log($results, 'summary', 'ok', "처리 {$idx}건 — 신규 첨부 {$attached}건, 건너뜀 {$skipped}건");
}

$list_url = G5_BBS_URL.'/board.php?bo_table='.$bo_table;

$g5['title'] = '치료후기 샘플 이미지 첨부';
include_once(G5_PATH.'/head.sub.php');
?>
<style>
.provision-result { max-width: 720px; margin: 2rem auto; font-family: sans-serif; line-height: 1.6; }
.provision-result table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
.provision-result th, .provision-result td { border: 1px solid #e2e8f0; padding: 0.75rem 1rem; text-align: left; }
.provision-result th { background: #f8fafc; }
.provision-result .ok { color: #0B2744; font-weight: 600; }
.provision-result .skip { color: #64748b; }
.provision-result .warn { color: #b45309; }
.provision-result__actions { display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.5rem; }
.provision-result__actions a { display: inline-block; padding: 0.65rem 1.25rem; border-radius: 999px; background: #0f172a; color: #fff; text-decoration: none; font-size: 0.9375rem; }
</style>
<div class="provision-result">
    <h1>치료후기 샘플 이미지 첨부</h1>
    <p>최신 글 <?php echo (int) $sample_count; ?>건에 손글씨 후기 샘플 썸네일을 연결합니다.</p>
    <table>
        <thead>
            <tr><th>단계</th><th>상태</th><th>내용</th></tr>
        </thead>
        <tbody>
        <?php foreach ($results as $r) {
            $cls = $r['status'] === 'ok' ? 'ok' : ($r['status'] === 'skip' ? 'skip' : 'warn');
            ?>
            <tr>
                <td><?php echo htmlspecialchars($r['step'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="<?php echo $cls; ?>"><?php echo htmlspecialchars($r['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($r['message'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="provision-result__actions">
        <a href="<?php echo $list_url; ?>">치료후기 목록 보기</a>
    </div>
</div>
<?php
include_once(G5_PATH.'/tail.sub.php');
