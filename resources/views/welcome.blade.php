<x-guest-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <x-button-link href="{{ url('/dashboard') }}">
                    Dashboard
                </x-button-link>
            @else
                <x-button-link href="{{ route('login') }}">
                    Log in
                </x-button-link>
            @endauth
        </div>
    @endif

    <x-guest-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20" color="text-green-400" />
            </a>
        </x-slot>

        <div class="grid grid-cols-3 gap-4">
            @foreach (App\Models\Sport::all() as $sport)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400">
                    <span class="capitalize font-semibold tracking-wide">{{ $sport->name }}</span>
                </div>
            @endforeach
        </div>
    </x-guest-card>
</x-guest-layout>
