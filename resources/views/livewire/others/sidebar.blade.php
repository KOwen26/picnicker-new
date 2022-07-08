@php
$route = Route::currentRouteName();
@endphp
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
