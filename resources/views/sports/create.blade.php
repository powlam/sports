@extends('layouts.main')

@section('main')
    <form action='{{ route('sports.store') }}' method='post'>
        @csrf
        @include('sports.parts.fields')
        <button type="submit" class="btn btn-primary">@lang('terms.button.submit')</button>
        <a class="btn btn-secondary" href="{{ route('sports.index') }}" role="button">@lang('terms.button.cancel')</a>
    </form>
@endsection
