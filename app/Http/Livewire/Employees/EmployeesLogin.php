<?php

namespace App\Http\Livewire\Employees;

use App\Models\Admin\Employees;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EmployeesLogin extends Component
{
    use AuthenticatesUsers;
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $employee = Employees::where([
            ['employee_email', '=', $this->email], ['employee_status', '=', 'ACTIVE']
        ])->first();
        // dd("Halo", $employee, $employee->employee_password, Hash::check($this->password, $employee->employee_password));
        if ($employee) {
            if (Hash::check($this->password, $employee->employee_password)) {
                // dd(Auth::guard('admin')->loginUsingId($employee->employee_id), auth()->guard('admin')->user());
                if (!Auth::guard('admin')->loginUsingId($employee->employee_id)) {
                    $this->addError('email', trans('auth.failed'));
                    // $request->session()->regenerate();
                    return;
                }
                $user = auth()->guard('admin')->user();
                return redirect()->intended(route('admin.home'));
            }
        }

        return back()->with('error', 'Login Gagal');
    }

    public function render()
    {
        return view('livewire.employees.employees-login');
    }
}