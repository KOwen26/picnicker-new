<div class="bg-white">
    <div>
        <!--
            Mobile filter dialog

            Off-canvas filters for mobile, show/hide based on off-canvas filters state.
          -->
        {{-- <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-data="{ offCanvas: true }">
            <!--
              Off-canvas menu backdrop, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-black bg-opacity-25" x-show="offcanvas" @click="offcanvas = false"></div>

            <div class="fixed inset-0 z-40 flex" x-show="offCanvas">
                <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
                <div class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl"
                    :class="{ 'active': offCanvas }">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button @click="offCanvas = false" type="button"
                            class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 bg-white rounded-md">
                            <span class="sr-only">Close
                                menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4 border-t border-gray-200">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                            <li>
                                <a href="#" class="block px-2 py-3"> Totes </a>
                            </li>

                            <li>
                                <a href="#" class="block px-2 py-3"> Backpacks </a>
                            </li>

                            <li>
                                <a href="#" class="block px-2 py-3"> Travel Bags </a>
                            </li>

                            <li>
                                <a href="#" class="block px-2 py-3"> Hip Bags </a>
                            </li>

                            <li>
                                <a href="#" class="block px-2 py-3"> Laptop Sleeves </a>
                            </li>
                        </ul>

                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Color </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-0">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-0" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            White </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-1" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            Beige </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox"
                                            checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-2" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            Blue </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-3" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            Brown </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-4" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            Green </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-color-5" name="color[]" value="purple"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-color-5" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            Purple </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Category </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-1">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-0" name="category[]" value="new-arrivals"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-category-0"
                                            class="flex-1 min-w-0 ml-3 text-gray-500"> New Arrivals </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-1" name="category[]" value="sale"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-category-1"
                                            class="flex-1 min-w-0 ml-3 text-gray-500"> Sale </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-2" name="category[]" value="travel"
                                            type="checkbox" checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-category-2"
                                            class="flex-1 min-w-0 ml-3 text-gray-500"> Travel </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-3" name="category[]" value="organization"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-category-3"
                                            class="flex-1 min-w-0 ml-3 text-gray-500"> Organization </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-category-4" name="category[]" value="accessories"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-category-4"
                                            class="flex-1 min-w-0 ml-3 text-gray-500"> Accessories </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-6 border-t border-gray-200">
                            <h3 class="flow-root -mx-2 -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-mobile-2" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Size </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-mobile-2">
                                <div class="space-y-6">
                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-0" name="size[]" value="2l"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-0" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            2L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-1" name="size[]" value="6l"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-1" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            6L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-2" name="size[]" value="12l"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-2" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            12L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-3" name="size[]" value="18l"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-3" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            18L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-4" name="size[]" value="20l"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-4" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            20L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-mobile-size-5" name="size[]" value="40l"
                                            type="checkbox" checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-mobile-size-5" class="flex-1 min-w-0 ml-3 text-gray-500">
                                            40L </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <main class="mx-auto max-w-7xl ">
            <div class="relative z-10 flex items-baseline justify-between pt-24 pb-6 mx-4 border-b border-gray-200">
                <h1 class="text-2xl font-extrabold text-gray-900 ">Cari Restoran & Kafe</h1>
                <div class="flex items-center">
                    <div class="relative inline-block text-left" x-data="{ openDropdown: false }">
                        <div>
                            <button type="button"
                                class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900"
                                x-on:click="openDropdown = !openDropdown" id="menu-button" aria-expanded="false"
                                aria-haspopup="true">
                                Sort
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                        <div class="absolute right-0 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                            x-show="openDropdown"
                            x-transition:enter="transition-transform ease-out ease-out duration-100"
                            x-transition:enter-start="opacity-0 transform  scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transition opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            <div class="py-1" role="none">
                                <!--
                        Active: "bg-gray-100", Not Active: ""

                        Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                      -->
                                <span href="#" wire:click="sort('merchant_distance','asc')"
                                    class="block px-4 py-2 text-sm font-medium text-gray-900 hover:cursor-pointer"
                                    role="menuitem" tabindex="-1" id="menu-item-0"> Terdekat </span>
                                <span href="#" wire:click="sort('merchant_distance','desc')"
                                    class="block px-4 py-2 text-sm font-medium text-gray-500 hover:cursor-pointer"
                                    role="menuitem" tabindex="-1" id="menu-item-0"> Terjauh </span>
                                <span href="#" wire:click="sort('merchant_name','asc')"
                                    class="block px-4 py-2 text-sm font-medium text-gray-500 hover:cursor-pointer"
                                    role="menuitem" tabindex="-1" id="menu-item-0"> A - Z </span>
                                <span href="#" wire:click="sort('merchant_name','desc')"
                                    class="block px-4 py-2 text-sm font-medium text-gray-500 hover:cursor-pointer"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Z - A </span>

                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-1"> Best Rating </a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-2"> Newest </a> --}}

                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-3"> Price: Low to High </a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="menu-item-4"> Price: High to Low </a> --}}
                            </div>
                        </div>
                    </div>

                    {{-- <button type="button" class="p-2 ml-5 -m-2 text-gray-400 sm:ml-7 hover:text-gray-500">
                        <span class="sr-only">View grid</span>
                        <!-- Heroicon name: solid/view-grid -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button> --}}
                    {{-- <button type="button" class="p-2 ml-4 -m-2 text-gray-400 sm:ml-6 hover:text-gray-500 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <!-- Heroicon name: solid/filter -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                    </button> --}}
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-x-8 gap-y-10">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <h3 class="sr-only">Categories</h3>
                        {{-- <ul role="list"
                            class="pb-6 space-y-4 text-sm font-medium text-gray-900 border-b border-gray-200">
                            <li>
                                <a href="#"> Totes </a>
                            </li>

                            <li>
                                <a href="#"> Backpacks </a>
                            </li>

                            <li>
                                <a href="#"> Travel Bags </a>
                            </li>

                            <li>
                                <a href="#"> Hip Bags </a>
                            </li>

                            <li>
                                <a href="#"> Laptop Sleeves </a>
                            </li>
                        </ul> --}}

                        {{-- <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Color </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-0">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-color-0" name="color[]" value="white" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-0" class="ml-3 text-sm text-gray-600"> White </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-1" name="color[]" value="beige" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-1" class="ml-3 text-sm text-gray-600"> Beige </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-2" name="color[]" value="blue" type="checkbox"
                                            checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-2" class="ml-3 text-sm text-gray-600"> Blue </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-3" name="color[]" value="brown" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-3" class="ml-3 text-sm text-gray-600"> Brown </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-4" name="color[]" value="green" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-4" class="ml-3 text-sm text-gray-600"> Green </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-5" name="color[]" value="purple" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-color-5" class="ml-3 text-sm text-gray-600"> Purple
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-1" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Category </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-1">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-category-0" name="category[]" value="new-arrivals"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-category-0" class="ml-3 text-sm text-gray-600"> New
                                            Arrivals </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-1" name="category[]" value="sale"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-category-1" class="ml-3 text-sm text-gray-600"> Sale
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-2" name="category[]" value="travel"
                                            type="checkbox" checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-category-2" class="ml-3 text-sm text-gray-600"> Travel
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-3" name="category[]" value="organization"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                                            Organization </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-4" name="category[]" value="accessories"
                                            type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-category-4" class="ml-3 text-sm text-gray-600"> Accessories
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="py-6 border-b border-gray-200">
                            <h3 class="flow-root -my-3">
                                <!-- Expand/collapse section button -->
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white hover:text-gray-500"
                                    aria-controls="filter-section-2" aria-expanded="false">
                                    <span class="font-medium text-gray-900"> Size </span>
                                    <span class="flex items-center ml-6">
                                        <!--
                            Expand icon, show/hide based on section open state.

                            Heroicon name: solid/plus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <!--
                            Collapse icon, show/hide based on section open state.

                            Heroicon name: solid/minus-sm
                          -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div class="pt-6" id="filter-section-2">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-size-0" name="size[]" value="2l" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-0" class="ml-3 text-sm text-gray-600"> 2L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-size-1" name="size[]" value="6l" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-1" class="ml-3 text-sm text-gray-600"> 6L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-size-2" name="size[]" value="12l" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-2" class="ml-3 text-sm text-gray-600"> 12L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-size-3" name="size[]" value="18l" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-3" class="ml-3 text-sm text-gray-600"> 18L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-size-4" name="size[]" value="20l" type="checkbox"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-4" class="ml-3 text-sm text-gray-600"> 20L </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-size-5" name="size[]" value="40l" type="checkbox"
                                            checked
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="filter-size-5" class="ml-3 text-sm text-gray-600"> 40L </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                    <!-- Product grid -->
                    <div class="md:col-span-4">
                        <div class="max-w-2xl px-4 py-12 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
                            {{-- <button type="button" onclick="getLocation()"
                                class="px-8 py-3 mt-4 text-base font-medium text-white rounded-lg bg-info-700 ">Gunakan
                                lokasi saat ini</button> --}}
                            <span>Lokasi saat ini : {{ $latitude }}, {{ $longitude }}, {{ $sort_attribute }},
                                {{ $sort_direction }}</span>
                            {{-- {{ dd($merchants) }} --}}
                            <div
                                class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                @foreach ($merchants as $merchant)
                                    @livewire('merchants.customers-merchant-cards', ['merchant' => $merchant, 'merchant_distance' => $merchant->merchant_distance], key($merchant->merchant_id))
                                @endforeach
                            </div>
                            <div class="mt-6">
                                {{ $merchants?->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        function getLocation() {

            navigator.geolocation.getCurrentPosition((location) => {
                // console.log(location);
                console.log(location.coords.latitude);
                console.log(location.coords.longitude);
                // console.log(location.coords.accuracy);
                @this.set('latitude', location.coords.latitude);
                @this.set('longitude', location.coords.longitude);
                // @this.emitSelf('search');
            });
        }

        function sort(attribute, direction) {
            // console.log(attribute, direction);
            @this.set('sort_attribute', attribute);
            @this.set('sort_direction', direction);
        }
    </script>
</div>
