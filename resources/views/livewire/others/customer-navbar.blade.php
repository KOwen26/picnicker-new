<header class="fixed top-0 z-30 w-full shadow">
    <nav class="px-4 py-3 bg-white border-gray-200 rounded">
        <div class="container flex flex-wrap items-center justify-between mx-auto lg:px-8 ">
            <a href="{{ route('customer.home') }}" class="flex items-center">
                <div class="flex self-center mr-3 h-14 ">
                    <img src="{{ asset('images/LogoOnly.svg') }}" class="w-full " alt="Picnicker">
                </div>
                <span class="self-center text-xl font-semibold whitespace-nowrap">Picnicker</span>
            </a>
            {{-- Search --}}
            <div class="flex">
                <button type="button" data-collapse-toggle="mobile-menu-3" aria-controls="mobile-menu-3"
                    aria-expanded="false"
                    class="p-3 mr-1 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 ">
                    <span class="w-5 h-5">
                        <i class="w-full text-lg fas fa-magnifying-glass"></i>
                    </span>
                </button>
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="w-full text-gray-600 fas fa-magnifying-glass"></i>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 pl-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-900 focus:border-primary-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-900 dark:focus:border-primary-900"
                        placeholder="Cari Restoran">
                </div>
                <button data-collapse-toggle="mobile-menu-3" type="button"
                    class="inline-flex items-center p-2 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-3" aria-expanded="false">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            {{-- Menu --}}
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-3">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 pl-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-900 focus:border-primary-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-900 dark:focus:border-primary-900"
                        placeholder="Cari">
                </div>
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md: md:font-medium">
                    {{-- <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white rounded bg-primary-700 md:bg-transparent md:text-primary-700 md:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li class="">
                        <a href="#"
                            class="block py-2 pl-3 pr-4 border-b border-gray-100 text-primary-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li> --}}
                    <li>
                        @if (auth()->guard('customer')->user())
                            {{-- <span class="mr-3">
                                Hai {{ auth()?->guard('customer')?->user()->customer_name }}
                            </span>
                            <span class="border-r-2 border-primary-700"></span> --}}

                            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                class="text-primary-900 hover:text-primary-900 font-medium hover:font-semibold rounded-lg  px-4 py-2.5 text-center inline-flex items-center"
                                type="button">{{ auth()?->guard('customer')?->user()->customer_name }}
                                <i class="w-5 h-5 ml-2 fas fa-chevron-down">

                                </i>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownDivider"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDividerButton">
                                    <li>
                                        <a href="{{ route('customer.transaction') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 ">Reservasi</a>
                                    </li>
                                    {{-- @forelse ($menu_list->where('type','primary') as $menu)
                                    @empty
                                    @endforelse --}}
                                </ul>
                                <div class="py-1">
                                    <button type="button" wire:click="logout"
                                        class="inline-block py-2 ml-3 border-b border-gray-100 text-primary-700 hover:text-danger-900 md:hover:bg-transparent md:border-0 md:p-0 ">Logout</button>

                                </div>
                            </div>
                        @else
                            <button type="button" wire:click="loginModal"
                                class="inline-block py-2 mr-3 border-b border-gray-100 text-primary-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary-900 md:p-0 ">Login</button>
                            <span class="border-r-2 border-primary-700"></span>
                            <button type="button" wire:click="registerModal"
                                class="inline-block py-2 ml-3 border-b border-gray-100 text-primary-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary-900 md:p-0 ">Daftar</button>
                        @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>
