<?php

namespace App\Http\Livewire\Others;

use Livewire\Component;

class CustomerNavbar extends Component
{

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect()->back();
    }

    public function loginModal()
    {
        return $this->emit("openModal", 'customers.customers-login');
    }

    public function registerModal()
    {
        return $this->emit("openModal", 'customers.customers-register');
    }

    public function render()
    {
        return view('livewire.others.customer-navbar');
    }
}