<?php
if (!defined('ICRM_MEMBER_ACTIVE')) {
    exit;
}

$modules = icrm_member_modules();
$license_ok = function_exists('icrm_admin_shell_license_ok') ? icrm_admin_shell_license_ok() : false;
?>
<div class="icrm-member-dash">
    <?php foreach ($modules as $key => $item) {
        if ($key === 'update' && !icrm_member_can_access()) {
            continue;
        }
        $can = icrm_member_can_module($key);
        $lock_reason = $can ? '' : icrm_member_module_lock_reason($key);
        ?>
    <div class="icrm-member-card<?php echo $can ? '' : ' is-locked'; ?>">
        <h3><?php echo icrm_member_h($item['label']); ?></h3>
        <p><?php echo icrm_member_h($item['desc']); ?></p>
        <?php if ($can) { ?>
        <a class="icc-btn icc-btn--primary" href="<?php echo icrm_member_h(icrm_member_url($key)); ?>">
            <?php echo $key === 'home' ? '바로가기' : ($key === 'publish' ? '글 발행' : '열기'); ?>
        </a>
        <?php } else { ?>
        <p class="icrm-member-card__lock"><?php echo icrm_member_h($lock_reason); ?></p>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<div class="icrm-member-dash-status" style="margin-top:20px;padding:14px 16px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;font-size:13px;line-height:1.6">
    <strong>iCRM 연동</strong>
    <?php if ($license_ok) { ?>
    <span style="color:#0f766e"> · 연동됨</span>
    <?php } else { ?>
    <span style="color:#b45309"> · 미설정 (관리자에게 문의)</span>
    <?php } ?>
    <?php if (icrm_member_can_update()) { ?>
    <span style="color:#64748b"> · SEO·순위 등 고급 설정은 <a href="<?php echo icrm_member_h(G5_PLUGIN_URL . '/icrm_hub/admin/index.php'); ?>">iCRM AI 관리</a>에서 진행합니다.</span>
    <?php } ?>
</div>
