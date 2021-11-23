@extends('layouts.main')

@section('main-board')
    @include('sports.parts.header', ['back' => route('sports.show', $sport->id)])

    <form action='{{ route('sports.update', $sport->id) }}' method='post'>
        @method('PUT')
        @csrf
        @include('sports.parts.fields')
        <div class="flex space-x-1">
            <button type="submit" class="border-solid border-4 border-green-200 text-green-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-green-200">
                @lang('terms.button.change')
            </button>
            <a role="button" href="{{ route('sports.confirm', $sport->id) }}" class="border-solid border-4 border-red-200 text-red-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-red-200">
                @lang('terms.button.destroy')
            </a>
        </div>
    </form>
@endsection
