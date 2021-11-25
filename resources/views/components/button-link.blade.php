@props(['color' => 'gray'])

<a role="button" {{ $attributes->merge(['class' => "inline-flex items-center px-4 py-2 bg-white border-solid border-4 border-{$color}-200 rounded-full font-semibold text-xs text-{$color}-600 uppercase tracking-widest hover:bg-{$color}-200 active:bg-{$color}-100 focus:outline-none focus:border-{$color}-900 focus:ring ring-{$color}-300 disabled:opacity-25 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</a>
