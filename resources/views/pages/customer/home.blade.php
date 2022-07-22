@extends('layouts.customer')
@section('content')
    <div class="pt-10">
        {{-- <div class="container">
            <div id="default-carousel" class="relative" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    <!-- Item 1 -->
                    <div class="absolute inset-0 transition-all duration-700 ease-in-out transform translate-x-0"
                        data-carousel-item="">
                        <span
                            class="absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First
                            Slide</span>
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="absolute inset-0 transition-all duration-700 ease-in-out transform translate-x-full"
                        data-carousel-item="">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="absolute inset-0 transition-all duration-700 ease-in-out transform -translate-x-full"
                        data-carousel-item="">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-20 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 bg-white rounded-full dark:bg-gray-800" aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button"
                        class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                        aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button"
                        class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                        aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-20 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev="">
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-20 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next="">
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
        </div> --}}
        <div>
            <div class="bg-gray-100">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-2xl py-12 mx-auto lg:max-w-none">
                        <h2 class="text-2xl font-extrabold text-gray-900">Our Resto & Cafe Collections</h2>
                        <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                            <div class="relative group">
                                <div
                                    class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                    <img src="{{ asset('images/cafe1.webp') }}" alt="Cafe"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                {{-- <h3 class="mt-6 text-sm text-gray-500">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Desk and Office
                                    </a>
                                </h3>
                                <p class="text-base font-semibold text-gray-900">Work from home accessories</p> --}}
                            </div>

                            <div class="relative group">
                                <div
                                    class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                    <img src="{{ asset('images/cafe2.webp') }}" alt="Cafe"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                {{-- <h3 class="mt-6 text-sm text-gray-500">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Self-Improvement
                                    </a>
                                </h3>
                                <p class="text-base font-semibold text-gray-900">Journals and note-taking</p> --}}
                            </div>

                            <div class="relative group">
                                <div
                                    class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                    <img src="{{ asset('images/cafe3.webp') }}" alt="Cafe"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                {{-- <h3 class="mt-6 text-sm text-gray-500">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Travel
                                    </a>
                                </h3>
                                <p class="text-base font-semibold text-gray-900">Daily commute essentials</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between my-6">
                    <h2 class="text-2xl font-extrabold text-gray-900 ">Daftar Restoran & Kafe
                    </h2>
                    <a class="text-base font-medium text-secondary-900" href="{{ route('customer.merchant-list') }}">Lihat
                        Semua</a>
                </div>
            </div>
            <livewire:merchants.customers-merchant-list :merchants="$merchants" />
        </div>
        <div>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- <livewire:merchants.customers-merchant-filter /> --}}
            </div>
        </div>
    </div>
@endsection
