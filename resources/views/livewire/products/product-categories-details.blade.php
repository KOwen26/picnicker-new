<!-- Main modal -->
<div class="">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            @if (!$product_category)
                Tambah
            @else
                Perbarui
            @endif
            Kategori Produk Baru
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
                    @foreach ($merchant_types as $merchant_type)
                        <div class="">
                            <input type="radio" class="mx-1" wire:model="merchant_type_id" id="merchant_type_id"
                                value="{{ $merchant_type->merchant_type_id }}">
                            <label for="merchant_type_id">
                                {{ Str::title($merchant_type->merchant_type_name) }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
            <div>
                <label for="" class="text-sm text-gray-700">Nama Bank</label>
                <select wire:model="parent_id" class="w-full mt-1 rounded-md ">
                    <option value="null">Pilih Kategori Parent</option>
                    @foreach ($parent_categories as $parent_category)
                        <option value="{{ $parent_category->product_category_id }}">
                            {{ $parent_category->product_category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="product_category_name" class="text-sm text-gray-700">Nama Kategori Produk</label>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="product_category_name"
                    name="product_category_name" id="product_category_name" value="" placeholder="John Doe"
                    required>
                @error('product_category_name')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="">
                <label for="product_category_description" class="text-sm text-gray-700">Deskripsi Fasilitas</label>
                <br>
                <textarea class="w-full mt-1 rounded-md" wire:model="product_category_description" name="product_category_description"
                    id="product_category_description" cols="10" rows="4">
                </textarea>
            </div> --}}
            <div>
                <label for="status-toggle" class="relative inline-flex items-center mr-5 cursor-pointer">
                    <input type="checkbox" wire:model.defer="product_category_status" class="sr-only peer"
                        id="status-toggle">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-success-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-success-900">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 ">Aktif</span>
                    {{-- {{ var_export($product_category_status) }} --}}
                </label>
            </div>
        </div>

    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        <button type="button" @if (!$product_category) wire:click="store()" @else wire:click="update()" @endif
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900">
            @if (!$product_category)
                <i class="w-6 fas fa-plus"></i>
                Tambah
            @else
                <i class="w-6 fas fa-check"></i>
                Perbarui
            @endif
        </button>
    </div>
</div>
