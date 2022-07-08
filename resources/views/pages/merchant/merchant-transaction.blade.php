@extends('layouts.merchant')
@section('content')
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
        <h4 class="mb-3 text-2xl">Daftar Reservasi</h4>
        <div class="container p-3 mx-auto overflow-x-scroll">
            @livewire('transactions.merchants-transactions-table')
        </div>
    </div>
@endsection
