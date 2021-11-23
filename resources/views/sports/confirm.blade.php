@extends('layouts.main')

@section('main-board')
    @include('sports.parts.header', ['back' => route('sports.show', $sport->id)])

    <form action='{{ route('sports.destroy', $sport->id) }}' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @method('DELETE')
        @csrf

        @include('sports.parts.fields')

        <div class="md:flex md:items-center">
            <div class="md:w-1/3">
                <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    @lang('sport.deleting_confirmation')
                </label>
            </div>
            <div class="md:w-2/3 flex space-x-1">
                <button type="submit" class="border-solid border-4 border-red-200 text-red-600 py-2 px-4 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-red-200">
                    @lang('terms.button.destroy')
                </button>
            </div>
        </div>
    </form>
@endsection
