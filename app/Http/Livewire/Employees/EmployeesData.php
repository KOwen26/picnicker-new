<?php

namespace App\Http\Livewire\Employees;

use App\Models\Admin\Employees;
use Livewire\Component;

class EmployeesData extends Component
{

    protected $listeners = ['employeeDelete' => 'employeeDelete', 'refreshComponent' => '$refresh'];

    public function employeeDelete(Employees $employee)
    {
        $employee->delete();
        $this->emit('closeModal', 'others.delete-modal');
        $this->emit('refreshComponent');
    }

    public function render(Employees $employees)
    {
        return view('livewire.employees.employees-data', ['employees' => $employees->all()]);
    }
}