<x-app-layout>
    <x-slot name="header">
        @include('dashboard.championships.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.championships.edit', $championship->id) }}" color="purple">
                    @lang('terms.button.edit')
                </x-button-link>
            </div>
        </div>
    </div>

    {{-- Relationships --}}
    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Editions')

                <x-dashboard.button-link-mini href="{{ route('dashboard.championshipEditions.create', ['championship_id' => $championship->id]) }}" color="yellow" class="absolute top-1 right-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </x-dashboard.button-link-mini>
            </x-slot>

            @foreach ($championship->championshipEditions as $championshipEdition)
                <a href="{{ route('dashboard.championshipEditions.show', $championshipEdition->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $championshipEdition->id }}</span> {{ $championshipEdition->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>
    </div>

    <div class="flex justify-center flex-wrap space-x-4 bg-yellow-50">
        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Sports')
            </x-slot>

            @foreach ($championship->sports as $sport)
                <a href="{{ route('dashboard.sports.show', $sport->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sport->id }}</span> {{ $sport->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            @foreach ($championship->sportDisciplines as $sportDiscipline)
                <a href="{{ route('dashboard.sportDisciplines.show', $sportDiscipline->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sportDiscipline->id }}</span> {{ $sportDiscipline->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>

        <x-dashboard.related-card>
            <x-slot name="title">
                @lang('Events')
            </x-slot>

            @foreach ($championship->sportEvents as $sportEvent)
                <a href="{{ route('dashboard.sportEvents.show', $sportEvent->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $sportEvent->id }}</span> {{ $sportEvent->name }}
                </a>
            @endforeach
        </x-dashboard.related-card>
    </div>
</x-app-layout>
