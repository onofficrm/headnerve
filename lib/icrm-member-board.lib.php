<?php
/**
 * iCRM 회원 — 게시판 추가 (템플릿 프로비저닝)
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('icrm_member_board_log_file')) {
    function icrm_member_board_log_file()
    {
        $dir = G5_DATA_PATH . '/icrm-member';
        if (!is_dir($dir)) {
            @mkdir($dir, G5_DIR_PERMISSION, true);
        }

        return $dir . '/board-log.json';
    }
}

if (!function_exists('icrm_member_board_read_log')) {
    function icrm_member_board_read_log()
    {
        $file = icrm_member_board_log_file();
        if (!is_file($file)) {
            return array();
        }
        $decoded = json_decode((string) file_get_contents($file), true);

        return is_array($decoded) ? $decoded : array();
    }
}

if (!function_exists('icrm_member_board_write_log')) {
    function icrm_member_board_write_log(array $log)
    {
        file_put_contents(
            icrm_member_board_log_file(),
            json_encode($log, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            LOCK_EX
        );
    }
}

if (!function_exists('icrm_member_board_month_count')) {
    function icrm_member_board_month_count($mb_id = '')
    {
        $mb_id = trim((string) $mb_id);
        $ym = date('Y-m');
        $count = 0;
        foreach (icrm_member_board_read_log() as $row) {
            if (!is_array($row)) {
                continue;
            }
            if ($mb_id !== '' && isset($row['mb_id']) && (string) $row['mb_id'] !== $mb_id) {
                continue;
            }
            if (isset($row['created_at']) && strpos((string) $row['created_at'], $ym) === 0) {
                $count++;
            }
        }

        return $count;
    }
}

if (!function_exists('icrm_member_board_templates')) {
    function icrm_member_board_templates()
    {
        return array(
            'column' => array(
                'label'            => '칼럼 · 블로그',
                'skin'             => 'basic-clean',
                'mobile_skin'      => 'basic-clean',
                'use_category'     => '0',
                'category_list'    => '',
                'bo_comment_level' => '1',
            ),
            'faq' => array(
                'label'            => 'FAQ',
                'skin'             => 'faq-accordion',
                'mobile_skin'      => 'faq-accordion',
                'use_category'     => '0',
                'category_list'    => '',
                'bo_comment_level' => '1',
            ),
            'reviews' => array(
                'label'            => '후기 · 리뷰',
                'skin'             => 'reviews',
                'mobile_skin'      => 'reviews',
                'use_category'     => '1',
                'category_list'    => '일반|추천',
                'bo_comment_level' => '0',
            ),
            'inquiry' => array(
                'label'            => '문의 · 상담',
                'skin'             => 'landing-inquiry',
                'mobile_skin'      => 'landing-inquiry',
                'use_category'     => '0',
                'category_list'    => '',
                'bo_comment_level' => '0',
            ),
        );
    }
}

if (!function_exists('icrm_member_board_skin_exists')) {
    function icrm_member_board_skin_exists($skin)
    {
        $skin = preg_replace('/[^a-z0-9_-]/i', '', (string) $skin);
        if ($skin === '') {
            return false;
        }

        return is_dir(G5_SKIN_PATH . '/board/' . $skin)
            || is_dir(G5_MOBILE_PATH . '/skin/board/' . $skin);
    }
}

if (!function_exists('icrm_member_board_resolve_skin')) {
    function icrm_member_board_resolve_skin($skin)
    {
        if (icrm_member_board_skin_exists($skin)) {
            return $skin;
        }

        return 'basic-clean';
    }
}

if (!function_exists('icrm_member_board_create_table')) {
    function icrm_member_board_create_table($bo_table)
    {
        global $g5;

        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $bo_table));
        if ($bo_table === '') {
            return false;
        }

        $admin_dir = defined('G5_ADMIN_DIR') ? G5_ADMIN_DIR : 'adm';
        $sql_file = G5_PATH . '/' . $admin_dir . '/sql_write.sql';
        if (!is_file($sql_file)) {
            return false;
        }

        $file = file($sql_file);
        if (!is_array($file)) {
            return false;
        }
        if (function_exists('get_db_create_replace')) {
            $file = get_db_create_replace($file);
        }
        $sql = implode("\n", $file);
        $create_table = $g5['write_prefix'] . $bo_table;
        $sql = preg_replace(array('/__TABLE_NAME__/', '/;/'), array($create_table, ''), $sql);
        sql_query($sql, false);

        $board_path = G5_DATA_PATH . '/file/' . $bo_table;
        @mkdir($board_path, G5_DIR_PERMISSION, true);
        @chmod($board_path, G5_DIR_PERMISSION);
        $index_file = $board_path . '/index.php';
        if ($fp = @fopen($index_file, 'w')) {
            @fwrite($fp, '');
            @fclose($fp);
            @chmod($index_file, G5_FILE_PERMISSION);
        }

        return true;
    }
}

if (!function_exists('icrm_member_board_create')) {
    /**
     * @param array $input bo_table, bo_subject, template, mb_id
     * @return array
     */
    function icrm_member_board_create(array $input)
    {
        global $g5, $member;

        if (!function_exists('icrm_member_can_boards') || !icrm_member_can_boards()) {
            return array('success' => false, 'message' => '게시판 추가 권한이 없습니다.');
        }

        $mb_id = isset($input['mb_id']) ? trim((string) $input['mb_id']) : '';
        if ($mb_id === '' && !empty($member['mb_id'])) {
            $mb_id = (string) $member['mb_id'];
        }

        $max = icrm_member_board_max_per_month();
        if (icrm_member_board_month_count($mb_id) >= $max) {
            return array(
                'success' => false,
                'message' => '이번 달 게시판 추가 한도(' . $max . '개)를 초과했습니다.',
            );
        }

        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower(trim((string) ($input['bo_table'] ?? ''))));
        $bo_subject = trim(strip_tags((string) ($input['bo_subject'] ?? '')));
        $template_key = preg_replace('/[^a-z_]/', '', (string) ($input['template'] ?? 'column'));

        if ($bo_table === '' || strlen($bo_table) < 2 || strlen($bo_table) > 20) {
            return array('success' => false, 'message' => '게시판 ID는 영문 소문자·숫자·_ 2~20자여야 합니다.');
        }
        if ($bo_subject === '') {
            return array('success' => false, 'message' => '게시판 이름을 입력하세요.');
        }

        $templates = icrm_member_board_templates();
        if (!isset($templates[$template_key])) {
            $template_key = 'column';
        }
        $tpl = $templates[$template_key];

        $exists = sql_fetch(" select bo_table from {$g5['board_table']} where bo_table = '" . sql_real_escape_string($bo_table) . "' ");
        if (!empty($exists['bo_table'])) {
            return array('success' => false, 'message' => '이미 사용 중인 게시판 ID입니다.');
        }

        $skin = icrm_member_board_resolve_skin($tpl['skin']);
        $mobile_skin = icrm_member_board_resolve_skin($tpl['mobile_skin']);

        $gr_id = 'community';
        $gr = sql_fetch(" select gr_id from {$g5['group_table']} where gr_id = '" . sql_real_escape_string($gr_id) . "' ");
        if (empty($gr['gr_id'])) {
            $gr_id = '';
        }

        sql_query(" insert into {$g5['board_table']}
            set bo_table = '" . sql_real_escape_string($bo_table) . "',
                gr_id = '" . sql_real_escape_string($gr_id) . "',
                bo_subject = '" . sql_real_escape_string($bo_subject) . "',
                bo_mobile_subject = '" . sql_real_escape_string($bo_subject) . "',
                bo_device = 'both',
                bo_admin = '',
                bo_list_level = '1',
                bo_read_level = '1',
                bo_write_level = '2',
                bo_reply_level = '10',
                bo_comment_level = '" . sql_real_escape_string((string) $tpl['bo_comment_level']) . "',
                bo_upload_level = '10',
                bo_download_level = '1',
                bo_use_category = '" . sql_real_escape_string((string) $tpl['use_category']) . "',
                bo_category_list = '" . sql_real_escape_string((string) $tpl['category_list']) . "',
                bo_use_dhtml_editor = '1',
                bo_use_secret = '0',
                bo_use_comment = '" . ($tpl['bo_comment_level'] === '0' ? '0' : '1') . "',
                bo_use_search = '1',
                bo_skin = '" . sql_real_escape_string($skin) . "',
                bo_mobile_skin = '" . sql_real_escape_string($mobile_skin) . "',
                bo_order = '0' ", false);

        if (!icrm_member_board_create_table($bo_table)) {
            sql_query(" delete from {$g5['board_table']} where bo_table = '" . sql_real_escape_string($bo_table) . "' ");
            return array('success' => false, 'message' => '게시판 테이블 생성에 실패했습니다.');
        }

        $log = icrm_member_board_read_log();
        $log[] = array(
            'bo_table'    => $bo_table,
            'bo_subject'  => $bo_subject,
            'template'    => $template_key,
            'mb_id'       => $mb_id,
            'created_at'  => date('Y-m-d H:i:s'),
        );
        icrm_member_board_write_log($log);

        $board_url = G5_BBS_URL . '/board.php?bo_table=' . rawurlencode($bo_table);

        return array(
            'success'    => true,
            'message'    => '게시판이 생성되었습니다.',
            'bo_table'   => $bo_table,
            'bo_subject' => $bo_subject,
            'board_url'  => $board_url,
            'write_url'  => G5_BBS_URL . '/write.php?bo_table=' . rawurlencode($bo_table),
        );
    }
}

