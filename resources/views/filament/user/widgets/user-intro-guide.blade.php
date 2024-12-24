<x-filament-widgets::widget>
    <x-filament::section>
        <div class="mb-3">
            <h2 class="text-lg font-semibold">Getting Started Guide</h2>
            <p class="text-sm text-gray-500">Watch this quick introduction to learn how to use our platform as a
                donor or beneficiary</p>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative w-full rounded-lg overflow-hidden shadow-lg">
                <div class="p-2">
                    <h2 class="text-lg font-semibold">Donators Guide</h2>
                </div>
                <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/Y8kU484gyj8?si=vcgyfUzznVXIFqnx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                {{-- <video class="w-full h-full aspect-video object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                    <source
                        src="{{ asset('https://res.cloudinary.com/dymmepdu0/video/upload/f_auto:video,q_auto/olou63vmaco15e4tgvwn') }}"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video> --}}
            </div>
            <div class="relative w-full rounded-lg overflow-hidden shadow-lg">
                <div class="p-2">
                    <h2 class="text-lg font-semibold">Benefactors Guide</h2>
                </div>
                <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/osS-Q9cpitM?si=wCdKL4uxs5XcxMu1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                {{-- <video class="w-full h-full aspect-video object-cover" controls poster="{{ asset('images/guide-thumbnail.jpg') }}">
                    <source
                        src="{{ asset('https://res.cloudinary.com/dymmepdu0/video/upload/f_auto:video,q_auto/opqzurxydljmfhbt60fs') }}"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video> --}}
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
