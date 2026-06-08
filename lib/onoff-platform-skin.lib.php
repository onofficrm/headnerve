<?php
/**
 * 온오프 그누보드 플랫폼 스킨 — 적용 · 상태
 * @onoff-platform-managed
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('onoff_platform_skin_id_member')) {
    function onoff_platform_skin_id_member()
    {
        return 'onoff';
    }
}

if (!function_exists('onoff_platform_skin_id_board_column')) {
    function onoff_platform_skin_id_board_column()
    {
        return 'onoff-column';
    }
}

if (!function_exists('onoff_platform_skin_member_exists')) {
    function onoff_platform_skin_member_exists()
    {
        return is_dir(G5_SKIN_PATH . '/member/' . onoff_platform_skin_id_member());
    }
}

if (!function_exists('onoff_platform_skin_board_exists')) {
    function onoff_platform_skin_board_exists($skin_id = '')
    {
        $skin_id = $skin_id !== '' ? $skin_id : onoff_platform_skin_id_board_column();

        return is_dir(G5_SKIN_PATH . '/board/' . preg_replace('/[^a-z0-9_-]/', '', $skin_id));
    }
}

if (!function_exists('onoff_platform_skin_get_status')) {
    function onoff_platform_skin_get_status()
    {
        global $config;

        $member_skin = onoff_platform_skin_id_member();
        $board_skin = onoff_platform_skin_id_board_column();
        $member_applied = isset($config['cf_member_skin']) && (string) $config['cf_member_skin'] === $member_skin;
        $mobile_applied = isset($config['cf_mobile_member_skin']) && (string) $config['cf_mobile_member_skin'] === $member_skin;

        if (function_exists('g5site_cfg')) {
            $cfg_member = trim(g5site_cfg('platform_member_skin', ''));
            if ($cfg_member === $member_skin) {
                $member_applied = true;
                $mobile_applied = true;
            }
        }

        $board_count = 0;
        if (is_file(G5_LIB_PATH . '/icrm-member-board.lib.php')) {
            include_once G5_LIB_PATH . '/icrm-member-board.lib.php';
            if (function_exists('icrm_member_board_read_log')) {
                foreach (icrm_member_board_read_log() as $row) {
                    if (!is_array($row) || empty($row['bo_table'])) {
                        continue;
                    }
                    $board_count++;
                }
            }
        }

        return array(
            'ready'            => onoff_platform_skin_member_exists() && onoff_platform_skin_board_exists(),
            'member_skin'      => $member_skin,
            'board_skin'       => $board_skin,
            'member_applied'   => $member_applied && $mobile_applied,
            'member_files_ok'  => onoff_platform_skin_member_exists(),
            'board_files_ok'   => onoff_platform_skin_board_exists(),
            'board_log_count'  => $board_count,
            'login_url'        => defined('G5_BBS_URL') ? G5_BBS_URL . '/login.php' : '/bbs/login.php',
            'register_url'     => defined('G5_BBS_URL') ? G5_BBS_URL . '/register.php' : '/bbs/register.php',
            'applied_at'       => function_exists('g5site_cfg') ? trim(g5site_cfg('platform_skin_applied_at', '')) : '',
        );
    }
}

if (!function_exists('onoff_platform_skin_can_apply')) {
    function onoff_platform_skin_can_apply()
    {
        global $is_admin;

        return $is_admin === 'super';
    }
}

if (!function_exists('onoff_platform_skin_write_site_config')) {
    function onoff_platform_skin_write_site_config(array $pairs)
    {
        $path = G5_PATH . '/_site.config.php';
        if (!is_file($path) || !is_writable($path)) {
            return false;
        }

        $contents = (string) file_get_contents($path);
        foreach ($pairs as $key => $value) {
            $key = preg_replace('/[^a-z0-9_]/', '', (string) $key);
            if ($key === '') {
                continue;
            }
            $line = "    '" . $key . "' => '" . str_replace("'", "\\'", (string) $value) . "',";
            $pattern = "/'" . preg_quote($key, '/') . "'\\s*=>/";
            if (preg_match($pattern, $contents)) {
                $contents = preg_replace(
                    "/\\s*'" . preg_quote($key, '/') . "'\\s*=>[^,\\n]*,/",
                    "\n" . $line,
                    $contents,
                    1
                );
            } else {
                $marker = "\n);\n\n/**";
                if (strpos($contents, $marker) !== false) {
                    $block = "\n    /* onoff-platform-skin */\n" . $line . "\n";
                    $contents = str_replace($marker, $block . $marker, $contents);
                }
            }
        }

        return file_put_contents($path, $contents, LOCK_EX) !== false;
    }
}