if (!function_exists('icrm_member_board_list_recent')) {
    function icrm_member_board_list_recent($limit = 10)
    {
        $log = icrm_member_board_read_log();
        usort($log, function ($a, $b) {
            return strcmp((string) ($b['created_at'] ?? ''), (string) ($a['created_at'] ?? ''));
        });

        return array_slice($log, 0, max(1, (int) $limit));
    }
}

if (!function_exists('icrm_member_board_guess_template')) {
    function icrm_member_board_guess_template(array $board_row)
    {
        $skin = isset($board_row['bo_skin']) ? (string) $board_row['bo_skin'] : '';
        foreach (icrm_member_board_templates() as $key => $tpl) {
            if ($skin === $tpl['skin'] || $skin === $tpl['mobile_skin']) {
                return $key;
            }
        }

        return isset($board_row['template']) ? (string) $board_row['template'] : 'column';
    }
}

if (!function_exists('icrm_member_board_can_publish_to')) {
    function icrm_member_board_can_publish_to($bo_table, $mb_id = '')
    {
        return icrm_member_board_can_manage($bo_table, $mb_id);
    }
}

if (!function_exists('icrm_member_board_categories')) {
    function icrm_member_board_categories($bo_table)
    {
        $board = icrm_member_board_fetch($bo_table);
        if (empty($board['bo_table']) || empty($board['bo_use_category']) || (string) $board['bo_use_category'] === '0') {
            return array();
        }

        $categories = array();
        foreach (explode('|', (string) ($board['bo_category_list'] ?? '')) as $cat) {
            $cat = trim($cat);
            if ($cat !== '') {
                $categories[] = $cat;
            }
        }

        return $categories;
    }
}

