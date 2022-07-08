<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantCards extends Component
{
    public Merchants $merchant;
    public function render()
    {
        return view('livewire.merchants.customers-merchant-cards');
    }
}