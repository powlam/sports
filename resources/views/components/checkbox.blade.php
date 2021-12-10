@props([
    'disabled' => false,
    'error' => false,
    'value',
    'checked' => false
])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $checked ? 'checked' : '' }} @if($value) value="{{ $value }}" @endif {!! $attributes->merge(['class' => 'rounded text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 '.(!$error ? 'border-gray-300 focus:border-indigo-300' : 'is-invalid focus:border-red-300 border-red-500')]) !!} />
