@extends('layouts.app')
@section('title', 'Cart')
@section('content')
         <div class="container px-2 py-8 mx-auto">
        @if(session()->has('message'))
            <x-alert :message="session('message')" />
        @endif
        <div>
            <h1 class="text-5xl font-semibold">
                Your Order
            </h1>
        </div>
        @if(Cart::count()>0)
            {{-- Begin Content --}}
            <div class="flex mt-8">
                {{-- Begin Order Items List --}}
                <div class="flex flex-col">
                    @foreach($items as $item)
                        {{-- Item Cart --}}
                        <div
                            class="flex items-center bg-white rounded-md border border-gray-300 hover:borded-red-500 my-2">
                            <img src="{{ asset('images/'. $item->model->image) }}" alt="{{ $item->model->title }}"
                                class="rounded-md shadow-md w-32">
                            <div class="flex py-4 px-3 items-center">
                                <div class="flex flex-col items-start w-64 ml-4">
                                    <span class="text-sm text-gray-400 uppercase">pizza land</span>
                                    <p class="font-semibold text-lg">{{ $item->model->title }}</p>
                                </div>
                                <input type="number"
                                    class="w-12 border border-gray-300 pl-2 rounded-lg bg-gray-100 py-2"
                                    wire:model="qty">
                                <span class="w-32 font-semibold ml-12">{{ asDollars($item->model->price) }}</span>
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <button type="submit">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path
                                            d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
                                        </path>
                                    </svg>
                                </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                    <div class="flex justify-end">
                        <span class="mt-6 font-semibold text-3xl">
                            {{-- !This is a bug --}}
                            Order Total: {{Cart::subtotal()}}
                        </span>
                    </div>

                </div>
            </div>
        @else
            <p>Oops, You don't have any items in your cart yet</p>
        @endif
    </div>
@endsection
