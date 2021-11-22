@extends('layouts.main')

@section('main')
<table class="max-w-6xl mx-auto text-center">
    <thead class="bg-white">
        <tr>
            <th class="border-t">ID</th>
            <th class="border-t">Name</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($sports as $sport)
            <tr>
                <td class="border-t">{{ $sport->id }}</td>
                <td class="border-t">{{ $sport->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="border-t">@lang('terms.nothing_to_show')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
