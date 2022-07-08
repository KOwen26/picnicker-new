<div class="">
    {{-- {{ dd(json_decode($merchant?->merchant_pictures, null)[0]->picture_location) }} --}}
    <div class="relative group">
        <div
            class="w-full overflow-hidden bg-gray-200 rounded-md min-h-80 aspect-w-1 aspect-h-1 group-hover:opacity-75 lg:h-80 lg:aspect-none">
            <img src="{{ asset(str_replace('public', 'storage', json_decode($merchant?->merchant_pictures, null)[0]->picture_location) . '\\' . json_decode($merchant?->merchant_pictures, null)[0]->picture_filename) }}"
                alt="Front of men&#039;s Basic Tee in black."
                class="object-cover object-center w-full h-full lg:w-full lg:h-full">
        </div>
        <div class="flex justify-between mt-4">
            <div>
                <h3 class="text-gray-700 ">
                    <a href="{{ route('customer.find', $merchant->merchant_id) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $merchant?->merchant_name }}
                    </a>
                </h3>
                <p class="mt-1 text-gray-500">{{ $merchant?->merchant_address }}</p>
            </div>
            <p class="font-medium text-gray-900 ">$35</p>
        </div>
    </div>
</div>
