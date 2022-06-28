<!-- Main modal -->
<div class="">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            @if (!$facility)
                Tambah
            @else
                Perbarui
            @endif
            Fasilitas Baru
        </h3>
        <button type="button"
            class="inline-flex items-center p-2 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 "
            wire:click="$emit('closeModal')">
            <i class="w-6 h-6 text-xl fas fa-times"></i>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-5">
        <div class="grid grid-cols-1 gap-5 ">
            <div>
                <span class="text-sm text-gray-700 ">Tipe Fasilitas</span>
                <br>
                <div class="flex flex-row gap-3 mt-1">
                    <div class="">
                        <input type="radio" class="mx-1" wire:model="facility_type" name="facility_type"
                            id="facility_type" value="RESTAURANT" @checked(old('facility_type', $facility['facility_type']))>
                        <label for="facility_type">Restaurant</label>
                    </div>
                    <div>
                        <input type="radio" class="mx-1" wire:model="facility_type" name="facility_type"
                            id="facility_type" value="TOURISM_VILLAGE" @checked(old('facility_type', $facility['facility_type']))>
                        <label for="facility_type">Tour Village</label>
                    </div>
                </div>
            </div>
            <div>
                <label for="facility_name" class="text-sm text-gray-700">Nama Fasilitas</label>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="facility_name" name="facility_name"
                    id="facility_name" value="{{ $facility ? $facility['facility_name'] : null }}"
                    placeholder="John Doe" required>
                @error('facility_name')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="facility_description" class="text-sm text-gray-700">Deskripsi Fasilitas</label>
                <br>
                <textarea class="w-full mt-1 rounded-md" wire:model="facility_description" name="facility_description"
                    id="facility_description" cols="10" rows="4">
                    {{ $facility ? $facility['facility_description'] : null }}
                </textarea>
            </div>
        </div>

    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        <button type="button" @if (!$facility) wire:click="store()" @else wire:click="update()" @endif
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900">
            @if (!$facility)
                <i class="w-6 fas fa-plus"></i>
                Tambah
            @else
                <i class="w-6 fas fa-check"></i>
                Perbarui
            @endif
        </button>
    </div>
</div>
