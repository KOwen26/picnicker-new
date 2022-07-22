<div class="bg-white">
    <div class="max-w-2xl px-4 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        {{-- <div>
            {{ $merchants->links() }}
        </div> --}}
        <div class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 xl:gap-x-8">
            @foreach ($merchants as $merchant)
                <livewire:merchants.customers-merchant-cards :wire:key="$merchant->merchant_id" :merchant=$merchant />
            @endforeach
        </div>
        <div class="mt-6">
            {{ $merchants->links() }}
        </div>
    </div>
</div>
