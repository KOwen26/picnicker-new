<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersMerchantList extends Component
{
    use WithPagination;
    public $quantity = 0, $paginate = false;
    public $merchants;

    public function mount($merchants)
    {
        $this->merchants = $merchants;
        // $merchants = Merchants::Restaurant()->status('ACTIVE');
        // if ($quantity > 0) {
        //     $this->merchants = $merchants->take($quantity)->get();
        //     // dd($this->merchants);
        // }
        // if ($paginate) {
        //     $this->paginate = $paginate;
        // }
    }

    public function render()
    {
        // dd($merchants);
        return view('livewire.merchants.customers-merchant-list');
    }
}