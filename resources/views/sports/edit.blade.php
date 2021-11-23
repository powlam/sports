@extends('layouts.main')

@section('main-board')
    <form action='{{ route('sports.update', $sport->id) }}' method='post'>
        @method('PUT')
        @csrf
        @include('sports.parts.fields')
        <button type="submit" class="btn btn-primary">@lang('terms.button.change')</button>
        <a class="btn btn-danger" href="{{ route('sports.confirm', $sport->id) }}" role="button">@lang('terms.button.destroy')</a>
        <a class="btn btn-secondary" href="{{ route('sports.show', $sport->id) }}" role="button">@lang('terms.button.cancel')</a>
    </form>
@endsection
