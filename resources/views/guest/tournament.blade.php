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
            <a href="{{ route('guest.sport', $tournament->sportEvent->sportDiscipline->sport) }}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide block">
                @if ($tournament->sportEvent->sportDiscipline->sport->logo)
                    <img src="{{ $tournament->sportEvent->sportDiscipline->sport->logo->image }}" class="h-8 inline"/>
                @endif
                <span>{{ $tournament->sportEvent->sportDiscipline->sport->name }}</span>
            </a>
            <a href="{{ route('guest.sportDiscipline', $tournament->sportEvent->sportDiscipline) }}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide block">
                @if ($tournament->sportEvent->sportDiscipline->logo)
                    <img src="{{ $tournament->sportEvent->sportDiscipline->logo->image }}" class="h-8 inline"/>
                @endif
                <span>{{ $tournament->sportEvent->sportDiscipline->name }}</span>
            </a>
            <a href="{{ route('guest.sportEvent', $tournament->sportEvent) }}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide block">
                @if ($tournament->sportEvent->logo)
                    <img src="{{ $tournament->sportEvent->logo->image }}" class="h-8 inline"/>
                @endif
                <span>{{ $tournament->sportEvent->name }}</span>
            </a>
            <a href="{{ route('guest.championship', $tournament->championshipEdition->championship) }}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide block">
                @if ($tournament->championshipEdition->championship->logo)
                    <img src="{{ $tournament->championshipEdition->championship->logo->image }}" class="h-8 inline"/>
                @endif
                <span>{{ $tournament->championshipEdition->championship->name }}</span>
            </a>
            <a href="{{ route('guest.championshipEdition', $tournament->championshipEdition) }}" class="text-green-300 text-xl font-extrabold capitalize tracking-wide block">
                @if ($tournament->championshipEdition->logo)
                    <img src="{{ $tournament->championshipEdition->logo->image }}" class="h-8 inline"/>
                @endif
                <span>{{ $tournament->championshipEdition->name }}</span>
            </a>
        </x-slot>

        <div class="w-full mb-4 text-center text-gray-300 text-xs uppercase tracking-widest">
            @lang('Phases')
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($tournament->phases as $phase)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400 animate pop @if($loop->index > 0) delay-{{ min($loop->index, 15)/*max:delay-15*/ }} @endif">
                    <a href="{{-- route('guest.phase', $phase) --}}" class="capitalize font-semibold tracking-wide">
                        <span class="capitalize font-semibold tracking-wide">{{ $phase->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </x-guest-card>
</x-guest-layout>
