<div
    class="fixed bg-black bg-opacity-30 h-screen w-full top-0 left-0 z-50 {{ $showModal ? '' : 'hidden' }}"
>
    @php
        $roles = ["user"];
    @endphp
    @if(!auth()->user()->completed_onboarding && in_array(auth()->user()->role, $roles))
     <div class="h-full w-full flex items-center justify-center">
         <div class="bg-white p-6 rounded-xl w-[300px] md:w-[600px] lg:w-[800px]">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">User Onboarding</h2>
                    <button
                        wire:click="closeModal"
                        class="text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div>
                    <form wire:submit="create">
                        {{ $this->form }}
                    </form>

                    <x-filament-actions::modals />
                </div>
         </div>
    </div>
    @endif
</div>
