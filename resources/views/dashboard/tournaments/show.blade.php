<x-app-layout>
    <x-slot name="header">
        @include('dashboard.tournaments.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.championship_edition')" />
            </div>
            <div class="md:w-2/3">
                {{ $tournament->championshipEdition->full_name }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.sport_event')" />
            </div>
            <div class="md:w-2/3">
                {{ $tournament->sportEvent->full_name }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.genre')" />
            </div>
            <div class="md:w-2/3">
                {{ $tournament->genre ? App\Models\Tournament::$genres[$tournament->genre] : '' }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.type')" />
            </div>
            <div class="md:w-2/3">
                {{ $tournament->type ? App\Models\Tournament::$types[$tournament->type] : '' }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.state')" />
            </div>
            <div class="md:w-2/3">
                {{ $tournament->state ? App\Models\Tournament::$states[$tournament->state] : '' }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('tournament.logo')" />
            </div>
            <div class="md:w-2/3">
                @if ($tournament->logo)
                    <img src="{{ $tournament->logo->image }}" class="h-16"/>
                @endif
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.tournaments.edit', $tournament->id) }}" color="purple">
                    @lang('terms.button.edit')
                </x-button-link>
            </div>
        </div>
    </div>

    {{-- Relationships --}}
    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Sports')
            </x-slot>

            <a href="{{ route('dashboard.sports.show', $tournament->sportEvent->sportDiscipline->sport->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $tournament->sportEvent->sportDiscipline->sport->id }}</span> {{ $tournament->sportEvent->sportDiscipline->sport->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            <a href="{{ route('dashboard.sportDisciplines.show', $tournament->sportEvent->sportDiscipline->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $tournament->sportEvent->sportDiscipline->id }}</span> {{ $tournament->sportEvent->sportDiscipline->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Events')
            </x-slot>

            <a href="{{ route('dashboard.sportEvents.show', $tournament->sportEvent->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $tournament->sportEvent->id }}</span> {{ $tournament->sportEvent->name }}
            </a>
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Championships')
            </x-slot>

            <a href="{{ route('dashboard.championships.show', $tournament->championshipEdition->championship->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $tournament->championshipEdition->championship->id }}</span> {{ $tournament->championshipEdition->championship->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Editions')
            </x-slot>

            <a href="{{ route('dashboard.championshipEditions.show', $tournament->championshipEdition->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $tournament->championshipEdition->id }}</span> {{ $tournament->championshipEdition->name }}
            </a>
        </x-dashboard.related-card>
    </div>
</x-app-layout>
