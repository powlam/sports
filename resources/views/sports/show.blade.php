@extends('layouts.main')

@section('main-board')
    @include('sports.parts.header')

    <div class="flex space-x-1">
        <a role="button" href="{{ route('sports.edit', $sport->id) }}" class="inline-block border-solid border-4 border-purple-200 text-purple-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-purple-200">
            @lang('terms.button.edit')
        </a>
    </div>
@endsection
