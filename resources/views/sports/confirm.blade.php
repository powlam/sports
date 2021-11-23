@extends('layouts.main')

@section('main-board')
    <form action='{{ route('sports.destroy', $sport->id) }}' method='post'>
        @method('DELETE')
        @csrf
        @include('sports.parts.fields')
        <div class="text-danger">@lang('sport.deleting_confirmation')</div>
        <button type="submit" class="btn btn-danger">@lang('terms.button.destroy')</button>
        <a class="btn btn-secondary" href="{{ route('sports.show', $sport->id) }}" role="button">@lang('terms.button.cancel')</a>
    </form>
@endsection
