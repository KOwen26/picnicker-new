<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class EmployeesLogout extends Component
{

    public function logout()
    {
        // auth()->logout();
        auth()->guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public function render()
    {
        return view('livewire.employees.employees-logout');
    }
}