<?php

if (!function_exists('day_name')) {
    function day_name()
    {
        return [
            ['id' => 'monday', 'alias' => 'Senin'],
            ['id' => 'tuesday', 'alias' => 'Selasa'],
            ['id' => 'wednesday', 'alias' => 'Rabu'],
            ['id' => 'thursday', 'alias' => 'Kamis'],
            ['id' => 'friday', 'alias' => 'Jumat'],
            ['id' => 'saturday', 'alias' => 'Sabtu'],
            ['id' => 'sunday', 'alias' => 'Minggu'],
        ];
    }
}

if (!function_exists('picture_url')) {
    function picture_url($picture_location, $picture_filename)
    {
        return asset(str_replace('public', 'storage', $picture_location) . '\\' . $picture_filename);
    }
}

if (!function_exists('transaction_status_alias')) {
    function transaction_status_alias()
    {
        return [
            ['id' => 'NEW', 'alias' => 'Reservasi Baru'],
            ['id' => 'VERIFIED', 'alias' => 'Sudah Terverfikasi'],
            ['id' => 'FINISHED', 'alias' => 'Reservasi Selesai'],
            ['id' => 'CANCELED', 'alias' => 'Reservasi Dibatalkan'],
            ['id' => 'UNPAID', 'alias' => 'Menunggu Pembayaran'],
            ['id' => 'PAID', 'alias' => 'Sudah Terbayar'],
            ['id' => 'FAILED', 'alias' => 'Pembayaran Gagal'],
        ];
    }
}