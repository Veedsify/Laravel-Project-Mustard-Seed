 <x-filament-panels::page>
    <div x-data="{ activeTab: 0 }">
        <!-- Tab List -->
        <ul class="flex item-center gap-2">
            <!-- Tab 1 -->
            <li>
                <button x-transition @click="activeTab = 0" :aria-selected="activeTab === 0"
                    :class="{ 'bg-slate-600 text-white dark:text-white': activeTab === 0 }"
                    class="px-4 py-2 bg-gray-100 rounded dark:text-black font-medium" role="tab">
                    <!-- Icon and Title for Tab 1 -->
                    <span>My Account</span>
                </button>
            </li>
            <!-- Tab 2 -->
            <li>
                <button x-transition @click="activeTab = 1" :aria-selected="activeTab === 1"
                    :class="{ 'bg-slate-600 dark:text-white text-white': activeTab === 1 }"
                    class="px-4 py-2 bg-gray-100 rounded font-medium text-black" role="tab">
                    <span>Location</span>
                </button>
            </li>
            <!-- Tab 3 -->
            <li>
                <button x-transition @click="activeTab = 2" :aria-selected="activeTab === 2"
                    :class="{ 'bg-slate-600 text-white dark:text-white': activeTab === 2 }"
                    class="px-4 py-2 bg-gray-100 rounded font-medium text-black" role="tab">
                    <span>Privacy</span>
                </button>
            </li>
        </ul>

        <!-- Panels -->
        <div role="tabpanels" class="mt-10 p-8 rounded bg-white dark:bg-gray-900">
            <!-- Panel 1 -->
            <section x-show="activeTab === 0" role="tabpanel">
                <h1 class="text-2xl font-bold mb-4">Profile Settings</h1>
                <div class="w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4" x-data="{ open: false }">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" @click="open = !open"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 border rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" x-show="open" :class="{ 'hidden': !open, '': open }"
                            @click.away="open = false"
                            class="z-10 absolute text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                        Data</a>
                                </li>
                                <li>
                                    <a href="#"
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
                            <a href="#"
                                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 shadow">Message</a>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Panel 2 -->
            <section x-show="activeTab === 1" role="tabpanel">
                <h1 class="text-2xl font-bold mb-4"> Location Settings</h1>
            </section>
            <!-- Panel 3 -->
            <section x-show="activeTab === 2" role="tabpanel">
                <h1 class="text-2xl font-bold mb-4"> Privacy Settings</h1>
            </section>
        </div>
    </div>
</x-filament-panels::page>
