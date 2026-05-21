<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/blog_latest.php';
include_once G5_THEME_PATH . '/inc/disease_data.php';
include_once G5_THEME_PATH . '/inc/hero_helper.php';
include_once G5_THEME_PATH . '/inc/faq_jsonld.php';

function maekrak_render_condition_page($page)
{
    if (!$page || empty($page['co_id'])) {
        return;
    }

    global $maekrak_doctors;

    $co_id = $page['co_id'];
    $dept_list_url = G5_URL . '/#maekrak_dept';
    $reserve_url = defined('MK_RESERVE_URL') ? MK_RESERVE_URL : (G5_BBS_URL . '/qalist.php');
    $info_url = G5_URL . '/#maekrak_info';
    $cond_accent = maekrak_condition_accent($co_id);
    $cond_hero_img = maekrak_hero_image_for_page($page);
    ?>
<main class="maekrak-cond" id="maekrak_cond_<?php echo $co_id; ?>" style="--maekrak-cond-accent: <?php echo $cond_accent; ?>;">
    <!-- 1. 서브 히어로 -->
    <section class="maekrak-cond-hero" aria-labelledby="maekrak_cond_hero_title">
        <div class="maekrak-cond-hero-inner">
            <nav class="maekrak-cond-breadcrumb" aria-label="breadcrumb">
                <ol>
                    <li><a href="<?php echo G5_URL; ?>">홈</a></li>
                    <li><a href="<?php echo $dept_list_url; ?>">진료과목</a></li>
                    <li aria-current="page"><?php echo $page['page_name']; ?></li>
                </ol>
            </nav>
            <div class="maekrak-cond-hero-grid">
                <div class="maekrak-cond-hero-text">
                    <p class="maekrak-cond-hero-label"><?php echo $page['page_name']; ?> 진료과목</p>
                    <h1 id="maekrak_cond_hero_title" class="maekrak-cond-hero-title"><?php echo $page['hero_copy']; ?></h1>
                    <p class="maekrak-cond-hero-desc"><?php echo $page['hero_desc']; ?></p>
                    <div class="maekrak-cond-hero-actions">
                        <a href="<?php echo $reserve_url; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약</a>
                        <a href="#maekrak_cond_subtypes" class="maekrak-btn maekrak-btn-outline maekrak-btn-xl">하위 질환 보기</a>
                    </div>
                </div>
                <div class="maekrak-cond-hero-visual">
                    <?php
                    maekrak_render_hero_visual(array(
                        'context' => 'condition',
                        'image_url' => $cond_hero_img,
                        'alt' => $page['page_name'] . ' 진료',
                        'keywords' => $page['visual_keywords'],
                        'decorative' => true,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. AI 인용 앵커 -->
    <section class="maekrak-cond-section maekrak-cond-anchor" aria-labelledby="maekrak_cond_anchor_title">
        <div class="maekrak-cond-inner">
            <h2 id="maekrak_cond_anchor_title" class="sound_only">핵심 정의와 맥락한의원의 관점</h2>
            <div class="maekrak-cond-anchor-grid">
                <div class="maekrak-cond-anchor-box maekrak-cond-anchor-box--def">
                    <h3 class="maekrak-cond-anchor-label">AI 인용 핵심 문장</h3>
                    <p><?php echo $page['ai_anchor']; ?></p>
                </div>
                <div class="maekrak-cond-anchor-box maekrak-cond-anchor-box--view">
                    <h3 class="maekrak-cond-anchor-label">맥락한의원의 관점</h3>
                    <p><?php echo $page['clinic_view']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. 주요 원인 -->
    <section class="maekrak-cond-section maekrak-cond-causes" aria-labelledby="maekrak_cond_causes_title">
        <div class="maekrak-cond-inner">
            <header class="maekrak-cond-head">
                <h2 id="maekrak_cond_causes_title" class="maekrak-cond-title">주요 원인</h2>
                <p class="maekrak-cond-desc"><?php echo $page['page_name']; ?>이 반복될 때 함께 살펴보는 원인입니다.</p>
            </header>
            <ul class="maekrak-cond-cause-grid">
                <?php foreach ($page['causes'] as $i => $cause) { ?>
                <li class="maekrak-cond-cause-card">
                    <span class="maekrak-cond-cause-num" aria-hidden="true"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?php echo $cause['title']; ?></h3>
                    <p><?php echo $cause['desc']; ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 4. 하위 질환 -->
    <section id="maekrak_cond_subtypes" class="maekrak-cond-section maekrak-cond-subtypes" aria-labelledby="maekrak_cond_subtypes_title">
        <div class="maekrak-cond-inner">
            <header class="maekrak-cond-head">
                <h2 id="maekrak_cond_subtypes_title" class="maekrak-cond-title"><?php echo $page['page_name']; ?> 관련 질환</h2>
                <p class="maekrak-cond-desc">증상에 맞는 상세 안내 페이지로 이동할 수 있습니다.</p>
            </header>
            <ul class="maekrak-cond-subtype-grid">
                <?php foreach ($page['subtypes'] as $sub) {
                    $disease_id = maekrak_disease_co_id_for_subtype($co_id, $sub['slug']);
                    if ($disease_id) {
                        $sub_href = maekrak_disease_url($disease_id);
                        $sub_title = '';
                    } else {
                        $sub_href = '#';
                        $sub_title = ' title="상세 페이지 준비 중"';
                    }
                    $sub_future = maekrak_sub_condition_url($co_id, $sub['slug']);
                    ?>
                <li class="maekrak-cond-subtype-card">
                    <h3><?php echo $sub['name']; ?></h3>
                    <p><?php echo $sub['desc']; ?></p>
                    <?php if (!empty($sub['tags'])) { ?>
                    <div class="maekrak-cond-tags">
                        <?php foreach ($sub['tags'] as $tag) { ?>
                        <span><?php echo $tag; ?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <a href="<?php echo $sub_href; ?>" class="maekrak-btn maekrak-btn-pill maekrak-cond-subtype-link"<?php echo $sub_title; ?><?php if (!$disease_id) { ?> data-future-url="<?php echo htmlspecialchars($sub_future, ENT_QUOTES, 'UTF-8'); ?>"<?php } ?>>자세히 보기</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 5. 체크리스트 -->
    <section class="maekrak-cond-section maekrak-cond-check" aria-labelledby="maekrak_cond_check_title">
        <div class="maekrak-cond-inner maekrak-cond-inner--narrow">
            <header class="maekrak-cond-head maekrak-cond-head--center">
                <h2 id="maekrak_cond_check_title" class="maekrak-cond-title">이런 경우 한의원 치료를 고려하세요</h2>
            </header>
            <ul class="maekrak-cond-check-list">
                <?php foreach ($page['checklist'] as $item) { ?>
                <li><i class="fa fa-check" aria-hidden="true"></i><span><?php echo $item; ?></span></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 6. 치료 프로그램 -->
    <section class="maekrak-cond-section maekrak-cond-program" aria-labelledby="maekrak_cond_program_title">
        <div class="maekrak-cond-inner">
            <header class="maekrak-cond-head">
                <h2 id="maekrak_cond_program_title" class="maekrak-cond-title">맥락한의원 <?php echo $page['page_name']; ?> 치료 프로그램</h2>
                <p class="maekrak-cond-desc"><?php echo $page['program_note']; ?></p>
            </header>
            <div class="maekrak-cond-program-grid">
                <div class="maekrak-cond-program-col">
                    <h3>기능적 치료</h3>
                    <p>신경계 균형·에너지·생활 리듬을 회복하는 방향의 치료입니다.</p>
                    <ul>
                        <?php foreach ($page['programs']['functional'] as $m) { ?>
                        <li><?php echo $m; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="maekrak-cond-program-col">
                    <h3>구조적 치료</h3>
                    <p>경추·신경 주변 긴장과 압박, 혈류 저하를 함께 다루는 치료입니다.</p>
                    <ul>
                        <?php foreach ($page['programs']['structural'] as $m) { ?>
                        <li><?php echo $m; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($page['faq'])) { ?>
    <!-- 7. FAQ -->
    <section class="maekrak-cond-section maekrak-cond-faq" aria-labelledby="maekrak_cond_faq_title">
        <div class="maekrak-cond-inner maekrak-cond-inner--narrow">
            <header class="maekrak-cond-head">
                <h2 id="maekrak_cond_faq_title" class="maekrak-cond-title">자주 묻는 질문</h2>
            </header>
            <div class="maekrak-cond-faq-list" itemscope itemtype="https://schema.org/FAQPage">
                <?php foreach ($page['faq'] as $i => $faq) { ?>
                <details class="maekrak-cond-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"<?php echo $i === 0 ? ' open' : ''; ?>>
                    <summary itemprop="name"><?php echo $faq['q']; ?></summary>
                    <div class="maekrak-cond-faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </details>
                <?php } ?>
            </div>
            <?php maekrak_render_faq_jsonld($page['faq']); ?>
        </div>
    </section>
    <?php } ?>

    <!-- 8. 관련 블로그 -->
    <section class="maekrak-cond-section maekrak-cond-blog" aria-labelledby="maekrak_cond_blog_title">
        <div class="maekrak-cond-inner">
            <header class="maekrak-cond-head">
                <h2 id="maekrak_cond_blog_title" class="maekrak-cond-title">관련 블로그·사례</h2>
            </header>
            <?php maekrak_render_condition_blog($page); ?>
        </div>
    </section>

    <!-- 9. Byline -->
    <section class="maekrak-cond-section maekrak-cond-byline" aria-labelledby="maekrak_cond_byline_title">
        <div class="maekrak-cond-inner">
            <header class="maekrak-cond-head maekrak-cond-head--center">
                <h2 id="maekrak_cond_byline_title" class="maekrak-cond-title sound_only">의료진 감수</h2>
                <p class="maekrak-cond-byline-lead">이 페이지는 맥락한의원 의료진의 진료 관점과 치료 경험을 바탕으로 작성되었습니다.</p>
            </header>
            <?php maekrak_render_doctor_grid('maekrak-doctor-grid maekrak-cond-byline-grid'); ?>
        </div>
    </section>

    <!-- 10. CTA -->
    <section id="maekrak_cond_cta" class="maekrak-cond-section maekrak-cond-cta" aria-labelledby="maekrak_cond_cta_title">
        <div class="maekrak-cond-cta-inner">
            <h2 id="maekrak_cond_cta_title" class="maekrak-cond-cta-title">반복되는 증상, <strong>이제 원인을 확인해보세요</strong></h2>
            <div class="maekrak-cond-cta-actions">
                <a href="<?php echo $reserve_url; ?>" class="maekrak-btn maekrak-btn-white maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약하기</a>
                <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl"><i class="fa fa-phone"></i> 전화 문의</a>
                <a href="<?php echo $info_url; ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl">오시는 길 보기</a>
            </div>
        </div>
    </section>

</main>
    <?php
}

function maekrak_render_condition_blog($page)
{
    $category = !empty($page['blog_category']) ? $page['blog_category'] : '';
    maekrak_latest_blog($category, 4, 80);
}
