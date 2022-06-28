{{-- employees-details --}}
{{-- <div id="employee-detail" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Tambah Karyawan Baru
                </h3>
                <button type="button"
                    class="inline-flex items-center p-2 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 "
                    data-modal-toggle="employee-detail">
                    <i class="w-6 h-6 text-xl fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route($route, $id) }}" method="post">
                @csrf
                @if ($employee)
                    @method('put')
                @endif
                <!-- Modal body -->
                <div class="p-5">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                        <div>
                            <span class="text-sm text-gray-700 ">Jenis Kelamin</span>
                            <br>
                            <div class="flex flex-row gap-3 mt-1">
                                <div class="">
                                    <input type="radio" class="mx-1" name="employee_gender"
                                        id="employee_gender" placeholder="John Doe" value="L"
                                        @if ($employee?->employee_gender === 'L') checked="checked" @endif required>
                                    <label for="employee_gender">Sdr</label>
                                </div>
                                <div>
                                    <input type="radio" class="mx-1" name="employee_gender"
                                        id="employee_gender" placeholder="John Doe" value="P"
                                        @if ($employee?->employee_gender === 'P') checked="checked" @endif required>
                                    <label for="employee_gender">Sdri</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="employee_name" class="text-sm text-gray-700">Nama Karyawan</label>
                            <input type="text" class="w-full mt-1 rounded-md" name="employee_name" id="employee_name"
                                value="{{ $employee?->employee_name }}" placeholder="John Doe" required>
                        </div>

                        <div>
                            <label for="employee_phone" class="text-sm text-gray-700">Telpon Karyawan</label>
                            <input type="text" class="w-full mt-1 rounded-md" name="employee_phone" id="employee_phone"
                                placeholder="62811" value="{{ $employee?->employee_phone }}" required>
                        </div>
                        <div>
                            <label for="employee_email" class="text-sm text-gray-700">Email Karyawan</label>
                            <input type="email" class="w-full mt-1 rounded-md" name="employee_email" id="employee_email"
                                placeholder="johndoe@email.com" value="{{ $employee?->employee_email }}" required>
                        </div>
                        <div class="md:col-span-2">
                            <label for="employee_address" class="text-sm text-gray-700">Alamat Karyawan</label>
                            <br>
                            <input type="text" class="w-full mt-1 rounded-md" name="employee_address"
                                id="employee_address" placeholder="Jl Rungkut 1, Surabaya"
                                value="{{ $employee?->employee_address }}" required>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-6 space-x-2 text-sm font-medium border-t border-gray-200 rounded-b">
                    <button data-modal-toggle="employee-detail" type="button"
                        class="text-base-900  hover:bg-base-300 focus:ring-2 focus:outline-none focus:ring-base-500 rounded-lg border border-gray-200  px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Tutup</button>
                    <button type="submit"
                        class="px-4 py-2 text-white rounded-md focus:ring-2 focus:ring-success-900 bg-success-700 hover:bg-success-900"><i
                            class="w-6 fas fa-plus"></i>
                        Tambah</button>

                </div>
            </form>

        </div>
    </div>
</div> --}}
