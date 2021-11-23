@php
    $links = [
        ['url' => route('sports.index'), 'text' => __('sport.menu_name')],
    ];
@endphp
@foreach ($links as $link)
    <a href="{{ $link['url'] }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-500 hover:text-white">
        {{ $link['text'] }}
    </a>
@endforeach
