<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersMerchantPaginate extends Component
{
    use WithPagination;
    public function paginationView()
    {
        return 'vendor.pagination.default';
    }
    public function render()
    {
        $merchants = Merchants::Restaurant()->status('ACTIVE')->orderBy('merchant_name', 'asc')->paginate(15);
        return view('livewire.merchants.customers-merchant-paginate', ['merchants' => $merchants]);
    }
}