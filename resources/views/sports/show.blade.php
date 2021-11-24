<x-app-layout>
    <x-slot name="header">
        @include('sports.parts.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-1">
                <a role="button" href="{{ route('sports.edit', $sport->id) }}" class="inline-block border-solid border-4 border-purple-200 text-purple-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-purple-200">
                    @lang('terms.button.edit')
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
