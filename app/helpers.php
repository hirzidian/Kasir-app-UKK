<?php

use Illuminate\Support\Carbon;

if (!function_exists('formattedPrice')) {
    function formattedPrice($number, $currency = 'Rp')
    {
        return $currency . ' ' . number_format($number, 0, ',', '.');
    }
}

if (!function_exists('setNumber')) {
    function setNumber($value)
    {
        return (int) str_replace(['.', ','], '', $value);
    }
}

if (!function_exists('dateYmd')) {
    function dateYmd($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}

if (!function_exists('dateDmy')) {
    function dateDmy($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}
