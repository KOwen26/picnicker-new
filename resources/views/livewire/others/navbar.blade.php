<div id="top-bar" class="fixed right-0 z-20 w-full py-2 bg-white shadow-md lg:w-4/5">
    <header class="flex items-center justify-between w-full h-16 ">
        <div class="flex ml-6 lg:hidden">
            <button class="flex items-center p-2 text-gray-500 bg-white rounded-full shadow text-md">
                <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="z-20 flex flex-col px-3 md:w-full">
            <div class="flex items-center justify-end w-full p-1 space-x-4">

                {{-- <button
                    class="flex items-center p-2 text-gray-400 bg-white rounded-full shadow hover:text-gray-700 text-md">
                    <i class="w-6 h-full fas fa-bell"></i>
                </button>
                <span class="w-1 h-8 bg-gray-200 rounded-lg">
                </span> --}}
                <a href="#" class="relative block">
                    {{-- <img alt="profil" src="/images/person/1.jpg" class="object-cover w-10 h-10 mx-auto rounded-full " /> --}}
                </a>
                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                    class="text-primary-900 hover:text-primary-900 font-medium hover:font-semibold rounded-lg  px-4 py-2.5 text-center inline-flex items-center"
                    type="button">{{ $name }}
                    <i class="w-5 h-5 ml-2 fas fa-chevron-down">

                    </i>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownDivider"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                        @forelse ($menu_list->where('type','primary') as $menu)
                            <li>
                                <a href="{{ route($menu['route']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 ">{{ Str::title($menu['title']) }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                    <div class="py-1">
                        @forelse ($menu_list->where('type','secondary') as $menu)
                            @if ($menu['component'])
                                @livewire($menu['component'])
                            @else
                                <a href="{{ route($menu['route']) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <span class="w-4 h-4 mr-2 ">
                                        <i class="{{ $menu['icon'] }}"></i>
                                    </span>
                                    {{ Str::title($menu['title']) }}</a>
                            @endif
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
