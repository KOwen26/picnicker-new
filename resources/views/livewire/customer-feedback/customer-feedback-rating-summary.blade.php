<div>
    <div class="w-72">
        <div class="flex items-center mb-3">
            @livewire('customer-feedback.customer-feedback-total-rating', ['merchant_id' => $merchant_id])
        </div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $customer_feedback_quantity }} Rating
        </p>
        <div>

            @for ($i = 5; $i > 0; $i--)
                @php
                    $summary = $customer_feedback_rating_summary?->where('quantity', $i)?->first();
                @endphp
                <div class="flex items-center mt-4">
                    <div class="flex">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>First star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-secondary-900 ">
                            {{ $i }}
                        </span>
                    </div>
                    <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                        <div class="h-5 bg-yellow-400 rounded"
                            style="width: {{ $summary ? $summary['percentage'] : 0 }}%">
                        </div>
                    </div>
                    <span class="text-sm font-medium text-secondary-900 ">{{ $summary ? $summary['percentage'] : 0 }}
                        %</span>
                </div>
            @endfor
        </div>
    </div>
</div>