if (!function_exists('icrm_member_board_can_manage')) {
    function icrm_member_board_can_manage($bo_table, $mb_id = '')
    {
        global $is_admin, $member;

        if (!function_exists('icrm_member_can_boards') || !icrm_member_can_boards()) {
            return false;
        }

        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $bo_table));
        if ($bo_table === '') {
            return false;
        }

        if ($is_admin === 'super') {
            return true;
        }

        $mb_id = trim((string) $mb_id);
        if ($mb_id === '' && !empty($member['mb_id'])) {
            $mb_id = (string) $member['mb_id'];
        }
        if ($mb_id === '') {
            return false;
        }

        foreach (icrm_member_board_read_log() as $row) {
            if (!is_array($row) || empty($row['bo_table'])) {
                continue;
            }
            if (preg_replace('/[^a-z0-9_]/', '', strtolower((string) $row['bo_table'])) !== $bo_table) {
                continue;
            }

            return isset($row['mb_id']) && (string) $row['mb_id'] === $mb_id;
        }

        return false;
    }
}

if (!function_exists('icrm_member_board_fetch')) {
    function icrm_member_board_fetch($bo_table)
    {
        global $g5;

        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $bo_table));
        if ($bo_table === '') {
            return array();
        }

        $board = sql_fetch(" select bo_table, bo_subject, bo_mobile_subject, bo_skin, bo_mobile_skin,
                                    bo_use_category, bo_category_list, bo_use_comment
                             from {$g5['board_table']}
                             where bo_table = '" . sql_real_escape_string($bo_table) . "' ");

        return is_array($board) ? $board : array();
    }
}

if (!function_exists('icrm_member_board_list_manageable')) {
    function icrm_member_board_list_manageable($mb_id = '', $limit = 50)
    {
        global $member, $is_admin;

        $mb_id = trim((string) $mb_id);
        if ($mb_id === '' && !empty($member['mb_id'])) {
            $mb_id = (string) $member['mb_id'];
        }

        $rows = array();
        foreach (icrm_member_board_read_log() as $log_row) {
            if (!is_array($log_row) || empty($log_row['bo_table'])) {
                continue;
            }

            if ($is_admin !== 'super') {
                if ($mb_id === '' || (string) ($log_row['mb_id'] ?? '') !== $mb_id) {
                    continue;
                }
            }

            $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $log_row['bo_table']));
            if ($bo_table === '') {
                continue;
            }

            $board = icrm_member_board_fetch($bo_table);
            if (empty($board['bo_table'])) {
                continue;
            }

            $rows[] = array(
                'bo_table'         => $bo_table,
                'bo_subject'       => (string) ($board['bo_subject'] ?? $log_row['bo_subject'] ?? $bo_table),
                'bo_mobile_subject'=> (string) ($board['bo_mobile_subject'] ?? $board['bo_subject'] ?? ''),
                'template'         => icrm_member_board_guess_template(array_merge($log_row, $board)),
                'mb_id'            => (string) ($log_row['mb_id'] ?? ''),
                'created_at'       => (string) ($log_row['created_at'] ?? ''),
                'updated_at'       => (string) ($log_row['updated_at'] ?? ''),
                'board_url'        => G5_BBS_URL . '/board.php?bo_table=' . rawurlencode($bo_table),
            );
        }

        usort($rows, function ($a, $b) {
            $a_ts = (string) ($a['updated_at'] ?: $a['created_at']);
            $b_ts = (string) ($b['updated_at'] ?: $b['created_at']);

            return strcmp($b_ts, $a_ts);
        });

        return array_slice($rows, 0, max(1, (int) $limit));
    }
}

