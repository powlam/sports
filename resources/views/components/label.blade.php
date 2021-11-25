@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 md:text-right pr-4 mb-1 md:mb-0']) }}>
    {{ $value ?? $slot }}
</label>
