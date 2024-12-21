<x-filament-widgets::widget>
    <x-filament::section>
        <div class="mb-3">
            <h2 class="text-lg font-semibold">Getting Started Guide</h2>
            <p class="text-sm text-gray-500">Watch this quick introduction to learn how to use our platform as a
                volunteer</p>
        </div>
        <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-lg">
            <video class="w-full h-full object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                <source src="{{ asset('https://res.cloudinary.com/dymmepdu0/video/upload/f_auto:video,q_auto/pbcyrwr3mrctcxpnrdqv') }}"
                    type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
