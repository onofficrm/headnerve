<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('headnerve_board_meta_tables')) {
    /**
     * 작성일·조회수 수정 허용 게시판 (후기, 블로그/컬럼, 뉴스)
     *
     * @return string[]
     */
    function headnerve_board_meta_tables()
    {
        return array('reviews', 'column', 'news');
    }
}

if (!function_exists('headnerve_board_meta_editable')) {
    function headnerve_board_meta_editable($bo_table = '')
    {
        if ($bo_table === '') {
            global $bo_table;
        }

        $bo_table = preg_replace('/[^a-z0-9_]/i', '', (string) $bo_table);

        return $bo_table !== '' && in_array($bo_table, headnerve_board_meta_tables(), true);
    }
}

if (!function_exists('headnerve_board_meta_can_edit')) {
    function headnerve_board_meta_can_edit($bo_table = '')
    {
        global $is_admin, $member, $config;

        if (!headnerve_board_meta_editable($bo_table)) {
            return false;
        }

        if (!empty($is_admin)) {
            return true;
        }

        if (!empty($member['mb_id']) && !empty($config['cf_admin']) && $member['mb_id'] === $config['cf_admin']) {
            return true;
        }

        if (!empty($member['mb_id']) && is_file(G5_LIB_PATH.'/icrm-member-board.lib.php')) {
            include_once G5_LIB_PATH.'/icrm-member-board.lib.php';
            if (function_exists('icrm_member_board_can_publish_to') && icrm_member_board_can_publish_to($bo_table, $member['mb_id'])) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('headnerve_board_meta_can_edit_any')) {
    function headnerve_board_meta_can_edit_any()
    {
        foreach (headnerve_board_meta_tables() as $bo_table) {
            if (headnerve_board_meta_can_edit($bo_table)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('headnerve_board_meta_datetime_local')) {
    function headnerve_board_meta_datetime_local($datetime = '')
    {
        $datetime = trim((string) $datetime);
        if ($datetime === '' || $datetime === '0000-00-00 00:00:00') {
            return '';
        }

        $ts = strtotime($datetime);
        if ($ts === false) {
            return '';
        }

        return date('Y-m-d\TH:i', $ts);
    }
}

if (!function_exists('headnerve_board_meta_normalize_datetime')) {
    function headnerve_board_meta_normalize_datetime($value)
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        $value = str_replace('T', ' ', $value);
        if (preg_match('/^\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}$/', $value)) {
            $value .= ':00';
        }

        $ts = strtotime($value);
        if ($ts === false) {
            return '';
        }

        return date('Y-m-d H:i:s', $ts);
    }
}

if (!function_exists('headnerve_board_apply_meta_values')) {
    function headnerve_board_apply_meta_values($bo_table, $wr_id, $datetime = null, $hit = null)
    {
        global $g5;

        $bo_table = preg_replace('/[^a-z0-9_]/i', '', (string) $bo_table);
        $wr_id = (int) $wr_id;

        if (!headnerve_board_meta_editable($bo_table) || $wr_id < 1) {
            return false;
        }

        $sets = array();
        $normalized_datetime = '';

        if ($datetime !== null) {
            $normalized_datetime = headnerve_board_meta_normalize_datetime($datetime);
            if ($normalized_datetime !== '') {
                $sets[] = "wr_datetime = '".sql_real_escape_string($normalized_datetime)."'";
                $sets[] = "wr_last = '".sql_real_escape_string($normalized_datetime)."'";
            }
        }

        if ($hit !== null && $hit !== '') {
            $sets[] = "wr_hit = '".max(0, (int) $hit)."'";
        }

        if ($sets === array()) {
            return false;
        }

        $write_table = $g5['write_prefix'].$bo_table;
        sql_query(' update '.$write_table.' set '.implode(', ', $sets)." where wr_id = '{$wr_id}' ");

        if ($normalized_datetime !== '') {
            sql_query(" update {$g5['board_new_table']}
                           set bn_datetime = '".sql_real_escape_string($normalized_datetime)."'
                         where bo_table = '".sql_real_escape_string($bo_table)."'
                           and wr_id = '{$wr_id}' ");
        }

        return true;
    }
}

if (!function_exists('headnerve_board_meta_from_request')) {
    function headnerve_board_meta_from_request()
    {
        $datetime = null;
        $hit = null;

        if (isset($_POST['g5b_wr_datetime'])) {
            $datetime = (string) $_POST['g5b_wr_datetime'];
        }
        if (isset($_POST['g5b_wr_hit']) && $_POST['g5b_wr_hit'] !== '') {
            $hit = (int) $_POST['g5b_wr_hit'];
        }

        return array(
            'datetime' => $datetime,
            'hit'      => $hit,
        );
    }
}

if (!function_exists('headnerve_board_apply_meta_on_write')) {
    function headnerve_board_apply_meta_on_write($board, $wr_id, $w, $qstr, $redirect_url)
    {
        if (!is_array($board) || empty($board['bo_table'])) {
            return;
        }

        $bo_table = preg_replace('/[^a-z0-9_]/i', '', (string) $board['bo_table']);
        $wr_id = (int) $wr_id;

        if (!headnerve_board_meta_can_edit($bo_table) || $wr_id < 1) {
            return;
        }

        $meta = headnerve_board_meta_from_request();
        headnerve_board_apply_meta_values($bo_table, $wr_id, $meta['datetime'], $meta['hit']);
    }
}

if (!function_exists('headnerve_board_meta_publish_options')) {
    /**
     * iCRM 발행 시 작성일·조회수 옵션 (compose_publish)
     */
    function headnerve_board_meta_publish_options($bo_table = '')
    {
        if ($bo_table === '' && isset($_POST['bo_table'])) {
            $bo_table = (string) $_POST['bo_table'];
        }

        $bo_table = preg_replace('/[^a-z0-9_]/i', '', (string) $bo_table);
        if (!headnerve_board_meta_can_edit($bo_table)) {
            return array();
        }

        $meta = headnerve_board_meta_from_request();

        return array(
            'board_meta' => array(
                'wr_datetime' => $meta['datetime'],
                'wr_hit'      => $meta['hit'],
            ),
        );
    }
}
