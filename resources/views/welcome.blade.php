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
            <a href="{{ route('guest.home') }}">
                <x-application-logo class="w-20 h-20" color="text-green-400" />
            </a>
        </x-slot>

        <div class="w-full mb-4 text-center text-gray-300 text-xs uppercase tracking-widest">
            @lang('Sports')
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach (App\Models\Sport::all() as $sport)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400 animate pop @if($loop->index > 0) delay-{{ min($loop->index, 15)/*max:delay-15*/ }} @endif">
                    <a href="{{ route('guest.sport', $sport) }}" class="capitalize font-semibold tracking-wide">
                        {{ $sport->name }}
                    </a>
                </div>
            @endforeach
        </div>
        <div class="w-full my-4 text-center text-gray-300 text-xs uppercase tracking-widest">
            @lang('Championships')
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach (App\Models\Championship::all() as $championship)
                <div class="bg-green-400 p-2 rounded cursor-pointer text-center flex items-center justify-center hover:bg-green-700 hover:text-green-400 animate pop @if($loop->index > 0) delay-{{ min($loop->index, 15)/*max:delay-15*/ }} @endif">
                    <a href="{{ route('guest.championship', $championship) }}" class="capitalize font-semibold tracking-wide">
                        {{ $championship->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </x-guest-card>
</x-guest-layout>
