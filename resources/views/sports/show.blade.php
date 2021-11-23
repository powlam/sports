@extends('layouts.main')

@section('main-board')
    <a class="btn btn-secondary" href="{{ route('sports.index') }}" role="button">@lang('terms.button.back')</a>

    <h1>
        {{ $sport->name }}
    </h1>

    <a class="btn btn-primary" href="{{ route('sports.edit', $sport->id) }}" role="button">@lang('terms.button.edit')</a>
@endsection
