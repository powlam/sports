<x-app-layout>
    <x-slot name="header">
        @include('sports.parts.header', ['back' => route('sports.show', $sport->id)])
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action='{{ route('sports.update', $sport->id) }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT')
                @csrf

                @include('sports.parts.fields')

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3 flex space-x-1">
                        <button type="submit" class="border-solid border-4 border-green-200 text-green-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-green-200">
                            @lang('terms.button.change')
                        </button>
                        <a role="button" href="{{ route('sports.confirm', $sport->id) }}" class="border-solid border-4 border-red-200 text-red-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-red-200">
                            @lang('terms.button.destroy')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
