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

    <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
        <a href="{{ route('guest.home') }}">
            <x-application-logo class="w-20 h-20" color="text-green-400" />
        </a>
    </div>

    <x-guest-card>
        <x-slot name="logo">
            <a href="{{ route('guest.sport', $championship->sport)}}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide">
                {{ $championship->sport->name }}
            </a>
            <h1 class="text-green-400 text-2xl font-extrabold capitalize tracking-wide">
                {{ $championship->name }}
            </h1>
        </x-slot>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($championship->championshipEditions as $edition)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400 animate pop @if($loop->index > 0) delay-{{ min($loop->index, 15)/*max:delay-15*/ }} @endif">
                    <span class="capitalize font-semibold tracking-wide">{{ $edition->name }}</span>
                </div>
            @endforeach
        </div>
    </x-guest-card>
</x-guest-layout>
