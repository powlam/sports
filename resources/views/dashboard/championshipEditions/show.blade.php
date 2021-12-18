<x-app-layout>
    <x-slot name="header">
        @include('dashboard.championshipEditions.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            @if ($championshipEdition->logo)
                <img src="{{ $championshipEdition->logo->image }}" class="h-16"/>
            @endif
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.championshipEditions.edit', $championshipEdition->id) }}" color="purple">
                    @lang('terms.button.edit')
                </x-button-link>
            </div>
        </div>
    </div>

    {{-- Relationships --}}
    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Championships')
            </x-slot>

            <a href="{{ route('dashboard.championships.show', $championshipEdition->championship->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                <span class="text-xs mr-3">{{ $championshipEdition->championship->id }}</span> {{ $championshipEdition->championship->name }}
            </a>
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Sports')
            </x-slot>

            @foreach ($championshipEdition->sports as $sport)
                <a href="{{ route('dashboard.sports.show', $sport->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sport->id }}</span> {{ $sport->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            @foreach ($championshipEdition->sportDisciplines as $sportDiscipline)
                <a href="{{ route('dashboard.sportDisciplines.show', $sportDiscipline->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sportDiscipline->id }}</span> {{ $sportDiscipline->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Events')
            </x-slot>

            @foreach ($championshipEdition->sportEvents as $sportEvent)
                <a href="{{ route('dashboard.sportEvents.show', $sportEvent->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sportEvent->id }}</span> {{ $sportEvent->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>
    </div>
</x-app-layout>
