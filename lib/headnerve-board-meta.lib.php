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
        global $is_admin;

        return !empty($is_admin) && headnerve_board_meta_editable($bo_table);
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

if (!function_exists('headnerve_board_apply_meta_on_write')) {
    function headnerve_board_apply_meta_on_write($board, $wr_id, $w, $qstr, $redirect_url)
    {
        global $g5, $is_admin;

        if (empty($is_admin) || !is_array($board) || empty($board['bo_table'])) {
            return;
        }

        $bo_table = preg_replace('/[^a-z0-9_]/i', '', (string) $board['bo_table']);
        $wr_id = (int) $wr_id;

        if (!headnerve_board_meta_editable($bo_table) || $wr_id < 1) {
            return;
        }

        $sets = array();

        if (isset($_POST['g5b_wr_datetime'])) {
            $datetime = headnerve_board_meta_normalize_datetime($_POST['g5b_wr_datetime']);
            if ($datetime !== '') {
                $sets[] = "wr_datetime = '".sql_real_escape_string($datetime)."'";
            }
        }

        if (isset($_POST['g5b_wr_hit']) && $_POST['g5b_wr_hit'] !== '') {
            $hit = max(0, (int) $_POST['g5b_wr_hit']);
            $sets[] = "wr_hit = '{$hit}'";
        }

        if ($sets === array()) {
            return;
        }

        $write_table = $g5['write_prefix'].$bo_table;
        sql_query(' update '.$write_table.' set '.implode(', ', $sets)." where wr_id = '{$wr_id}' ");

        if (isset($datetime) && $datetime !== '') {
            sql_query(" update {$g5['board_new_table']}
                           set bn_datetime = '".sql_real_escape_string($datetime)."'
                         where bo_table = '".sql_real_escape_string($bo_table)."'
                           and wr_id = '{$wr_id}' ");
        }
    }
}