if (!function_exists('icrm_member_board_update_log_entry')) {
    function icrm_member_board_update_log_entry($bo_table, array $changes)
    {
        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $bo_table));
        if ($bo_table === '') {
            return;
        }

        $log = icrm_member_board_read_log();
        foreach ($log as $idx => $row) {
            if (!is_array($row) || empty($row['bo_table'])) {
                continue;
            }
            if (preg_replace('/[^a-z0-9_]/', '', strtolower((string) $row['bo_table'])) !== $bo_table) {
                continue;
            }
            foreach ($changes as $key => $value) {
                $log[$idx][$key] = $value;
            }
            $log[$idx]['updated_at'] = date('Y-m-d H:i:s');
            icrm_member_board_write_log($log);
            return;
        }
    }
}

if (!function_exists('icrm_member_board_update')) {
    /**
     * @param array $input bo_table, bo_subject, template, mb_id
     * @return array
     */
    function icrm_member_board_update(array $input)
    {
        global $g5, $member;

        $mb_id = isset($input['mb_id']) ? trim((string) $input['mb_id']) : '';
        if ($mb_id === '' && !empty($member['mb_id'])) {
            $mb_id = (string) $member['mb_id'];
        }

        $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower(trim((string) ($input['bo_table'] ?? ''))));
        $bo_subject = trim(strip_tags((string) ($input['bo_subject'] ?? '')));
        $template_key = preg_replace('/[^a-z_]/', '', (string) ($input['template'] ?? ''));

        if ($bo_table === '') {
            return array('success' => false, 'message' => '게시판 ID가 없습니다.');
        }
        if ($bo_subject === '') {
            return array('success' => false, 'message' => '게시판 이름을 입력하세요.');
        }
        if (!icrm_member_board_can_manage($bo_table, $mb_id)) {
            return array('success' => false, 'message' => '이 게시판을 수정할 권한이 없습니다.');
        }

        $board = icrm_member_board_fetch($bo_table);
        if (empty($board['bo_table'])) {
            return array('success' => false, 'message' => '게시판을 찾을 수 없습니다.');
        }

        $templates = icrm_member_board_templates();
        if ($template_key === '' || !isset($templates[$template_key])) {
            $template_key = icrm_member_board_guess_template($board);
        }
        $tpl = $templates[$template_key];

        $skin = icrm_member_board_resolve_skin($tpl['skin']);
        $mobile_skin = icrm_member_board_resolve_skin($tpl['mobile_skin']);

        sql_query(" update {$g5['board_table']}
            set bo_subject = '" . sql_real_escape_string($bo_subject) . "',
                bo_mobile_subject = '" . sql_real_escape_string($bo_subject) . "',
                bo_comment_level = '" . sql_real_escape_string((string) $tpl['bo_comment_level']) . "',
                bo_use_category = '" . sql_real_escape_string((string) $tpl['use_category']) . "',
                bo_category_list = '" . sql_real_escape_string((string) $tpl['category_list']) . "',
                bo_use_comment = '" . ($tpl['bo_comment_level'] === '0' ? '0' : '1') . "',
                bo_skin = '" . sql_real_escape_string($skin) . "',
                bo_mobile_skin = '" . sql_real_escape_string($mobile_skin) . "'
            where bo_table = '" . sql_real_escape_string($bo_table) . "' ", false);

        icrm_member_board_update_log_entry($bo_table, array(
            'bo_subject' => $bo_subject,
            'template'   => $template_key,
        ));

        $board_url = G5_BBS_URL . '/board.php?bo_table=' . rawurlencode($bo_table);

        return array(
            'success'    => true,
            'message'    => '게시판이 수정되었습니다.',
            'bo_table'   => $bo_table,
            'bo_subject' => $bo_subject,
            'template'   => $template_key,
            'board_url'  => $board_url,
        );
    }
}
