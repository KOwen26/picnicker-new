<div class="md:pt-8">
    <div class="flex flex-col gap-4 px-4 md:flex-row">
        <div class="flex flex-col py-4 md:w-3/4 md:items-start md:justify-center">
            <p class="block mb-3 font-medium text-gray-900">Restoran yang dipilih</p>
            <div class="w-full">
                <div class="flex flex-col flex-grow w-full gap-4 md:flex-row">
                    <div class="md:w-48 ">
                        <img class="object-cover w-full h-60 md:h-32"
                            src="{{ picture_url($merchant_pictures['picture_location'], $merchant_pictures['picture_filename']) }}"
                            alt="">
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="">
                            <h3 class="text-lg font-medium">
                                <a href="{{ route('customer.find', $merchant->merchant_id) }}">
                                    {{ $merchant->merchant_name }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-600">
                                {{ $merchant?->merchant_address }},
                                {{ Str::title($merchant?->Cities?->city_name) . ', ' . Str::title($merchant?->Cities?->Provinces?->province_name) }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Rating</p>
                            <p class="text-sm text-gray-600">Review</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid w-full gap-4 mt-4 md:grid-cols-3">
                <div>
                    <label for="" class="block mb-3 text-sm font-medium text-gray-900 ">
                        Tanggal Reservasi
                    </label>
                    <input type="datetime-local" name="" id="" wire:model="transaction_date"
                        min="2022-01-01"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-700 focus:border-secondary-700 block w-full p-2.5 ">
                </div>
                <div class="md:col-span-2">
                    <label for="" class="block mb-3 text-sm font-medium text-gray-900 ">
                        Jumlah Pengunjung
                    </label>
                    <div>
                        <input type="number" min="1" id="" wire:model="person_quantity"
                            wire:change="calculate"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-700 focus:border-secondary-700 inline-block  p-2.5 ">
                        <span class="inline-block">x Rp {{ number_format($reservation_fee, 0, '', '.') }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <label for="first_name" class="block mb-3 text-sm font-medium text-gray-900 ">
                    Catatan Reservasi
                </label>
                <textarea wire:model="transaction_notes"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-700 focus:border-secondary-700 block w-full p-2.5 "
                    cols="60" rows="3">
                </textarea>
            </div>

            <hr class="w-full my-8 border-secondary-500">
            <p class="block mb-3 font-medium text-gray-900">Metode Pembayaran</p>
            <div>
                {{-- <div class="flex items-center mb-4">
                    <input id="default-radio-1" type="radio" value="" name="default-radio" wire:model="payment_method"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-secondary-700 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1"
                        class="ml-2 text-sm font-medium text-gray-900 ">Default radio</label>
                </div> --}}
                <div class="flex items-center group">
                    <input checked id="default-radio-2" type="radio" value="MANUAL_TRANSFER"
                        wire:model="payment_method"
                        class="w-4 h-4 bg-gray-100 border-gray-300 text-secondary-700 focus:ring-secondary-900 group-hover:cursor-pointer">
                    <label for="default-radio-2" class="ml-2 text-sm text-gray-900 group-hover:cursor-pointer">Transafer
                        Manual</label>
                </div>
            </div>

        </div>
        <div class="py-4 md:w-1/4">
            <div class="p-4 bg-white shadow-lg rounded-xl">
                <div class="mb-5">
                    <p class="block mb-3 text-sm font-medium text-gray-900 ">
                        Ringkasan Reservasi
                    </p>
                    <div class="flex justify-between mb-1 text-sm text-gray-600">
                        <span>Total Pengunjung</span>
                        <span class="font-medium">{{ $person_quantity }} Pengunjung</span>
                    </div>
                    <div class="flex justify-between mb-1 text-sm text-gray-600">
                        <span>Total Biaya Pemesanan</span>
                        <span class="font-medium">Rp
                            {{ number_format($transaction_total, 0, '', '.') }}</span>
                    </div>
                    <div class="flex justify-between mb-1 text-sm text-gray-600">
                        <span>Diskon</span>
                        <span class="font-medium text-danger-900">- Rp
                            {{ number_format($transaction_discount, 0, '', '.') }}</span>
                    </div>
                    <div class="flex justify-between mb-1 text-sm text-gray-600">
                        <span>Total Pembayaran</span>
                        <span class="font-medium ">Rp
                            {{ number_format($transaction_grand_total, 0, '', '.') }}</span>
                    </div>
                </div>
                <button type="button" wire:click.prevent="reserve"
                    class="flex items-center justify-center w-full px-8 py-3 mt-3 text-base font-medium text-white border border-transparent rounded-md shadow-md bg-secondary-700 hover:bg-secondary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-500">
                    <i class="mr-2 fas fa-shield"></i>
                    Booking & Bayar
                </button>
            </div>
        </div>
    </div>
</div>
