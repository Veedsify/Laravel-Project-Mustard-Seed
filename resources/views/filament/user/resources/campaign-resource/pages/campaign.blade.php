<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg p-5">
        <p class="mb-10 max-w-[500px] leading-loose">
            Do take notes that the campaigns listed here are only the campaigns that are closest to your location.
            to view all campaigns, please visit the <a href="{{route('donation')}}"
                                                       class="text-amber-500 font-semibold">Campaigns page</a>.
        </p>
        @if($this->campaigns->count() == 0)
            <p class="text-gray-500 font-bold py-3 bg-gray-100 p-3 rounded-lg">
                {{ 'No campaigns found'}}
            </p>
        @endif
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 ">
            @foreach($this->campaigns as $campaign)
                <div
                    class=" bg-white border w-full  overflow-hidden border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{route('donate.details', ['slug' => $campaign->slug])}}">
                        <img class="rounded-t-lg w-full aspect-video object-cover dark:border-gray-800 border-b"
                             src="{{ asset('storage/' . $campaign->image) }}"
                             alt=""/>
                    </a>
                    <div class="p-5 dark:bg-gray-950">
                        <a href="{{route('donate.details', ['slug' => $campaign->slug])}}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $campaign->name }}
                            </h5>
                        </a>
                        <div class="py-3">
                            {!! Str::limit($campaign->description, 150) !!}
                        </div>
                        <a href="{{route('donate.details', ['slug' => $campaign->slug])}}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-amber-700 rounded hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                            View Campaign
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5">
            <div class="mx-auto">
                {{ $this->campaigns->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>


</x-filament-panels::page>
