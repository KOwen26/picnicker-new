@php
$group_list = collect(['general', 'customer', 'merchant', 'report', 'picnicker', 'others']);
$menu_list = collect([
    ['title' => 'Home', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-house', 'route' => 'admin.home'],
    ['title' => 'Transactions', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-book', 'route' => 'admin.employee'],
    ['title' => 'Payments', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-dollar', 'route' => 'admin.employee'],
    ['title' => 'Reports', 'index' => '0', 'type' => 'report', 'icon' => 'fas fa-file-invoice', 'route' => 'admin.employee'],
    ['title' => 'Customers', 'index' => '0', 'type' => 'customer', 'icon' => 'fas fa-user', 'route' => 'admin.customer'],
    ['title' => 'Customer Feedback', 'index' => '0', 'type' => 'customer', 'icon' => 'fas fa-face-smile', 'route' => 'admin.customer_feedback'],
    ['title' => 'Merchants', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-store', 'route' => 'admin.merchant'],
    // ['title' => 'Merchant Tickets', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-ticket', 'route' => 'admin.merchant_tickets'],
    ['title' => 'Categories', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-cubes-stacked', 'route' => 'admin.employee'],
    ['title' => 'Facilities', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-list-check', 'route' => 'admin.facilities'],
    ['title' => 'Employees', 'index' => '0', 'type' => 'picnicker', 'icon' => 'fas fa-users', 'route' => 'admin.employee'],
    ['title' => 'Banks', 'index' => '0', 'type' => 'others', 'icon' => 'fas fa-bank', 'route' => 'admin.banks'],
    ['title' => 'Cities', 'index' => '0', 'type' => 'others', 'icon' => 'fas fa-building', 'route' => 'admin.cities'],
]);

$logged_admin = auth()
    ->guard('admin')
    ->user();

$navbar_menu = [['title' => 'Logout', 'index' => 0, 'type' => 'secondary', 'icon' => 'fas fa-arrow-right-from-bracket', 'route' => 'admin.home', 'component' => 'employees.employees-logout']];
@endphp

@extends('layouts.base')
@section('sides', 'Admin')
@section('body')
    <main class="bg-primary-100 ">
        <div class="flex items-start justify-between ">
            <div class="hidden w-40 lg:block lg:w-60 xl:w-[22rem] 2xl:w-[24rem]">
                <div class="fixed z-[21] w-1/5 h-full overflow-y-scroll bg-white shadow-xl">
                    <div class="flex items-center justify-start py-8 ml-8">
                        <p class="text-xl font-bold">
                            Picnicker
                        </p>
                    </div>
                    <livewire:others.sidebar :group_list="$group_list" :menu_list="$menu_list" />
                </div>
            </div>
            <div class="flex flex-col w-full md:space-y-4">
                <livewire:others.navbar :name="$logged_admin->employee_name" :menu_list="$navbar_menu" />
                <div id="main" class="min-h-screen px-4 pb-8 lg:max-w-screen-lg 2xl:max-w-screen-2xl lg:pr-7 pt-28">
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>
    </main>
@endsection
