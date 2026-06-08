<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

$modules = icrm_member_modules();
?>
<div class="icrm-member-dash">
    <?php if (icrm_member_can_module('design')) { ?>
    <div class="icrm-member-card">
        <h3><?php echo icrm_member_h($modules['design']['label']); ?></h3>
        <p><?php echo icrm_member_h($modules['design']['desc']); ?></p>
        <a class="icc-btn icc-btn--primary" href="<?php echo icrm_member_h(icrm_member_url('design')); ?>">디자인 배포</a>
    </div>
    <?php } ?>
    <?php if (icrm_member_can_module('publish')) { ?>
    <div class="icrm-member-card">
        <h3><?php echo icrm_member_h($modules['publish']['label']); ?></h3>
        <p><?php echo icrm_member_h($modules['publish']['desc']); ?></p>
        <a class="icc-btn icc-btn--primary" href="<?php echo icrm_member_h(icrm_member_url('publish')); ?>">글 발행</a>
    </div>
    <?php } ?>
    <?php if (icrm_member_can_module('boards')) { ?>
    <div class="icrm-member-card">
        <h3><?php echo icrm_member_h($modules['boards']['label']); ?></h3>
        <p><?php echo icrm_member_h($modules['boards']['desc']); ?> · 이번 달 <?php echo (int) icrm_member_board_month_count(); ?>/<?php echo (int) icrm_member_board_max_per_month(); ?></p>
        <a class="icc-btn" href="<?php echo icrm_member_h(icrm_member_url('boards')); ?>">게시판 만들기</a>
    </div>
    <?php } ?>
</div>

<p class="icc-muted" style="margin-top:20px;font-size:13px;line-height:1.6">
    SEO 설정·순위체크·기능 업데이트는 사이트 관리자 메뉴에서 진행합니다.
</p>
