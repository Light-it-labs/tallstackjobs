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
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

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

    <body class="overflow-hidden">
        <div class="relative min-h-screen flex flex-col">
            <nav class="flex-shrink-0 bg-indigo-600">
                <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                    <div class="relative flex items-center justify-between h-16">
                        <div class="flex items-center px-2 lg:px-0 xl:w-64">
                            <div class="flex-shrink-0">
                                {{-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow"> --}}
                            </div>
                        </div>
            
                        <div class="block w-80">
                            <div class="flex items-center justify-end">
                                <div class="flex">
                                    <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-200 hover:text-white">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-200 hover:text-white">Register</a>
                                    @endif
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
