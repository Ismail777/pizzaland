@extends('layouts.base')
@section('body')
    <div class="flex">
        <x-sidebar />
        <div class="flex flex-col w-full min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>
@endsection
