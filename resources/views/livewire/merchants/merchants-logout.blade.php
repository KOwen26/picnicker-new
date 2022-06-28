<div>
    <form wire:submit.prevent="logout">
        <span class="block w-full rounded-md ">
            <button type="submit"
                class="flex justify-start w-full px-4 py-2 text-sm font-medium transition duration-150 ease-in-out rounded-md hover:text-danger-900 focus:outline-none active:text-danger-900">
                <span class="w-4 h-4 mr-2 ">
                    <i class="fas fa-arrow-right-from-bracket"></i>
                </span>
                Logout
            </button>
        </span>
    </form>
</div>
