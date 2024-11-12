<section x-show="activeTab === 1" role="tabpanel">
    <h1 class="text-2xl font-bold mb-4 dark:text-white"> Location Settings</h1>
    <form>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div class="col-span-2">
                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name (Landmark,
                    Building)</label>
                <input name="name" type="text" autocomplete="street-address" wire:model="name"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm" />
                @if ($errors->has('name'))
                    <small class="text-red-500 text-xs">
                        {{ $errors->first('name') }}
                    </small>
                @endif
            </div>
            <div class="col-span-2">
                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                <input name="address" type="text" autocomplete="street-address" wire:model="address"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm" />
                @if ($errors->has('address'))
                    <small class="text-red-500 text-xs">
                        {{ $errors->first('address') }}
                    </small>
                @endif
            </div>
            <div>
                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">States</label>
                <select wire:model="state" id="country" name="state" autocomplete="state"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                    <x-states :states="$states" />
                </select>
                @if ($errors->has('state'))
                    <small class="text-red-500 text-xs">
                        {{ $errors->first('state') }}
                    </small>
                @endif
            </div>
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                <input type="text" wire:model="city" name="city" id="city" autocomplete="city"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                @if ($errors->has('city'))
                    <small class="text-red-500 text-xs">
                        {{ $errors->first('city') }}
                    </small>
                @endif
            </div>
            <div>
                <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zip</label>
                <input type="text" wire:model="zip" name="zip" id="zip" autocomplete="postal-code"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                @if ($errors->has('zip'))
                    <small class="text-red-500 text-xs">
                        {{ $errors->first('zip') }}
                    </small>
                @endif
            </div>
            <div wire:loading wire:target="save" class="col-span-2">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </div>
            <div class="col-span-2">
                <input type="submit" wire:click.prevent="save" value="Update Location"
                    class="mt-1 block w-full py-4 font-lg px-4 border border-transparent bg-amber-600 text-white rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm cursor-pointer">
            </div>
        </div>
    </form>
</section>
