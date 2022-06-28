<div class="flex content-center justify-center">
    {{-- {{ dd($id) }} --}}
    <button type="button" wire:click="$emit('openModal','{{ $update_modal }}',{{ json_encode(['id' => $id]) }})"
        class="p-2 mx-1 text-white rounded-md bg-sky-500 hover:bg-sky-600">
        <i class='w-6 fas fa-pen'></i>
    </button>
    <button type="button"
        wire:click="$emit('openModal','others.delete-modal',{{ json_encode(['title' => $title, 'component' => $deleteModel, 'method' => $deleteMethod, 'value' => $id, 'name' => $name]) }})"
        class="p-2 mx-1 text-white bg-red-500 rounded-md hover:bg-red-600">
        <i class='w-6 fas fa-trash-can'></i>
    </button>
</div>
