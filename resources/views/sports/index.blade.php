@extends('layouts.main')

@section('main-board')
    <table class="max-w-6xl mx-auto text-center">
        <thead class="bg-white">
            <tr>
                <th class="border-t">ID</th>
                <th class="border-t">Name</th>
                <th class="border-t"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sports as $sport)
                <tr>
                    <td class="border-t">{{ $sport->id }}</td>
                    <td class="border-t">{{ $sport->name }}</td>
                    <td class="border-t">
                        <a role="button" href="{{ route('sports.show', $sport->id) }}" class="inline-block text-purple-600 p-2 rounded-full hover:bg-purple-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border-t">@lang('terms.nothing_to_show')</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a role="button" href="{{ route('sports.create') }}" class="border-solid border-4 border-purple-200 text-purple-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-purple-200">
        @lang('terms.button.create_new')
    </a>
@endsection
