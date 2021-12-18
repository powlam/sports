<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('championship.menu_name') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <table class="min-w-full mb-2">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">ID</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
                        {{-- TODO update fields --}}
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($championships as $championship)
                        <tr class="hover:bg-purple-100">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $championship->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap font-bold border-b border-gray-200">
                                @if ($championship->logo)
                                    <img src="{{ $championship->logo->image }}" class="h-8 inline"/>
                                @endif
                                <span>{{ $championship->name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200">
                                <a href="{{ route('dashboard.championships.show', $championship->id) }}" class="inline-block text-purple-600 p-2 rounded-full hover:bg-purple-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @lang('terms.nothing_to_show')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <x-button-link href="{{ route('dashboard.championships.create') }}" color="purple">
                @lang('terms.button.create_new')
            </x-button-link>
        </div>
    </div>
</x-app-layout>
