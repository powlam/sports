@extends('layouts.main')

@section('main-board')
    @include('sports.parts.header')

    <form action='{{ route('sports.store') }}' method='post'>
        @csrf
        @include('sports.parts.fields')
        <div class="flex space-x-1">
            <button type="submit" class="border-solid border-4 border-green-200 text-green-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-green-200">
                @lang('terms.button.submit')
            </button>
        </div>
    </form>
@endsection
