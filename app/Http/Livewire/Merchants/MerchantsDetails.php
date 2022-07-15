<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Admin\Banks;
use App\Models\Admin\Cities;
use App\Models\Merchant\BankAccounts;
use App\Models\Merchant\MerchantFacilities;
use App\Models\Merchant\MerchantOwner;
use App\Models\Merchant\Merchants;
use App\Models\Merchant\MerchantType;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MerchantsDetails extends Component
{

    public
        $merchant_owner_id, $merchant_owner_gender, $merchant_owner_name, $merchant_owner_phone, $merchant_owner_address, $bank_account_id, $bank_id, $bank_account_name, $bank_account_number,
        $merchant_type_id, $city_id, $merchant_name, $merchant_phone, $merchant_address, $merchant_description, $merchant_open_status = 'OPEN';
    public $keyword, $latitude, $longitude;
    public $merchant_id;
    public $merchant_pictures, $merchant_schedule;
    public $merchant = [];


    protected $rules = [
        'merchant.*.merchant_owner_name' => 'require|max:255'

    ];

    public function mount()
    {
        $id = auth()->guard('merchant')->user()->merchant_owner_id;
        $merchant = Merchants::where('merchant_owner_id', $id)->first();
        if ($id && $merchant) {
            $merchant_owner = $merchant->MerchantOwner()->first();
            $bank_account = $merchant->BankAccounts()->first();
            $this->merchant = $merchant;
            $this->merchant_id = $merchant->merchant_id;
            $this->merchant_owner_id = $merchant_owner->merchant_owner_id;
            $this->merchant_owner_name = $merchant_owner->merchant_owner_name;
            $this->merchant_owner_gender = $merchant_owner->merchant_owner_gender;
            $this->merchant_owner_phone = $merchant_owner->merchant_owner_phone;
            $this->merchant_owner_address = $merchant_owner->merchant_owner_address;

            $this->bank_account_id = $bank_account->bank_account_id;
            $this->bank_id = $bank_account->bank_id;
            $this->bank_account_name = $bank_account->bank_account_name;
            $this->bank_account_number = $bank_account->bank_account_number;

            $this->merchant_type_id = $merchant->merchant_type_id;
            $this->city_id = $merchant->city_id;
            $this->merchant_name = $merchant->merchant_name;
            $this->merchant_phone = $merchant->merchant_phone;
            $this->merchant_address = $merchant->merchant_address;
            $this->merchant_description = $merchant->merchant_description;
            $this->merchant_pictures = $merchant->merchant_pictures;
            $this->merchant_schedule = $merchant->merchant_schedule;
            $this->merchant = null;
        }
    }

    public function search_location()
    {
        $response = Http::get('https://geocode.maps.co/search?q=' . parse_url($this->keyword));
        return dd($response->collect());
    }

    public function store()
    {
        $merchant_owner = MerchantOwner::find(auth()->guard('merchant')->user()->merchant_owner_id);
        $merchant_owner->merchant_owner_name = $this->merchant_owner_name;
        $merchant_owner->merchant_owner_gender = $this->merchant_owner_gender;
        $merchant_owner->merchant_owner_phone = $this->merchant_owner_phone;
        $merchant_owner->merchant_owner_address = $this->merchant_owner_address;
        $merchant_owner->save();

        $merchant = new Merchants();
        $merchant->merchant_id = $merchant->MerchantId($merchant_owner->merchant_owner_id);
        $merchant->merchant_owner_id = $merchant_owner->merchant_owner_id;
        $merchant->merchant_type_id = $this->merchant_type_id;
        $merchant->city_id = $this->city_id;
        $merchant->merchant_name = $this->merchant_name;
        $merchant->merchant_phone = $this->merchant_phone;
        $merchant->merchant_address = $this->merchant_address;
        $merchant->merchant_description = $this->merchant_description;
        $merchant->merchant_pictures = null;
        $merchant->merchant_schedule = null;
        $merchant->merchant_open_status = $this->merchant_open_status;
        $merchant->merchant_status = 'REVIEW';
        $merchant->save();

        $bank_account = new BankAccounts();
        $bank_account->bank_account_id = $bank_account->BankAccountId($merchant_owner->merchant_owner_id);
        $bank_account->merchant_id = $merchant->merchant_id;
        $bank_account->bank_id = $this->bank_id;
        $bank_account->bank_account_name = $this->bank_account_name;
        $bank_account->bank_account_number = $this->bank_account_number;
        $bank_account->save();

        $this->emitTo('merchants.merchants-open-schedule', 'addMerchantSchedule', $merchant->merchant_id);
        // $this->emitTo('merchants.merchants-facilities', 'addMerchantFacilities', $merchant->merchant_id);
        // dd($this, $merchant_owner, $merchant, $bank_account);
    }

    public function update()
    {
        $merchant_owner = MerchantOwner::find($this->merchant_owner_id);
        $merchant_owner->merchant_owner_name = $this->merchant_owner_name;
        $merchant_owner->merchant_owner_gender = $this->merchant_owner_gender;
        $merchant_owner->merchant_owner_phone = $this->merchant_owner_phone;
        $merchant_owner->merchant_owner_address = $this->merchant_owner_address;
        $merchant_owner->save();

        $merchant = Merchants::find($this->merchant_id);
        $merchant->city_id = $this->city_id;
        $merchant->merchant_name = $this->merchant_name;
        $merchant->merchant_phone = $this->merchant_phone;
        $merchant->merchant_address = $this->merchant_address;
        $merchant->merchant_description = $this->merchant_description;
        $merchant->merchant_open_status = $this->merchant_open_status;
        $merchant->save();

        $bank_account = BankAccounts::find($this->bank_account_id);
        $bank_account->bank_id = $this->bank_id;
        $bank_account->bank_account_name = $this->bank_account_name;
        $bank_account->bank_account_number = $this->bank_account_number;
        $bank_account->save();

        $this->emitTo('merchants.merchants-open-schedule', 'addMerchantSchedule', $merchant->merchant_id);
    }

    public function render(MerchantType $merchant_type, Banks $banks, Cities $cities)
    {
        return view('livewire.merchants.merchants-details', [
            'merchant_type' => $merchant_type->all(),
            'banks' => $banks->where('bank_status', 'ACTIVE')->orderBy('bank_name', 'asc')->get(),
            'cities' => $cities->where('province_id', '35')->orderBy('city_name', 'asc')->get()
        ]);
    }
}
