<?php
/**
 * 치료후기(reviews) 게시판 생성·설정·샘플 글 시드 (최고관리자 1회)
 *
 * URL: /setup/tools/headnerve-provision-reviews-board.php
 * — 로그인(최고관리자) 후 브라우저에서 실행
 * — 게시판 없으면 생성, 있으면 설정만 갱신
 * — 글이 없을 때만 샘플 후기 6건 등록
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
$config_file = G5_PATH.'/setup/headnerve-community-boards.json';
$board_cfg = null;

if (is_file($config_file)) {
    $json = json_decode(file_get_contents($config_file), true);
    if (!empty($json['boards'])) {
        foreach ($json['boards'] as $item) {
            if (isset($item['bo_table']) && $item['bo_table'] === $bo_table) {
                $board_cfg = $item;
                break;
            }
        }
    }
}

$bo_subject = isset($board_cfg['title']) ? $board_cfg['title'] : '치료후기';
$bo_skin = isset($board_cfg['skin']) ? $board_cfg['skin'] : 'reviews';
$bo_mobile_skin = isset($board_cfg['mobile_skin']) ? $board_cfg['mobile_skin'] : 'reviews';
$bo_category_list = isset($board_cfg['categories']) ? $board_cfg['categories'] : '두통|어지럼증|자율신경|말초신경병증|브레인포그|기타';
$extra_fields = isset($board_cfg['extra_fields']) && is_array($board_cfg['extra_fields']) ? $board_cfg['extra_fields'] : array(
    'wr_1' => '환자',
    'wr_2' => '담당 원장',
    'wr_3' => '요약',
);

$results = array();

function headnerve_reviews_log(array &$results, $step, $status, $message)
{
    $results[] = array('step' => $step, 'status' => $status, 'message' => $message);
}

function headnerve_reviews_escape($value)
{
    return sql_real_escape_string($value);
}

function headnerve_reviews_create_board($bo_table, $gr_id)
{
    global $g5;

    $admin_dir = G5_ADMIN_DIR;
    $sql_file = G5_PATH.'/'.$admin_dir.'/sql_write.sql';
    if (!is_file($sql_file)) {
        return false;
    }

    $file = file($sql_file);
    $file = get_db_create_replace($file);
    $sql = implode("\n", $file);
    $create_table = $g5['write_prefix'].$bo_table;
    $source = array('/__TABLE_NAME__/', '/;/');
    $target = array($create_table, '');
    $sql = preg_replace($source, $target, $sql);
    sql_query($sql, false);

    $board_path = G5_DATA_PATH.'/file/'.$bo_table;
    @mkdir($board_path, G5_DIR_PERMISSION);
    @chmod($board_path, G5_DIR_PERMISSION);
    $index_file = $board_path.'/index.php';
    if ($fp = @fopen($index_file, 'w')) {
        @fwrite($fp, '');
        @fclose($fp);
        @chmod($index_file, G5_FILE_PERMISSION);
    }

    return true;
}

function headnerve_reviews_board_update_sql($bo_table, $bo_subject, $bo_skin, $bo_mobile_skin, $bo_category_list, $extra_fields)
{
    $bo_subject = headnerve_reviews_escape($bo_subject);
    $bo_skin = headnerve_reviews_escape($bo_skin);
    $bo_mobile_skin = headnerve_reviews_escape($bo_mobile_skin);
    $bo_category_list = headnerve_reviews_escape($bo_category_list);

    $bo_1_subj = headnerve_reviews_escape(isset($extra_fields['wr_1']) ? $extra_fields['wr_1'] : '');
    $bo_2_subj = headnerve_reviews_escape(isset($extra_fields['wr_2']) ? $extra_fields['wr_2'] : '');
    $bo_3_subj = headnerve_reviews_escape(isset($extra_fields['wr_3']) ? $extra_fields['wr_3'] : '');

    return " update {$GLOBALS['g5']['board_table']} set
        bo_subject = '{$bo_subject}',
        bo_mobile_subject = '{$bo_subject}',
        bo_skin = '{$bo_skin}',
        bo_mobile_skin = '{$bo_mobile_skin}',
        bo_device = 'both',
        bo_list_level = '1',
        bo_read_level = '1',
        bo_write_level = '10',
        bo_reply_level = '10',
        bo_comment_level = '10',
        bo_upload_level = '10',
        bo_download_level = '1',
        bo_use_category = '1',
        bo_category_list = '{$bo_category_list}',
        bo_use_dhtml_editor = '1',
        bo_use_secret = '0',
        bo_use_comment = '0',
        bo_use_search = '1',
        bo_include_head = '',
        bo_include_tail = '',
        bo_table_width = '100',
        bo_subject_len = '80',
        bo_page_rows = '12',
        bo_mobile_page_rows = '9',
        bo_image_width = '760',
        bo_gallery_cols = '3',
        bo_gallery_width = '480',
        bo_gallery_height = '640',
        bo_upload_count = '3',
        bo_upload_size = '10485760',
        bo_new = '168',
        bo_sort_field = 'wr_datetime desc',
        bo_1_subj = '{$bo_1_subj}',
        bo_2_subj = '{$bo_2_subj}',
        bo_3_subj = '{$bo_3_subj}'
        where bo_table = '".headnerve_reviews_escape($bo_table)."' ";
}

function headnerve_reviews_sample_posts()
{
    return array(
        array(
            'ca_name' => '자율신경',
            'wr_subject' => '약만 복용하다가, 침치료와 한약으로 마음이 편안해졌습니다',
            'wr_1' => '김○○ 님',
            'wr_2' => '이재성',
            'wr_3' => '장기간 불면과 불안으로 약물에 의존하시던 환자분이 침·뜸·한약 치료 후 수면의 질과 기분 안정을 되찾으셨습니다.',
            'wr_content' => '<p>불면과 불안 때문에 수년간 수면제를 복용해 오셨습니다. 낮에도 몸이 무겁고 가슴이 답답해 일상생활이 힘드셨다고 합니다.</p><p>맥락한의원에서 자율신경 기능을 중심으로 진료를 시작했고, 침·뜸·한약 치료를 병행했습니다. 치료 4주차부터 잠들기가 한결 수월해졌고, 8주차에는 약물 없이도 충분한 수면을 취하실 수 있게 되었습니다.</p><p>지금은 증상 재발 없이 꾸준히 관리 중이십니다.</p>',
            'wr_datetime' => '2024-10-19 10:00:00',
        ),
        array(
            'ca_name' => '두통',
            'wr_subject' => '편두통이 줄어들고, 일상으로 돌아갈 수 있게 되었습니다',
            'wr_1' => '박○○ 님',
            'wr_2' => '이재성',
            'wr_3' => '월 15회 이상 반복되던 편두통이 치료 후 월 2~3회로 감소했습니다.',
            'wr_content' => '<p>10년 넘게 편두통으로 고생하셨고, 통증이 심할 때는 하루 종일 누워 계셔야 했습니다.</p><p>경추·두개골 정렬과 자율신경 치료를 병행한 후 통증 빈도와 강도가 눈에 띄게 줄었습니다. 이제는 업무와 육아를 병행하실 수 있을 정도로 호전되셨습니다.</p>',
            'wr_datetime' => '2024-09-05 11:30:00',
        ),
        array(
            'ca_name' => '어지럼증',
            'wr_subject' => '어지럼증 때문에 못 하던 운동, 다시 시작했습니다',
            'wr_1' => '이○○ 님',
            'wr_2' => '이재성',
            'wr_3' => '기립성 어지럼과 경추성 어지럼증 증상이 호전되어 일상 활동이 편해졌습니다.',
            'wr_content' => '<p>갑자기 일어날 때 어지럽고, 목을 돌릴 때도 불안감이 있으셨습니다. MRI 등 검사에서 특별한 이상은 없었지만 증상은 계속되었습니다.</p><p>경추 교정과 전정·자율신경 치료 후 어지럼 빈도가 크게 줄었고, 가벼운 운동도 다시 시작하실 수 있게 되었습니다.</p>',
            'wr_datetime' => '2024-08-22 14:00:00',
        ),
        array(
            'ca_name' => '말초신경병증',
            'wr_subject' => '손끝 저림이 줄어들어 기분이 한결 가벼워졌어요',
            'wr_1' => '최○○ 님',
            'wr_2' => '이재성',
            'wr_3' => '말초신경병증으로 인한 사지 저림·마비감이 치료 후 완화되었습니다.',
            'wr_content' => '<p>밤에 손끝과 발끝이 저리고 감각이 둔해져 잠을 이루기 어려우셨습니다.</p><p>침·약침·한약을 통해 신경 기능 회복을 돕는 치료를 진행했고, 6주 후부터 저림이 눈에 띄게 줄었습니다. 지금은 증상 관리를 위해 정기적으로 내원 중입니다.</p>',
            'wr_datetime' => '2024-07-14 09:45:00',
        ),
        array(
            'ca_name' => '브레인포그',
            'wr_subject' => '머리가 멍해지던 증상, 집중력을 되찾았습니다',
            'wr_1' => '정○○ 님',
            'wr_2' => '이재성',
            'wr_3' => '브레인포그(머리 안개) 증상과 만성피로가 함께 호전되었습니다.',
            'wr_content' => '<p>코로나 이후 머리가 멍하고 집중이 안 되는 증상이 1년 넘게 지속되었습니다. 카페인에도 잘 반응하지 않았습니다.</p><p>자율신경·혈액순환·수면 리듬을 함께 다루는 치료 후 집중력과 컨디션이 회복되었습니다.</p>',
            'wr_datetime' => '2024-06-03 16:20:00',
        ),
        array(
            'ca_name' => '두통',
            'wr_subject' => '수험생 두통, 시험 기간에도 공부할 수 있게 됐어요',
            'wr_1' => '학부모 ○○○',
            'wr_2' => '이재성',
            'wr_3' => '수험생 두통으로 학습에 지장을 주던 증상이 치료 후 크게 줄었습니다.',
            'wr_content' => '<p>시험 기간마다 심해지는 두통으로 공부 시간을 채우기 어려웠습니다.</p><p>경추·두개골 치료와 스트레스성 자율신경 불균형 교정 후 두통 빈도가 줄어, 수험생활을 보다 안정적으로 이어갈 수 있게 되었습니다.</p>',
            'wr_datetime' => '2024-05-18 13:10:00',
        ),
    );
}

function headnerve_reviews_insert_post($bo_table, array $post, $mb_id = 'admin')
{
    global $g5, $config;

    $write_table = $g5['write_prefix'].$bo_table;
    $ca_name = headnerve_reviews_escape($post['ca_name']);
    $wr_subject = headnerve_reviews_escape($post['wr_subject']);
    $wr_content = headnerve_reviews_escape($post['wr_content']);
    $wr_1 = headnerve_reviews_escape($post['wr_1']);
    $wr_2 = headnerve_reviews_escape($post['wr_2']);
    $wr_3 = headnerve_reviews_escape($post['wr_3']);
    $wr_datetime = headnerve_reviews_escape($post['wr_datetime']);
    $wr_name = headnerve_reviews_escape('맥락한의원');
    $mb_id = headnerve_reviews_escape($mb_id);
    $wr_ip = headnerve_reviews_escape(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1');

    $wr_seo_title = $wr_subject;
    if (function_exists('generate_seo_title')) {
        $wr_seo_title = headnerve_reviews_escape(generate_seo_title($post['wr_subject']));
    }

    $sql = " insert into {$write_table} set
        wr_num = (SELECT IFNULL(MIN(wr_num) - 1, -1) FROM {$write_table} as sq),
        wr_reply = '',
        wr_comment = 0,
        wr_is_comment = 0,
        ca_name = '{$ca_name}',
        wr_option = 'html1',
        wr_subject = '{$wr_subject}',
        wr_content = '{$wr_content}',
        wr_seo_title = '{$wr_seo_title}',
        wr_hit = 0,
        mb_id = '{$mb_id}',
        wr_password = '',
        wr_name = '{$wr_name}',
        wr_email = '',
        wr_homepage = '',
        wr_datetime = '{$wr_datetime}',
        wr_last = '{$wr_datetime}',
        wr_ip = '{$wr_ip}',
        wr_1 = '{$wr_1}',
        wr_2 = '{$wr_2}',
        wr_3 = '{$wr_3}' ";
    sql_query($sql);
    $wr_id = sql_insert_id();
    if (!$wr_id) {
        return 0;
    }

    sql_query(" update {$write_table} set wr_parent = '{$wr_id}' where wr_id = '{$wr_id}' ");
    sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id )
        values ( '{$bo_table}', '{$wr_id}', '{$wr_id}', '{$wr_datetime}', '{$mb_id}' ) ");
    sql_query(" update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}' ");

    return $wr_id;
}

// ── 1. 게시판 존재 확인 / 생성 ──
$row = sql_fetch(" select bo_table, gr_id from {$g5['board_table']} where bo_table = '{$bo_table}' ");

if (empty($row['bo_table'])) {
    $ref = sql_fetch(" select gr_id from {$g5['board_table']} where bo_table = 'column' limit 1 ");
    if (empty($ref['gr_id'])) {
        $ref = sql_fetch(" select gr_id from {$g5['board_table']} where bo_table = 'notice' limit 1 ");
    }
    $gr_id = !empty($ref['gr_id']) ? $ref['gr_id'] : 'community';
    $gr_id = headnerve_reviews_escape($gr_id);

    $sql = " insert into {$g5['board_table']} set
        bo_table = '{$bo_table}',
        gr_id = '{$gr_id}',
        bo_subject = '".headnerve_reviews_escape($bo_subject)."',
        bo_count_write = '0',
        bo_count_comment = '0',
        bo_device = 'both',
        bo_list_level = '1',
        bo_read_level = '1',
        bo_write_level = '10',
        bo_reply_level = '10',
        bo_comment_level = '10',
        bo_upload_level = '10',
        bo_download_level = '1',
        bo_use_category = '1',
        bo_category_list = '".headnerve_reviews_escape($bo_category_list)."',
        bo_use_dhtml_editor = '1',
        bo_skin = '".headnerve_reviews_escape($bo_skin)."',
        bo_mobile_skin = '".headnerve_reviews_escape($bo_mobile_skin)."',
        bo_include_head = '',
        bo_include_tail = '',
        bo_page_rows = '12',
        bo_upload_count = '3',
        bo_upload_size = '10485760',
        bo_gallery_width = '480',
        bo_gallery_height = '640',
        bo_image_width = '760',
        bo_use_search = '1',
        bo_1_subj = '".headnerve_reviews_escape($extra_fields['wr_1'])."',
        bo_2_subj = '".headnerve_reviews_escape($extra_fields['wr_2'])."',
        bo_3_subj = '".headnerve_reviews_escape($extra_fields['wr_3'])."' ";
    sql_query($sql);

    if (headnerve_reviews_create_board($bo_table, $gr_id)) {
        headnerve_reviews_log($results, 'create', 'ok', 'reviews 게시판 및 write 테이블 생성 완료');
    } else {
        headnerve_reviews_log($results, 'create', 'warn', '게시판 레코드는 생성됐으나 write 테이블 생성 파일을 찾지 못했습니다.');
    }
} else {
    headnerve_reviews_log($results, 'create', 'skip', 'reviews 게시판이 이미 존재합니다.');
}

// ── 2. 설정 갱신 ──
sql_query(headnerve_reviews_board_update_sql($bo_table, $bo_subject, $bo_skin, $bo_mobile_skin, $bo_category_list, $extra_fields));
headnerve_reviews_log($results, 'config', 'ok', '스킨·분류·여분필드·권한 설정 갱신');

// ── 3. 샘플 글 시드 ──
$write_table = $g5['write_prefix'].$bo_table;
$cnt_row = sql_fetch(" select count(*) as cnt from {$write_table} where wr_is_comment = 0 ");
$post_count = isset($cnt_row['cnt']) ? (int) $cnt_row['cnt'] : 0;

if ($post_count === 0) {
    $admin_mb = sql_fetch(" select mb_id from {$g5['member_table']} where mb_level = 10 order by mb_datetime asc limit 1 ");
    $seed_mb_id = !empty($admin_mb['mb_id']) ? $admin_mb['mb_id'] : 'admin';
    $seeded = 0;

    foreach (headnerve_reviews_sample_posts() as $post) {
        $wr_id = headnerve_reviews_insert_post($bo_table, $post, $seed_mb_id);
        if ($wr_id) {
            $seeded++;
        }
    }

    headnerve_reviews_log($results, 'seed', 'ok', "샘플 치료후기 {$seeded}건 등록");
} else {
    headnerve_reviews_log($results, 'seed', 'skip', "기존 글 {$post_count}건 있음 — 샘플 글 생략");
}

$list_url = G5_BBS_URL.'/board.php?bo_table='.$bo_table;
$sync_url = G5_URL.'/setup/tools/headnerve-sync-community-boards.php';

$g5['title'] = '치료후기 게시판 프로비저닝';
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
.provision-result__actions a.secondary { background: #fff; color: #0f172a; border: 1px solid #cbd5e1; }
</style>
<div class="provision-result">
    <h1>치료후기(reviews) 프로비저닝</h1>
    <p>게시판 생성·설정·샘플 글 등록 결과입니다.</p>
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
    <p><strong>다음 단계</strong></p>
    <ul>
        <li>샘플 썸네일: <a href="<?php echo G5_URL; ?>/setup/tools/headnerve-seed-reviews-images.php">이미지 첨부 스크립트</a> 실행 (최고관리자 1회)</li>
        <li>React 헤더 반영: 관리자 → 빌더 ZIP 업로드 (<code>headnerve-main.zip</code>)</li>
    </ul>
    <div class="provision-result__actions">
        <a href="<?php echo $list_url; ?>">치료후기 목록 보기</a>
        <a href="<?php echo $sync_url; ?>" class="secondary">스킨 동기화</a>
        <a href="<?php echo G5_ADMIN_URL; ?>/board_form.php?w=u&amp;bo_table=reviews" class="secondary">게시판 설정</a>
    </div>
</div>
<?php
include_once(G5_PATH.'/tail.sub.php');
