@extends('layouts.admin')
@section('content')
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
        <h4 class="mb-12 text-2xl font-medium">Merchant Tickets <span>(Products)</span> Data</h4>
        <livewire:customers.customers-data />
    </div>
@endsection
