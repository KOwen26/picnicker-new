@php
$state = 'store()';
if ($merchant_id) {
    $state = 'update()';
}
$merchant = null;
@endphp
<div class="">
    <div class="flex">
        <div class="hidden md:flex basis-1/5">
            <div class="fixed p-5">
                <ul class="text-sm">
                    @if ($merchant_id)
                        <li class="p-2 px-4">
                            <a href="{{ route('merchant.home') }}" class="my-2">
                                <i class="mr-2 fas fa-arrow-left"></i>
                                Halaman utama
                            </a>
                        </li>
                    @endif
                    <li class="p-2 px-4">
                        <a href="#merchant_owner" class="my-2">
                            <i class="mr-2 fas fa-user"></i>
                            Pemilik Merchant
                        </a>
                    </li>
                    <li class="p-2 px-4">
                        <a href="#merchant" class="my-2">
                            <i class="mr-2 fas fa-store-alt"></i>
                            Merchant
                        </a>
                    </li>
                    <li class="p-2 px-4">
                        <a href="#merchant_picture" class="my-2">
                            <i class="mr-2 fas fa-image"></i>
                            Foto Merchant
                        </a>
                    </li>
                    <li class="p-2 px-4">
                        <a href="#merchant_schedule" class="my-2">
                            <i class="mr-2 fas fa-clock"></i>
                            Jam Buka Merchant
                        </a>
                    </li>
                    <li class="p-2 px-4">
                        <a href="#merchant_facilities" class="my-2">
                            <i class="mr-2 fas fa-list-check"></i>
                            Fasilitas Merchant
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="md:basis-4/5 bg-base-100">
            {{-- {{ dd($merchant) }} --}}
            <form action="" wire:submit.prevent='{{ $state }}'>
                <div class="p-5">
                    <h4 class="text-xl font-medium" id="merchant_owner">Data Pemilik Merchant</h4>
                    <div class="grid grid-cols-1 gap-5 py-6 md:grid-cols-3">
                        <div>
                            <label for="merchant_owner_name" class="text-sm text-gray-700">Jenis Kelamin Pemilik
                                Merchant</label>
                            <div class="flex flex-row gap-3 mt-1">
                                <div>
                                    <input type="radio" class="mx-1" wire:model="merchant_owner_gender"
                                        name="merchant_owner_gender" id="merchant_owner_gender_l" value="L"
                                        required>
                                    <label for="merchant_owner_gender_l">Laki-laki</label>
                                </div>
                                <div>
                                    <input type="radio" class="mx-1" wire:model="merchant_owner_gender"
                                        name="merchant_owner_gender" id="merchant_owner_gender_p" value="P"
                                        required>
                                    <label for="merchant_owner_gender_p">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="merchant_owner_name" class="text-sm text-gray-700">Nama Pemilik Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_owner_name"
                                name="merchant_owner_name" id="merchant_owner_name" value=""
                                placeholder="John Doe" required>
                            @error('merchant_owner_name')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="merchant_owner_phone" class="text-sm text-gray-700">Telpon Pemilik
                                Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_owner_phone"
                                name="merchant_owner_phone" id="merchant_owner_phone" value=""
                                placeholder="628xx-xxxx-xxxx" required>
                            @error('merchant_owner_phone')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="merchant_owner_address" class="text-sm text-gray-700">Alamat Pemilik
                                Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_owner_address"
                                name="merchant_owner_address" id="merchant_owner_address" value=""
                                placeholder="John Doe" required>
                            @error('merchant_owner_address')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="text-sm text-gray-700">Nama Bank</label>
                            <select wire:model="bank_id" class="w-full mt-1 rounded-md ">
                                <option>Pilih bank terlebih dahulu</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->bank_id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="bank_account_name" class="text-sm text-gray-700">Nama Pemilik Rekening
                                Bank</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="bank_account_name"
                                name="bank_account_name" id="bank_account_name" value="" placeholder="John Doe"
                                required>
                            @error('bank_account_name')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="bank_account_number" class="text-sm text-gray-700">Nomor Rekening Bank</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="bank_account_number"
                                name="bank_account_number" id="bank_account_number" value=""
                                placeholder="xxxx-xxxx-xx" required>
                            @error('bank_account_number')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-6 text-xl font-medium" id="merchant">Data Merchant</h4>
                    <div class="grid grid-cols-1 gap-5 py-6 md:grid-cols-3 ">
                        @if (!$merchant_type_id)
                            <div>
                                <span class="text-sm text-gray-700 ">Tipe Merchant</span>
                                <br>
                                <div class="flex flex-row gap-3 mt-1">
                                    @forelse ($merchant_type as $type)
                                        <div>
                                            <input type="radio" class="mx-1" wire:model="merchant_type_id"
                                                name="merchant_type_id" id="merchant_type_id{{ $loop->iteration }}"
                                                value="{{ $type->merchant_type_id }}" required>
                                            <label
                                                for="merchant_type_id{{ $loop->iteration }}">{{ Str::title($type->merchant_type_name) }}</label>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @endif
                        <div>
                            <label for="" class="text-sm text-gray-700">Nama Kota</label>
                            <select wire:model="city_id" class="w-full mt-1 rounded-md ">
                                <option>Pilih kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="merchant_name" class="text-sm text-gray-700">Nama Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_name"
                                name="merchant_name" id="merchant_name" value="" placeholder="John Doe"
                                required>
                            @error('merchant_name')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="merchant_phone" class="text-sm text-gray-700">Telpon Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_phone"
                                name="merchant_phone" id="merchant_phone" value=""
                                placeholder="628xx-xxx-xxxx" required>
                            @error('merchant_phone')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="merchant_address" class="text-sm text-gray-700">Alamat Merchant</label>
                            <input type="text" class="w-full mt-1 rounded-md" wire:model="merchant_address"
                                name="merchant_address" id="merchant_address" value="" placeholder="John Doe"
                                required>
                            @error('merchant_address')
                                <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="merchant_description" class="text-sm text-gray-700">Deskripsi Merchant</label>
                            <br>
                            <textarea class="w-full mt-1 rounded-md" wire:model="merchant_description" name="merchant_description"
                                id="merchant_description" cols="10" rows="4">

                            </textarea>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-6 text-xl font-medium" id="merchant_picture">Foto Merchant</h4>
                    {{-- {{ dd($merchant->merchant_pictures) }} --}}
                    <div class="grid grid-cols-1 gap-5 py-6 ">
                        <div>
                            {{-- <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">Upload
                                foto
                                merchant</label> --}}
                            <livewire:merchants.merchants-pictures :merchant_pictures="$merchant_pictures" />
                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-6 text-xl font-medium" id="merchant_schedule">Jam Buka-Tutup Merchant</h4>
                    <div class="grid grid-cols-1 gap-5 py-6 ">
                        <div>
                            {{-- <label for="merchant_name" class="text-sm text-gray-700">Pilih hari & jam buka-tutup
                                merchant</label> --}}
                            <livewire:merchants.merchants-open-schedule :merchant_schedule="$merchant_schedule" />

                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-6 text-xl font-medium" id="merchant_facilities">Fasilitas Merchant</h4>
                    <div class="grid grid-cols-1 gap-5 py-6 ">
                        <div>
                            <span class="text-base text-gray-800 ">Daftar Fasilitas Merchant</span>
                            <br>
                            <span class="text-xs text-gray-500 ">Pilih Fasilitas yang ada di tempatmu</span>
                            <br>
                            <livewire:merchants.merchants-facilities :merchant_id="$merchant_id" />
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white rounded-lg md:w-auto bg-success-900">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
