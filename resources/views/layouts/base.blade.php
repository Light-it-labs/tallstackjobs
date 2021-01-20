<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TALL Stack Jobs created by TALL Stack lovers for TALL Stack developers." />
        
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8EZ82GHKC"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-Q8EZ82GHKC');
        </script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body style="background-color: #f9f9f9;">
        <div class="relative flex flex-col min-h-screen">
            <nav class="flex-shrink-0 bg-white border-b">
                <div class="max-w-screen-sm px-3 mx-auto md:px-0">
                    <div class="relative flex items-center justify-between h-24">
                        <div class="flex items-center md:px-3">
                            <div class="flex-shrink-0">
                                <a href="{{ url('/') }}"><img class="w-auto h-8 mr-6" src="{{url('/images/tallstack-logo.svg')}}" alt="Home"></a>
                            </div>
                            <h1 class="flex-1 hidden mt-1 text-lg font-extrabold sm:block"><a href="{{ url('/') }}">TALL Stack Job Board</a></h1>
                        </div>
                        <div class="block">
                            <div class="flex items-center justify-end">
                                <div class="flex items-center">
                                    @auth
                                        <a href="{{ route('jobs') }}" class="px-3 py-2 text-sm font-medium text-indigo-800 rounded-md hover:text-indigo-600">Jobs</a>
                                        <a
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="px-3 py-2 text-sm font-medium text-indigo-800 rounded-md hover:text-indigo-600"
                                        >
                                            Log out
                                        </a>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-indigo-800 rounded-md hover:text-indigo-600">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="px-3 py-2 text-sm font-medium text-indigo-800 rounded-md hover:text-indigo-600">Register</a>
                                        @endif
                                    @endauth
                                    <a href="{{ route('job-create') }}" class="flex items-center pl-2 pr-3 ml-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                         <span class="pr-2 text-2xl">+</span>
                                         <span class="hidden sm:block">New Job Post</span>
                                         <span class="sm:hidden">New</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if (Route::is('home'))
                        <h2 class="mb-3 text-sm md:px-3">
                        TALL Stack <span class="text-gray-400">Jobs created by</span>
                        <br class="sm:hidden"> TALL Stack <span class="text-gray-400">lovers for</span>
                        <br class="sm:hidden"> TALL Stack <span class="text-gray-400">developers.</span></h2> 
                    @endif

                </div>
            </nav>
            
            @yield('body')
        </div>

        @livewireScripts
    </body>
</html>
