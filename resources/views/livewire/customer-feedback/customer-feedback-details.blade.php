<div>
    <div>
        <div class="">
            @livewire('customer-feedback.customer-feedback-rating-summary', ['merchant_id' => $merchant_id])
        </div>
        <div class="mt-10">
            @foreach ($customer_feedback as $feedback)
                @livewire('customer-feedback.customer-feedback-card', ['customer_feedback' => $feedback], key($feedback->customer_feedback_id))
            @endforeach
        </div>
    </div>
</div>
