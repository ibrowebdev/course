<div class="flex justify-center items-center">

    <div class="w-full max-w-xl p-6  sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800 mt-4">
        <h2 class="text-2xl font-bold dark:text-white mb-2 text-center">
            Register
        </h2>
        <form class="mt-8 ">
            <div>
                <label for="name">Name:</label>
                <input wire:model='name' type="text" name="name" placeholder="Your name here.."
                    class="mb-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                @error('name')
                    <p class="text-sm text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input wire:model='email' type="email" name="email" placeholder="Your email here.."
                    class="mb-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                @error('email')
                    <p class="text-sm text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">Password:</label>
                <input wire:model='password' type="password" name="password" label="Password" type="password"
                    placeholder="Your password here.."
                    class="mb-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                @error('password')
                    <p class="text-sm text-red-500 italic">{{ $message }}</p>
                @enderror
            </div>


            <button wire:click.prevent="register" type=""
                class="w-auto px-5 py-3 text-base font-medium text-center text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-2">Register</button>
            @if (session('register'))
                <span class="text-green-500 text-lg font-semibold">{{ session('register') }}</span>
            @endif

        </form>
    </div>

    <x-loading />
</div>
