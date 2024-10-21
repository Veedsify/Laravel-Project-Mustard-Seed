<div class="p-4 flex flex-wrap justify-center items-center w-full h-full  before:bg-[rgba(0,0,0,0.5)] overflow-auto">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6 relative">
        <div class="my-8 text-center">
            <div class="flex justify-center">
                @if ($status == true)
                    <x-icons.success />
                @else
                    <x-icons.error />
                @endif
            </div>
            <h4 class="text-xl text-gray-800 font-semibold mt-4">
                {{ $status == true ? 'Verification Completed' : 'Verification Pending' }}
            </h4>
            <p class="text-sm text-gray-500 leading-relaxed mt-4">
                Hi, {{ auth()->user()->name }}!, Your verification process has been completed. You can now access your
                dashboard.
            </p>
        </div>

        <div class="flex items-center">
            <a href="/user"
                class="px-5 py-2.5 mx-auto inline-block rounded-lg text-white text-sm border-none outline-none bg-gray-800 hover:bg-gray-700">
                Go to Dashboard
            </a>
        </div>
    </div>
</div>
