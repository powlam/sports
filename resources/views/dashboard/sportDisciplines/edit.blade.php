<x-app-layout>
    <x-slot name="header">
        @include('dashboard.sportDisciplines.parts.header', ['back' => route('dashboard.sportDisciplines.show', $sportDiscipline->id)])
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action='{{ route('dashboard.sportDisciplines.update', $sportDiscipline->id) }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT')
                @csrf

                @include('dashboard.sportDisciplines.parts.fields')

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3 flex space-x-1">
                        <x-button color="green">
                            @lang('terms.button.change')
                        </x-button>
                        <x-button-link href="{{ route('dashboard.sportDisciplines.confirm', $sportDiscipline->id) }}" color="red">
                            @lang('terms.button.destroy')
                        </x-button-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
