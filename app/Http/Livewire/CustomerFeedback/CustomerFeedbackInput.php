<?php

namespace App\Http\Livewire\CustomerFeedback;

use App\Models\Customer\CustomerFeedback;
use Livewire\Component;

class CustomerFeedbackInput extends Component
{
    public $rating, $customer_feedback_review, $transaction_id, $check = false;

    public function mount($transaction_id = null)
    {
        if ($transaction_id) {
            $this->transaction_id = $transaction_id;
        }
    }

    public function submit()
    {
        $customer_feedback = new CustomerFeedback();
        $customer_feedback->transaction_id = $this->transaction_id;
        $customer_feedback->customer_id = auth()->guard('customer')->user()->customer_id;
        $customer_feedback->customer_feedback_rating = $this->rating;
        $customer_feedback->customer_feedback_review = $this->customer_feedback_review;
        $customer_feedback->save();
    }

    public function render()
    {
        return view('livewire.customer-feedback.customer-feedback-input');
    }
}