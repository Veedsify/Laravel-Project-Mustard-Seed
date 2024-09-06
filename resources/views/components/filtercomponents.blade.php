<div class="hidden space-y-4 lg:block">
    <div>
        <label for="SortBy" class="block text-xs font-medium dark:text-gray-100 text-gray-700"> Sort By </label>

        <select id="SortBy" class="mt-1 rounded  border-gray-300 text-sm dark:border-gray-700 dark:bg-gray-900">
            <option disabled>Sort By</option>
            <option value="Title, DESC">Title, DESC</option>
            <option value="Title, ASC">Title, ASC</option>
            <option value="Price, DESC">Price, DESC</option>
            <option value="Price, ASC">Price, ASC</option>
        </select>
    </div>

    <div>
        <p class="block text-xs font-medium text-gray-700 dark:text-gray-100">Filters</p>

        <div class="mt-1 space-y-2">
            <details class="overflow-hidden rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-900 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 dark:text-gray-50 transition">
                    <span class="text-sm font-medium"> Colors </span>

                    <span class="transition group-open:-rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </summary>

                <div class="border-t border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600">
                    <ul class="space-y-1 border-t border-gray-200 p-4 dark:border-gray-600">
                        <li>
                            <label for="FilterRed" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterRed"
                                    class="size-5 rounded border-gray-300 accent-red-500" />
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Red </span>
                            </label>
                        </li>

                        <li>
                            <label for="FilterBlue" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterBlue"
                                    class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Blue </span>
                            </label>
                        </li>

                        <li>
                            <label for="FilterGreen" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterGreen"
                                    class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Green </span>
                            </label>
                        </li>

                        <li>
                            <label for="FilterOrange" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterOrange"
                                    class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Orange </span>
                            </label>
                        </li>

                        <li>
                            <label for="FilterPurple" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterPurple"
                                    class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Purple </span>
                            </label>
                        </li>

                        <li>
                            <label for="FilterTeal" class="inline-flex items-center gap-2">
                                <input type="radio" name="color" id="FilterTeal"
                                    class="size-5 rounded border-gray-300" />

                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Teal </span>
                            </label>
                        </li>
                    </ul>
                </div>
            </details>
            <details class="overflow-hidden rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-900 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 dark:text-gray-50 transition">
                    <span class="text-sm font-medium"> Condition </span>

                    <span class="transition group-open:-rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </summary>

                <div class="border-t border-gray-200 bg-white dark:bg-gray-900 dark:border-gray-600">
                    <ul class="space-y-1 border-t border-gray-200 p-4 dark:border-gray-600">
                        <li>
                            <label for="FilterNew" class="inline-flex items-center gap-2">
                                <input type="radio" name="condition" id="FilterNew"
                                    class="size-5 rounded border-gray-300" />
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> New </span>
                            </label>
                        </li>
                        <li>
                            <label for="FilterUsed" class="inline-flex items-center gap-2">
                                <input type="radio" name="condition" id="FilterUsed"
                                    class="size-5 rounded border-gray-300" />
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-50"> Used </span>
                            </label>
                        </li>
                    </ul>
                </div>
            </details>
        </div>
    </div>
</div>
