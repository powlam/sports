<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
