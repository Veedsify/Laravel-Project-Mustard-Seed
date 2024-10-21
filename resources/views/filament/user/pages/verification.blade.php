<x-filament-panels::page>
    <div class="grid grid-cols-10 gap-4" x-data="{ step: {{ $step }} }">
        <div class="col-span-full md:col-span-3">
            <ul class="pl-4">
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        @if ($step === 1 || $step === 4)
                            <x-icons.check />
                        @else
                            <x-icons.chevron />
                        @endif
                    </span>
                    <span>
                        Personal Details
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        @if ($step === 2 || $step === 4)
                            <x-icons.check />
                        @else
                            <x-icons.chevron />
                        @endif
                    </span>
                    <span>
                        Id Verification
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm">
                    <span>
                        @if ($step === 3 || $step === 4)
                            <x-icons.check />
                        @else
                            <x-icons.chevron />
                        @endif
                    </span>
                    <span>
                        Biometric Verification
                    </span>
                </li>
                <li class="font-bold flex items-center gap-2 mb-4 text-sm text-gray-400">
                    <span>
                        @if ($step === 4)
                            <x-icons.check />
                        @else
                            <x-icons.chevron />
                        @endif
                    </span>
                    <span>
                        Done
                    </span>
                </li>
            </ul>
        </div>
        <div class="col-span-full md:col-span-7">
            @if ($step === 1)
                @livewire('user.user-verification-details')
            @elseif ($step === 2)
                @livewire('user.user-verification-document')
            @elseif ($step === 3)
                @livewire('user.user-verification-allow-access')
            @elseif ($step === 4)
                @livewire('user.user-verfication-completed')
            @endif
        </div>
    </div>
</x-filament-panels::page>
