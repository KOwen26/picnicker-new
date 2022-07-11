<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Admin\Facilities;
use App\Models\Merchant\MerchantFacilities;
use Illuminate\Support\Arr;
use Livewire\Component;

class MerchantsFacilities extends Component
{
    protected $listeners = ['addMerchantFacilities' => 'addMerchantFacilities'];
    public $facility_id = [];
    public $merchant_id;

    public function mount($merchant_id = null)
    {
        if ($merchant_id) {
            // $this->merchant_id = $merchant_id;
            $merchant_facilities = MerchantFacilities::where('merchant_id', $merchant_id);
            $this->facility_id = Arr::flatten($merchant_facilities->get('facility_id')->toArray());
        }
    }

    public function addMerchantFacilities($merchant_id)
    {
        // dd("Merchant Facilities", $merchant_id);
        $current_merchant_facilities = MerchantFacilities::where('merchant_id', $merchant_id)->get();
        $selected_facilities = Arr::map(Arr::crossJoin([$merchant_id], $this->facility_id), function ($value) {
            return ['merchant_id' => $value[0], 'facility_id' => (int) $value[1]];
        });
        // foreach ($selected_facilities as $facility) {
        //     $merchant_facilities = new MerchantFacilities();
        //     $merchant_facilities->fill(['merchant_id' => $facility['merchant_id'], 'facility_id' => $facility['facility_id']]);
        //     $merchant_facilities->save();
        // }
        $new_merchant_facilities = collect($selected_facilities)->whereNotIn('facility_id', explode(',', $current_merchant_facilities->implode('facility_id', ',')));
        $deleted_merchant_facilities = explode(',', $current_merchant_facilities->whereNotIn('facility_id', $this->facility_id)->implode('merchant_facility_id', ','));
        if ($new_merchant_facilities) {
            foreach ($new_merchant_facilities as $facility) {
                $merchant_facilities = new MerchantFacilities();
                $merchant_facilities->fill(['merchant_id' => $facility['merchant_id'], 'facility_id' => $facility['facility_id']]);
                $merchant_facilities->save();
            }
        }
        if ($deleted_merchant_facilities) {
            MerchantFacilities::destroy($deleted_merchant_facilities);
        }
        // dd($selected_facilities, $current_merchant_facilities, $new_merchant_facilities, $deleted_merchant_facilities);
        $this->emitTo('merchants.merchants-pictures', 'addMerchantPictures', $merchant_id);
    }

    public function render(Facilities $facilities)
    {
        return view('livewire.merchants.merchants-facilities', ['facilities' => $facilities::orderBy('facility_name', 'asc')->get()]);
    }
}