if (!function_exists('onoff_platform_skin_apply')) {
    /**
     * 플랫폼 기본 스킨 적용 (회원 스킨 + 회원이 만든 게시판 onoff-column)
     *
     * @param array $options apply_boards(bool)
     * @return array
     */
    function onoff_platform_skin_apply(array $options = array())
    {
        global $g5, $config;

        if (!onoff_platform_skin_can_apply()) {
            return array('success' => false, 'message' => '플랫폼 스킨 적용은 최고관리자만 할 수 있습니다.');
        }

        if (!onoff_platform_skin_member_exists() || !onoff_platform_skin_board_exists()) {
            return array('success' => false, 'message' => '플랫폼 스킨 파일이 없습니다. iCRM 업데이트를 먼저 적용하세요.');
        }

        $member_skin = onoff_platform_skin_id_member();
        $board_skin = onoff_platform_skin_id_board_column();
        $member_esc = sql_real_escape_string($member_skin);

        sql_query(" update {$g5['config_table']}
                       set cf_member_skin = '{$member_esc}',
                           cf_mobile_member_skin = '{$member_esc}' ", false);

        $config['cf_member_skin'] = $member_skin;
        $config['cf_mobile_member_skin'] = $member_skin;

        $boards_updated = 0;
        if (!isset($options['apply_boards']) || !empty($options['apply_boards'])) {
            if (is_file(G5_LIB_PATH . '/icrm-member-board.lib.php')) {
                include_once G5_LIB_PATH . '/icrm-member-board.lib.php';
            }
            if (function_exists('icrm_member_board_read_log')) {
                $board_esc = sql_real_escape_string($board_skin);
                foreach (icrm_member_board_read_log() as $row) {
                    if (!is_array($row) || empty($row['bo_table'])) {
                        continue;
                    }
                    $bo_table = preg_replace('/[^a-z0-9_]/', '', strtolower((string) $row['bo_table']));
                    if ($bo_table === '') {
                        continue;
                    }
                    sql_query(" update {$g5['board_table']}
                                   set bo_skin = '{$board_esc}',
                                       bo_mobile_skin = '{$board_esc}'
                                 where bo_table = '" . sql_real_escape_string($bo_table) . "' ", false);
                    $boards_updated++;
                }
            }
        }

        onoff_platform_skin_write_site_config(array(
            'platform_member_skin'    => $member_skin,
            'platform_board_skin_column' => $board_skin,
            'platform_skin_applied_at'  => date('Y-m-d H:i:s'),
        ));

        return array(
            'success'         => true,
            'message'         => '플랫폼 스킨이 적용되었습니다.',
            'member_skin'     => $member_skin,
            'board_skin'      => $board_skin,
            'boards_updated'  => $boards_updated,
            'login_url'       => defined('G5_BBS_URL') ? G5_BBS_URL . '/login.php' : '/bbs/login.php',
        );
    }
}

if (!function_exists('onoff_platform_skin_override_paths')) {
    /**
     * common.php 스킨 경로 직후 — _site.config platform_member_skin 반영
     */
    function onoff_platform_skin_override_paths()
    {
        global $config, $member_skin_path, $member_skin_url;

        if (!function_exists('g5site_cfg')) {
            return;
        }

        $skin = trim(g5site_cfg('platform_member_skin', ''));
        if ($skin === '' || !is_dir(G5_SKIN_PATH . '/member/' . preg_replace('/[^a-z0-9_-]/', '', $skin))) {
            return;
        }

        if (function_exists('get_skin_path') && function_exists('get_skin_url')) {
            $member_skin_path = get_skin_path('member', $skin);
            $member_skin_url = get_skin_url('member', $skin);
        }
    }
}
