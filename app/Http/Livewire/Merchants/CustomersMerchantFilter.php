<?php

namespace App\Http\Livewire\Merchants;

use App\Http\Middleware\MerchantAuth;
use App\Models\Merchant\Merchants;
use Livewire\Component;

class CustomersMerchantFilter extends Component
{
    public $merchants;
    public $listeners = ['refresh' => '$refresh', 'search' => 'search'];
    public $latitude, $longitude;
    public function mount(Merchants $merchants)
    {
        // dd($this->latitude && $this->longitude);
        if ($this->latitude && $this->longitude) {
            $this->search();
        } else {
            $this->merchants = $merchants->Restaurant()->status('ACTIVE')->get();
        }
    }

    public function search()
    {
        // $merchants = $merchants::Restaurant()->Status('ACTIVE')->get();
        session(['latitude' => $this->latitude, 'longitude' => $this->longitude]);
        // dd(session('longitude'));
        $merchant_distance = $this->merchants->whereIn('merchant_id', ['MRC-220718-TEST-0006', 'MRC-220718-TEST-0010', 'MRC-220718-TEST-0016', 'MRC-220718-TEST-0017'])->map(function ($item) {
            $latitude = $this->latitude ?? -7.2820496;
            $longitude = $this->longitude ?? 112.7722238;
            $item['merchant_distance'] = haversine($latitude, $longitude, $item->merchant_location_latitude, $item->merchant_location_longitude);
            return $item;
        })->sortBy(['merchant_distance', 'asc']);
        $this->merchants = $merchant_distance;
        $this->emitTo('merchants.customers-merchant-cards', 'refresh');
        // dd($this->merchants);
    }

    public function render()
    {
        return view('livewire.merchants.customers-merchant-filter');
    }
}