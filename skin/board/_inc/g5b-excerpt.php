<?php
if (!defined('_GNUBOARD_')) {
    exit;
}

if (!function_exists('g5b_board_strip_json_ld_text')) {
    function g5b_board_strip_json_ld_text($text)
    {
        $text = (string) $text;

        while (($context_pos = strpos($text, '"@context"')) !== false) {
            $start = strrpos(substr($text, 0, $context_pos), '{');
            if ($start === false) {
                break;
            }

            $len = strlen($text);
            $depth = 0;
            $in_string = false;
            $escaped = false;
            $end = null;

            for ($i = $start; $i < $len; $i++) {
                $ch = $text[$i];
                if ($in_string) {
                    if ($escaped) {
                        $escaped = false;
                    } elseif ($ch === '\\') {
                        $escaped = true;
                    } elseif ($ch === '"') {
                        $in_string = false;
                    }
                    continue;
                }

                if ($ch === '"') {
                    $in_string = true;
                } elseif ($ch === '{') {
                    $depth++;
                } elseif ($ch === '}') {
                    $depth--;
                    if ($depth <= 0) {
                        $end = $i + 1;
                        break;
                    }
                }
            }

            if ($end === null) {
                $text = substr($text, 0, $start);
                break;
            }

            $text = substr($text, 0, $start) . ' ' . substr($text, $end);
        }

        return $text;
    }
}

if (!function_exists('g5b_board_clean_excerpt_text')) {
    function g5b_board_clean_excerpt_text($html)
    {
        $html = html_entity_decode((string) $html, ENT_QUOTES, 'UTF-8');
        $html = preg_replace('#<(script|style|noscript|template)\b[^>]*>.*?</\1>#isu', ' ', $html);
        $html = preg_replace('#<(p|div|span|h[1-6])\b[^>]*>\s*[\p{L}\p{N}\s_.(){}\[\]-]+\.(?:png|jpe?g|gif|webp)\s*</\1>#iu', ' ', $html);
        $text = trim(strip_tags($html));
        $text = g5b_board_strip_json_ld_text($text);

        $lines = preg_split('/\R/u', $text);
        $clean_lines = array();
        foreach ($lines as $line) {
            $line = trim(preg_replace('/\s+/u', ' ', (string) $line));
            if ($line === '') {
                continue;
            }
            if (preg_match('/^[\p{L}\p{N}\s_.(){}\[\]-]+\.(?:png|jpe?g|gif|webp)$/iu', $line)) {
                continue;
            }
            $clean_lines[] = $line;
        }

        return trim(preg_replace('/\s+/u', ' ', implode(' ', $clean_lines)));
    }
}

if (!function_exists('g5b_board_clean_excerpt')) {
    function g5b_board_clean_excerpt($html, $length = 120, $suffix = '…')
    {
        $text = g5b_board_clean_excerpt_text($html);
        if ($text === '') {
            return '';
        }

        return cut_str($text, (int) $length, $suffix);
    }
}
