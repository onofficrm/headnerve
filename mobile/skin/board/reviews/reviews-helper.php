<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('reviews_patient_name')) {
    function reviews_patient_name($view)
    {
        if (!empty($view['wr_1'])) {
            return get_text($view['wr_1']);
        }

        return '환자 님';
    }
}

if (!function_exists('reviews_doctor_name')) {
    function reviews_doctor_name($view)
    {
        if (!empty($view['wr_2'])) {
            return get_text($view['wr_2']);
        }

        return '이재성';
    }
}

if (!function_exists('reviews_summary')) {
    function reviews_summary($view)
    {
        if (!empty($view['wr_3'])) {
            return nl2br(get_text($view['wr_3']));
        }

        $plain = strip_tags($view['wr_content']);
        if ($plain === '') {
            return '';
        }

        return nl2br(get_text(cut_str($plain, 220, '…')));
    }
}

if (!function_exists('reviews_format_date')) {
    function reviews_format_date($datetime)
    {
        if (!$datetime) {
            return '';
        }

        $ts = strtotime($datetime);
        if (!$ts) {
            return get_text($datetime);
        }

        return date('Y년 n월 j일', $ts);
    }
}

if (!function_exists('reviews_booking_url')) {
    function reviews_booking_url()
    {
        if (function_exists('headnerve_nav_booking_url')) {
            return headnerve_nav_booking_url();
        }

        return 'https://booking.naver.com/booking/13/bizes/1120036?area=pll&map-search=1';
    }
}

if (!function_exists('reviews_tel_href')) {
    function reviews_tel_href()
    {
        if (function_exists('headnerve_nav_tel_href')) {
            return headnerve_nav_tel_href();
        }

        return 'tel:0269597252';
    }
}

if (!function_exists('reviews_phone_label')) {
    function reviews_phone_label()
    {
        if (function_exists('g5site_cfg')) {
            $phone = g5site_cfg('phone', '');
            if ($phone !== '') {
                return get_text($phone);
            }
        }

        return '02.6959.7252';
    }
}

if (!function_exists('reviews_list_url')) {
    function reviews_list_url($bo_table, $sca = '')
    {
        $url = get_pretty_url($bo_table);
        if ($sca !== '') {
            $url .= (strpos($url, '?') !== false ? '&' : '?').'sca='.urlencode($sca);
        }

        return $url;
    }
}
