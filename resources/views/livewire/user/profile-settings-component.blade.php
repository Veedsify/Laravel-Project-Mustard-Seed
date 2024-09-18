<section x-show="activeTab === 0" role="tabpanel">
    <h1 class="text-2xl font-bold mb-4">Profile Settings</h1>
    <div class="w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end px-4 pt-4" x-data="{ open: false }">
            <button id="dropdownButton" data-dropdown-toggle="dropdown" @click="open = !open"
                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 border rounded-lg text-sm p-1.5"
                type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" x-show="open" :class="{ 'hidden': !open, '': open }" @click.away="open = false"
                class="z-10 absolute text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2" aria-labelledby="dropdownButton">
                    <li>
                        <a href="#"
                            x-on:click="
                            swal('Are you sure', 'Do you want to delete this account?', 'info', {
                                dangerMode: true,
                                buttons: {
                                    cancel: 'No',
                                    confirm: 'Yes'
                                },
                            }).then((value) => {
                                if (value) {
                                    Livewire.dispatch('deleteUser');
                                }
                            });
                            "
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="{{ asset(Auth::user()->avatar) }}"
                alt="Bonnie image" />
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                {{ Auth::user()->name }}
            </h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">
                {{ Auth::user()->email }}
            </span>
            <div class="flex mt-4 md:mt-6">
                <div x-data="{ openModal: false }">
                    <button @click="openModal = true"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-amber-700 rounded-lg hover:bg-amber-800  dark:bg-amber-600 ">
                        Edit Profile
                    </button>
                    <div class="fixed bg-black bg-opacity-50 top-0 left-0 w-full h-screen z-50 transition-all duration-300 ease-in-out flex items-center justify-center"
                        :class="{
                            'pointer-events-none opacity-0': !openModal,
                            'pointer-events-auto opacity-100': openModal
                        }"
                        @click="openModal = false">
                        <livewire:edit-user-settings-component />
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
