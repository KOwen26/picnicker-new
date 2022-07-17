<div class="bg-white">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="flex items-center max-w-2xl px-4 mx-auto space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('customer.home') }}"
                            class="mr-2 text-sm font-medium text-gray-700 hover:text-primary-900">
                            Halaman Utama </a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-2 text-sm font-medium text-gray-700 hover:text-primary-900">
                            Restoran </a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                {{-- <li class="text-sm">
                    <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                        Basic Tee 6-Pack </a>
                </li> --}}
            </ol>
        </nav>

        <!-- Image gallery -->
        <div class="max-w-2xl mx-auto mt-6 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
            {{-- <div class="hidden overflow-hidden rounded-lg aspect-w-3 aspect-h-4 lg:block">
            <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                alt="Two each of gray, white, and black shirts laying flat."
                class="object-cover object-center w-full h-full">
        </div> --}}
            {{-- <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="overflow-hidden rounded-lg aspect-w-3 aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                    alt="Model wearing plain black basic tee." class="object-cover object-center w-full h-full">
            </div>
            <div class="overflow-hidden rounded-lg aspect-w-3 aspect-h-2">
                <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                    alt="Model wearing plain gray basic tee." class="object-cover object-center w-full h-full">
            </div>
        </div> --}}
            @foreach (json_decode($merchant?->merchant_pictures, null) as $picture)
                <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
                    <img src="{{ picture_url($picture->picture_location, $picture->picture_filename) }}"
                        alt="{{ $merchant?->merchant_name }}" class="object-cover object-center w-full h-full">
                </div>
            @endforeach
        </div>

        <!-- Product info -->
        <div
            class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                    {{ $merchant?->merchant_name }}
                </h1>
                <p class="text-gray-600">
                    {{ $merchant?->merchant_address }},
                    {{ Str::title($merchant?->Cities?->city_name) . ', ' . Str::title($merchant?->Cities?->Provinces?->province_name) }}
                    <span class="text-danger-900">
                        (xx km)</span>
                </p>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:mt-0 lg:row-span-3">
                <h2 class="sr-only">Merchant information</h2>
                {{-- <p class="text-3xl text-gray-900">$192</p> --}}

                <!-- Reviews -->
                <div class="mt-6">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center">

                            <svg class="flex-shrink-0 w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>

                            <!-- Heroicon name: solid/star -->
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="sr-only">4 out of 5 stars</p>
                        <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                            reviews</a>
                    </div>
                </div>
                {{-- form --}}
                <div class="mt-10">
                    <!-- Colors -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Color</h3>

                        <fieldset class="mt-4">
                            <legend class="sr-only">Choose a color</legend>
                            <div class="flex items-center space-x-3">
                                {{-- Active and Checked: "ring ring-offset-1"
                                Not Active and Checked: "ring-2" --}}
                                <label
                                    class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                                    <input type="radio" name="color-choice" value="White" class="sr-only"
                                        aria-labelledby="color-choice-0-label">
                                    <span id="color-choice-0-label" class="sr-only"> White </span>
                                    <span aria-hidden="true"
                                        class="w-8 h-8 bg-white border border-black rounded-full border-opacity-10"></span>
                                </label>

                            </div>
                        </fieldset>
                    </div>

                    <!-- Sizes -->
                    <div class="mt-10">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Size</h3>
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size
                                guide</a>
                        </div>

                        <fieldset class="mt-4">
                            <legend class="sr-only">Choose a size</legend>
                            <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                <!-- Active: "ring-2 ring-indigo-500" -->
                                <label
                                    class="relative flex items-center justify-center px-4 py-3 text-sm font-medium text-gray-200 uppercase border rounded-md cursor-not-allowed group hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-gray-50">
                                    <input type="radio" name="size-choice" value="XXS" disabled class="sr-only"
                                        aria-labelledby="size-choice-0-label">
                                    <span id="size-choice-0-label"> XXS </span>

                                    <span aria-hidden="true"
                                        class="absolute border-2 border-gray-200 rounded-md pointer-events-none -inset-px">
                                        <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2"
                                            viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                            <line x1="0" y1="100" x2="100" y2="0"
                                                vector-effect="non-scaling-stroke" />
                                        </svg>
                                    </span>
                                </label>

                                <!-- Active: "ring-2 ring-indigo-500" -->
                                <label
                                    class="relative flex items-center justify-center px-4 py-3 text-sm font-medium text-gray-900 uppercase bg-white border rounded-md shadow-sm cursor-pointer group hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                    <input type="radio" name="size-choice" value="XS" class="sr-only"
                                        aria-labelledby="size-choice-1-label">
                                    <span id="size-choice-1-label"> XS </span>
                                    {{-- Active: "border", Not Active: "border-2"
                                Checked: "border-indigo-500", Not Checked: "border-transparent" --}}
                                    <span class="absolute rounded-md pointer-events-none -inset-px"
                                        aria-hidden="true"></span>
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <a @if (auth()->guard('customer')->guest()) wire:click="$emit('openModal','customers.customers-login')" @else
                    href="{{ route('customer.reserve', $merchant->merchant_id) }}" @endif
                        class="flex items-center justify-center w-full px-8 py-3 mt-10 text-base font-medium text-white border border-transparent rounded-md bg-secondary-700 hover:bg-secondary-900 hover:cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-500">
                        Pesan Tempat
                    </a>
                </div>
            </div>

            <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">
                            {{-- {{ $merchant?->merchant_description }} --}}
                        </p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">Jam Buka - Tutup</h3>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                            @foreach (json_decode($merchant?->merchant_schedule, null) as $schedule)
                                <li class="text-gray-400"><span
                                        class="text-gray-600">{{ Str::title(collect(day_name())->where('id', $schedule?->schedule_id)->first()['alias']) }},
                                        {{ $schedule?->open_time && $schedule?->close_time ? $schedule?->open_time . ' -' . $schedule?->close_time . ' WIB' : 'Tutup' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">Fasilitas</h3>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                            @foreach ($merchant?->MerchantFacilities as $merchant_facility)
                                <li class="text-gray-400"><span
                                        class="text-gray-600">{{ $merchant_facility->Facilities->facility_name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Deskripsi</h2>
                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">
                            {{ $merchant?->merchant_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
