<!-- Main modal -->
<div class="w-100">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            @if (!$product_id)
                Tambah
            @else
                Perbarui
            @endif
            Tiket
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
                <span class="text-sm text-gray-700 ">Tipe Tiket</span>
                <br>
                <div class="flex flex-row gap-3 mt-1">
                    <select wire:model="product_category_id" class="w-full mt-1 rounded-md ">
                        <option>Pilih Kategori Tiket</option>
                        @foreach ($product_categories as $product_category)
                            <option value="{{ $product_category->product_category_id }}">
                                {{ $product_category->product_category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="product_name" class="text-sm text-gray-700">Nama Tiket</label>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="product_name" name="product_name"
                    id="product_name" value="" placeholder="John Doe" required>
                @error('product_name')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="product_sell_price" class="text-sm text-gray-700">Harga Tiket</label>
                <input type="number" min="0" step="100" class="w-full mt-1 rounded-md"
                    wire:model="product_sell_price" name="product_sell_price" id="product_sell_price" value=""
                    placeholder="10000" required>
                @error('product_sell_price')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="product_quantity" class="text-sm text-gray-700">Stok Harian Tiket</label>
                <input type="number" min="1" class="w-full mt-1 rounded-md" wire:model="product_quantity"
                    name="product_quantity" id="product_quantity" value="" placeholder="1" required>
                @error('product_quantity')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="product_description" class="text-sm text-gray-700">Deskripsi Tiket</label>
                <br>
                <textarea class="w-full mt-1 rounded-md" wire:model="product_description" name="product_description"
                    id="product_description" cols="10" rows="4">
                </textarea>
            </div>
            <div>
                <label for="status-toggle" class="relative inline-flex items-center mr-5 cursor-pointer">
                    <input type="checkbox" wire:model.defer="product_status" class="sr-only peer" id="status-toggle">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-success-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-success-900">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 ">Aktif</span>
                    {{-- {{ var_export($product_status) }} --}}
                </label>
            </div>
        </div>

    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        <button type="button" @if (!$product_id) wire:click="store" @else wire:click="update" @endif
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900">
            @if (!$product_id)
                <i class="w-6 fas fa-plus"></i>
                Tambah
            @else
                <i class="w-6 fas fa-check"></i>
                Perbarui
            @endif
        </button>
    </div>
</div>
