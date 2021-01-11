@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-start min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
