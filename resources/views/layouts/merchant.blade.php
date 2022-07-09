@php
$group_list = collect(['general', 'report', 'merchant']);
$menu_list = collect([['title' => 'Halaman Utama', 'index' => 0, 'type' => 'general', 'icon' => 'fas fa-house', 'route' => 'merchant.home'], ['title' => 'Daftar Transaksi', 'index' => 2, 'type' => 'general', 'icon' => 'fas fa-book', 'route' => 'merchant.transaction'], ['title' => 'Saldo Merchant', 'index' => 3, 'type' => 'general', 'icon' => 'fas fa-money-bills', 'route' => 'merchant.home'], ['title' => 'Feedback Pelanggan', 'index' => 4, 'type' => 'general', 'icon' => 'fas fa-face-smile', 'route' => 'merchant.customer-feedback'], ['title' => 'Laporan Transaksi', 'index' => 0, 'type' => 'report', 'icon' => 'fas fa-file-invoice', 'route' => 'merchant.transaction-report'], ['title' => 'Customers', 'index' => 0, 'type' => 'customer', 'icon' => 'fas fa-user', 'route' => 'merchant.home'], ['title' => 'Ubah Data Merchant', 'index' => 0, 'type' => 'merchant', 'icon' => 'fas fa-pen-to-square', 'route' => 'merchant.finalize']]);

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
@section('sides', 'Merchant')
@section('body')
    {{-- <main class="bg-primary-100 ">
        <div class="flex items-start justify-between ">
            <div class="hidden w-40 lg:block lg:w-60 xl:w-[22rem] 2xl:w-[24rem]">
                <div class="fixed z-[21] w-1/5 h-full bg-white shadow-xl ">
                    <div class="flex items-center justify-start py-8 ml-8">
                        <p class="text-xl font-bold">
                            Merchant Picnicker
                        </p>
                    </div>
                    <livewire:others.sidebar :group_list="$group_list" :menu_list="$menu_list" />
                </div>
            </div>
            <div class="flex flex-col w-full md:space-y-4">
                <livewire:others.navbar :name="$name" :menu_list="$navbar_menu" />
                <div id="main" class="min-h-screen px-4 pb-8 lg:max-w-screen-lg 2xl:max-w-screen-2xl lg:pr-7 pt-28">
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>
    </main> --}}
    <main class="w-full min-h-screen text-gray-700 bg-gray-100 " x-data="layout">
        <livewire:others.navbar :name="$name" :menu_list="$navbar_menu" />
        <div class="flex pt-20">
            <!-- aside -->
            <aside class="absolute z-10 flex flex-col w-full min-h-screen overflow-y-auto bg-white md:z-0 md:fixed md:w-1/5"
                x-show="asideOpen">
                <livewire:others.sidebar :group_list="$group_list" :menu_list="$menu_list" />
            </aside>

            <!-- main content page -->
            <div class="flex flex-grow w-4/5 p-4 " x-bind:class=" asideOpen ? 'sm:ml-[20%]' : ''">
                <div id="main" class="min-h-screen pb-8 overflow-auto ">
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>
    </main>
@endsection
