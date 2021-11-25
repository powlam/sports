<x-app-layout>
    <x-slot name="header">
        @include('sports.parts.header', ['back' => route('sports.show', $sport->id)])
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action='{{ route('sports.destroy', $sport->id) }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('DELETE')
                @csrf

                @include('sports.parts.fields')

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            @lang('sport.deleting_confirmation')
                        </label>
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
