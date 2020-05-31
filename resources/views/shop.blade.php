@extends('layouts.app')
@section('content')
<div class="flex flex-col items-center w-full">
    @if(session()->has('message'))
        <x-alert :message="session('message')" />
    @endif
    <div class="mt-8 mb-16">
        <h1 class="font-semibold text-4xl ">
            Our Beloved Menu
        </h1>
        <p class="mt-4 w-3/4">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500.
        </p>
    </div>

    <div class="flex flex-wrap justify-center">
        @foreach($items as $item)
            <x-item :item="$item" />
        @endforeach
    </div>
</div>
@endsection
