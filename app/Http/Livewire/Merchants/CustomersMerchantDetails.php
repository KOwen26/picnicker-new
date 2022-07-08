<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantDetails extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public Merchants $merchant;
    // public $merchant;
    // public function mount($merchant)
    // {
    //     dd($merchant);
    //     // $this->merchant = $merchants::find('MRC-220623-1IZW-0002');
    // }

    // public function reserveMerchant()
    // {
    //     // return dd("Hello");
    //     return redirect()->to('livewire.transactions.customers-transactions-confirmation');
    // }

    public function render()
    {
        return view('livewire.merchants.customers-merchant-details')->extends('layouts.customer')->section('content');
    }
}