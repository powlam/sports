@extends('layouts.main')

@section('main')
    <form action='{{ route('sports.store') }}' method='post'>
        @csrf
        <div class="mb-3">
            <label for="sportInputName" class="form-label">@lang('sport.name')</label>
            <input type="text" id="sportInputName" name='name' class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">@lang('terms.button.submit')</button>
    </form>
@endsection
