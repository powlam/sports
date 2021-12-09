<div class="relative w-full sm:max-w-xs m-2 px-8 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <div class="w-full mb-4 text-center text-gray-300 text-xs uppercase tracking-widest">
        {{ $title }}
    </div>

    <div class="grid grid-cols-1 gap-2 text-sm">
        {{ $slot }}
    </div>
</div>
