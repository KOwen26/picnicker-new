<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Customer\Payments;
use App\Models\Customer\Transactions;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class MerchantsTransactionsDetails extends ModalComponent
{
    // use WithFileUploads;
    public $transaction;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $merchant_pictures;
    public $picture;
    public $payment, $payment_proof;

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->transaction = Transactions::find($id);
        }
    }

    public function accept()
    {
        $this->transaction->transaction_status = 'VERIFIED';
        $this->transaction->save();
        return $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.transactions.merchants-transactions-details');
    }
}