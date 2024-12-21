<x-filament-widgets::widget>
    <x-filament::section>
        <div class="mb-3">
            <h2 class="text-lg font-semibold">Getting Started Guide</h2>
            <p class="text-sm text-gray-500">Watch this quick introduction to learn how to use our platform as a
                donor or beneficiary</p>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-lg">
                <h2 class="text-lg font-semibold">Donators Guide</h2>
                <video class="w-full h-full object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                    <source
                        src="{{ asset('https://res.cloudinary.com/dymmepdu0/video/upload/f_auto:video,q_auto/olou63vmaco15e4tgvwn') }}"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-lg">
                <h2 class="text-lg font-semibold">Benefactors Guide</h2>
                <video class="w-full h-full object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                    <source
                        src="{{ asset('https://res.cloudinary.com/dymmepdu0/video/upload/f_auto:video,q_auto/opqzurxydljmfhbt60fs') }}"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
