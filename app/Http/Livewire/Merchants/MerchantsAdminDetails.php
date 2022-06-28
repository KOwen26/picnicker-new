<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class MerchantsAdminDetails extends ModalComponent
{
    public $merchant;
    public $merchant_status;

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->merchant = Merchants::find($id);
        }
    }

    public function accept()
    {
        // dd($this->merchant);
        $merchant = Merchants::find($this->merchant->merchant_id);
        $merchant->merchant_status = 'ACTIVE';
        return $merchant->save();
    }

    public function render()
    {
        return view('livewire.merchants.merchants-admin-details');
    }
}