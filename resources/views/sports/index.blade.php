<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('sport.menu_name') }}
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
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($sports as $sport)
                        <tr class="hover:bg-purple-100">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $sport->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap font-bold border-b border-gray-200">
                                {{ $sport->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200">
                                <a role="button" href="{{ route('sports.show', $sport->id) }}" class="inline-block text-purple-600 p-2 rounded-full hover:bg-purple-200">
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

            <a role="button" href="{{ route('sports.create') }}" class="inline-block border-solid border-4 border-purple-200 text-purple-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-purple-200">
                @lang('terms.button.create_new')
            </a>
        </div>
    </div>
</x-app-layout>
