@extends('layouts.customer')
@section('content')
    <div class="pt-10">
        <div>
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2 class="mb-6 text-2xl font-extrabold text-gray-900">Daftar Restoran & Kafe</h2>
            </div>
            <livewire:merchants.customers-merchant-paginate :paginate="true" />
        </div>
    </div>
@endsection
