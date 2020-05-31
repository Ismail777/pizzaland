@extends('layouts.app')
@section('title', 'The Best Place for Pizza')
@section('content')
    <div class="flex flex-col items-center w-full">
        @if (session()->has('message'))
            <x-alert :message="session('message')"/>
        @endif
        <div class="mt-10 flex px-64 items-center">
            {{--Left Header--}}
            <div class="pr-16 w-1/2">
                <h1 class="text-6xl font-bold leading-none">Beautiful food & takeaway, <span class="text-orange-500">delivered</span>
                    to your door.</h1>
                <p class="mt-4">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500.
                </p>
                <a href="/shop" class="btn bg-orange-500 hover:bg-orange-400 mt-4 w-32">Order Now</a>
            </div>

            {{--Right Header--}}
            <div class="w-1/2">
                <img src="{{asset('images/header-image.png')}}" alt="pizzaland">
            </div>
        </div>
        {{--Menu Section--}}
        <div class="mt-32 text-center">
            <h2 class="text-5xl font-bold leading-none text-orange-500">
                Browse Our Menu
            </h2>
            <p class="mt-4">
                Use our menu to place an order online, or phone our store to
                place a pickup order. Fast and fresh food.
            </p>

    <div class="mt-16 flex flex-wrap justify-center">
        @foreach($items as $item)
         <x-item :item="$item" />
         @if ($loop->index == 3)  
            @break
            @endif       
        @endforeach
    </div>
        </div>
    </div>

@endsection
