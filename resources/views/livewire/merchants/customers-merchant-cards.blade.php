<div class="">
    {{-- {{ dd(json_decode($merchant?->merchant_pictures, null)[0]->picture_location) }} --}}
    <div class="relative group">
        <div
            class="w-full h-56 overflow-hidden bg-gray-200 rounded-md min-h-80 aspect-w-1 aspect-h-1 group-hover:opacity-75 lg:aspect-none">
            @if ($merchant_pictures)
                <img src="{{ picture_url($merchant_pictures['picture_location'], $merchant_pictures['picture_filename']) }}"
                    alt="{{ $merchant_pictures['picture_filename'] }}" class="object-cover w-full h-56 ">
            @endif
        </div>
        <div class="flex justify-between mt-4">
            <div>
                <h3 class="text-gray-700 ">
                    <a href="{{ route('customer.find', $merchant->merchant_id) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $merchant?->merchant_name }}
                    </a>
                </h3>
                <p class="block">
                    <i class="fa-sm mr-0.5 fas fa-star"></i>
                    <i class="fa-sm mr-0.5 fas fa-star"></i>
                    <i class="fa-sm mr-0.5 fas fa-star"></i>
                    <i class="fa-sm mr-0.5 fas fa-star"></i>
                    <i class="fa-sm mr-0.5 fas fa-star text-gray-300"></i>
                </p>
                <p>
                    @if ($merchant_distance)
                        <span class="text-sm font-medium text-secondary-700">{{ $merchant_distance }} km</span>
                    @endif
                </p>
                <p class="mt-1 text-gray-500">
                    {{ Str::length($merchant?->merchant_address) > 48 ? Str::substr($merchant?->merchant_address, 0, 48) . '...' : $merchant?->merchant_address }}
                </p>
            </div>
            {{-- <p class="text-sm text-gray-900 ">
            </p> --}}
        </div>
    </div>
</div>
