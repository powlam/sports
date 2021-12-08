<x-app-layout>
    <x-slot name="header">
        @include('dashboard.sports.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <x-button-link href="{{ route('dashboard.sports.edit', $sport->id) }}" color="purple">
                    @lang('terms.button.edit')
                </x-button-link>
            </div>
        </div>
    </div>

    {{-- Relationships --}}
    <div class="flex flex-wrap space-x-4 bg-yellow-50">
        <x-related-card>
            <x-slot name="title">
                @lang('Disciplines')
            </x-slot>

            @foreach ($sport->sportDisciplines as $sportDiscipline)
                <span class="text-red-300 border-b-2 border-solid border-transparent select-none">
                    <span class="text-xs mr-3">{{ $sportDiscipline->id }}</span> {{ $sportDiscipline->name }}
                </span>
            @endforeach
            TODO links
        </x-related-card>

        <x-related-card>
            <x-slot name="title">
                @lang('Events')
            </x-slot>

            @foreach ($sport->sportEvents as $sportEvent)
                <span class="text-red-300 border-b-2 border-solid border-transparent select-none">
                    <span class="text-xs mr-3">{{ $sportEvent->id }}</span> {{ $sportEvent->name }}
                </span>
            @endforeach
            TODO links
        </x-related-card>
    </div>

    <div class="flex flex-wrap space-x-4 bg-yellow-50">
        <x-related-card>
            <x-slot name="title">
                @lang('Championships')
            </x-slot>

            @foreach ($sport->championships as $championship)
                <a href="{{ route('dashboard.championships.show', $championship->id) }}" class="text-gray-300 hover:text-current border-b-2 border-solid border-transparent hover:border-yellow-500 cursor-pointer select-none">
                    <span class="text-xs mr-3">{{ $championship->id }}</span> {{ $championship->name }}
                </a>
            @endforeach
        </x-related-card>

        <x-related-card>
            <x-slot name="title">
                @lang('Editions')
            </x-slot>

            @foreach ($sport->championshipEditions as $championshipEdition)
                <span class="text-red-300 border-b-2 border-solid border-transparent select-none">
                    <span class="text-xs mr-3">{{ $championshipEdition->id }}</span> {{ $championshipEdition->name }}
                </span>
            @endforeach
            TODO links
        </x-related-card>
    </div>
</x-app-layout>
