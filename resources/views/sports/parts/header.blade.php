<h1 class="bg-gray-500 text-gray-100 border-b-4 border-yellow-400 mb-2 flex items-center space-x-8">
    <a role="button" href="{{ $back ?? route('sports.index') }}" class="p-2 hover:bg-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
    </a>

    <span class="font-bold">{{ $sport->name ?? __('sport.button.new') }}</span>
</h1>
