<div>
    <article>
        <div class="flex items-center mb-4 space-x-4">
            {{-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt=""> --}}
            <div class="space-y-1 font-medium dark:text-white">
                <p>{{ $customer_feedback?->customers?->customer_name }}</p><time datetime="16-04-2000"
                    class="block text-sm text-gray-500 dark:text-gray-400">{{ strftime('%d %B %Y %H:%M', strtotime($customer_feedback?->created_at)) }}
                    WIB</time>
            </div>
        </div>
        <div class="flex items-center mb-1">
            @for ($i = 0; $i < $customer_feedback?->customer_feedback_rating; $i++)
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <title>First star</title>
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
            @endfor
            @for ($i = 0; $i < 5 - $customer_feedback?->customer_feedback_rating; $i++)
                <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <title>First star</title>
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
            @endfor
            {{-- <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Thinking to buy another one!
            </h3> --}}
        </div>
        <p class="mb-2 font-light text-gray-500 dark:text-gray-400">
            {{ $customer_feedback->customer_feedback_review }}
        </p>
        {{-- <a href="#" class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
            more</a> --}}
    </article>
</div>
