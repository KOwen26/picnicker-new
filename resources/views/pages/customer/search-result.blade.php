@extends('layouts.customer')
@section('content')
    <div class="pt-10">
        <div>
            @livewire('merchants.customers-merchant-filter', ['params' => $params])
        </div>
    </div>
@endsection
