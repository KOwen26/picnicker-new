@extends('layouts.admin')
@section('content')
    <div>
        <div class="p-6 py-8 bg-white rounded-lg shadow-md">
            <h4 class="mb-6 text-2xl font-medium">Merchants Data</h4>
            <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg hover:text-blue-600 "
                            id="restaurant-tab" data-tabs-target="#restaurant" type="button"
                            role="tab">Restaurant</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg hover:text-blue-600 "
                            id="tourism-village-tab" data-tabs-target="#tourism-village" type="button"
                            role="tab">Tourism Village</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent " class="">
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="restaurant" role="tabpanel"
                    aria-labelledby="restaurant-tab">
                    <livewire:merchants.restaurant-merchants-table />
                </div>
            </div>
            <div id="myTabContent " class="">
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="tourism-village" role="tabpanel"
                    aria-labelledby="tourism-village-tab">
                    <livewire:merchants.tourism-village-merchants-table />
                </div>
            </div>
        </div>
    </div>
@endsection
