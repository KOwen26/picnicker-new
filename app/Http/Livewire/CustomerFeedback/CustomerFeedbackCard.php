<?php

namespace App\Http\Livewire\CustomerFeedback;

use App\Models\Customer\CustomerFeedback;
use Livewire\Component;

class CustomerFeedbackCard extends Component
{
    public CustomerFeedback $customer_feedback;

    public function render()
    {
        return view('livewire.customer-feedback.customer-feedback-card');
    }
}