@extends('layouts.app')
@section('title', 'Cart & Checkout')
@section('content')
<div class="container py-8 mx-auto">
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
        <div class="flex sm:flex-col  md:flex-row mt-8">
            {{-- Begin Order Items List --}}
            <div class="flex flex-col">
                @foreach($items as $item)
                    {{-- Item Cart --}}
                    <div class="flex items-center bg-white rounded-md border border-gray-200 hover:border-red-500 my-2">
                        <img src="{{ asset('images/'. $item->model->image) }}"
                            alt="{{ $item->model->title }}" class="rounded-md shadow-md w-32">
                        <div class="flex py-4 px-3 items-center">
                            <div class="flex flex-col items-start w-64 ml-4">
                                <span class="text-sm text-gray-400 uppercase">{{$item->model->category->name}}</span>
                                <p class="font-semibold text-lg">{{ $item->model->title }}</p>
                                <span class="text-sm italic">{{$item->model->asDollars()}} </span>
                            </div>
                            <form action="{{ route('cart.updateQuantity') }}" method="POST">
                                @csrf
                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                <div class="flex items-center w-32" x-data="{ open: false }">
                                    <input x-on:change="open=true" type="number" name="quantity"
                                        class="w-12 border border-gray-300 pl-2 rounded-lg bg-gray-100 py-2 focus:outline-none"
                                        value="{{ $item->qty }}">
                                    <button x-show.transition.opacity="open" type="submit"
                                        class="btn bg-red-500 hover:bg-red-400 ml-3">Update</button>
                                </div>
                            </form>
                            <span class="w-32 font-semibold ml-12">{{ asDollars($item->total) }}</span>
                            <form action="{{ route('cart.destroy', $item->rowId) }}"
                                method="POST">
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
                {{-- Begin Customer's details --}}
                <!-- component -->
                <div class="leading-loose">
                    <form class="bg-white rounded border border-gray-200 shadow-md">
                        <div class=" m-4 p-10">

                            <p class="text-lg text-gray-800 font-medium">Customer information</p>
                            <div class="mt-6">
                                <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                                <input class="w-full px-5 py-1 text-gray-700 border border-gray-200 rounded" id="cus_name"
                                    name="cus_name" type="text" required="" placeholder="Your Name" aria-label="Name">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                                <input class="w-full px-5  py-4 text-gray-700 border border-gray-200 rounded" id="cus_email"
                                    name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email">
                            </div>
                            <div class="mt-2">
                                <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                                <input class="w-full px-2 py-2 text-gray-700 border border-gray-200 rounded" id="cus_email"
                                    name="cus_email" type="text" required="" placeholder="Street" aria-label="Email">
                            </div>
                            <div class="mt-2">
                                <label class="hidden text-sm block text-gray-600" for="cus_email">City</label>
                                <input class="w-full px-2 py-2 text-gray-700 border border-gray-200 rounded" id="cus_email"
                                    name="cus_email" type="text" required="" placeholder="City" aria-label="Email">
                            </div>
                            <div class="inline-block mt-2 w-1/2 pr-1">
                                <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
                                <input class="w-full px-2 py-2 text-gray-700 border border-gray-200 rounded" id="cus_email"
                                    name="cus_email" type="text" required="" placeholder="Country" aria-label="Email">
                            </div>
                            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
                                <input class="w-full px-2 py-2 text-gray-700 border border-gray-200 rounded" id="cus_email"
                                    name="cus_email" type="text" required="" placeholder="Zip" aria-label="Email">
                            </div>
                            <p class="mt-4 text-gray-800 font-medium">Payment information</p>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Card</label>
                                <input class="w-full px-2 py-2 text-gray-700 border border-gray-200 rounded" id="cus_name"
                                    name="cus_name" type="text" required="" placeholder="Card Number MM/YY CVC"
                                    aria-label="Name">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{-- Order Summary Section --}}
            <div class="ml-8 flex flex-col w-96 sticky top-0">
                <div class="p-8 border border-gray-200 shadow-md bg-white">
                    <h1 class="text-2xl font-semibold">
                        Order Summary
                    </h1>
                    <div class="flex justify-between items-center mt-6">
                        <p class="mt-6 sm:mt-2">
                            Subtotal
                        </p>
                        <span>{{ $pSubtotal }}</span>
                    </div>
                    @if(session()->has('coupon'))
                        <div class="flex justify-between items-center mt-6">
                        <p class="mt-6 sm:mt-2">
                            Discount Coupon: {{ session('coupon')['code'] }}
                            <form action="/coupon" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path
                                            d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </p>
                        <span>{{ asDollars(session('coupon')['discount']) }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center">
                        <p class="mt-6 sm:mt-2">
                            Delivery Fees
                        </p>
                        <span>0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="mt-6 sm:mt-2">
                            Total
                        </p>
                        <span>{{ $total }}</span>
                    </div>
                    @if(!session()->has('coupon'))
                    <div x-data="{ open: false }">
                        <form action="/coupon" method="POST">
                        @csrf
                        <input x-on:input="open=true"
                        type="text" name="coupon" placeholder="Wait, I have a coupon code"
                        class="bg-white py-3 px-2 rounded border border-gray-200 w-full shadow-md focus:outline-none mt-3">
                        <button x-show.transition.opacity="open"
                        class="btn bg-red-500 hover:bg-red-400 shadow mt-2 w-full">
                            Apply Code
                        </button>
                        </form>                        
                    </div>
                    @endif
                    <a href="/checkout" class="btn w-full bg-blue-500 hover:bg-blue-400 mt-4">
                        Place Order
                    </a>
                </div>
            </div>



        </div>
    @else
        <p>Oops, You don't have any items in your cart yet</p>
    @endif
</div>
@endsection
