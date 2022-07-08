<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Customer\Payments;
use App\Models\Customer\Transactions;
use Livewire\WithFileUploads;

class CustomersTransactionsDetails extends Component
{
    use WithFileUploads;
    public Transactions $transaction;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $merchant_pictures;
    public $picture;
    public $payment, $payment_proof;

    public function mouth()
    {
    }

    public function savePaymentProof()
    {
        // $this->validate([
        //     'pictures.*' => 'picture|max:5120', // 1MB Max
        // ]);
        // dd($this->picture, $this->payment_proof);
        $picture_name = $this->transaction->payment->payment_id . "-payment-proof-" . Str::random(3) . '-' . time();
        $picture_ext = $this->picture->getClientOriginalExtension();
        $picture_filename = "$picture_name.$picture_ext";
        $storage_location = "public\pictures\payments\\";
        $this->picture->storeAs($storage_location, $picture_filename);
        $this->payment_proof['picture_id'] = 1;
        $this->payment_proof['picture_filename'] = $picture_filename;
        $this->payment_proof['picture_location'] = $storage_location;
        // dd($this->payment_proof, $this->payment_proof);
        if (count($this->payment_proof) > 0) {
            $payment = Payments::find($this->transaction->payment->payment_id);
            $payment->payment_proof = $this->payment_proof;
            $payment->payment_status = 'PAID';
            $payment->save();
        }
        // session()->flash('message', 'pictures has been successfully Uploaded.');
        return $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.transactions.customers-transactions-details')->extends('layouts.customer')->section('content');
    }
}