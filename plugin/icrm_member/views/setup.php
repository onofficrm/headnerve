<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

$can_design = icrm_member_can_design();
$can_boards = icrm_member_can_boards();

$tab = isset($_GET['tab']) ? preg_replace('/[^a-z_]/', '', (string) $_GET['tab']) : '';
if ($tab !== 'design' && $tab !== 'boards') {
    $tab = $can_design ? 'design' : 'boards';
}
if ($tab === 'design' && !$can_design && $can_boards) {
    $tab = 'boards';
}
if ($tab === 'boards' && !$can_boards && $can_design) {
    $tab = 'design';
}

$tabs = array(
    'design' => array('label' => '디자인 배포', 'can' => $can_design),
    'boards' => array('label' => '게시판 추가', 'can' => $can_boards),
);
?>
<nav class="icrm-member-setup-tabs" aria-label="홈페이지 구성">
    <?php foreach ($tabs as $key => $item) {
        $active = ($key === $tab) ? ' is-active' : '';
        if ($item['can']) { ?>
    <a href="<?php echo icrm_member_h(icrm_member_url(array('m' => 'setup', 'tab' => $key))); ?>" class="icrm-member-setup-tabs__link<?php echo $active; ?>"><?php echo icrm_member_h($item['label']); ?></a>
        <?php } else { ?>
    <span class="icrm-member-setup-tabs__link is-locked<?php echo $active; ?>" title="레벨 <?php echo (int) icrm_member_board_min_level(); ?> 이상"><?php echo icrm_member_h($item['label']); ?></span>
        <?php }
    } ?>
</nav>

<div class="icrm-member-setup-panel">
    <?php
    if ($tab === 'design') {
        if ($can_design) {
            include __DIR__ . '/design.php';
        } else {
            echo '<p class="icc-muted">디자인 배포 권한이 없습니다.</p>';
        }
    } elseif ($tab === 'boards') {
        if ($can_boards) {
            include __DIR__ . '/boards.php';
        } else {
            ?>
    <div class="icrm-member-setup-locked">
        <p>게시판 추가는 레벨 <strong><?php echo (int) icrm_member_board_min_level(); ?></strong> 이상 회원만 이용할 수 있습니다.</p>
        <p class="icc-muted" style="margin-top:8px">현재 레벨: <?php echo (int) icrm_member_current_level(); ?></p>
    </div>
            <?php
        }
    }
    ?>
</div>
