@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div {{ $attributes }}>
        <div class="font-medium text-green-600">
            {{ __('Great!') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-green-600">
            @foreach (Arr::wrap(session('success')) as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
