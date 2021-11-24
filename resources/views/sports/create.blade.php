<x-app-layout>
    <x-slot name="header">
        @include('sports.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action='{{ route('sports.store') }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                @include('sports.parts.fields')

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3 flex space-x-1">
                        <button type="submit" class="border-solid border-4 border-green-200 text-green-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-green-200">
                            @lang('terms.button.submit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
