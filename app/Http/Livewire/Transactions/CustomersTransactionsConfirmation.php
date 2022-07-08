<?php

namespace App\Http\Livewire\Transactions;

use App\Models\Customer\Payments;
use App\Models\Customer\Transactions;
use App\Models\Merchant\Merchants;
use Carbon\Carbon;
use Livewire\Component;

class CustomersTransactionsConfirmation extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    public Merchants $merchant;
    public $transaction_notes, $transaction_date, $payment_method = 'MANUAL_TRANSFER';
    public $merchant_pictures;
    public $person_quantity = 1, $transaction_total = 0, $transaction_discount = 0, $transaction_tax = 0, $transaction_grand_total = 0, $reservation_fee = 1000;


    public function calculate()
    {
        $this->transaction_total = $this->person_quantity * $this->reservation_fee;
        $this->transaction_grand_total = $this->transaction_total - $this->transaction_discount;
    }

    public function mount()
    {
        $this->merchant_pictures = json_decode($this->merchant->merchant_pictures, true)[0];
        $this->transaction_date = date('Y-m-d H:i');
        $this->calculate();
    }

    public function reserve()
    {
        // dd($this, auth()->guard('customer')->user()->customer_id, Carbon::now()->addDay());
        $transaction = new Transactions();
        $transaction->transaction_id = $transaction->TransactionId();
        $transaction->merchant_id = $this->merchant->merchant_id;
        $transaction->customer_id = auth()->guard('customer')->user()->customer_id;
        $transaction->transaction_type = 'RESTAURANT';
        $transaction->transaction_date =  $this->transaction_date;
        $transaction->transaction_item_quantity =  $this->person_quantity;
        $transaction->transaction_total = $this->transaction_total;
        $transaction->transaction_discount = $this->transaction_discount;
        $transaction->transaction_grand_total = $this->transaction_grand_total;
        $transaction->transaction_notes = $this->transaction_notes;
        $transaction->transaction_status = 'NEW';
        $transaction->save();

        $payment = new Payments();
        $payment->payment_id = $payment->PaymentId($transaction->transaction_id);
        $payment->transaction_id = $transaction->transaction_id;
        $payment->payment_due_date = Carbon::now()->addDay();
        $payment->payment_total = $transaction->transaction_grand_total;
        $payment->payment_status = 'UNPAID';
        $payment->save();
        return redirect(route('customer.transaction-details', $transaction->transaction_id));
    }

    public function render()
    {
        return view('livewire.transactions.customers-transactions-confirmation')->extends('layouts.customer')->section('content');
    }
}