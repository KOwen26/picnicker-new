@extends('layouts.customer')
@section('content')
    <div class="pt-4 mx-4 md:pt-10 ">
        <div class="mb-6 md:mb-12">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('customer.home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-600 border-b-2 border-transparent hover:text-primary-900 hover:border-primary-900 ">
                            {{-- <i class="mr-2 fas fa-file-invoice"></i> --}}
                            Halaman Utama
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="mr-3 text-gray-500 fas fa-chevron-right"></i>
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-gray-600 border-b-2 border-transparent hover:text-primary-900 hover:border-primary-900 ">Daftar
                                Reservasi</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        @livewire('transactions.customers-transactions-list')
    </div>
@endsection
