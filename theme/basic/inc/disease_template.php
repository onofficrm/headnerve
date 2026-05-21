<?php
if (!defined('_GNUBOARD_')) exit;

include_once G5_THEME_PATH . '/inc/disease_data.php';
include_once G5_THEME_PATH . '/inc/condition_data.php';
include_once G5_THEME_PATH . '/inc/blog_latest.php';
include_once G5_THEME_PATH . '/inc/hero_helper.php';
include_once G5_THEME_PATH . '/inc/faq_jsonld.php';

function maekrak_render_disease_page($page)
{
    if (!$page || empty($page['co_id'])) {
        return;
    }

    global $maekrak_doctors;

    $co_id = $page['co_id'];
    $parent_url = maekrak_condition_url($page['parent_co_id']);
    $reserve_url = defined('MK_RESERVE_URL') ? MK_RESERVE_URL : (G5_BBS_URL . '/qalist.php');
    $info_url = G5_URL . '/#maekrak_info';
    $dept_list_url = G5_URL . '/#maekrak_dept';
    $dis_accent = maekrak_disease_accent($page['parent_co_id']);
    $dis_hero_img = maekrak_hero_image_for_page($page);
    $dis_variant = maekrak_hero_variant_class($page);
    ?>
<main class="maekrak-dis maekrak-dis--<?php echo $page['parent_co_id']; ?> <?php echo $dis_variant; ?>" id="maekrak_dis_<?php echo $co_id; ?>" style="--maekrak-dis-accent: <?php echo $dis_accent; ?>;">
    <!-- 1. 서브 히어로 -->
    <section class="maekrak-dis-hero" aria-labelledby="maekrak_dis_hero_title">
        <div class="maekrak-dis-hero-inner">
            <nav class="maekrak-dis-breadcrumb" aria-label="breadcrumb">
                <ol>
                    <li><a href="<?php echo G5_URL; ?>">홈</a></li>
                    <li><a href="<?php echo $dept_list_url; ?>">진료과목</a></li>
                    <li><a href="<?php echo $parent_url; ?>"><?php echo $page['parent_name']; ?></a></li>
                    <li aria-current="page"><?php echo $page['page_name']; ?></li>
                </ol>
            </nav>
            <div class="maekrak-dis-hero-grid">
                <div class="maekrak-dis-hero-text">
                    <p class="maekrak-dis-hero-label"><?php echo $page['page_name']; ?></p>
                    <h1 id="maekrak_dis_hero_title" class="maekrak-dis-hero-title"><?php echo $page['hero_copy']; ?></h1>
                    <p class="maekrak-dis-hero-desc"><?php echo $page['hero_desc']; ?></p>
                    <div class="maekrak-dis-hero-actions">
                        <a href="<?php echo $reserve_url; ?>" class="maekrak-btn maekrak-btn-primary maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약</a>
                        <a href="<?php echo $parent_url; ?>" class="maekrak-btn maekrak-btn-outline maekrak-btn-xl">상위 진료과목 보기</a>
                    </div>
                </div>
                <div class="maekrak-dis-hero-visual">
                    <?php
                    maekrak_render_hero_visual(array(
                        'context' => 'disease',
                        'image_url' => $dis_hero_img,
                        'alt' => $page['page_name'],
                        'keywords' => $page['visual_keywords'],
                        'decorative' => true,
                        'variant_class' => $dis_variant,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. AI 인용 앵커 -->
    <section class="maekrak-dis-section maekrak-dis-anchor" aria-labelledby="maekrak_dis_anchor_title">
        <div class="maekrak-dis-inner">
            <h2 id="maekrak_dis_anchor_title" class="sound_only">질환 정의와 맥락한의원의 관점</h2>
            <div class="maekrak-dis-anchor-grid">
                <div class="maekrak-dis-anchor-box maekrak-dis-anchor-box--def">
                    <h3 class="maekrak-dis-anchor-label">질환 정의</h3>
                    <p><?php echo $page['ai_anchor']; ?></p>
                </div>
                <div class="maekrak-dis-anchor-box maekrak-dis-anchor-box--view">
                    <h3 class="maekrak-dis-anchor-label">맥락한의원의 관점</h3>
                    <p><?php echo $page['clinic_view']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. 증상 체크리스트 -->
    <section class="maekrak-dis-section maekrak-dis-symptoms" aria-labelledby="maekrak_dis_symptoms_title">
        <div class="maekrak-dis-inner maekrak-dis-inner--narrow">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_symptoms_title" class="maekrak-dis-title">이런 증상이 있다면 의심하세요</h2>
            </header>
            <ul class="maekrak-dis-symptom-list">
                <?php foreach ($page['symptoms'] as $item) { ?>
                <li><i class="fa fa-check-circle" aria-hidden="true"></i><span><?php echo $item; ?></span></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 4. 왜 생기는가 -->
    <section class="maekrak-dis-section maekrak-dis-why" aria-labelledby="maekrak_dis_why_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_why_title" class="maekrak-dis-title">왜 생기는가</h2>
            </header>
            <div class="maekrak-dis-prose">
                <p><?php echo $page['why_intro']; ?></p>
                <p><?php echo $page['why_body']; ?></p>
            </div>
            <ul class="maekrak-dis-why-grid">
                <?php foreach ($page['why_cards'] as $i => $card) { ?>
                <li class="maekrak-dis-why-card">
                    <span class="maekrak-dis-why-num" aria-hidden="true"><?php echo $i + 1; ?></span>
                    <h3><?php echo $card['title']; ?></h3>
                    <p><?php echo $card['desc']; ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 5. 치료 방법 -->
    <section class="maekrak-dis-section maekrak-dis-treat" aria-labelledby="maekrak_dis_treat_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_treat_title" class="maekrak-dis-title">한의원에서 어떻게 치료하나요</h2>
                <p class="maekrak-dis-desc"><?php echo $page['treatment_note']; ?></p>
            </header>
            <ul class="maekrak-dis-treat-grid">
                <?php foreach ($page['treatments'] as $t) { ?>
                <li class="maekrak-dis-treat-card">
                    <h3><?php echo $t['title']; ?></h3>
                    <p class="maekrak-dis-treat-goal"><strong>치료 목표</strong> <?php echo $t['goal']; ?></p>
                    <p><?php echo $t['desc']; ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <!-- 6. 치료 사례 요약 -->
    <?php $dis_cases = maekrak_disease_cases($page); ?>
    <?php if ($dis_cases) { ?>
    <section class="maekrak-dis-section maekrak-dis-case" aria-labelledby="maekrak_dis_case_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_case_title" class="maekrak-dis-title">실제 치료 사례 요약</h2>
                <p class="maekrak-dis-disclaimer">아래 사례는 진료 관점을 설명하기 위한 요약이며, <strong>개인에 따라 치료 경과는 다를 수 있습니다.</strong></p>
            </header>
            <div class="maekrak-dis-case-grid">
                <?php foreach ($dis_cases as $c) { ?>
                <div class="maekrak-dis-case-card">
                    <h3 class="maekrak-dis-case-card-title"><?php echo $c['title']; ?></h3>
                    <dl class="maekrak-dis-case-dl">
                        <div><dt>환자 유형</dt><dd><?php echo $c['patient_type']; ?></dd></div>
                        <div><dt>치료 전 상태</dt><dd><?php echo $c['before']; ?></dd></div>
                        <div><dt>기존 치료 이력</dt><dd><?php echo $c['history']; ?></dd></div>
                        <div><dt>맥락한의원 평가</dt><dd><?php echo $c['assessment']; ?></dd></div>
                        <div><dt>치료 방향</dt><dd><?php echo $c['treatment_direction']; ?></dd></div>
                        <div><dt>경과 요약</dt><dd><?php echo $c['progress']; ?></dd></div>
                    </dl>
                    <a href="#maekrak_dis_blog" class="maekrak-btn maekrak-btn-pill">관련 블로그·사례 글 보기</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- 7. FAQ -->
    <section class="maekrak-dis-section maekrak-dis-faq" aria-labelledby="maekrak_dis_faq_title">
        <div class="maekrak-dis-inner maekrak-dis-inner--narrow">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_faq_title" class="maekrak-dis-title">자주 묻는 질문</h2>
            </header>
            <div class="maekrak-dis-faq-list" itemscope itemtype="https://schema.org/FAQPage">
                <?php foreach ($page['faq'] as $i => $faq) { ?>
                <details class="maekrak-dis-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"<?php echo $i === 0 ? ' open' : ''; ?>>
                    <summary itemprop="name"><?php echo $faq['q']; ?></summary>
                    <div class="maekrak-dis-faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text"><?php echo $faq['a']; ?></p>
                    </div>
                </details>
                <?php } ?>
            </div>
            <?php maekrak_render_faq_jsonld($page['faq']); ?>
        </div>
    </section>

    <!-- 8. 관련 블로그 -->
    <section id="maekrak_dis_blog" class="maekrak-dis-section maekrak-dis-blog" aria-labelledby="maekrak_dis_blog_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_blog_title" class="maekrak-dis-title">관련 블로그·사례 글</h2>
            </header>
            <?php maekrak_render_disease_blog($page); ?>
        </div>
    </section>

    <!-- 9. 관련 페이지 -->
    <section class="maekrak-dis-section maekrak-dis-related" aria-labelledby="maekrak_dis_related_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head">
                <h2 id="maekrak_dis_related_title" class="maekrak-dis-title">관련 페이지</h2>
            </header>
            <div class="maekrak-dis-related-parent">
                <a href="<?php echo $parent_url; ?>" class="maekrak-dis-related-parent-link">
                    <span class="maekrak-dis-related-label">상위 진료과목</span>
                    <strong><?php echo $page['parent_name']; ?> 전체 보기</strong>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
            <?php if (!empty($page['related'])) { ?>
            <ul class="maekrak-dis-related-grid">
                <?php foreach ($page['related'] as $rel) {
                    $rel_url = maekrak_disease_related_url($rel);
                    $is_ready = !empty($rel['co_id']) && maekrak_is_disease_co_id($rel['co_id']);
                    ?>
                <li>
                    <a href="<?php echo $rel_url; ?>" class="maekrak-dis-related-card"<?php echo $is_ready ? '' : ' title="상세 페이지 준비 중"'; ?>>
                        <span><?php echo $rel['name']; ?></span>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </section>

    <!-- 10. Byline -->
    <section class="maekrak-dis-section maekrak-dis-byline" aria-labelledby="maekrak_dis_byline_title">
        <div class="maekrak-dis-inner">
            <header class="maekrak-dis-head maekrak-dis-head--center">
                <h2 id="maekrak_dis_byline_title" class="sound_only">의료진 감수</h2>
                <p class="maekrak-dis-byline-lead">이 페이지는 맥락한의원 의료진의 진료 관점과 치료 경험을 바탕으로 작성되었습니다.</p>
            </header>
            <?php maekrak_render_doctor_grid('maekrak-doctor-grid maekrak-dis-byline-grid'); ?>
        </div>
    </section>

    <!-- 11. CTA -->
    <section id="maekrak_dis_cta" class="maekrak-dis-section maekrak-dis-cta" aria-labelledby="maekrak_dis_cta_title">
        <div class="maekrak-dis-cta-inner">
            <h2 id="maekrak_dis_cta_title" class="maekrak-dis-cta-title">반복되는 증상, <strong>이제 원인을 확인해보세요</strong></h2>
            <div class="maekrak-dis-cta-actions">
                <a href="<?php echo $reserve_url; ?>" class="maekrak-btn maekrak-btn-white maekrak-btn-xl"<?php echo maekrak_reserve_link_attr(); ?>>상담 예약하기</a>
                <a href="<?php echo maekrak_tel_href(); ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl"><i class="fa fa-phone"></i> 전화 문의</a>
                <a href="<?php echo $info_url; ?>" class="maekrak-btn maekrak-btn-ghost maekrak-btn-xl">오시는 길 보기</a>
            </div>
        </div>
    </section>
</main>
    <?php
}

function maekrak_render_disease_blog($page)
{
    $category = !empty($page['blog_category']) ? $page['blog_category'] : '';
    maekrak_latest_blog($category, 4, 80);
}
