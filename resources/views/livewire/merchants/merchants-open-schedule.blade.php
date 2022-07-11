<div>
    <div class="flex flex-col md:flex-row">
        <div class="p-2 md:basis-1/3">
            <span class="block mb-2">Pilih hari</span>
            <div class="">
                <label for="" class="text-sm text-gray-700">Hari</label>
                @forelse ($dates as $date)
                    <div class="flex items-center mx-2 my-4">
                        <input id="default-checkbox{{ $loop->iteration }}" wire:model.defer="selected_dates"
                            type="checkbox" value="{{ $date['id'] }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                            @if ($date['status'] == 'disabled') readonly disabled @endif>
                        <label for="default-checkbox{{ $loop->iteration }}"
                            class="ml-2 text-sm font-medium text-gray-900 ">{{ $date['alias'] }}</label>
                    </div>
                @empty
                    <p>No data yet</p>
                @endforelse
            </div>
        </div>
        <div class="p-2 md:basis-2/3">
            <span class="block mb-2">Pilih jam buka-tutup</span>
            <div class="flex flex-row gap-2 mb-6">
                <div class="flex flex-col">
                    <label for="" class="text-sm text-gray-700">Jam Buka</label>
                    <select class="mt-1 rounded-md " wire:model="open_time" id="open_time">
                        @foreach ($times as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-sm text-gray-700">Jam Tutup</label>
                    <select class="mt-1 rounded-md " wire:model="close_time" id="close_time">
                        @foreach ($times as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="button" class="p-2 px-8 text-white rounded-lg bg-info-900"
                        wire:click.prevent="setMerchantSchedule()">
                        Atur
                    </button>
                </div>
            </div>
            <div>
                <span class="block mb-2">Hari, Jam buka-tutup saat ini:</span>
                @if ($merchant_schedules)
                    @foreach ($merchant_schedules as $item)
                        <span class="block">
                            {{ collect($dates)->where('id', $item['schedule_id'])->first()['alias'] }},
                            {{ $item['open_time'] }} -
                            {{ $item['close_time'] }}
                        </span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
