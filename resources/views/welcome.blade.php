@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center" id="container">
        @if (session()->has('message'))
            <x-alert :message="session('message')"/>
        @endif
        <div class="mt-10 flex px-64 items-center">
            {{--Left Header--}}
            <div class="pr-16 w-1/2">
                <h1 class="text-6xl font-bold leading-none">Beautiful food & takeaway, <span class="text-orange-500">delivered</span> to your door.</h1>
                <p class="mt-4">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
                </p>
                <a href="#" class="btn bg-orange-500 hover:bg-orange-400 mt-4 w-32">Order Now</a>
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
            <div class="flex mt-4 justify-center">
                <a href="#" class="btn text-gray-800 hover:text-gray-700 focus:bg-orange-500">Pizzas</a>
                <a href="#" class="btn text-gray-800 hover:text-gray-700 focus:bg-orange-500">Sides</a>
                <a href="#" class="btn text-gray-800 hover:text-gray-700 focus:bg-orange-500">Drinks</a>
            </div>
            <div class="mt-16 flex flex-wrap justify-center">
                @foreach($items as $item)
                    <div class="flex w-2/5 bg-white items-center mx-3">
                    {{--Image to left--}}
                        <a href="#">
                            <img src="{{asset('images/'.$item->image)}}"
                                 alt="{{$item->title}}"
                                 class="w-32 rounded-lg shadow-md">
                        </a>
                        {{--Details to the right--}}
                        <div class="flex flex-col px-4 py-3 w-full">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-lg">{{$item->title}}</h3>
                                <span class="text-orange-500 text-sm">{{$item->asDollars()}}</span>
                            </div>
                            <p class="mt-4 text-left">{{$item->description}}</p>
                            <div class="flex mt-2">
                                <input type="number" name="quantity" value="1" class="w-12 border border-gray-300 pl-2 rounded-lg bg-gray-100">
                                <a href="#" class="btn bg-orange-500 hover:bg-orange-400 ml-3">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
