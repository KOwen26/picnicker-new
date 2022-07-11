@extends('layouts.merchant')
@section('content')
    <div class="px-4 md:px-6">
        <h1 class="mt-12 text-3xl font-semibold text-gray-800">
            @if (auth()->guard('merchant')->user()?->Merchants)
                Hai, Lengkapi data dirimu dulu yuk
            @else
                {{ 'Hai, ' .auth()->guard('merchant')->user()?->Merchants()?->first()?->merchant_name }}
            @endif
        </h1>
        {{-- <h2 class="text-gray-400 text-md">
        </h2> --}}
        <div class="flex flex-col items-center w-full my-6 space-y-4 md:space-x-4 md:space-y-0 md:flex-row">
            <div class="w-full md:w-6/12">
                <div class="relative w-full min-h-[100px] overflow-hidden bg-white shadow-lg rounded-lg">
                    <a href="#" class="block w-full h-full">
                        <div class="flex items-center justify-between px-4 py-6 space-x-4">
                            <div class="flex items-center">
                                <span class="relative p-5 rounded-full bg-info-300">
                                    <i
                                        class="absolute transform -translate-x-1/2 -translate-y-1/2 fas fa-receipt text-info-900 top-1/2 left-1/2">
                                    </i>
                                </span>
                                <p class="ml-2 font-semibold text-gray-700 border-b border-gray-200">
                                    Penjualan aktif saat ini
                                </p>
                            </div>
                            <div class="mt-6 text-xl font-bold text-black border-b border-gray-200 md:mt-0">
                                10
                                <span class="text-xs text-gray-400">
                                    / total penjualan
                                </span>
                            </div>
                        </div>
                        <div class="w-full h-3 bg-gray-100">
                            <div class="w-full h-full text-xs text-center text-white bg-info-900">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center w-full space-x-4 md:w-1/2">
                <div class="w-1/2">
                    <div class="relative w-full px-4 py-6 min-h-[100px] bg-white shadow-lg rounded-lg">
                        <p class="text-2xl font-bold text-black">
                            5
                        </p>
                        <p class="text-sm text-gray-400">
                            Total Pelanggan
                        </p>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="relative w-full px-4 py-6 min-h-[100px] bg-white shadow-lg rounded-lg">
                        <p class="text-2xl font-bold text-black">
                            Rp 50.000
                        </p>
                        <p class="text-sm text-gray-400">
                            Saldo dapat dicairkan
                        </p>
                        <span class="absolute p-5 rounded-full bg-success-900 top-2 right-4">
                            <i
                                class="absolute text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 fas fa-dollar"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="flex items-center space-x-4">
            <button
                class="flex items-center px-4 py-2 text-gray-400 border border-gray-300 rounded-r-full rounded-tl-sm rounded-bl-full text-md">
                <svg width="20" height="20" fill="currentColor" class="mr-2 text-gray-400" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z">
                    </path>
                </svg>
                Last month
                <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                    </path>
                </svg>
            </button>
            <span class="text-sm text-gray-400">
                Compared to oct 1- otc 30, 2020
            </span>
        </div>
        <div class="grid grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="w-full">
                <div class="relative w-full px-4 py-6 bg-white shadow-lg">
                    <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max">
                        Project Reffered
                    </p>
                    <div class="flex items-end my-6 space-x-2">
                        <p class="text-5xl font-bold text-black">
                            12
                        </p>
                        <span class="flex items-center text-xl font-bold text-green-500">
                            <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                </path>
                            </svg>
                            22%
                        </span>
                    </div>
                    <div class="">
                        <div
                            class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                            <p>
                                Unique URL
                            </p>
                            <div class="flex items-end text-xs">
                                34
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                            <p>
                                Embedded form
                            </p>
                            <div class="flex items-end text-xs">
                                13
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    12%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                            <p>
                                New visitor
                            </p>
                            <div class="flex items-end text-xs">
                                45
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    41%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="relative w-full px-4 py-6 bg-white shadow-lg">
                    <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max">
                        Project Paid
                    </p>
                    <div class="flex items-end my-6 space-x-2">
                        <p class="text-5xl font-bold text-black">
                            23
                        </p>
                        <span class="flex items-center text-xl font-bold text-green-500">
                            <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                </path>
                            </svg>
                            12%
                        </span>
                    </div>
                    <div class="">
                        <div
                            class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                            <p>
                                User paid
                            </p>
                            <div class="flex items-end text-xs">
                                21
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    20%
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                            <p>
                                Income
                            </p>
                            <div class="flex items-end text-xs">
                                10
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    2%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                            <p>
                                Royal tees
                            </p>
                            <div class="flex items-end text-xs">
                                434
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20"
                                        class="h-3 text-red-500 transform rotate-180" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    12%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="relative w-full px-4 py-6 bg-white shadow-lg">
                    <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max">
                        New features
                    </p>
                    <div class="flex items-end my-6 space-x-2">
                        <p class="text-5xl font-bold text-black">
                            12
                        </p>
                        <span class="flex items-center text-xl font-bold text-red-500">
                            <svg width="20" fill="currentColor" height="20" class="h-3 transform rotate-180"
                                viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                </path>
                            </svg>
                            2%
                        </span>
                    </div>
                    <div class="">
                        <div
                            class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                            <p>
                                Down
                            </p>
                            <div class="flex items-end text-xs">
                                34
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20"
                                        class="h-3 text-red-500 transform rotate-180" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                            <p>
                                Up
                            </p>
                            <div class="flex items-end text-xs">
                                13
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20" class="h-3 text-green-500"
                                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    12%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                            <p>
                                No developed
                            </p>
                            <div class="flex items-end text-xs">
                                45
                                <span class="flex items-center">
                                    <svg width="20" fill="currentColor" height="20"
                                        class="h-3 text-red-500 transform rotate-180" viewBox="0 0 1792 1792"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    41%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
