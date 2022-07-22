<?php

namespace App\Http\Livewire\CustomerFeedback;

use App\Models\Customer\CustomerFeedback;
use Livewire\Component;

class CustomerFeedbackTotalRating extends Component
{
    public $customer_feedback_rating, $label = true;
    public function mount($merchant_id, $label = true)
    {
        if (!$label) {
            $this->label = $label;
        }
        $customer_feedback = CustomerFeedback::Merchants($merchant_id);
        $this->customer_feedback_rating = $customer_feedback->avg('customer_feedback_rating');
    }

    public function render()
    {
        return view('livewire.customer-feedback.customer-feedback-total-rating');
    }
}