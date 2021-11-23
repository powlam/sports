<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ config('app.name') }}</title>

        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen md:flex">

            {{--mobile menu bar--}}
            <div class="bg-gray-700 text-gray-100 flex justify-between md:hidden">
                {{--logo--}}
                <a href="{{ route('home') }}" class="block p-4 text-white font-bold">
                    @lang('terms.logo_name')
                </a>

                {{--mobile menu button--}}
                <button id="mobile_menu_button" class="p-4 focus:bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{--sidebar--}}
            <div id="main_sidebar" class="bg-gray-700 text-gray-100 w-64 space-y-6 py-7 px-2 flex flex-col justify-start absolute md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition duration-200 ease-in-out">
                {{--logo--}}
                <a href="{{ route('home') }}" class="text-white flex-none flex items-center space-x-2 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    <span class="text-2xl font-extrabold">@lang('terms.logo_name')</span>
                </a>
                
                {{--nav--}}
                <nav class="flex-grow">
                    @include('layouts.parts.main-menu')
                </nav>

                {{--footer--}}
                <footer class="text-center text-sm text-gray-500 flex-none">
                    @include('layouts.parts.main-footer')
                </footer>
            </div>

            {{--content--}}
            <main role="main" class="flex-1 p-4 flex flex-col justify-start text-gray-900">
                {{--errors & messages--}}
                @include('layouts.parts.messages')

                {{--main content--}}
                <div>
                    @yield('main-board')
                </div>
            </main>

        </div>

        <script>
            const $mobile_menu_button = document.querySelector('#mobile_menu_button');
            const $main_sidebar = document.querySelector('#main_sidebar');
            $mobile_menu_button.addEventListener('click', () => {
                $main_sidebar.classList.toggle('-translate-x-full');
            });
        </script>
    </body>
</html>
