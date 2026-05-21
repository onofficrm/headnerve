<?php
if (!defined('_GNUBOARD_')) exit;

include_once(G5_THEME_PATH . '/inc/site_config.php');
global $maekrak_home_meta;
global $maekrak_departments, $maekrak_philosophy, $maekrak_targets, $maekrak_approach, $maekrak_programs, $maekrak_doctors;
?>

<main id="maekrak_main" class="maekrak-main<?php echo defined('_INDEX_') ? ' maekrak-main--home' : ''; ?>" role="main">

<?php if (defined('_INDEX_')) { ?>
<div class="maekrak-home maekrak-snap-container">

    <!-- 1. Hero -->
    <section id="maekrak_hero" class="maekrak-section maekrak-hero maekrak-snap-section" aria-label="메인 비주얼">
        <div class="maekrak-section-full">
            <div class="maekrak-hero-inner">
                <div class="maekrak-hero-layout">
                    <div class="maekrak-hero-content">
                        <p class="maekrak-hero-label"><?php echo MK_CLINIC_BADGE; ?></p>
                        <h1 class="maekrak-hero-title">
                            반복되는 두통,<br>
                            <strong>원인을 알면<br class="maekrak-br-md"> 치료가 달라집니다.</strong>
                        </h1>
                        <p class="maekrak-hero-desc">검사에서는 정상인데 통증이 계속된다면, 두개경추 구조와 자율신경, 뇌 에너지 균형을 함께 분석해야 합니다.</p>
                        <div class="maekrak-hero-actions">
                            <a href="<?php echo MK_RESERVE_URL; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>정밀 검사 예약</a>
                            <a href="#maekrak_dept" class="maekrak-btn maekrak-btn-outline maekrak-btn-xl">진료과목 안내</a>
                        </div>
                    </div>
                    <div class="maekrak-hero-visual" aria-hidden="true">
                        <div class="maekrak-hero-visual-panel">
                            <span class="maekrak-hero-visual-mesh"></span>
                            <span class="maekrak-hero-visual-orb maekrak-hero-visual-orb--a"></span>
                            <span class="maekrak-hero-visual-orb maekrak-hero-visual-orb--b"></span>
                            <span class="maekrak-hero-visual-arc"></span>
                            <div class="maekrak-hero-visual-glow"></div>
                            <div class="maekrak-hero-visual-ring maekrak-hero-visual-ring--1"></div>
                            <div class="maekrak-hero-visual-ring maekrak-hero-visual-ring--2"></div>
                            <div class="maekrak-hero-visual-line"></div>
                            <ul class="maekrak-hero-keywords">
                                <li>두개경추</li>
                                <li>자율신경</li>
                                <li>뇌 에너지</li>
                            </ul>
                            <p class="maekrak-hero-visual-caption">Functional Neuro · Structural Care</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. 브랜드 철학 -->
    <section id="maekrak_philosophy" class="maekrak-section maekrak-philosophy maekrak-snap-section" aria-label="브랜드 철학">
        <div class="maekrak-section-full maekrak-section-full--white">
            <div class="maekrak-section-inner">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">맥락한의원은 두통을 <strong>다르게 봅니다</strong></h2>
                    <p class="maekrak-section-desc maekrak-section-desc--italic">두통은 단순히 머리가 아픈 증상이 아닙니다. 반복되는 두통은 몸이 보내는 신호입니다. 맥락한의원은 다음 세 가지 관점에서 분석합니다.</p>
                </header>
                <ul class="maekrak-philosophy-grid">
                    <?php foreach ($maekrak_philosophy as $item) { ?>
                    <li class="maekrak-medical-card">
                        <div class="maekrak-medical-card-icon maekrak-icon-<?php echo $item['icon']; ?>" aria-hidden="true"></div>
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['text']; ?></p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- 3. 대표 진료과목 -->
    <section id="maekrak_dept" class="maekrak-section maekrak-dept maekrak-snap-section" aria-label="대표 진료과목">
        <div class="maekrak-section-full maekrak-section-full--ivory">
            <div class="maekrak-section-inner">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">맥락한의원이 집중하는 <strong>진료</strong></h2>
                    <p class="maekrak-section-desc">증상별로 원인을 다르게 보고, 구조·기능·에너지를 함께 회복하는 진료를 제공합니다.</p>
                </header>
                <div class="maekrak-dept-grid">
                    <?php foreach ($maekrak_departments as $dept) { ?>
                    <a href="<?php echo $dept['link']; ?>" id="maekrak_dept_<?php echo $dept['id']; ?>" class="maekrak-dept-card">
                        <span class="maekrak-dept-card-num" aria-hidden="true"></span>
                        <h3><?php echo $dept['title']; ?></h3>
                        <p><?php echo $dept['desc']; ?></p>
                        <?php if (!empty($dept['tags'])) { ?>
                        <div class="maekrak-dept-tags">
                            <?php foreach ($dept['tags'] as $tag) { ?>
                            <span><?php echo $tag; ?></span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <span class="maekrak-dept-more">자세히 보기 <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. 이런 분들에게 -->
    <section id="maekrak_target" class="maekrak-section maekrak-target maekrak-normal-section" aria-label="이런 분들에게">
        <div class="maekrak-section-full maekrak-section-full--white">
            <div class="maekrak-section-inner maekrak-section-inner--narrow">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">이런 증상이 반복된다면 <strong>원인을 확인해보세요</strong></h2>
                </header>
                <div class="maekrak-target-box">
                    <ul class="maekrak-target-list">
                        <?php foreach ($maekrak_targets as $text) { ?>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i><span><?php echo $text; ?></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. 치료 접근 -->
    <section id="maekrak_approach" class="maekrak-section maekrak-approach maekrak-snap-section" aria-label="치료 접근">
        <div class="maekrak-section-full maekrak-section-full--white">
            <div class="maekrak-section-inner">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">기능과 구조를 <strong>함께 치료합니다</strong></h2>
                </header>
                <ol class="maekrak-approach-grid">
                    <?php foreach ($maekrak_approach as $item) { ?>
                    <li>
                        <span class="maekrak-approach-num"><?php echo $item['num']; ?></span>
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['text']; ?></p>
                    </li>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </section>

    <!-- 6. 치료 프로그램 -->
    <section id="maekrak_program" class="maekrak-section maekrak-program maekrak-normal-section" aria-label="치료 프로그램">
        <div class="maekrak-section-full maekrak-section-full--ivory">
            <div class="maekrak-section-inner">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">맥락한의원 <strong>치료 프로그램</strong></h2>
                </header>
                <ul class="maekrak-program-grid">
                    <?php foreach ($maekrak_programs as $prog) { ?>
                    <li class="maekrak-program-card">
                        <div class="maekrak-program-card-head">
                            <span class="maekrak-program-icon" aria-hidden="true"><i class="fa fa-file-text-o"></i></span>
                            <h3><?php echo $prog['title']; ?></h3>
                        </div>
                        <div class="maekrak-program-tags">
                            <?php foreach ($prog['methods'] as $method) { ?>
                            <span><?php echo $method; ?></span>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- 7. 의료진 -->
    <section id="maekrak_doctor" class="maekrak-section maekrak-doctor maekrak-normal-section" aria-label="의료진 소개">
        <div class="maekrak-section-full maekrak-section-full--white">
            <div class="maekrak-section-inner maekrak-section-inner--doctor">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">두통과 신경계를 <strong>설명하는 한의사</strong></h2>
                    <p class="maekrak-section-desc maekrak-section-desc--italic">환자가 이해할 수 있는 설명, 지속가능한 치료, 해가 되지 않는 치료를 중요하게 생각합니다.</p>
                </header>
                <ul class="maekrak-doctor-grid">
                    <?php foreach ($maekrak_doctors as $doc) { ?>
                    <li class="maekrak-doctor-card">
                        <div class="maekrak-doctor-photo"><i class="fa fa-user-md" aria-hidden="true"></i></div>
                        <h3><?php echo $doc['name']; ?> <span><?php echo $doc['title']; ?></span></h3>
                        <p class="maekrak-doctor-divider"></p>
                        <p class="maekrak-doctor-field">주요 진료: <?php echo $doc['field']; ?></p>
                        <a href="<?php echo get_pretty_url('content', 'company'); ?>" class="maekrak-btn maekrak-btn-pill">프로필 보기</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- 8. 블로그 -->
    <section id="maekrak_blog" class="maekrak-section maekrak-blog maekrak-normal-section" aria-label="블로그">
        <div class="maekrak-section-full maekrak-section-full--gray">
            <div class="maekrak-section-inner">
                <div class="maekrak-blog-head">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">비슷한 증상을 가진 <strong>환자들의 이야기</strong></h2>
                    <?php if (function_exists('get_pretty_url')) { ?>
                    <a href="<?php echo get_pretty_url(MK_BLOG_BOARD); ?>" class="maekrak-blog-head-link">Blog <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    <?php } ?>
                </div>
                <div class="maekrak-blog-wrap">
                    <?php echo latest('theme/maekrak_blog', MK_BLOG_BOARD, 3, 80); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. 상담 CTA -->
    <section id="maekrak_cta" class="maekrak-section maekrak-cta maekrak-snap-section" aria-label="상담 안내">
        <div class="maekrak-section-full maekrak-section-full--navy">
            <div class="maekrak-cta-pattern" aria-hidden="true"></div>
            <div class="maekrak-section-inner maekrak-cta-inner">
                <h2 class="maekrak-cta-title">반복되는 증상, <strong>이제 원인을 확인해보세요</strong></h2>
                <p class="maekrak-cta-desc">검사에서 이상이 없다는 말만 듣고 돌아오셨다면, 몸의 기능과 구조를 함께 보는 진료가 필요할 수 있습니다.</p>
                <div class="maekrak-cta-actions">
                    <a href="<?php echo MK_RESERVE_URL; ?>" class="maekrak-btn maekrak-btn-white maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약하기</a>
                    <a href="<?php echo MK_KAKAO_URL; ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl" target="_blank" rel="noopener noreferrer"><i class="fa fa-comment" aria-hidden="true"></i> 카카오톡 상담</a>
                    <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl">전화 문의하기</a>
                    <a href="#maekrak_info" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl"><i class="fa fa-map-marker" aria-hidden="true"></i> 오시는 길</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. 진료시간·오시는 길 -->
    <section id="maekrak_info" class="maekrak-section maekrak-info maekrak-normal-section" aria-label="진료시간 및 오시는 길">
        <div class="maekrak-section-full maekrak-section-full--white">
            <div class="maekrak-section-inner">
                <header class="maekrak-section-head maekrak-section-head--center">
                    <h2 class="maekrak-section-title maekrak-section-title--lg">진료시간 및 <strong>오시는 길</strong></h2>
                </header>
                <div class="maekrak-info-card">
                    <div class="maekrak-info-content">
                        <div class="maekrak-info-block">
                            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> 오시는 길</h3>
                            <p><?php echo MK_CLINIC_ADDRESS; ?></p>
                            <span class="maekrak-info-badge"><?php echo MK_CLINIC_TRANSPORT; ?></span>
                            <p class="maekrak-info-map-link"><a href="<?php echo maekrak_map_external_url(); ?>" target="_blank" rel="noopener noreferrer">카카오맵에서 위치 보기 <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
                        </div>
                        <div class="maekrak-info-block">
                            <h3><i class="fa fa-clock-o" aria-hidden="true"></i> 진료시간</h3>
                            <ul class="maekrak-info-hours">
                                <li><span>평일</span><strong><?php echo MK_CLINIC_HOURS_WEEKDAY; ?></strong></li>
                                <li><span>토요일</span><strong><?php echo MK_CLINIC_HOURS_SAT; ?></strong></li>
                                <li><span>점심시간</span><span><?php echo MK_CLINIC_LUNCH; ?></span></li>
                                <li class="maekrak-info-note"><?php echo MK_CLINIC_SAT_LUNCH_NOTE; ?></li>
                                <li class="maekrak-info-closed">※ <?php echo MK_CLINIC_HOURS_SUN; ?> 휴진</li>
                            </ul>
                        </div>
                        <div class="maekrak-info-block">
                            <h3><i class="fa fa-phone" aria-hidden="true"></i> 상담 및 예약</h3>
                            <p class="maekrak-info-tel"><?php echo MK_CLINIC_TEL; ?></p>
                            <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-sm">전화걸기</a>
                        </div>
                        <div class="maekrak-info-block">
                            <h3><i class="fa fa-car" aria-hidden="true"></i> 주차 안내</h3>
                            <p><?php echo MK_CLINIC_PARKING; ?></p>
                        </div>
                    </div>
                    <?php maekrak_render_kakao_map(); ?>
                </div>
            </div>
        </div>
    </section>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "MedicalClinic",
        "name": "<?php echo get_text(MK_CLINIC_NAME); ?>",
        "description": "<?php echo get_text($maekrak_home_meta['meta_description']); ?>",
        "url": "<?php echo G5_URL; ?>",
        "telephone": "<?php echo MK_CLINIC_TEL; ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo get_text(MK_CLINIC_ADDRESS); ?>",
            "addressLocality": "서울",
            "addressCountry": "KR"
        },
        "openingHours": ["Mo-Fr 10:00-20:00", "Sa 10:00-14:00"]
    }
    </script>

</div><!-- .maekrak-home -->
<?php } ?>

</main>
