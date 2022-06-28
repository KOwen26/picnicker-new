<div>
    <livewire:employees.employees-table />
    {{-- <div class="overflow-x-scroll">
        <table class="table-auto" id="employees-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-md">
                @foreach ($employees as $employee)
                    <tr>
                        <th>{{ $loop->iteration }}.</th>
                        <td>{{ Str::title($employee->employee_name) }}</td>
                        <td>{{ Str::lower($employee->employee_email) }}</td>
                        <td>{{ $employee->employee_phone }}</td>
                        <td>
                            <x-status-badges status="{{ $employee->employee_status }}" />
                        </td>
                        <td>
                            <div class="flex content-center justify-center">
                                <button type="button"
                                    wire:click="$emit('openModal','employees.employees-details',{{ json_encode(['id' => $employee->employee_id]) }})"
                                    class="p-2 mx-2 text-white rounded-md bg-sky-500 hover:bg-sky-600">
                                    <i class='w-6 fas fa-pen'></i>
                                </button>
                                <button type="button"
                                    wire:click="$emit('openModal','others.delete-modal',{{ json_encode(['title' => 'Karyawan', 'component' => 'employees.employees-data', 'method' => 'employeeDelete', 'value' => $employee->employee_id, 'name' => $employee->employee_name]) }})"
                                    class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                    <i class='w-6 fas fa-trash-can'></i>
                                </button>
                            </div>
                        </td>
                @endforeach
                </tr>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#employees-table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });
    </script> --}}
</div>
{{-- 2 --}}
{{-- <button type="button"
                                    wire:click="$emit('openModal','others.delete-modal',{{ json_encode(['title' => 'Karyawan', 'route' => 'admin.employee.delete', 'table' => 'employees', 'column' => 'employee_id', 'value' => $employee->employee_id, 'name' => $employee->employee_name]) }})"
                                    class="p-2 mx-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                    <i class='w-6 fas fa-trash-can'></i>
                                </button> --}}
