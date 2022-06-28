<?php

namespace App\Http\Livewire\Merchants;

use Livewire\Component;

class MerchantsLogout extends Component
{

    public function logout()
    {
        auth()->guard('merchant')->logout();
        return redirect(route('merchant.login'));
    }

    public function render()
    {
        return view('livewire.merchants.merchants-logout');
    }
}