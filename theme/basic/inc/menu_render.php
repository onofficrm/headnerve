<?php
if (!defined('_GNUBOARD_')) exit;

/**
 * 그누보드 메뉴 2단 구조(1차 + 서브) 렌더링
 */
function maekrak_get_fallback_menu()
{
    global $maekrak_departments;

    $dept_sub = array();
    foreach ($maekrak_departments as $dept) {
        $dept_sub[] = array(
            'me_name' => $dept['title'],
            'me_link' => $dept['link'],
            'me_target' => 'self',
        );
    }

    return array(
        array(
            'me_name' => '브랜드 철학',
            'me_link' => G5_URL . '/#maekrak_philosophy',
            'me_target' => 'self',
            'sub' => array(),
        ),
        array(
            'me_name' => '진료과목',
            'me_link' => G5_URL . '/#maekrak_dept',
            'me_target' => 'self',
            'sub' => $dept_sub,
        ),
        array(
            'me_name' => '치료 프로그램',
            'me_link' => G5_URL . '/#maekrak_program',
            'me_target' => 'self',
            'sub' => array(),
        ),
        array(
            'me_name' => '의료진',
            'me_link' => G5_URL . '/#maekrak_doctor',
            'me_target' => 'self',
            'sub' => array(),
        ),
        array(
            'me_name' => '블로그',
            'me_link' => G5_URL . '/#maekrak_blog',
            'me_target' => 'self',
            'sub' => array(),
        ),
        array(
            'me_name' => '오시는 길',
            'me_link' => G5_URL . '/#maekrak_info',
            'me_target' => 'self',
            'sub' => array(),
        ),
    );
}

function maekrak_menu_has_sub($row)
{
    return !empty($row['sub']) && is_array($row['sub']) && count($row['sub']) > 0;
}

function maekrak_render_gnb_menu($menu_datas)
{
    if (empty($menu_datas)) {
        return;
    }

    foreach ($menu_datas as $row) {
        if (empty($row['me_name'])) {
            continue;
        }

        $has_sub = maekrak_menu_has_sub($row);
        $target = !empty($row['me_target']) ? $row['me_target'] : 'self';
        ?>
    <li class="maekrak-gnb-item<?php echo $has_sub ? ' maekrak-gnb-item--has-sub' : ''; ?>">
        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $target; ?>" class="maekrak-gnb-link"><?php echo $row['me_name']; ?><?php if ($has_sub) { ?> <i class="fa fa-angle-down" aria-hidden="true"></i><?php } ?></a>
        <?php if ($has_sub) { ?>
        <ul class="maekrak-gnb-sub">
            <?php foreach ($row['sub'] as $sub) {
                if (empty($sub['me_name'])) {
                    continue;
                }
                $sub_target = !empty($sub['me_target']) ? $sub['me_target'] : 'self';
                ?>
            <li><a href="<?php echo $sub['me_link']; ?>" target="_<?php echo $sub_target; ?>"><?php echo $sub['me_name']; ?></a></li>
            <?php } ?>
        </ul>
        <?php } ?>
    </li>
        <?php
    }
}

function maekrak_render_drawer_menu($menu_datas)
{
    if (empty($menu_datas)) {
        return;
    }

    foreach ($menu_datas as $row) {
        if (empty($row['me_name'])) {
            continue;
        }

        $has_sub = maekrak_menu_has_sub($row);
        $target = !empty($row['me_target']) ? $row['me_target'] : 'self';

        if ($has_sub) {
            ?>
    <li class="maekrak-drawer-group">
        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $target; ?>" class="maekrak-drawer-parent"><?php echo $row['me_name']; ?></a>
        <ul class="maekrak-drawer-sub-list">
            <?php foreach ($row['sub'] as $sub) {
                if (empty($sub['me_name'])) {
                    continue;
                }
                $sub_target = !empty($sub['me_target']) ? $sub['me_target'] : 'self';
                ?>
            <li><a href="<?php echo $sub['me_link']; ?>" target="_<?php echo $sub_target; ?>"><?php echo $sub['me_name']; ?></a></li>
            <?php } ?>
        </ul>
    </li>
            <?php
        } else {
            ?>
    <li><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $target; ?>"><?php echo $row['me_name']; ?></a></li>
            <?php
        }
    }
}
