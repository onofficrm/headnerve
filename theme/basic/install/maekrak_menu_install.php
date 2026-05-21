<?php
/**
 * 맥락한의원 메뉴 2단 구조 등록 (1회 실행)
 * 접속: /theme/basic/install/maekrak_menu_install.php
 * 기존 메뉴를 모두 삭제하고 아래 구조로 다시 등록합니다. 실행 후 이 파일을 삭제하세요.
 */
define('MAEKRAK_MENU_INSTALL_KEY', '');

$g5_path = realpath(__DIR__ . '/../../..');
chdir($g5_path);
include_once $g5_path . '/common.php';

if (!defined('_GNUBOARD_')) {
    die('GNUBOARD common load failed');
}

$allowed = false;
if ($is_admin === 'super') {
    $allowed = true;
}
if (MAEKRAK_MENU_INSTALL_KEY !== '' && isset($_GET['key']) && $_GET['key'] === MAEKRAK_MENU_INSTALL_KEY) {
    $allowed = true;
}

if (!$allowed) {
    die('최고관리자 로그인 또는 INSTALL_KEY가 필요합니다.');
}

include_once G5_THEME_PATH . '/inc/condition_data.php';

$menu_rows = array(
    array('code' => '10', 'name' => '브랜드 철학', 'link' => G5_URL . '/#maekrak_philosophy', 'order' => 1),
    array('code' => '20', 'name' => '진료과목', 'link' => G5_URL . '/#maekrak_dept', 'order' => 2),
    array('code' => '30', 'name' => '치료 프로그램', 'link' => G5_URL . '/#maekrak_program', 'order' => 3),
    array('code' => '40', 'name' => '의료진', 'link' => G5_URL . '/#maekrak_doctor', 'order' => 4),
    array('code' => '50', 'name' => '블로그', 'link' => G5_URL . '/#maekrak_blog', 'order' => 5),
    array('code' => '60', 'name' => '오시는 길', 'link' => G5_URL . '/#maekrak_info', 'order' => 6),
);

$dept_subs = array(
    array('code' => '2001', 'name' => '두통', 'link' => maekrak_condition_url('headache'), 'order' => 1),
    array('code' => '2002', 'name' => '어지럼증', 'link' => maekrak_condition_url('dizziness'), 'order' => 2),
    array('code' => '2003', 'name' => '자율신경', 'link' => maekrak_condition_url('autonomic'), 'order' => 3),
    array('code' => '2004', 'name' => '말초신경병증', 'link' => maekrak_condition_url('peripheral'), 'order' => 4),
    array('code' => '2005', 'name' => '브레인포그', 'link' => maekrak_condition_url('brainfog'), 'order' => 5),
);

sql_query(" DELETE FROM {$g5['menu_table']} ");

$inserted = array();

foreach ($menu_rows as $row) {
    $code = sql_escape_string($row['code']);
    $name = sql_escape_string($row['name']);
    $link = sql_escape_string($row['link']);
    $order = (int) $row['order'];

    sql_query(" INSERT INTO {$g5['menu_table']} SET
        me_code = '{$code}',
        me_name = '{$name}',
        me_link = '{$link}',
        me_target = 'self',
        me_order = '{$order}',
        me_use = '1',
        me_mobile_use = '1' ");
    $inserted[] = "1차: {$row['name']}";

    if ($row['code'] === '20') {
        foreach ($dept_subs as $sub) {
            $scode = sql_escape_string($sub['code']);
            $sname = sql_escape_string($sub['name']);
            $slink = sql_escape_string($sub['link']);
            $sorder = (int) $sub['order'];

            sql_query(" INSERT INTO {$g5['menu_table']} SET
                me_code = '{$scode}',
                me_name = '{$sname}',
                me_link = '{$slink}',
                me_target = 'self',
                me_order = '{$sorder}',
                me_use = '1',
                me_mobile_use = '1' ");
            $inserted[] = "2차: {$sub['name']}";
        }
    }
}

if (function_exists('g5_delete_cache')) {
    g5_delete_cache('menu');
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>맥락한의원 메뉴 2단 등록 완료</h1>';
echo '<p>기존 메뉴를 삭제하고 1차 6개 + 진료과목 2차 5개를 등록했습니다.</p><ul>';
foreach ($inserted as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul>';
echo '<p><strong>보안: 이 install 파일을 서버에서 삭제하세요.</strong></p>';
echo '<p><a href="' . G5_URL . '">홈으로 이동</a></p>';
