@extends('layouts.base')

@section('body')
    <x-navbar />
    <div class="flex flex-col w-full min-h-screen py-12 bg-gray-50 px-8 sm:px-12 lg:px-6">
        @yield('content')
    </div>
@endsection
