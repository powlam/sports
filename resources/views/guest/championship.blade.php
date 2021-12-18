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
            <h1 class="text-green-400 text-2xl font-extrabold capitalize tracking-wide">
                @if ($championship->logo)
                    <img src="{{ $championship->logo->image }}" class="h-12 inline"/>
                @endif
                <span>{{ $championship->name }}</span>
            </h1>
        </x-slot>

        <div class="w-full mb-4 text-center text-gray-300 text-xs uppercase tracking-widest">
            @lang('Editions')
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($championship->championshipEditions as $championshipEdition)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400 animate pop @if($championshipEdition->default) border-b-4 border-green-800 @endif @if($loop->index > 0) delay-{{ min($loop->index, 15)/*max:delay-15*/ }} @endif">
                    <a href="{{ route('guest.championshipEdition', $championshipEdition)}}" class="capitalize font-semibold tracking-wide">
                        {{ $championshipEdition->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </x-guest-card>
</x-guest-layout>
