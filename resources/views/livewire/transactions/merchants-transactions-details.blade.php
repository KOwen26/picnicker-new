<div>
    @php
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $merchant_pictures = json_decode($transaction->Merchant->merchant_pictures, true)[0];
        if ($transaction->payment->payment_proof) {
            $payment_proof = json_decode($transaction->payment->payment_proof, true);
        }
    @endphp
    <div class="pt-4 mx-4 md:pt-10">
        <div class="flex flex-col md:items-start md:justify-center">
            <p class="block mb-3 font-medium text-gray-900">Detail Reservasi</p>
            <div class="grid w-full gap-4 mt-4 ">
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
            {{-- <hr class="w-full my-8 border-secondary-500">
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
            </div> --}}
            <hr class="w-full my-8 border-secondary-500">
            <p class="block mb-3 font-medium text-gray-900">Informasi Pemesan</p>
            <div>
                <div class="grid w-full grid-cols-2 gap-4 mt-4 md:grid-cols-3">
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Nama Pemesan
                        </label>
                        <p class="font-medium">
                            {{ Str::title($transaction->Customer->customer_name) }}
                        </p>
                    </div>
                    <div class="">
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Kontak Pemesan
                        </label>
                        <p class="font-medium">
                            {{ $transaction->Customer?->customer_phone ?: '-' }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- <hr class="w-full my-8 border-secondary-500">
            <p class="block mb-3 font-medium text-gray-900">Rating & Review</p>
            <div>
                <div class="grid w-full gap-4 mt-4 ">
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Rating
                        </label>
                        <label for="" class="block mb-1 text-sm font-medium text-gray-500 ">
                            Review
                        </label>
                    </div>
                </div>
            </div> --}}
        </div>
        <button type="button" wire:click="process" class="w-full px-8 py-3 my-4 text-white rounded-xl bg-success-700">
            @if ($transaction->transaction_status == 'NEW')
                Terima Reservasi
            @elseif($transaction->transaction_status == 'VERIFIED')
                Pelanggan Sudah Datang
            @endif
        </button>
    </div>
</div>
