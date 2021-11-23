@extends('layouts.main')

@section('main-board')
    @include('sports.parts.header', ['back' => route('sports.show', $sport->id)])

    <form action='{{ route('sports.destroy', $sport->id) }}' method='post'>
        @method('DELETE')
        @csrf
        @include('sports.parts.fields')
        <div class="text-danger">@lang('sport.deleting_confirmation')</div>
        <div class="flex space-x-1">
            <button type="submit" class="border-solid border-4 border-red-200 text-red-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-red-200">
                @lang('terms.button.destroy')
            </button>
        </div>
    </form>
@endsection
