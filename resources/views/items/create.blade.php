@extends('layouts.auth')
@section('title', 'Create Menu Item')
@section ('content')
    <div class="mt-6 flex flex-col items-center">
        <h1 class="text-4xl font-semibold">Create a new Menu Item</h1>
        <form class="mt-8 bg-white p-4 rounded-l shadow-lg" action="/items" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Item Name
                    </label>
                    <input  name="title" type="text" required autofocus
                            class="input @error('title') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"
                            placeholder="Item name">
                    @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Item Price
                    </label>
                    <input  name="price" required autofocus
                            class="input @error('price') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" type="text"
                            placeholder="In Cents">
                    @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Item Description
                    </label>
                    <textarea name="description" class="input @error('description') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"
                              cols="30" rows="2" placeholder="description"></textarea>
                    @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2 items-end">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Item SKU
                    </label>
                    <input  name="sku" type="number" required autofocus
                            class="input @error('sku') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror">
                    @error('sku')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Category
                    </label>
                    <div class="relative">
                        <select name="category_id"
                                class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:outline-none">
                            @foreach($categories as $category)
                                <option class="focus:outline-none" 
                                value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <div class="flex items-center justify-center ml-4">
                        <label class="flex bg-blue-400 btn cursor-pointer w-64 justify-between items-center">
                            <span>Image Upload</span>
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <input type='file' name="image" class="hidden" />
                        </label>

                    </div>
                </div>
            </div>
            <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="btn bg-orange-500 hover:bg-orange-400 w-full">
                            Create
                        </button>
                    </span>
            </div>
        </form>
    </div>

@endsection



