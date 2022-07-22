<?php

namespace App\Http\Livewire\Merchants;

use App\Http\Middleware\MerchantAuth;
use App\Models\Merchant\Merchants;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersMerchantFilter extends Component
{
    // public $merchants;
    use WithPagination;
    public $listeners = ['refresh' => '$refresh', 'search' => 'search'];
    public $latitude, $longitude;
    public $sort_attribute = 'merchant_distance', $sort_direction = 'asc';
    public $where = true, $params = null;

    public function search($params = null)
    {
        if ($params) {
            $this->params = $params;
        }
    }

    public function sort($attribute, $direction)
    {
        $this->sort_attribute = $attribute;
        $this->sort_direction = $direction;
        $this->emit('refresh');
    }

    // public function search()
    // {
    //     // $merchants = $merchants::Restaurant()->Status('ACTIVE')->get();
    //     session(['latitude' => $this->latitude, 'longitude' => $this->longitude]);
    //     // dd(session('longitude'));
    //     $merchant_distance = $this->merchants->whereIn('merchant_id', ['MRC-220718-TEST-0006', 'MRC-220718-TEST-0010', 'MRC-220718-TEST-0016', 'MRC-220718-TEST-0017'])->map(function ($item) {
    //         // $latitude = $this->latitude ?? -7.2820496;
    //         // $longitude = $this->longitude ?? 112.7722238;
    //         $latitude = -7.2820496;
    //         $longitude = 112.7722238;
    //         $item['merchant_distance'] = haversine($latitude, $longitude, $item->merchant_location_latitude, $item->merchant_location_longitude);
    //         return $item;
    //     })->sortBy(['merchant_distance', 'asc']);
    //     $this->merchants = $merchant_distance;
    //     $this->emitTo('merchants.customers-merchant-cards', 'refresh');
    //     // dd($this->merchants);
    // }

    public function render(Merchants $merchants)
    {
        // dd($this->sort_attribute, $this->sort_direction);
        $this->latitude = session('latitude') ?? -7.2820496;
        $this->longitude = session('longitude') ?? 112.7722238;
        // $this->latitude = -7.2820496;
        // $this->longitude = 112.7722238;
        $merchants = $merchants->Restaurant()->status('ACTIVE');
        // ->whereIn('merchant_id', ['MRC-220718-TEST-0006', 'MRC-220718-TEST-0010', 'MRC-220718-TEST-0016', 'MRC-220718-TEST-0017'])
        if ($this->params !== '') {
            $merchants = $merchants
                ->join('cities', 'merchants.city_id', '=', 'cities.city_id')
                // ->join('provinces', 'cities.province_id', '=', 'provinces.province_id')
                ->where(function ($query) {
                    $query->where('merchant_name', 'LIKE', '%' . $this->params . '%')
                        ->orWhere('cities.city_name', 'LIKE', '%' . $this->params . '%')
                        // ->orWhere('provinces.province_name', 'LIKE', '%' . $this->params . '%')
                    ;
                });
        }
        // dd($merchants);
        $merchants_result = $merchants->get()->map(function ($item) {
            $latitude = $this->latitude;
            $longitude = $this->longitude;
            $item['merchant_distance'] = haversine($latitude, $longitude, $item->merchant_location_latitude, $item->merchant_location_longitude);
            return $item;
        })->sortBy([$this->sort_attribute, $this->sort_direction]);
        $merchants_result = collectionPaginate($merchants_result, 15);
        // dd(collectionPaginate($merchants_result, 15));
        return view('livewire.merchants.customers-merchant-filter', ['merchants' => $merchants_result]);
    }
}