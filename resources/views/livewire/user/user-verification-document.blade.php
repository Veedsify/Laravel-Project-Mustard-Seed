<div class="grid md:grid-cols-2 gap-4 gap-y-8 p-6 py-10 dark:bg-gray-900 bg-white shadow rounded-xl mb-3">
    <div class="col-span-full w-full">
        <div class="border-b dark:border-gray-700 pt-3">
            <h2 class="text-2xl mb-3 font-semibold text-gray-800 dark:text-white">Choose a Verification Document</h2>
            <p class="text-gray-500 text-sm pb-6 dark:text-white">Select a valid ID card to verify your identity</p>
        </div>
    </div>
    <div class="col-span-full w-full">
        <div class="flex items-center gap-4 flex-wrap">
            <label for="voterscard" class="flex-1 group min-w-40 select-idcard">
                <input wire:model="fileType" type="radio" value="voterscard" id="voterscard" name="idcard"
                    class="hidden" />
                <span
                    class="selects flex items-center gap-3 justify-center p-4 rounded-xl border dark:border-gray-700 duration-100 ease-in-out group-hover:border-teal-500 cursor-pointer">
                    Voters Card
                    <span>
                        <x-icons.voterscard />
                    </span>
                </span>
            </label>
            <label for="nationalId" class="flex-1 group min-w-40 select-idcard">
                <input wire:model="fileType" type="radio" value="nationalId" id="nationalId" name="idcard"
                    class="hidden" />
                <span
                    class="selects flex items-center gap-3 justify-center p-4 rounded-xl border dark:border-gray-700 duration-100 ease-in-out group-hover:border-teal-500 cursor-pointer">
                    National ID
                    <span>
                        <x-icons.nationalcard />
                    </span>
                </span>
            </label>
            <label for="driverslisense" class="flex-1 group min-w-40 select-idcard">
                <input wire:model="fileType" type="radio" value="driverslisense" id="driverslisense" name="idcard"
                    class="hidden" />
                <span
                    class="selects flex items-center gap-3 justify-center p-4 rounded-xl border dark:border-gray-700 duration-100 ease-in-out group-hover:border-teal-500 cursor-pointer">
                    Drivers License
                    <span>
                        <x-icons.driverscard />
                    </span>
                </span>
            </label>
        </div>
        @error($fileType)
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="col-span-full w-full" x-data="{ backside: true }">
        <label for="frontside" class="block font-semibold mb-3 text-sm">
            <span class="inline-block mb-4">
                Front Side:
            </span>
            <input wire:model="file" type="file" id="frontside" name="frontside"
                class="rounded-xl hidden p-3 w-full border-gray-300" />
            @error($file)
                <small class="text-red-500">
                    {{ $message }}
                </small>
            @enderror
            <span
                class="rounded-xl px-3 py-16 flex items-center justify-center w-full  border-gray-300 bg-gray-100 text-white font-semibold cursor-pointer relative dark:bg-gray-800">
                @if ($file)
                    <img src="{{ $file->temporaryUrl() }}" alt="frontside"
                        class="w-full h-full object-cover absolute inset-0" id="frontside-preview" />
                @endif
                <x-icons.upload />
            </span>
        </label>
        <label for="nobackside" class="inline-block font-semibold mb-3 text-sm select-none cursor-pointer">
            Card has no backside
            <input @click="backside = !backside" type="checkbox" id="nobackside" name="backside"
                class="ml-3 inline-block accent-teal-500 text-teal-500 bg-teal-500 outline-none border-none" />
        </label>
        <label x-show="backside" for="frontside" class="block font-semibold mb-3 text-sm">
            <span class="inline-block mb-4">
                Back Side:
            </span>
            <input type="file" id="frontside" name="frontside"
                class="rounded-xl hidden p-3 w-full border-gray-300" />
            <span
                class="rounded-xl px-3 py-16 flex items-center justify-center w-full border-gray-300 bg-gray-100 text-white font-semibold cursor-pointer relative  dark:bg-gray-800">
                @if ($file2)
                    <img src="{{ $file2->temporaryUrl() }}" alt="backside"
                        class="w-full h-full object-cover absolute inset-0" id="backside-preview" />
                @endif
                <x-icons.upload />
            </span>
        </label>
    </div>
    <div wire:loading wire:target="saveDocuments" class="col-span-full w-full">
        <span>
            <x-icons.loader />
        </span>
    </div>
    <div class="col-span-full w-full flex items-center justify-center gap-3">
        <button onclick="backStep()" type="button"
            class="rounded-xl p-3 w-full block border-gray-300 bg-gray-800 dark:bg-gray-700 text-white font-semibold cursor-pointer hover:bg-gray-500">
            Back
        </button>
        <button wire:click.prevent="saveDocuments" type="button" id="name"
            class="rounded-xl p-3 w-full block border-gray-300 bg-teal-600 text-white font-semibold cursor-pointer hover:bg-teal-500">
            Next
        </button>
    </div>
</div>
