<form action="" class="grid md:grid-cols-2 gap-4 gap-y-8 p-6 py-10 dark:bg-gray-900 bg-white shadow rounded-xl mb-3">
    <div class="border-b border-gray-700 pt-3 w-full col-span-full">
        <h2 class="text-2xl mb-3 font-semibold text-gray-800 dark:text-white">Choose a Verification Document</h2>
        <p class="text-gray-500 text-sm pb-6 dark:text-white">Select a valid ID card to verify your identity</p>
    </div>
    <div class="w-full">
        <label for="first_name" class="block font-semibold mb-3 text-sm">
            First Name:
        </label>
        <input type="text" id="first_name" name="first_name" wire:model="first_name"
            class="rounded-xl p-3 w-full block border-gray-300 dark:bg-gray-800 dark:border-gray-700 outline-teal-500 accent-teal-500" />
        @error('first_name')
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="w-full">
        <label for="last_name" class="block font-semibold mb-3 text-sm">
            Last Name:
        </label>
        <input type="text" id="last_name" name="last_name" wire:model="last_name"
            class="rounded-xl p-3 w-full block border-gray-300 dark:bg-gray-800 dark:border-gray-700 outline-teal-500 accent-teal-500" />
        @error('last_name')
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="col-span-full w-full">
        <label for="phone" class="block font-semibold mb-3 text-sm">
            Phone Number:
        </label>
        <input type="text" id="phone" name="phone" wire:model="phone_number"
            class="rounded-xl p-3 w-full block border-gray-300 dark:bg-gray-800 dark:border-gray-700 outline-teal-500 accent-teal-500" />
        @error('phone_number')
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="col-span-full w-full">
        <label for="address" class="block font-semibold mb-3 text-sm">
            Residential Address:
        </label>
        <input type="text" id="address" name="address" wire:model="address"
            class="rounded-xl p-3 w-full block border-gray-300 dark:bg-gray-800 dark:border-gray-700 outline-teal-500 accent-teal-500" />
        @error('address')
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="col-span-full w-full">
        <button wire:click="saveDetails" type="button" id="name" name="name"
            class="rounded-xl p-3 w-full block border-gray-300 dark:border-gray-700 outline-teal-500 accent-teal-500 bg-teal-600 text-white font-semibold cursor-pointer hover:bg-teal-500">
            Next
        </button>
    </div>
</form>
