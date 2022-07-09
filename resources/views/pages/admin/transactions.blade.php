@extends('layouts.admin')
@section('content')
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
        <h4 class="mb-12 text-2xl">Data Transaksi</h4>
        <livewire:transactions.admin-transactions-table />
    </div>
@endsection
