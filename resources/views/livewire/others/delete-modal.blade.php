<div class="">

    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            Hapus {{ $title }}
        </h3>
        <button type="button"
            class="inline-flex items-center p-2 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 "
            wire:click="$emit('closeModal')">
            <i class="w-6 h-6 text-xl fas fa-times"></i>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-5">
        <div class="">
            <div>
                Apakah anda yakin ingin menghapus <span class="font-bold">{{ $title }} -
                    {{ $name }}</span>
            </div>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        {{-- <button type="button" wire:click="deleteData('{{ $table }}','{{ $column }}','{{ $value }}')"
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-danger-900 bg-danger-700 hover:bg-danger-900">
            <i class="w-6 fas fa-trash-can"></i>
            Hapus
        </button> --}}
        <button type="button" wire:click="$emitTo('{{ $component }}','{{ $method }}','{{ $value }}')"
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-danger-900 bg-danger-700 hover:bg-danger-900">
            <i class="w-6 fas fa-trash-can"></i>
            Hapus
        </button>
    </div>

</div>
