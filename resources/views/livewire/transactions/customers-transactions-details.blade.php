<div>
    @php
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $merchant_pictures = json_decode($transaction->Merchant->merchant_pictures, true)[0];
        if ($transaction->payment->payment_proof) {
            $payment_proof = json_decode($transaction->payment->payment_proof, true);
        }
    @endphp
    <div class="pt-4 mx-4 md:pt-10">
        <div class="mb-12">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('customer.home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-600 border-b-2 border-transparent hover:text-primary-900 hover:border-primary-900 ">
                            Halaman Utama
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <i class="mr-3 text-gray-500 fas fa-chevron-right"></i>
                        <a href="{{ route('customer.transaction') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-600 border-b-2 border-transparent hover:text-primary-900 hover:border-primary-900 ">
                            Daftar Reservasi
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="mr-3 text-gray-500 fas fa-chevron-right"></i>
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-gray-600 border-b-2 border-transparent hover:text-primary-900 hover:border-primary-900 ">{{ $transaction->transaction_id }}</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-col gap-4 md:flex-row">
            <div class="flex flex-col md:w-3/4 md:items-start md:justify-center">
                <p class="block mb-3 font-medium text-gray-900">Restoran yang dipilih</p>
                <div class="w-full">
                    <div class="flex flex-col flex-grow w-full gap-4 md:flex-row">
                        <div class="md:w-60 ">
                            <a href="{{ route('customer.find', $transaction->Merchant->merchant_id) }}">
                                <img class="object-cover w-full h-60 md:h-40"
                                    src="{{ picture_url($merchant_pictures['picture_location'], $merchant_pictures['picture_filename']) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div class="">
                                <h3 class="text-lg font-medium text-secondary-900">
                                    <a href="{{ route('customer.find', $transaction->Merchant->merchant_id) }}">
                                        {{ $transaction->Merchant->merchant_name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ $transaction->merchant?->merchant_address }},
                                    {{ Str::title($transaction->merchant?->Cities?->city_name) . ', ' . Str::title($transaction->merchant?->Cities?->Provinces?->province_name) }}
                                </p>
                            </div>
                            <div>
                                {{-- <p class="text-sm text-gray-600">Rating</p>
                                <p class="text-sm text-gray-600">Review</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid w-full gap-4 mt-4 md:grid-cols-3">
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Tanggal Reservasi
                        </label>
                        <p class="font-medium">
                            {{ strftime('%d %B %Y %H:%M', strtotime($transaction->Payment->payment_due_date)) }} WIB
                        </p>

                    </div>
                    <div class="md:col-span-2">
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Jumlah Pengunjung
                        </label>
                        <p class="font-medium">
                            {{ $transaction?->transaction_item_quantity }} Orang
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                        Catatan Reservasi
                    </label>
                    <p class="font-medium">
                        {{ $transaction?->transaction_notes }}
                    </p>
                </div>
                <hr class="w-full my-8 border-secondary-500">
                <p class="block mb-3 font-medium text-gray-900">Pembayaran</p>
                <div>
                    <div class="grid w-full gap-4 mt-4 md:grid-cols-3">
                        <div>
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Metode Pembayaran
                            </label>
                            <p class="font-medium">
                                Transfer Manual
                            </p>
                        </div>
                        <div>
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Status Pembayaran
                            </label>
                            @component('components.status-badges', ['type' => 'transaction', 'value' => $transaction->payment->payment_status])
                            @endcomponent
                        </div>
                        @if ($transaction->Payment->payment_status == 'UNPAID')
                            <div>
                                <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                    Jatuh Tempo Pembayaran
                                </label>
                                <p class="font-medium text-danger-900">
                                    {{ strftime('%d %B %Y %H:%M', strtotime($transaction->Payment->payment_due_date)) }}
                                    WIB
                                </p>
                            </div>
                        @endif
                        <div class="col-span-2">
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Rincian Pembayaran
                            </label>
                            <div class="flex justify-between text-sm font-medium ">
                                <span>Total Biaya Reservasi</span>
                                <span class="font-medium">Rp
                                    {{ number_format($transaction->transaction_total, 0, '', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm font-medium ">
                                <span>Diskon</span>
                                <span class="font-medium text-danger-900">- Rp
                                    {{ number_format($transaction->transaction_discount, 0, '', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between text-sm font-medium ">
                                <span>Total Pembayaran</span>
                                <span class="font-medium ">Rp
                                    {{ number_format($transaction->transaction_grand_total, 0, '', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @if ($transaction->Payment->payment_status == 'UNPAID')
                        <div class="flex flex-col mt-4 text-center w-fit">
                            <div class="mb-4">
                                <label for="" class="block mb-4 text-sm font-medium text-gray-500 ">
                                    Lakukan pembayaran sebesar <span class=" text-danger-900">Rp
                                        {{ number_format($transaction->transaction_grand_total, 0, '', '.') }}</span>
                                    melalui transfer ke rekening berikut:
                                </label>
                                <div class="flex mx-auto mb-4 md:w-40">
                                    <img class="" src="{{ asset('images/LogoBCA.webp') }}" alt="Bank BCA"
                                        srcset="">
                                </div>
                                <p class="font-medium">
                                    BCA a/n Aprianto
                                </p>
                                <span class="block">
                                    XXX-XXX-XXXX
                                </span>
                            </div>
                            <div>
                                <form wire:submit.prevent="savePaymentProof" enctype="multipart/form-data">
                                    <input
                                        class="block mx-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                                        id="multiple_files" type="file" wire:model="picture" accept="image/*">
                                    <p class="mt-1 text-sm text-gray-500 " id="file_input_help">
                                        harap upload gambar dengan format .png, .jpg .jpeg atau .webp
                                    </p>
                                    @error('picture')
                                        <span class="text-danger error">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ $picture?->temporaryUrl() }}" alt="" srcset="">
                                    <button type="submit"
                                        class="px-8 py-3 mt-4 text-base font-medium text-white rounded-lg bg-info-700 ">
                                        Simpan Bukti Pembayaran
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="mt-4">
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Bukti Pembayaran
                            </label>
                            <div class="md:w-60 ">
                                <img class="object-cover w-full h-60 md:h-40"
                                    src="{{ picture_url($payment_proof['picture_location'], $payment_proof['picture_filename']) }}"
                                    alt="">
                            </div>
                        </div>
                    @endif
                </div>
                <hr class="w-full my-8 border-secondary-500">
                <p class="block mb-3 font-medium text-gray-900">Informasi Pemesan</p>
                <div>
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 md:grid-cols-3">
                        <div>
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Nama Pemesan
                            </label>
                            <p class="font-medium">
                                {{-- {{ Str::title(auth()->guard('customer')->user()->customer_name) }} --}}
                                {{ Str::title($transaction?->customer?->customer_name) }}
                            </p>
                        </div>
                        <div class="">
                            <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                                Kontak Pemesan
                            </label>
                            <p class="font-medium">
                                {{ $transaction?->customer?->customer_phone ?: '-' }}
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="w-full my-8 border-secondary-500">
                <p class="block mb-3 font-medium text-gray-900">Rating & Review</p>
                <div>
                    <div class="grid w-full gap-4 mt-4 ">
                        <div>
                            @if (empty($customer_feedback) && $transaction->transaction_status == 'FINISHED')
                                @livewire('customer-feedback.customer-feedback-input', ['transaction_id' => $transaction->transaction_id])
                            @elseif($transaction->transaction_status == 'FINISHED')
                                @livewire('customer-feedback.customer-feedback-details', ['merchant_id' => $transaction->merchant_id])
                            @else
                                <div>
                                    Selesaikan transaksi untuk memberi rating
                                </div>
                            @endif
                        </div>
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
                            <span class="font-medium">{{ $transaction?->transaction_item_quantity }}
                                Pengunjung</span>
                        </div>
                        <div class="flex justify-between mb-1 text-sm text-gray-600">
                            <span>Total Biaya Reservasi</span>
                            <span class="font-medium">Rp
                                {{ number_format($transaction->transaction_total, 0, '', '.') }}</span>
                        </div>
                        <div class="flex justify-between mb-1 text-sm text-gray-600">
                            <span>Diskon</span>
                            <span class="font-medium text-danger-900">- Rp
                                {{ number_format($transaction->transaction_discount, 0, '', '.') }}</span>
                        </div>
                        <div class="flex justify-between mb-1 text-sm text-gray-600">
                            <span>Total Pembayaran</span>
                            <span class="font-medium ">Rp
                                {{ number_format($transaction->transaction_grand_total, 0, '', '.') }}</span>
                        </div>
                    </div>
                    <button type="button" wire:click.prevent="cancel"
                        class="flex items-center justify-center w-full px-8 py-3 mt-3 text-base font-medium text-white border border-transparent rounded-md shadow-md @if ($transaction->payment->payment_status == 'PAID') bg-base-700 hover:bg-base-500 focus:ring-base-500
                        @else
                        bg-danger-700 hover:bg-danger-900 focus:ring-danger-500 @endif  focus:outline-none focus:ring-2 focus:ring-offset-2"
                        disabled>
                        <i class="mr-3 fas fa-times"></i>
                        Batalkan Pesanan
                    </button>
                    <a target="_blank"
                        href="https://wa.me/62895627117019?text=Hai saya memiliki masalah pada kode reservasi {{ $transaction->transaction_id }}"
                        class="flex items-center justify-center w-full px-8 py-3 mt-3 text-base font-medium text-white border border-transparent rounded-md shadow-md bg-info-700 hover:bg-info-900 focus:ring-info-500 focus:outline-none focus:ring-2 focus:ring-offset-2">
                        <i class="mr-3 fas fa-phone"></i>
                        Bantuan
                    </a>
                </div>
            </div>
        </div>

    </div>
