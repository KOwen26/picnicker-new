<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\MerchantOwner;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


class MerchantsRegister extends Component
{

    /** @var string */
    public $merchant_owner_email = '';

    /** @var string */
    public $merchant_owner_password = '';

    /** @var string */
    public $retype_password = '';

    public function register()
    {
        $this->validate([
            'merchant_owner_email' => ['required', 'email', 'unique:merchant_owner'],
            'merchant_owner_password' => ['required', 'min:8', 'same:retype_password'],
        ]);
        $merchant = new MerchantOwner();
        // dd($merchant->MerchantOwnerId());
        $merchant->fill([
            'merchant_owner_id' => $merchant->MerchantOwnerId(),
            'merchant_owner_email' => $this->merchant_owner_email,
            'merchant_owner_password' => Hash::make($this->merchant_owner_password),
        ]);
        $merchant->save();

        event(new Registered($merchant));

        Auth::loginUsingId($merchant->merchant_owner_id, true);

        return redirect()->intended(route('merchant.home'));
    }

    public function render()
    {
        return view('livewire.merchants.merchants-register');
    }
}