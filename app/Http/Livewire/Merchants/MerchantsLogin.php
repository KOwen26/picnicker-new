<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\MerchantOwner;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MerchantsLogin extends Component
{
    use AuthenticatesUsers;
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $merchant = MerchantOwner::where([
            ['merchant_owner_email', '=', $this->email],
        ])->first();
        // dd("Halo", $merchant, $merchant->merchant_owner_password, Hash::check($this->password, $merchant->merchant_owner_password));
        if ($merchant) {
            if (Hash::check($this->password, $merchant->merchant_owner_password)) {
                // dd(Auth::guard('merchant')->loginUsingId($merchant->merchant_owner_id, $this->remember), auth()->guard('merchant')->user());
                if (!Auth::guard('merchant')->loginUsingId($merchant->merchant_owner_id, $this->remember)) {
                    $this->addError('email', trans('auth.failed'));
                    // $request->session()->regenerate();
                    return;
                }
                $user = auth()->guard('merchant')->user();
                return redirect()->intended(route('merchant.home'));
            }
        }

        return back()->with('error', 'Login Gagal');
    }

    public function render()
    {
        return view('livewire.merchants.merchants-login');
    }
}