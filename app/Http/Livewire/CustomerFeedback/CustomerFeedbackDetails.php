<?php

namespace App\Http\Livewire\CustomerFeedback;

use App\Models\Customer\CustomerFeedback;
use App\Models\Customer\Transactions;
use Livewire\Component;

class CustomerFeedbackDetails extends Component
{

    public $customer_feedback, $merchant_id;

    public function mount($merchant_id, CustomerFeedback $customer_feedback)
    {
        if ($merchant_id) {
            $this->merchant_id = $merchant_id;
        }
        $transaction_id = Transactions::where('merchant_id', $merchant_id)->get('transaction_id')->toArray();
        $this->customer_feedback = $customer_feedback->whereIn('transaction_id', $transaction_id)->orderBy('created_at', 'desc')->get();
        // dd($this->customer_feedback);
    }

    public function render()
    {
        return view('livewire.customer-feedback.customer-feedback-details');
    }
}