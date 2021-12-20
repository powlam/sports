<x-app-layout>
    <x-slot name="header">
        @include('dashboard.phases.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('phase.tournament')" />
            </div>
            <div class="md:w-2/3">
                {{ $phase->tournament->name }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('phase.name')" />
            </div>
            <div class="md:w-2/3">
                {{ $phase->name }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('phase.order')" />
            </div>
            <div class="md:w-2/3">
                {{ $phase->order }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <x-label :value="__('phase.type')" />
            </div>
            <div class="md:w-2/3">
                {{ $phase->type ? App\Models\Phase::$types[$phase->type] : '' }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.phases.edit', $phase->id) }}" color="purple">
                    @lang('terms.button.edit')
                </x-button-link>
            </div>
        </div>
    </div>

    {{-- Relationships --}}
    <div class="flex justify-center flex-wrap space-x-4 bg-gray-200">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Tournaments')
            </x-slot>

            <a href="{{ route('dashboard.tournaments.show', $phase->tournament->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->id }}</span> {{ $phase->tournament->name }}
            </a>
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Sports')
            </x-slot>

            <a href="{{ route('dashboard.sports.show', $phase->tournament->sportEvent->sportDiscipline->sport->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->sportEvent->sportDiscipline->sport->id }}</span> {{ $phase->tournament->sportEvent->sportDiscipline->sport->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            <a href="{{ route('dashboard.sportDisciplines.show', $phase->tournament->sportEvent->sportDiscipline->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->sportEvent->sportDiscipline->id }}</span> {{ $phase->tournament->sportEvent->sportDiscipline->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Events')
            </x-slot>

            <a href="{{ route('dashboard.sportEvents.show', $phase->tournament->sportEvent->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->sportEvent->id }}</span> {{ $phase->tournament->sportEvent->name }}
            </a>
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Championships')
            </x-slot>

            <a href="{{ route('dashboard.championships.show', $phase->tournament->championshipEdition->championship->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->championshipEdition->championship->id }}</span> {{ $phase->tournament->championshipEdition->championship->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Editions')
            </x-slot>

            <a href="{{ route('dashboard.championshipEditions.show', $phase->tournament->championshipEdition->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $phase->tournament->championshipEdition->id }}</span> {{ $phase->tournament->championshipEdition->name }}
            </a>
        </x-dashboard.related-card>
    </div>
</x-app-layout>
