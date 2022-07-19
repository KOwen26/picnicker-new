<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantCards extends Component
{
    public Merchants $merchant;
    public $merchant_distance = null;
    public $listeners = ['refresh' => '$refresh'];
    public $merchant_pictures = [];
    public function mount($merchant_distance = null)
    {
        // dd($this->merchant)
        if ($merchant_distance) {
            // dd($merchant_distance);
            $this->merchant_distance = $merchant_distance;
        };
        if ($this->merchant?->merchant_pictures) {
            $this->merchant_pictures = json_decode($this->merchant?->merchant_pictures, true)[0];
        }
    }

    // public function refresh()
    // {
    //     // dd($this->merchant);
    //     $this->refresh();
    // }

    public function render()
    {
        return view('livewire.merchants.customers-merchant-cards');
    }
}