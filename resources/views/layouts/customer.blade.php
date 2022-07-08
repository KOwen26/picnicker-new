@php
$logged_user = auth()
    ->guard('merchant')
    ->user();
$logged_merchant = $logged_user?->Merchants()?->first();
$merchant_name = $logged_merchant?->merchant_name;
$merchant_owner_name = $logged_user?->merchant_owner_name;
$name = $merchant_name ? "$merchant_name, $merchant_owner_name" : $merchant_owner_name;

if ($logged_merchant?->merchant_type_id == 2) {
    $menu_list->push(['title' => 'Tiket Merchant', 'index' => 1, 'type' => 'general', 'icon' => 'fas fa-ticket', 'route' => 'merchant.home']);
}

$navbar_menu = [['title' => 'Logout', 'index' => 0, 'type' => 'secondary', 'icon' => 'fas fa-arrow-right-from-bracket', 'route' => 'merchant.home', 'component' => 'merchants.merchants-logout']];
@endphp

@extends('layouts.base')
@section('sides', 'Customer')
@section('body')
    <livewire:others.customer-navbar />
    <main class="pb-12 mt-20 lg:px-8">
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
@endsection
