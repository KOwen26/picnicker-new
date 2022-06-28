<div>
    {{-- {{ dd($attributes) }} --}}
    <label for="" class="text-sm text-gray-700">Nama Kota</label>
    <select
        @if ($attributes) @foreach ($attributes as $attribute) {{ "$attribute[0]='$attribute[1]'" }}@endforeach @endif
        ire:model="{{ $model }}" class="w-full mt-1 rounded-md {{ $class }}">
        <option>Pilih kota</option>
        @foreach ($cities as $city)
            <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
        @endforeach
    </select>
</div>
