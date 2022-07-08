<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer\Customers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class CustomersRegister extends ModalComponent
{
    public $customer_email = '';
    public $customer_name = '';
    public $customer_password = '';
    public $retype_password = '';

    public function register()
    {
        $this->validate([
            'customer_email' => ['required', 'email', 'unique:customers'],
            'customer_name' => ['required'],
            'customer_password' => ['required', 'min:8', 'same:retype_password'],
        ]);
        $customer = new Customers();
        // dd($customer->CustomersId());
        $customer->fill([
            'customer_id' => $customer->CustomerId(),
            'customer_email' => $this->customer_email,
            'customer_name' => $this->customer_name,
            'customer_password' => Hash::make($this->customer_password),
            'customer_status' => 'ACTIVE'
        ]);
        $customer->save();

        event(new Registered($customer));

        Auth::guard('customer')->loginUsingId($customer->customer_id, true);

        return $this->closeModal();
    }

    public function render()
    {
        return view('livewire.customers.customers-register');
    }
}