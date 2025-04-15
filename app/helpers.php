<?php

use Illuminate\Support\Carbon;

if (!function_exists('formattedPrice')) {
    /**
     * Format angka ke bentuk harga dengan mata uang.
     * Contoh: 10000 => Rp 10.000
     */
    function formattedPrice($number, $currency = 'Rp')
    {
        return $currency . ' ' . number_format($number, 0, ',', '.');
    }
}

if (!function_exists('setNumber')) {
    /**
     * Bersihkan string angka dari titik dan koma lalu konversi ke integer.
     * Contoh: '10.000' => 10000
     */
    function setNumber($value)
    {
        return (int) str_replace(['.', ','], '', $value);
    }
}

if (!function_exists('dateYmd')) {
    /**
     * Format tanggal ke bentuk Y-m-d (misal untuk ke database).
     */
    function dateYmd($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}

if (!function_exists('dateDmy')) {
    /**
     * Format tanggal ke bentuk d-m-Y (untuk tampilan ke user).
     */
    function dateDmy($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}
