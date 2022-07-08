<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer\Customers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class CustomersLogin extends ModalComponent
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

        $customer = Customers::where([
            ['customer_email', '=', $this->email],
        ])->first();
        // dd("Halo", $customer, $customer->customer_password, Hash::check($this->password, $customer->customer_password));
        if ($customer) {
            if (Hash::check($this->password, $customer->customer_password)) {
                // dd(Auth::guard('customer')->loginUsingId($customer->customer_id, $this->remember), auth()->guard('customer')->user());
                if (!Auth::guard('customer')->loginUsingId($customer->customer_id, $this->remember)) {
                    $this->addError('email', trans('auth.failed'));
                    // $request->session()->regenerate();
                    return;
                }
                $user = auth()->guard('customer')->user();
                // return redirect()->intended(route('customer.home'));
                $this->closeModal();
                $this->emitUp('refresh');
                return redirect()->back();
            }
        }

        return back()->with('error', 'Login Gagal');
    }

    public function render()
    {
        return view('livewire.customers.customers-login');
    }
}