<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 맥락 블로그 latest (카테고리 필터 지원)
 */
if (!function_exists('maekrak_latest_blog')) {
    function maekrak_latest_blog($category = '', $rows = 4, $subject_len = 80)
    {
        if (!function_exists('latest')) {
            echo '<p class="maekrak-cond-blog-empty">관련 글이 준비 중입니다.</p>';
            return;
        }

        $bo_table = defined('MK_BLOG_BOARD') ? MK_BLOG_BOARD : 'blog';
        $board = function_exists('get_board_db') ? get_board_db($bo_table, true) : array();

        if (empty($board['bo_table'])) {
            echo '<p class="maekrak-cond-blog-empty">관련 글이 준비 중입니다.</p>';
            return;
        }

        $category = trim($category);
        if ($category === '') {
            echo latest('theme/maekrak_blog', $bo_table, $rows, $subject_len);
            return;
        }

        global $g5;

        $skin_path = G5_THEME_PATH . '/' . G5_SKIN_DIR . '/latest/maekrak_blog';
        $skin_url = str_replace(G5_PATH, G5_URL, $skin_path);
        $bo_subject = get_text($board['bo_subject']);
        $write_table = $g5['write_prefix'] . $bo_table;
        $esc_cat = sql_escape_string($category);
        $rows = (int) $rows;
        $list = array();

        $sql = " SELECT * FROM {$write_table}
            WHERE wr_is_comment = 0 AND ca_name = '{$esc_cat}'
            ORDER BY wr_num LIMIT 0, {$rows} ";
        $result = sql_query($sql);

        for ($i = 0; $row = sql_fetch_array($result); $i++) {
            unset($row['wr_password']);
            $row['wr_email'] = '';
            if (strpos($row['wr_option'], 'secret') !== false) {
                $row['wr_content'] = $row['wr_link1'] = $row['wr_link2'] = '';
                $row['file'] = array('count' => 0);
            }
            $list[$i] = get_list($row, $board, $skin_url, $subject_len);
            $list[$i]['bo_table'] = $bo_table;
        }

        if (empty($list)) {
            $sql = " SELECT * FROM {$write_table}
                WHERE wr_is_comment = 0
                ORDER BY wr_num LIMIT 0, {$rows} ";
            $result = sql_query($sql);
            for ($i = 0; $row = sql_fetch_array($result); $i++) {
                unset($row['wr_password']);
                $row['wr_email'] = '';
                $list[$i] = get_list($row, $board, $skin_url, $subject_len);
                $list[$i]['bo_table'] = $bo_table;
            }
        }

        $bo_table = $board['bo_table'];
        include $skin_path . '/latest.skin.php';
    }
}
