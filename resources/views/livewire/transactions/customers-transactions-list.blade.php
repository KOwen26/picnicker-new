<div class="">
    <div class="grid gap-y-8">
        @forelse ($transactions as $transaction)
            @php
                setlocale(LC_ALL, 'id-ID', 'id_ID');
                $merchant_pictures = json_decode($transaction->Merchant->merchant_pictures, true)[0];
            @endphp
            <div class="rounded-lg shadow-md overflow-clip">
                <div class="flex flex-col w-full gap-4 md:flex-row">
                    <div class="md:w-60">
                        <a href="{{ route('customer.find', $transaction->Merchant->merchant_id) }}">
                            <img class="object-cover w-full h-60 md:h-40"
                                src="{{ picture_url($merchant_pictures['picture_location'], $merchant_pictures['picture_filename']) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="flex flex-col justify-between flex-grow py-4 pt-0 ml-4 mr-4 md:pt-4 md:ml-0 md:flex-row">
                        <div class="flex flex-col items-start ">
                            <div class="">
                                <h5 class="font-medium ">
                                    Kode Reservasi : {{ $transaction->transaction_id }}
                                </h5>
                                <h3 class="text-lg font-medium text-secondary-900">
                                    <a href="{{ route('customer.find', $transaction->Merchant->merchant_id) }}">
                                        {{ $transaction->Merchant->merchant_name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ $transaction->Merchant?->merchant_address }},
                                    {{ Str::title($transaction->Merchant?->Cities?->city_name) . ', ' . Str::title($transaction->Merchant?->Cities?->Provinces?->province_name) }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm "> <span class="mr-2 font-medium">Untuk Tanggal
                                        :</span>{{ strftime('%A, %d %B %Y %H:%M', strtotime($transaction->transaction_date)) }}
                                    WIB
                                </p>
                                <p class="text-sm font-medium"><span class="mr-2 font-medium">
                                        Jumlah Pengunjung : {{ $transaction->transaction_item_quantity }} Orang
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end justify-between mt-4 md:mt-0">
                            <div>
                                @component('components.status-badges', ['type' => 'transaction', 'value' => $transaction->transaction_status])
                                @endcomponent
                                <span class="hidden mx-2 md:inline-block">|</span>
                                @component('components.status-badges', ['type' => 'transaction', 'value' => $transaction->Payment->payment_status])
                                @endcomponent
                                @if ($transaction->Payment->payment_status == 'UNPAID')
                                    <p class="block mt-1 text-sm text-right text-danger-900">Bayar Sebelum
                                        :
                                        {{ strftime('%d %B %Y %H:%M', strtotime($transaction->Payment->payment_due_date)) }}
                                        WIB
                                    </p>
                                @endif
                            </div>
                            <div class="mt-4 md:mt-0">
                                <a href="{{ route('customer.transaction-details', $transaction->transaction_id) }}"
                                    class="text-sm font-medium text-base-700 hover:border-b-2 border-primary-900 hover:text-primary-900 ">
                                    Lihat Detil Reservasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @empty
        @endforelse
    </div>
</div>
