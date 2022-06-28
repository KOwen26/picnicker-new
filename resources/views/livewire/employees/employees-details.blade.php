<!-- Main modal -->
<div class="">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-5 border-b rounded-t ">
        <h3 class="text-lg font-semibold text-gray-900 ">
            @if (!$employee)
                Tambah
            @else
                Perbarui
            @endif
            Karyawan Baru
        </h3>
        <button type="button"
            class="inline-flex items-center p-2 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 "
            wire:click="$emit('closeModal')">
            <i class="w-6 h-6 text-xl fas fa-times"></i>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-5">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div>
                <span class="text-sm text-gray-700 ">Jenis Kelamin</span>
                <br>
                <div class="flex flex-row gap-3 mt-1">
                    <div class="">
                        <input type="radio" class="mx-1" wire:model="employee_gender" name="employee_gender"
                            id="employee_gender" placeholder="John Doe" value="L"
                            @if ($employee ? $employee['employee_gender'] == 'L' : null) checked="checked" @endif required>
                        <label for="employee_gender">Sdr</label>
                    </div>
                    <div>
                        <input type="radio" class="mx-1" wire:model="employee_gender" name="employee_gender"
                            id="employee_gender" placeholder="John Doe" value="P"
                            @if ($employee ? $employee['employee_gender'] == 'P' : null) checked="checked" @endif required>
                        <label for="employee_gender">Sdri</label>
                    </div>
                </div>
            </div>
            <div>
                <label for="employee_name" class="text-sm text-gray-700">Nama Karyawan</label>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="employee_name" name="employee_name"
                    id="employee_name" value="{{ $employee ? $employee['employee_name'] : null }}"
                    placeholder="John Doe" required>
                @error('employee_name')
                    <span class="text-sm font-medium text-danger-900">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="employee_phone" class="text-sm text-gray-700">Telpon Karyawan</label>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="employee_phone" name="employee_phone"
                    id="employee_phone" placeholder="62811"
                    value="{{ $employee ? $employee['employee_phone'] : null }}" required>
            </div>
            <div>
                <label for="employee_email" class="text-sm text-gray-700">Email Karyawan</label>
                <input type="email" class="w-full mt-1 rounded-md" wire:model="employee_email" name="employee_email"
                    id="employee_email" placeholder="johndoe@email.com"
                    value="{{ $employee ? $employee['employee_email'] : null }}" required>
            </div>
            <div class="md:col-span-2">
                <label for="employee_address" class="text-sm text-gray-700">Alamat Karyawan</label>
                <br>
                <input type="text" class="w-full mt-1 rounded-md" wire:model="employee_address" name="employee_address"
                    id="employee_address" placeholder="Jl Rungkut 1, Surabaya"
                    value="{{ $employee ? $employee['employee_address'] : null }}" required>
            </div>
        </div>

    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
        <button type="button" wire:click="$emit('closeModal')"
            class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
        <button type="button" @if (!$employee) wire:click="store()" @else wire:click="update()" @endif
            class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900">
            @if (!$employee)
                <i class="w-6 fas fa-plus"></i>
                Tambah
            @else
                <i class="w-6 fas fa-check"></i>
                Perbarui
            @endif
        </button>
    </div>
</div>
