<x-filament-panels::page>
    <div class="grid grid-cols-10 gap-4">
        <div class="col-span-full md:col-span-3">
            <ul class="pl-4">
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                    <span>
                        Personal Details
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                    <span>
                        Id Verification
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                    <span>
                        Biometric Verification
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#036c5f"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </span>
                    <span>
                        Overview
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm text-gray-400">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#bbb"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                    <span>
                        Done
                    </span>
                </li>
            </ul>
        </div>
        <div class="col-span-full md:col-span-7">
            {{-- @livewire('user-verification-details') --}}
            @livewire('user-verification-document')
        </div>
    </div>
</x-filament-panels::page>
