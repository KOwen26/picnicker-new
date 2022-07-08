<?php

namespace App\Http\Livewire\Transactions;

use App\Models\Customer\Transactions;
use Livewire\Component;

class CustomersTransactionsList extends Component
{
    // public Transactions $transactions;
    public $transactions;
    public $merchant_picture;
    public function mount()
    {
        $this->transactions = Transactions::TransactionCustomer(auth()?->guard('customer')->user()->customer_id)->Newest()->get();
        // dd($this->transactions->first()->Merchant);
    }

    public function render(Transactions $transactions)
    {
        return view('livewire.transactions.customers-transactions-list');
        // , ['transactions' => $transactions::where('customer_id', auth()?->guard('customer')->user()->customer_id)->get()]
    }
}