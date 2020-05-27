@extends('layouts.base')

@section('body')
    <x-navbar />
    <div class="flex flex-col w-full min-h-screen py-12 bg-gray-50 sm:px-12 lg:px-8">
        @yield('content')
    </div>
@endsection
