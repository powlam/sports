<x-app-layout>
    <x-slot name="header">
        @include('dashboard.sportEvents.parts.header', ['back' => route('dashboard.sportEvents.show', $sportEvent->id)])
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action='{{ route('dashboard.sportEvents.destroy', $sportEvent->id) }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('DELETE')
                @csrf

                @include('dashboard.sportEvents.parts.fields')

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <x-label class="text-red-500 font-bold" :value="__('sportEvent.deleting_confirmation')" />
                    </div>
                    <div class="md:w-2/3 flex space-x-1">
                        <x-button color="red">
                            @lang('terms.button.destroy')
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
