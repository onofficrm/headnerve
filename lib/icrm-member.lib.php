<?php
/**
 * iCRM 회원 포털 — 권한 · 모듈 · 셸
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('icrm_member_enabled')) {
    function icrm_member_enabled()
    {
        if (function_exists('g5site_cfg_bool')) {
            return g5site_cfg_bool('icrm_member_enabled', true);
        }

        return true;
    }
}

if (!function_exists('icrm_member_min_level')) {
    function icrm_member_min_level()
    {
        if (function_exists('g5site_cfg')) {
            $lv = g5site_cfg('icrm_member_min_level', '2');
            if ($lv !== '' && is_numeric($lv)) {
                return max(1, (int) $lv);
            }
        }

        return 2;
    }
}

if (!function_exists('icrm_member_board_min_level')) {
    function icrm_member_board_min_level()
    {
        if (function_exists('g5site_cfg')) {
            $lv = g5site_cfg('icrm_member_board_min_level', '5');
            if ($lv !== '' && is_numeric($lv)) {
                return max(1, (int) $lv);
            }
        }

        return 5;
    }
}

if (!function_exists('icrm_member_board_max_per_month')) {
    function icrm_member_board_max_per_month()
    {
        if (function_exists('g5site_cfg')) {
            $n = g5site_cfg('icrm_member_board_max_per_month', '3');
            if ($n !== '' && is_numeric($n)) {
                return max(1, (int) $n);
            }
        }

        return 3;
    }
}

if (!function_exists('icrm_member_is_logged_in')) {
    function icrm_member_is_logged_in()
    {
        global $is_member, $member;

        return !empty($is_member) && !empty($member['mb_id']);
    }
}

if (!function_exists('icrm_member_current_level')) {
    function icrm_member_current_level()
    {
        global $member;

        return isset($member['mb_level']) ? (int) $member['mb_level'] : 0;
    }
}

if (!function_exists('icrm_member_can_access')) {
    function icrm_member_can_access()
    {
        global $is_admin;

        if ($is_admin === 'super') {
            return true;
        }
        if (!icrm_member_enabled()) {
            return false;
        }
        if (!icrm_member_is_logged_in()) {
            return false;
        }

        return icrm_member_current_level() >= icrm_member_min_level();
    }
}

if (!function_exists('icrm_member_can_design')) {
    function icrm_member_can_design()
    {
        if (!icrm_member_can_access()) {
            return false;
        }
        if (function_exists('onoff_builder_is_deploy_user')) {
            return onoff_builder_is_deploy_user();
        }

        return icrm_member_can_access();
    }
}

if (!function_exists('icrm_member_can_publish')) {
    function icrm_member_can_publish()
    {
        if (!icrm_member_can_access()) {
            return false;
        }
        if (function_exists('icrm_admin_shell_license_ok')) {
            return icrm_admin_shell_license_ok();
        }

        return true;
    }
}

if (!function_exists('icrm_member_can_boards')) {
    function icrm_member_can_boards()
    {
        global $is_admin;

        if ($is_admin === 'super') {
            return true;
        }
        if (!icrm_member_can_access()) {
            return false;
        }

        return icrm_member_current_level() >= icrm_member_board_min_level();
    }
}

if (!function_exists('icrm_member_can_setup')) {
    function icrm_member_can_setup()
    {
        return icrm_member_can_design() || icrm_member_can_boards();
    }
}

if (!function_exists('icrm_member_can_update')) {
    function icrm_member_can_update()
    {
        global $is_admin;

        return $is_admin === 'super';
    }
}

if (!function_exists('icrm_member_can_module')) {
    function icrm_member_can_module($module)
    {
        $module = preg_replace('/[^a-z_]/', '', (string) $module);

        switch ($module) {
            case 'home':
                return icrm_member_can_access();
            case 'setup':
                return icrm_member_can_setup();
            case 'design':
                return icrm_member_can_design();
            case 'publish':
                return icrm_member_can_publish();
            case 'boards':
                return icrm_member_can_boards();
            case 'update':
                return icrm_member_can_update();
            default:
                return false;
        }
    }
}

if (!function_exists('icrm_member_module_lock_reason')) {
    function icrm_member_module_lock_reason($module)
    {
        $module = preg_replace('/[^a-z_]/', '', (string) $module);

        switch ($module) {
            case 'design':
                if (!icrm_member_is_logged_in()) {
                    return '로그인이 필요합니다.';
                }
                if (function_exists('onoff_builder_member_deploy_enabled') && !onoff_builder_member_deploy_enabled()) {
                    return '디자인 배포가 비활성화되어 있습니다.';
                }

                return '레벨 ' . (function_exists('onoff_builder_member_deploy_min_level') ? onoff_builder_member_deploy_min_level() : 2) . ' 이상 필요';
            case 'boards':
                return '레벨 ' . icrm_member_board_min_level() . ' 이상 필요';
            case 'publish':
                return 'iCRM 라이선스 연동 후 이용 가능';
            case 'update':
                return '관리자 전용';
            default:
                return '이용 권한이 없습니다.';
        }
    }
}

if (!function_exists('icrm_member_require')) {
    function icrm_member_require($module = 'home')
    {
        global $is_member;

        if (icrm_member_can_module($module)) {
            return;
        }

        if (empty($is_member)) {
            $back = icrm_member_url(isset($_GET['m']) ? array('m' => $_GET['m']) : array());
            $login = defined('G5_BBS_URL') ? G5_BBS_URL . '/login.php' : '/bbs/login.php';
            $login .= '?url=' . urlencode($back);
            if (function_exists('goto_url')) {
                goto_url($login);
            }
            header('Location: ' . $login);
            exit;
        }

        $msg = icrm_member_module_lock_reason($module);
        if ($msg === '이용 권한이 없습니다.') {
            $msg = '이 메뉴를 사용할 권한이 없습니다.';
        }

        if (function_exists('alert')) {
            alert($msg, defined('G5_URL') ? G5_URL : '/');
        }

        header('Content-Type: text/html; charset=utf-8');
        echo '<script>alert(' . json_encode($msg, JSON_UNESCAPED_UNICODE) . ');location.href=' . json_encode(defined('G5_URL') ? G5_URL : '/') . ';</script>';
        exit;
    }
}

if (!function_exists('icrm_member_base')) {
    function icrm_member_base()
    {
        return defined('G5_PLUGIN_URL') ? G5_PLUGIN_URL . '/icrm_member/index.php' : '/plugin/icrm_member/index.php';
    }
}

if (!function_exists('icrm_member_url')) {
    function icrm_member_url($module_or_params = 'home', array $params = array())
    {
        if (is_array($module_or_params)) {
            $params = $module_or_params;
            $module = isset($params['m']) ? (string) $params['m'] : 'home';
        } else {
            $module = preg_replace('/[^a-z_]/', '', (string) $module_or_params);
            if ($module === '') {
                $module = 'home';
            }
            $params['m'] = $module;
        }

        return icrm_member_base() . '?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
    }
}

if (!function_exists('icrm_member_modules')) {
    function icrm_member_modules()
    {
        return array(
            'home'    => array('label' => '대시보드', 'icon' => 'home', 'desc' => '진행 상황 한눈에 보기', 'group' => ''),
            'design'  => array('label' => '디자인 배포', 'icon' => 'design', 'desc' => '빌더 ZIP 업로드 · 사이트 적용', 'group' => '홈페이지'),
            'boards'  => array('label' => '게시판', 'icon' => 'boards', 'desc' => '게시판 추가 · 수정', 'group' => '홈페이지'),
            'publish' => array('label' => '콘텐츠 발행', 'icon' => 'publish', 'desc' => 'AI 글쓰기 · 게시판 발행', 'group' => '콘텐츠'),
            'update'  => array('label' => '사이트 업데이트', 'icon' => 'update', 'desc' => '기능 업데이트 · 디자인 동기화', 'group' => '관리'),
        );
    }
}

if (!function_exists('icrm_member_render_sidebar_nav')) {
    function icrm_member_render_sidebar_nav($active_module)
    {
        $active_module = preg_replace('/[^a-z_]/', '', (string) $active_module);
        $modules = icrm_member_modules();
        $last_group = null;
        $printed_menu_label = false;

        foreach ($modules as $key => $item) {
            if ($key === 'update' && !icrm_member_can_access()) {
                continue;
            }

            $group = isset($item['group']) ? (string) $item['group'] : '';
            if ($group === '' && !$printed_menu_label) {
                echo '<div class="icrm-sidebar__label">메뉴</div>';
                $printed_menu_label = true;
            } elseif ($group !== '' && $group !== $last_group) {
                echo '<div class="icrm-sidebar__label">' . icrm_member_h($group) . '</div>';
                $last_group = $group;
            }

            $can = icrm_member_can_module($key);
            $class = ($key === $active_module) ? ' is-active' : '';
            $icon = icrm_member_shell_icon($item['icon']);

            if ($can) {
                ?>
        <a href="<?php echo icrm_member_h(icrm_member_url($key)); ?>" class="icrm-sidebar__link<?php echo $class; ?>">
            <span class="icrm-sidebar__icon" aria-hidden="true"><?php echo $icon; ?></span>
            <span class="icrm-sidebar__link-text"><?php echo icrm_member_h($item['label']); ?></span>
        </a>
                <?php
                continue;
            }

            $lock_reason = icrm_member_module_lock_reason($key);
            ?>
        <span class="icrm-sidebar__link is-locked<?php echo $class; ?>" title="<?php echo icrm_member_h($lock_reason); ?>">
            <span class="icrm-sidebar__icon" aria-hidden="true"><?php echo $icon; ?></span>
            <span class="icrm-sidebar__link-text"><?php echo icrm_member_h($item['label']); ?></span>
            <span class="icrm-sidebar__lock" aria-hidden="true"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg></span>
        </span>
            <?php
        }
    }
}

if (!function_exists('icrm_member_h')) {
    function icrm_member_h($str)
    {
        return htmlspecialchars((string) $str, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('icrm_member_shell_icon')) {
    function icrm_member_shell_icon($name)
    {
        $icons = array(
            'home'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>',
            'setup'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><path d="M3 14h18v7H3z"/></svg>',
            'design'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/></svg>',
            'publish' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>',
            'boards'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>',
            'update'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-3-6.7"/><path d="M21 3v6h-6"/></svg>',
        );

        return isset($icons[$name]) ? $icons[$name] : $icons['home'];
    }
}

if (!function_exists('icrm_member_shell_begin')) {
    function icrm_member_shell_begin($active_module)
    {
        global $member;

        $active_module = preg_replace('/[^a-z_]/', '', (string) $active_module);
        $modules = icrm_member_modules();
        if (!isset($modules[$active_module])) {
            $active_module = 'home';
        }

        $point_summary = function_exists('icrm_admin_shell_point_summary') ? icrm_admin_shell_point_summary() : '';
        $license_ok = function_exists('icrm_admin_shell_license_ok') ? icrm_admin_shell_license_ok() : false;
        $active_label = $modules[$active_module]['label'];
        $tokens_css = G5_URL . '/css/icrm-design-tokens.css';
        $shell_css = G5_URL . '/css/icrm-member-shell.css';
        ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iCRM · <?php echo icrm_member_h($active_label); ?></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css">
<link rel="stylesheet" href="<?php echo icrm_member_h($tokens_css); ?>">
<link rel="stylesheet" href="<?php echo icrm_member_h($shell_css); ?>">
<link rel="stylesheet" href="<?php echo icrm_member_h(G5_URL . '/css/icrm-module-quiet.css'); ?>">
</head>
<body class="icrm-app icrm-member-app">
<div class="icrm-sidebar-backdrop" id="icrm_member_sidebar_backdrop" hidden></div>
<div class="icrm-app__layout">
<aside class="icrm-sidebar" id="icrm_member_sidebar" aria-label="회원 메뉴">
    <div class="icrm-sidebar__brand">
        <a href="<?php echo icrm_member_h(icrm_member_url('home')); ?>" class="icrm-sidebar__brand-link">
            <span class="icrm-sidebar__logo">iC</span>
            <div class="icrm-sidebar__title-wrap">
                <span class="icrm-sidebar__title">iCRM</span>
                <span class="icrm-sidebar__sub">내 홈페이지 관리</span>
            </div>
        </a>
    </div>
    <nav class="icrm-sidebar__nav">
        <?php icrm_member_render_sidebar_nav($active_module); ?>
    </nav>
    <div class="icrm-sidebar__foot">
        <div class="icrm-sidebar__status">
            <span class="icrm-sidebar__dot<?php echo $license_ok ? ' is-on' : ''; ?>"></span>
            iCRM <?php echo $license_ok ? '연동됨' : '미설정'; ?>
        </div>
    </div>
</aside>
<div class="icrm-main">
<header class="icrm-topbar">
    <div class="icrm-topbar__left">
        <button type="button" class="icrm-topbar__menu-btn" id="icrm_member_menu_toggle" aria-label="메뉴">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <h1 class="icrm-topbar__title"><?php echo icrm_member_h($active_label); ?></h1>
    </div>
    <div class="icrm-topbar__right">
        <?php if ($point_summary !== '') { ?>
        <span class="icrm-topbar__points"><?php echo icrm_member_h($point_summary); ?></span>
        <?php } ?>
        <?php if (!empty($member['mb_nick'])) { ?>
        <span class="icrm-topbar__user"><?php echo icrm_member_h($member['mb_nick']); ?></span>
        <?php } ?>
        <div class="icrm-topbar__links">
            <a href="<?php echo icrm_member_h(G5_URL); ?>" target="_blank" rel="noopener">사이트 보기</a>
            <?php if (defined('G5_BBS_URL')) { ?>
            <a href="<?php echo icrm_member_h(G5_BBS_URL . '/logout.php'); ?>">로그아웃</a>
            <?php } ?>
        </div>
    </div>
</header>
<main class="icrm-content">
<div class="icrm-module-body">
        <?php
    }
}

if (!function_exists('icrm_member_shell_end')) {
    function icrm_member_shell_end()
    {
        ?>
</div>
</main>
</div>
</div>
<script>
(function() {
    var sidebar = document.getElementById('icrm_member_sidebar');
    var backdrop = document.getElementById('icrm_member_sidebar_backdrop');
    var toggle = document.getElementById('icrm_member_menu_toggle');
    if (!sidebar || !toggle) return;
    function openSidebar() {
        sidebar.classList.add('is-open');
        if (backdrop) { backdrop.hidden = false; backdrop.classList.add('is-visible'); }
    }
    function closeSidebar() {
        sidebar.classList.remove('is-open');
        if (backdrop) { backdrop.classList.remove('is-visible'); backdrop.hidden = true; }
    }
    toggle.addEventListener('click', function() {
        sidebar.classList.contains('is-open') ? closeSidebar() : openSidebar();
    });
    if (backdrop) backdrop.addEventListener('click', closeSidebar);
})();
</script>
</body>
</html>
        <?php
    }
}
