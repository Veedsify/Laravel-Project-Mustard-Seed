<div x-data="{ name: '{{ Auth::user()->name }}', location: '{{ Auth::user()->location }}', email: '{{ Auth::user()->email }}', bio: '{{ Auth::user()->bio }}', image: '{{ asset('storage/'. Auth::user()->avatar) }}' }"
     class="bg-white dark:bg-black dark:shadow-gray-300 shadow-sm p-6 rounded w-72 md:w-2/3 lg:w-1/3 m-3 max-h-[80vh] overflow-y-auto"
     @click.stop="">

    <h1 class="font-bold text-lg md:text-xl mb-5 dark:text-white">Edit Profile</h1>

    <label for="imageUpload">
        <div class="mb-3 rounded-xl overflow-hidden">
            {{-- Banner --}}
        </div>
        <div class="relative border-[3px] mb-3 inline-block p-2 rounded-full border-dotted group">
            <img alt="" width="100" height="100" :src="image"
                 class="object-cover w-20 h-20 rounded-full lg:w-24 lg:h-24 aspect-square"/>
            <div
                class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center rounded-full cursor-pointer transition-all duration-200">
            </div>
        </div>
    </label>

    <input type="file" id="imageUpload" name="avatar" class="hidden" @change="handleImageUpload"
           wire:model="avatar"/>
    @error('avatar')
    <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div>
        <input type="text" wire:model="name" name="name" x-model="name"
               class="w-full block border mb-3 dark:text-white dark:bg-gray-900 dark:border-gray-700 border-gray-300 p-4 outline-none text-black rounded-lg"
               placeholder="Name "/>
        <p class="text-red-500">{{ $errors->first('name') }}</p>
    </div>
    <div>
        <select type="text" wire:model="location" name="location" x-model="location"
                class="w-full block border mb-3 dark:text-white dark:bg-gray-900 dark:border-gray-700 border-gray-300 p-4 outline-none text-black rounded-lg"
                placeholder="Location " label="Location">
            <option value="" selected disabled>--SELECT FROM LIST--</option>
            <x-states :states="$states"/>
        </select>
        <p class="text-red-500">{{ $errors->first('location') }}</p>
    </div>
    <div>
        <input wire:model="email_address" readonly disabled type="email" name="email_address" x-model="email"
               class="w-full block border mb-3 dark:text-white disabled:cursor-not-allowed disabled:select-none dark:bg-gray-900 dark:border-gray-700 border-gray-300 p-4 outline-none text-black rounded-xl select-none"
               placeholder="Email "/>
        <p class="text-red-500">{{ $errors->first('email_address') }}</p>
    </div>
    <div>
        <textarea wire:model="bio" name="bio" x-model="bio" rows="6"
                  class="resize-none w-full block outline-none border mb-3 border-gray-300 dark:text-white dark:bg-gray-900 dark:border-gray-700 p-4 text-black rounded-lg"
                  placeholder="Bio"></textarea>
        <p class="text-red-500">{{ $errors->first('bio') }}</p>
    </div>
    <div>
        <div wire:loading wire:target="save" class="animate-spin">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-loader">
                <path d="M12 2v4" />
                <path d="m16.2 7.8 2.9-2.9" />
                <path d="M18 12h4" />
                <path d="m16.2 16.2 2.9 2.9" />
                <path d="M12 18v4" />
                <path d="m4.9 19.1 2.9-2.9" />
                <path d="M2 12h4" />
                <path d="m4.9 4.9 2.9 2.9" />
            </svg>
        </div>
        <input wire:click="save" type="submit" @click.prevent="submitForm" value="Save"
            class="w-full block border mb-3 dark:text-white dark:bg-teal-600 dark:border-teal-700 bg-teal-600 p-4 outline-none text-white rounded-xl cursor-pointer" />
    </div>
</div>

<script>
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.image = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function submitForm() {
        // Handle form submission logic here
    }
</script>
