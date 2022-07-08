<div>
    <div class="p-4 md:p-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-2xl font-extrabold leading-9 text-center text-gray-900">
                Selamat Datang di Picnicker
            </h2>
            <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                Daftar atau
                <button type="modal" wire:click="$emit('openModal','customers.customers-login')"
                    class="font-medium transition duration-150 ease-in-out text-secondary-900 hover:text-secondary-700 focus:outline-none focus:underline">
                    Login Sekarang
                </button>
            </p>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="">
                <form wire:submit.prevent="register">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Email
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="customer_email" id="email" name="email" type="email"
                                required autofocus
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('customer_email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('customer_email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            Nama
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="customer_name" id="password" type="text" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('customer_name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>
                        @error('customer_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            Password
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="customer_password" id="password" type="password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('customer_password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('customer_password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            Ulangi Password
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="retype_password" id="password" type="password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('retype_password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        </div>

                        @error('retype_password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-secondary-900 hover:bg-secondary-700 focus:outline-none focus:border-secondary-700 focus:ring-secondary active:bg-secondary-700">
                                Daftar
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
