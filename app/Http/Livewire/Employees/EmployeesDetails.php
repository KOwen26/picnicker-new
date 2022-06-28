<?php

namespace App\Http\Livewire\Employees;

use LivewireUI\Modal\ModalComponent;
use App\Models\Admin\Employees;
use Livewire\Component;

class EmployeesDetails extends ModalComponent
{
    public $employee, $employee_id, $employee_name, $employee_gender, $employee_email, $employee_phone, $employee_address, $employee_status;

    public function mount($id = null)
    {
        if ($id) {
            $this->employee = Employees::find($id);
            $this->employee_id = $this->employee->employee_id;
            $this->employee_name = $this->employee->employee_name;
            $this->employee_gender = $this->employee->employee_gender;
            $this->employee_email = $this->employee->employee_email;
            $this->employee_phone = $this->employee->employee_phone;
            $this->employee_address = $this->employee->employee_address;
            $this->employee_status = $this->employee->employee_status;
        }
    }

    public function resetInput()
    {
        $this->employee_name = null;
        $this->employee_gender = null;
        $this->employee_email = null;
        $this->employee_phone = null;
        $this->employee_address = null;
    }

    public function validation()
    {
    }

    public function store()
    {
        $this->validate([
            'employee_name' => 'required',
            'employee_gender' => 'required',
            'employee_email' => 'required',
            'employee_phone' => 'required',
            'employee_address' => 'required',
        ]);

        Employees::create([
            'employee_name' => $this->employee_name,
            'employee_gender' => $this->employee_gender,
            'employee_email' => $this->employee_email,
            'employee_phone' => $this->employee_phone,
            'employee_address' => $this->employee_address,
            'employee_password' => "admin123",
            'employee_status' => "ACTIVE",
        ]);

        $this->resetInput();
        $this->emitTo('employees.employees-table', 'refreshComponent');
        $this->closeModal();
    }

    public function update()
    {
        $employee = Employees::find($this->employee_id);
        $employee->employee_name = $this->employee_name;
        $employee->employee_gender = $this->employee_gender;
        $employee->employee_email = $this->employee_email;
        $employee->employee_phone = $this->employee_phone;
        $employee->employee_address = $this->employee_address;
        $employee->employee_status = $this->employee_status;
        $employee->save();

        $this->resetInput();
        $this->emitTo('employees.employees-table', 'refreshComponent');
        $this->closeModal();
    }

    public function render(Employees $employees)
    {
        return view('livewire.employees.employees-details', ['employee' => $employees]);
    }
}