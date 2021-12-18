<x-app-layout>
    <x-slot name="header">
        @include('dashboard.sportEvents.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            @if ($sportEvent->logo)
                <img src="{{ $sportEvent->logo->image }}" class="h-16"/>
            @endif
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.sportEvents.edit', $sportEvent->id) }}" color="purple">
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

            <a href="{{ route('dashboard.sports.show', $sportEvent->sportDiscipline->sport->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $sportEvent->sportDiscipline->sport->id }}</span> {{ $sportEvent->sportDiscipline->sport->name }}
            </a>
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            <a href="{{ route('dashboard.sportDisciplines.show', $sportEvent->sportDiscipline->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $sportEvent->sportDiscipline->id }}</span> {{ $sportEvent->sportDiscipline->name }}
            </a>
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Championships')
            </x-slot>

            @foreach ($sportEvent->championships as $championship)
                <a href="{{ route('dashboard.championships.show', $championship->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $championship->id }}</span> {{ $championship->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Editions')
            </x-slot>

            @foreach ($sportEvent->championshipEditions as $championshipEdition)
                <a href="{{ route('dashboard.championshipEditions.show', $championshipEdition->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $championshipEdition->id }}</span> {{ $championshipEdition->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>
    </div>
</x-app-layout>
