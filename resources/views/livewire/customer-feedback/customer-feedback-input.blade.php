<div>
    <form action="" method="" wire:submit.prevent="submit">
        <div class="">
            <div class="mb-4">
                <label for="customer_feedback_rating" class="block text-sm font-medium text-gray-500">Rating Restoran
                    /
                    Kafe</label>

                <div class="flex mt-2 space-x-1 text-gray-300" id="customer_feedback_rating">
                    <label for="star1">
                        <input class="hidden" wire:model="rating" type="radio" id="star1" name="rating"
                            value="1" />
                        <svg class="cursor-pointer block w-6 h-6 hover:text-secondary-700 @if ($rating >= 1) text-secondary-700 @else text-grey @endif "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </label>
                    <label for="star2">
                        <input class="hidden" wire:model="rating" type="radio" id="star2" name="rating"
                            value="2" />
                        <svg class="cursor-pointer block w-6 h-6 hover:text-secondary-700 @if ($rating >= 2) text-secondary-700 @else text-grey @endif "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </label>
                    <label for="star3">
                        <input class="hidden" wire:model="rating" type="radio" id="star3" name="rating"
                            value="3" />
                        <svg class="cursor-pointer block w-6 h-6 hover:text-secondary-700 @if ($rating >= 3) text-secondary-700 @else text-grey @endif "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </label>
                    <label for="star4">
                        <input class="hidden" wire:model="rating" type="radio" id="star4" name="rating"
                            value="4" />
                        <svg class="cursor-pointer block w-6 h-6 hover:text-secondary-700 @if ($rating >= 4) text-secondary-700 @else text-grey @endif "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </label>
                    <label for="star5">
                        <input class="hidden" wire:model="rating" type="radio" id="star5" name="rating"
                            value="5" />
                        <svg class="cursor-pointer block w-6 h-6 hover:text-secondary-700 @if ($rating >= 5) text-secondary-700 @else text-grey @endif "
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </label>
                </div>
            </div>
            <div class="mb-2">
                <label for="merchant_description" class="block text-sm font-medium text-gray-500">Review Restoran /
                    Kafe</label>

                <textarea class="w-full mt-2 rounded-md" wire:model.lazy="customer_feedback_review" name="merchant_description"
                    id="merchant_description" cols="60" rows="2">
            </textarea>
            </div>
            <div class="block">
                <button type="submit"
                    class="float-right px-10 py-2 font-medium text-white rounded-lg bg-secondary-700">Simpan</button>
            </div>
        </div>
    </form>
</div>
