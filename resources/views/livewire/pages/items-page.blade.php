<section>
    <div class="mx-auto max-w-screen-xl">
        <header>
            <p class="max-w-md text-gray-500">
                Here you will find all donated items within your location, you can filter and sort them as you wish.
            </p>
        </header>

        <div class="mt-8 block lg:hidden">
            <button
                class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                <span class="text-sm font-medium"> Filters & Sorting </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 rtl:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <div class="mt-4 lg:mt-8 lg:grid lg:grid-cols-4 lg:items-start lg:gap-8">
            <x-filtercomponents />
            <div class="lg:col-span-3">
                <ul class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($items as $item)
                        <li>
                            <a href="{{route('item.preview', $item->slug)}}"
                                target="_blank"
                                class="group block overflow-hidden dark:bg-gray-800 bg-gray-100 shadow rounded-lg p-2">
                                <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                    class="aspect-square w-full object-cover transition duration-500 group-hover:rotate-1 rounded-lg" />

                                <div class="relative dark:text-color p-1 mt-2">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-[10px] font-medium textgray-500 dark:bg-gray-700 bg-gray-200 rounded-full p-1 px-2">
                                            {{ $item->condition === 1 ? 'New' : 'Used' }}
                                        </span>
                                        <span
                                            class="text-[10px] font-medium textgray-500 dark:bg-gray-700 bg-gray-200 rounded-full p-1 px-4">
                                            {{ $item->category }}
                                        </span>
                                    </div>
                                    <p class="mt-2 pt-2 text-xl">
                                        <span class="sr-only">Product Price</span>
                                        <span class="tracking-wider font-semibold">
                                            {{ $item->name }}
                                        </span>
                                    </p>
                                    <div class="mt-2 text-sm">
                                        {!! Str::limit($item->description, 80) !!}
                                    </div>
                                    <div>
                                        <button
                                            class="px-3 py-2 inline-block mt-2 text-xs font-medium text-white bg-teal-600 rounded w-full">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-3">
                <ol class="mt-8 flex justify-center gap-1 text-xs font-medium">
                    {{ $items->links('vendor/pagination/tailwind') }}
                </ol>
            </div>
        </div>
    </div>
</section>
