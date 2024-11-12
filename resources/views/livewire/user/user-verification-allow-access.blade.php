<form action="" class="grid md:grid-cols-2 gap-4 p-6 py-10 dark:bg-gray-900 bg-white shadow rounded-xl mb-3">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <div class="col-span-full w-full">
        <div class="border-b dark:border-gray-700 pt-3">
            <h2 class="text-2xl mb-3 font-semibold text-gray-800 dark:text-white">Biometric Verification</h2>
            <p class="text-gray-500 text-sm pb-6 dark:text-white">
                Allow access to your camera to capture your biometric data
            </p>
        </div>
    </div>

    <div class="col-span-full w-full" x-data="{ backside: true }">
        <div class="block font-semibold mb-3 text-sm">
            <span class="inline-block mb-4" id="title">
                Allow Access to Camera
            </span>
            <video id="grantDemo" loop autoplay muted src="{{ asset('assets/videos/grantaccess.mp4') }}" alt="frontside"
                class="w-full h-full object-cover aspect-auto">
            </video>
            <div id="videoFeedContainer" style="display: none;"
                class="flex items-center justify-center  aspect-square md:aspect-video w-full relative">
                <video src="" autoplay muted
                    class="w-full h-full object-cover aspect-square md:aspect-video absolute inset-0 top-0 left-0"
                    id="cameraFeed"></video>
            </div>
            <div>
                <p id="progress" class="py-3"></p>
            </div>
        </div>
    </div>
    <div class="col-span-full w-full">
        <button onclick="allowCameraAccess(this)" type="button" id="allow-access-btn" name="allow-access-btn"
            class="rounded-xl p-3 w-full block border-gray-300 bg-gray-800 text-white font-semibold cursor-pointer">
            Allow Access
        </button>
    </div>
    <button onclick="backStep()" type="button"
        class="rounded-xl p-3 w-full block border-gray-300 bg-gray-800 dark:bg-gray-700 text-white font-semibold cursor-pointer hover:bg-gray-500">
        Back
    </button>
    <div class="col-span-full w-full">
        <button onclick="detectFace()" type="button"
            class="rounded-xl p-3 w-full block border-gray-300 bg-amber-600 text-white font-semibold cursor-pointer hover:bg-amber-500">
            Start Verification
        </button>
    </div>
</form>
