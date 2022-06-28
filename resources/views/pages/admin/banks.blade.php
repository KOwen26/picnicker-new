@extends('layouts.admin')
@section('content')
    <div>
        <div class="p-4 mb-6 bg-white rounded-lg shadow-md">
            <div class="flex flex-row content-center justify-between px-3 mt-3 mb-8 ">
                <h4 class="text-xl font-medium ">Banks Data</h4>
                {{-- <button
                    class="block text-white bg-success-700 hover:bg-success-900 focus:ring-2 focus:outline-none focus:ring-success-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                    type="button" onclick="Livewire.emit('openModal', 'employees.employees-details')">
                    <i class="mr-2 fas fa-plus"></i>
                    Tambah Karyawan
                </button> --}}
            </div>
            <div class="container p-3 mx-auto">
                <livewire:banks.banks-table />
            </div>
        </div>
    </div>
@endsection
