<?php

if (!function_exists('my_character_limiter')) {
    function my_character_limiter(string $text, int $limit = 100, string $endChar = '...'): string
    {
        $text = strip_tags($text); // Hilangkan tag HTML
        if (strlen($text) <= $limit) {
            return $text;
        }

        $text = substr($text, 0, $limit);
        return rtrim($text) . $endChar;
    }
}
