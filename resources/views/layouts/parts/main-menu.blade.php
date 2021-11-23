@php
    $links = [
        ['routeNamePrefix' => 'sports.', 'url' => route('sports.index'), 'text' => __('sport.menu_name')],
    ];
@endphp
@foreach ($links as $link)
    @php
        $active = (strpos(Illuminate\Support\Facades\Route::currentRouteName(), $link['routeNamePrefix']) === 0);
    @endphp
    <a href="{{ $link['url'] }}" class="block py-2.5 px-4 rounded transition duration-200 @if($active) bg-gray-600 border-r-4 border-yellow-400 @endif hover:bg-gray-500 hover:text-white">
        {{ $link['text'] }}
    </a>
@endforeach
