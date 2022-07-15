<div class="bg-white">
    <div class="max-w-2xl px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($merchants as $merchant)
                <livewire:merchants.customers-merchant-cards :merchant=$merchant />
            @endforeach
        </div>
    </div>
</div>
