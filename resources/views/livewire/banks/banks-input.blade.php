<div>
    {{-- {{ dd($attributes) }} --}}
    <label for="" class="text-sm text-gray-700">Nama Bank</label>
    <select wire:model="{{ $model }}" class="w-full mt-1 rounded-md {{ $class }}">
        <option>Pilih bank terlebih dahulu</option>
        @foreach ($banks as $bank)
            <option value="{{ $bank->bank_id }}">{{ $bank->bank_name }}</option>
        @endforeach
    </select>
</div>
