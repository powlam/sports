@props([
    'disabled' => false,
    'error' => false,
    'value',
    'options'
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'appearance-none rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 leading-tight '.(!$error ? 'focus:border-indigo-300 border-gray-300' : 'is-invalid focus:border-red-300 border-red-500')]) !!}>
    @foreach ($options as $k => $v)
        <option value="{{ $k }}" @if($k === $value) selected @endif>
            {{ $v }}
        </option>
    @endforeach
</select>
