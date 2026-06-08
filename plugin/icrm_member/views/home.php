<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

$modules = icrm_member_modules();
?>
<div class="icrm-member-dash">
    <?php if (icrm_member_can_module('setup')) { ?>
    <div class="icrm-member-card">
        <h3><?php echo icrm_member_h($modules['setup']['label']); ?></h3>
        <p><?php echo icrm_member_h($modules['setup']['desc']); ?></p>
        <div class="icrm-member-card__actions">
            <a class="icc-btn icc-btn--primary" href="<?php echo icrm_member_h(icrm_member_url('setup')); ?>">홈페이지 구성</a>
            <?php if (icrm_member_can_design()) { ?>
            <a class="icc-btn" href="<?php echo icrm_member_h(icrm_member_url(array('m' => 'setup', 'tab' => 'design'))); ?>">디자인</a>
            <?php } ?>
            <?php if (icrm_member_can_boards()) { ?>
            <a class="icc-btn" href="<?php echo icrm_member_h(icrm_member_url(array('m' => 'setup', 'tab' => 'boards'))); ?>">게시판</a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <?php if (icrm_member_can_module('publish')) { ?>
    <div class="icrm-member-card">
        <h3><?php echo icrm_member_h($modules['publish']['label']); ?></h3>
        <p><?php echo icrm_member_h($modules['publish']['desc']); ?></p>
        <a class="icc-btn icc-btn--primary" href="<?php echo icrm_member_h(icrm_member_url('publish')); ?>">글 발행</a>
    </div>
    <?php } ?>
</div>

<p class="icc-muted" style="margin-top:20px;font-size:13px;line-height:1.6">
    SEO 설정·순위체크·기능 업데이트는 사이트 관리자 메뉴에서 진행합니다.
</p>
