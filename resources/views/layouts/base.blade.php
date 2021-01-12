<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body style="background-color: #f9f9f9;">
        <div class="relative min-h-screen flex flex-col">
            <nav class="flex-shrink-0 bg-white border-b">
                <div class="max-w-screen-sm mx-auto px-3 md:px-0">
                    <div class="relative flex items-center justify-between h-16">
                        <div class="flex items-center px-3 xl:w-64">
                            <div class="flex-shrink-0">
                                <a href="{{ url('/') }}"><img class="h-8 w-auto" src="images/tallstack-logo.svg" alt="Home"></a>
                            </div>
                        </div>
            
                        <div class="block w-80">
                            <div class="flex items-center justify-end">
                                <div class="flex">
                                    @auth
                                        <a href="{{ route('jobs') }}" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-800 hover:text-indigo-600">Jobs</a>
                                        <a
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="px-3 py-2 rounded-md text-sm font-medium text-indigo-800 hover:text-indigo-600"
                                        >
                                            Log out
                                        </a>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-800 hover:text-indigo-600">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-800 hover:text-indigo-600">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            
            @yield('body')
        </div>

        @livewireScripts
    </body>
</html>
