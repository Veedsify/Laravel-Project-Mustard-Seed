<x-filament-widgets::widget>
    <x-filament::section>
        <div class="mb-3">
            <h2 class="text-lg font-semibold">Getting Started Guide</h2>
            <p class="text-sm text-gray-500">Watch this quick introduction to learn how to use our platform as a
                volunteer</p>
        </div>
        <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-lg">
            <video class="w-full h-full object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                <source src="{{ asset('https://videos.pexels.com/video-files/28988888/12538607_640_360_50fps.mp4') }}"
                    type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
