<?php

if (!function_exists('money')) {
    function money($value, $prefix = 'R$ ', $decimal = ',', $thousand = '.')
    {
        return $prefix . number_format($value, 2, $decimal, $thousand);
    }
}