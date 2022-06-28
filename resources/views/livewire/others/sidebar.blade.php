@php
// $group_list = collect(['general', 'customer', 'merchant', 'report', 'picnicker', 'others']);
// $menu_list = collect([
//     ['title' => 'Home', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-house', 'route' => 'admin.home'],
//     ['title' => 'Transactions', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-book', 'route' => 'admin.employee'],
//     ['title' => 'Payments', 'index' => '0', 'type' => 'general', 'icon' => 'fas fa-dollar', 'route' => 'admin.employee'],
//     ['title' => 'Reports', 'index' => '0', 'type' => 'report', 'icon' => 'fas fa-file-invoice', 'route' => 'admin.employee'],
//     ['title' => 'Customers', 'index' => '0', 'type' => 'customer', 'icon' => 'fas fa-user', 'route' => 'admin.customer'],
//     ['title' => 'Customer Feedback', 'index' => '0', 'type' => 'customer', 'icon' => 'fas fa-face-smile', 'route' => 'admin.customer_feedback'],
//     ['title' => 'Merchants', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-store', 'route' => 'admin.merchant'],
//     ['title' => 'Merchant Tickets', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-ticket', 'route' => 'admin.merchant_tickets'],
//     ['title' => 'Categories', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-cubes-stacked', 'route' => 'admin.employee'],
//     ['title' => 'Facilities', 'index' => '0', 'type' => 'merchant', 'icon' => 'fas fa-list-check', 'route' => 'admin.facilities'],
//     ['title' => 'Employees', 'index' => '0', 'type' => 'picnicker', 'icon' => 'fas fa-users', 'route' => 'admin.employee'],
//     ['title' => 'Banks', 'index' => '0', 'type' => 'others', 'icon' => 'fas fa-bank', 'route' => 'admin.banks'],
//     ['title' => 'Cities', 'index' => '0', 'type' => 'others', 'icon' => 'fas fa-building', 'route' => 'admin.cities'],
// ]);
// $route = url()->current();
// $route = route('admin.home');
$route = Route::currentRouteName();
@endphp

{{-- {{ dd($group_list) }} --}}

<div id="sidebar">
    <nav class="mt-6">
        <div class="">
            @foreach ($group_list as $group)
                @if ($group != 'general')
                    <hr>
                @endif
                @foreach ($menu_list->where('type', '=', $group)->sortBy('index')->all()
    as $menu)
                    <a class="flex items-center justify-start w-full p-2 pl-6 my-2 transition-colors duration-200 border-l-4  hover:text-primary-900 hover:font-bold hover:border-primary-900 @if ($route == $menu['route']) border-primary-900 text-primary-900 font-semibold @else border-transparent text-primary-700 @endif"
                        href="{{ route($menu['route']) }}">
                        <span class="w-4 text-left">
                            <i class="{{ $menu['icon'] }}"></i>
                        </span>
                        <span class="mx-3 text-sm ">
                            {{ $menu['title'] }}
                        </span>
                    </a>
                @endforeach
            @endforeach
        </div>
    </nav>
</div>
