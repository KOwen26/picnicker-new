<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantList extends Component
{
    public function mount()
    {
    }

    public function render(Merchants $merchants)
    {
        return view('livewire.merchants.customers-merchant-list', ['merchants' => $merchants->Restaurant()->Status('ACTIVE')->get()]);
    }
}