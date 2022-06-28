<div>
    {{-- {{ dd($merchant_pictures) }} --}}
    <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">Foto merchant saat ini</label>
    <div class="grid grid-flow-row grid-cols-6 mb-6">
        @if ($merchant_pictures)
            @forelse ($merchant_pictures as $picture)
                <div class="w-36">
                    <img class="object-cover w-full"
                        src="{{ asset(Str::replace('public', 'storage', $picture['picture_location']) . '\\' . $picture['picture_filename']) }}"
                        alt="{{ $picture['picture_filename'] }}" srcset="">
                </div>
            @empty
                <span>Beluma ada foto</span>
            @endforelse
        @endif
    </div>
    {{-- @if ($merchant_pictures)
    @endif --}}
    <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">Upload
        foto
        merchant</label>
    <form wire:submit.prevent="addMerchantPictures" enctype="multipart/form-data">
        <input
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
            id="multiple_files" type="file" wire:model="pictures" multiple accept="image/*">
        <p class="mt-1 text-sm text-gray-500 " id="file_input_help">please upload a
            .png, .jpg or .jpeg files.</p>
        @error('pictures.*')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
        @if ($pictures)
            <div class="grid grid-flow-row grid-cols-6 mt-6">
                @foreach ($pictures as $picture)
                    <div class="w-36">
                        <img src="{{ $picture->temporaryUrl() }}" alt="" srcset="">
                    </div>
                @endforeach
            </div>
        @endif
        {{-- <button type="submit" class="px-4 py-2 bg-info-700 ">Save</button> --}}
    </form>

</div>
