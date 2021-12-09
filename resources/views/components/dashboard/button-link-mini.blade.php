@props(['color' => 'gray'])

<a role="button" {{ $attributes->merge(['class' => "inline-flex items-center p-1 bg-white rounded-full font-semibold text-xs text-{$color}-600 uppercase tracking-widest hover:bg-{$color}-200 active:bg-{$color}-100 focus:outline-none focus:ring ring-{$color}-300 disabled:opacity-25 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</a>
