<div>
    <div class="flex flex-col md:flex-row">
        <div class="md:basis-1/2">
            <div class="overflow-y-scroll h-72">
                @foreach ($facilities as $facility)
                    <div class="flex items-center mx-2 my-4">
                        <input id="default-checkbox{{ $loop->iteration }}" wire:model.defer="facility_id"
                            id="facility_id" type="checkbox" value="{{ $facility->facility_id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label for="default-checkbox{{ $loop->iteration }}"
                            class="ml-2 text-sm font-medium text-gray-900 ">{{ $facility->facility_name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="md:basis-1/2">
            {{-- <button type="button" wire:click="addMerchantFacilities('MRC-220711-OFKP-0001')"
                class="px-4 py-2 bg-info-700"> Tambah
                Fasilitias
            </button> --}}
        </div>
    </div>
</div>
