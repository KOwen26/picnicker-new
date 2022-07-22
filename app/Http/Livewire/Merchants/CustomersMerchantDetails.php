<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Customer\CustomerFeedback;
use App\Models\Customer\Transactions;
use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantDetails extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public Merchants $merchant;
    // public $customer_feedback;
    // public $merchant_distance;
    public function mount()
    {
        if ($this->merchant->merchant_location_latitude && $this->merchant->merchant_location_longitude) {
            // dd(session()->has('longitude'));
            if (session()->has('latitude') && session()->has('longitude')) {
                $this->merchant->merchant_distance = haversine(session('latitude'), session('longitude'), $this->merchant->merchant_location_latitude, $this->merchant->merchant_location_longitude);
            }
        }
        // $this->customer_feedback = CustomerFeedback::Merchants($this->merchant->merchant_id)->get();
    }

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