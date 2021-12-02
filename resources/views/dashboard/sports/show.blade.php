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
    {{-- TODO relate with its championships --}}
</x-app-layout>