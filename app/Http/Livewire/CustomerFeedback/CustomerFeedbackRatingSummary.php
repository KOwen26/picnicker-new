<?php

namespace App\Http\Livewire\CustomerFeedback;

use App\Models\Customer\CustomerFeedback;
use App\Models\Customer\Transactions;
use Livewire\Component;

class CustomerFeedbackRatingSummary extends Component
{
    public $customer_feedback_rating, $customer_feedback_rating_summary, $customer_feedback_quantity, $merchant_id;

    public function mount($merchant_id)
    {
        if ($merchant_id) {
            $this->merchant_id = $merchant_id;
        }
        // $transaction_id = Transactions::where('merchant_id', $merchant_id)->get('transaction_id')->toArray();
        // $customer_feedback = CustomerFeedback::whereIn('transaction_id', $transaction_id);
        $customer_feedback = CustomerFeedback::Merchants($this->merchant_id);
        $this->customer_feedback_rating = $customer_feedback->avg('customer_feedback_rating');
        $this->customer_feedback_quantity = count($customer_feedback->get());
        $this->customer_feedback_rating_summary = $customer_feedback->get()->countBy('customer_feedback_rating')->map(function ($value, $key) {
            return ['quantity' => (int) $key, 'percentage' => $value / $this->customer_feedback_quantity * 100];
        });
        // dd($summary);
    }

    public function render()
    {
        return view('livewire.customer-feedback.customer-feedback-rating-summary');
    }
}