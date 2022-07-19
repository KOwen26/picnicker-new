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

if (!function_exists('haversine')) {
    function haversine($lat1, $lon1, $lat2, $lon2)
    {
        // current_pos
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        // destination
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
        // earth radius const
        $earth_radius = 6371;
        // differences
        $diff_lat = $lat2 - $lat1;
        $diff_lon = $lon2 - $lon1;
        // calculation
        $distance_1 = sin($diff_lat / 2) ** 2 +
            cos($lat1) *
            cos($lat2) *
            sin($diff_lon / 2) ** 2;
        $distance = round($earth_radius * (2 * asin(sqrt($distance_1))), 3);
        return $distance;
    };
}