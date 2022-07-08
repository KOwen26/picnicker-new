@php
$bank_accounts = $merchant?->BankAccounts?->first();
@endphp
<div>
    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            Detail Merchant
        </h3>
        <button type="button"
            class="inline-flex items-center p-2 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 "
            wire:click="$emit('closeModal')">
            <i class="w-6 h-6 text-xl fas fa-times"></i>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-5 ">
        <div class="grid grid-flow-row gap-4">
            <div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    @if ($merchant?->merchant_pictures)
                        @forelse (collect(json_decode($merchant?->merchant_pictures, true)) as $picture)
                            <div class="">
                                <img class="object-cover w-full"
                                    src="{{ asset(Str::replace('public', 'storage', $picture['picture_location']) . '\\' . $picture['picture_filename']) }}"
                                    alt="{{ $picture['picture_filename'] }}" srcset="">
                            </div>
                        @empty
                            <span>Beluma ada foto</span>
                        @endforelse
                    @endif
                </div>
            </div>
            <div>
                <h3 class="mb-3 font-semibold">Data Pemilik Merchant </h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    @foreach ($merchant->MerchantOwner->toArray() as $key => $value)
                        <div class="relative z-0 w-full my-4 group">
                            <input type="text" name=""
                                class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                                placeholder=" " readonly value="{{ $value }}" />
                            <label for=""
                                class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ Str::title(Str::replace('_', ' ', $key)) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h3 class="mb-3 font-semibold">Data Rekening Bank Merchant </h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    @foreach ($bank_accounts->toArray() as $key => $value)
                        <div class="relative z-0 w-full my-4 group">
                            <input type="text" name=""
                                class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                                placeholder=" " readonly
                                value="{{ $key === 'bank_id' ? $bank_accounts?->Banks?->bank_name : $value }}" />
                            <label for=""
                                class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ Str::title(Str::replace('_', ' ', $key === 'bank_id' ? 'Bank Name' : $key)) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- {{ dd($merchant->toArray()) }} --}}
            <div>
                <h3 class="mb-3 font-semibold">Data Merchant </h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                    <div class="relative z-0 w-full my-4 group">
                        <input type="text" name=""
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder=" " readonly
                            value="{{ Str::title($merchant?->MerchantType?->merchant_type_name) }}" />
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Type
                        </label>
                    </div>
                    <div class="relative z-0 w-full col-span-2 my-4 group">
                        <label for=""
                            class="font-medium absolute mb-2  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Status
                        </label>
                        <div class="block py-2 mt-1">
                            @component('components.status-badges', ['value' => $merchant->merchant_open_status])
                            @endcomponent
                            <span class="mx-1"></span>
                            @component('components.status-badges', ['value' => $merchant->merchant_status])
                            @endcomponent
                        </div>
                    </div>
                    <div class="relative z-0 w-full my-4 group">
                        <input type="text" name=""
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder=" " readonly value="{{ $merchant?->updated_at }}" />
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                            Update
                        </label>
                    </div>
                    <div class="relative z-0 w-full my-4 group">
                        <input type="text" name=""
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder=" " readonly value="{{ Str::title($merchant->merchant_name) }}" />
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Name
                        </label>
                    </div>
                    <div class="relative z-0 w-full my-4 group">
                        <input type="text" name=""
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder=" " readonly value="{{ Str::title($merchant->merchant_phone) }}" />
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Phone
                        </label>
                    </div>
                    <div class="relative z-0 w-full my-4 md:col-span-2 group">
                        <input type="text" name=""
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder=" " readonly value="{{ Str::title($merchant->merchant_address) }}" />
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Address
                        </label>
                    </div>
                    <div class="relative z-0 w-full my-4 md:col-span-2 group">
                        <label for=""
                            class="font-medium absolute  text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-900  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Merchant
                            Description
                        </label>
                        <textarea id="message" rows="2"
                            class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary-900 peer"
                            placeholder="" readonly>{{ $merchant->merchant_description }}
                        </textarea>

                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full md:w-1/2">
                        <h3 class="mb-3 font-semibold">Jadwal Buka-Tutup Merchant </h3>
                        <div class="">
                            <ul>
                                @foreach (collect(json_decode($merchant->merchant_schedule, true)) as $open_schedule)
                                    <li class="ml-2">
                                        <span class="inline-block w-4 mr-2 font-semibold">
                                            {{ $loop->iteration }}.
                                        </span>
                                        {{ $open_schedule['schedule_id'] . ', ' . $open_schedule['open_time'] . ' - ' . $open_schedule['close_time'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="mb-3 font-semibold">Fasilitias Merchant </h3>
                        <div class="">
                            <ul>
                                @foreach ($merchant->MerchantFacilities->all() as $merchant_facility)
                                    <li class="ml-2">
                                        <span class="inline-block w-4 mr-2 font-semibold">
                                            {{ $loop->iteration }}.
                                        </span>
                                        {{ $merchant_facility?->Facilities?->facility_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        @if ($merchant?->merchant_status === 'REVIEW')
            <button type="button" wire:click="accept()"
                class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900">
                Terima
            </button>
        @endif
    </div>
</div>
