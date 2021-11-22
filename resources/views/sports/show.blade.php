@extends('layouts.main')

@section('main')
    <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">@lang('terms.back')</a>

    <h1>
        {{ $sport->name }}
    </h1>
@endsection
