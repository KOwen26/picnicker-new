<?php

namespace App\Http\Livewire\Employees;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

use App\Models\Admin\Employees;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class EmployeesTable extends DataTableComponent
{
    protected $model = Employees::class;
    protected $listeners = ['employeeDelete' => 'employeeDelete', 'refreshComponent' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('employee_id');
        $this->setPerPageAccepted([10, 25, 50, 100, -1]);
    }

    // public function detailsModal($id)
    // {
    //     return $this->emit('openModal', 'employees.employees-details',   ['id' => $id]);
    // }

    // public function deleteModal($id, $name)
    // {
    //     // dd($id, $name);
    //     return $this->emit('openModal', 'others.delete-modal',   ['title' => 'Karyawan', 'component' => 'employees.employees-table', 'method' => 'employeeDelete', 'value' => $id, 'name' => $name]);
    // }

    public function employeeDelete(Employees $employee)
    {
        $employee->delete();
        $this->emit('closeModal', 'others.delete-modal');
        $this->emit('refreshComponent');
    }

    public function columns(): array
    {
        return [
            // Column::make("Employee id", "employee_id")
            //     ->sortable()->hideIf(true),
            Column::make("Name", "employee_name")->format(fn ($value, $row) => "($row->employee_gender)  $row->employee_name")
                ->sortable()->searchable(),
            Column::make("Employee gender", "employee_gender")
                ->sortable()->hideIf(true),
            Column::make("Email", "employee_email")
                ->sortable()->searchable()->collapseOnTablet(),
            Column::make("Phone", "employee_phone")
                ->sortable()->searchable(),
            Column::make("Address", "employee_address")
                ->sortable()->searchable()->collapseOnTablet(),
            Column::make("Status", "employee_status")
                ->format(fn ($value) => view('components.status-badges', ['value' => $value, 'type' => 'regular']))
                ->sortable()->excludeFromColumnSelect(),
            Column::make("Action", "employee_id")
                ->format(fn ($value, $row) => view('components.table-actions', ['id' => $value, 'title' => 'Karyawan', 'name' => $row->employee_name, 'update_modal' => 'employees.employees-details', 'deleteModel' => 'employees.employees-table', 'deleteMethod' => 'employeeDelete']))->excludeFromColumnSelect(),
            // ButtonGroupColumn::make('Actions')->attributes(function ($row) {
            //     return ['class' => 'space-x-2'];
            // })->buttons([
            //     LinkColumn::make('Edit')
            //         ->title(fn () => 'Edit')
            //         ->format(fn () => "<i class='w-6 fas fa-pen'></i>")->html()
            //         ->location(fn ($row) => "#")
            //         ->attributes(
            //             function ($row) {
            //                 return [
            //                     'class' => 'text-info-900',
            //                     'wire:click' => "detailsModal($row->employee_id)",
            //                 ];
            //             }
            //         ),
            //     LinkColumn::make('Delete')
            //         ->title(fn ($row) => 'Delete')
            //         ->location(fn ($row) => "#")
            //         ->attributes(
            //             function ($row) {
            //                 return [
            //                     'class' => 'text-danger-900',
            //                     'wire:click' => "deleteModal($row->employee_id,'$row->employee_name')",
            //                 ];
            //             }
            //         ),
            // ]),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
        ];
    }
}