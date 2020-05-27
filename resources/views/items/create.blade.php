@extends('layouts.auth')
@section ('content')
    <div class="flex flex-col w-full justify-center">
        <h1 class="text-4xl font-semibold">Create a Menu Item</h1>
        <div class="bg-white w-3/4 flex flex-col mt-8 p-6">
            <form action="/items" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex sm:flex-col md:flex-row">
                    <div class="w-1/3 pr-4">
                        <label for="name" class="block font-medium text-gray-700 leading-5">
                            Item Name
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="title" name="title" type="text" required autofocus
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm sm:leading-5 @error('title') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>
                        @error('title')
                        <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-1/3 px-4 ">
                        <label for="price" class="block font-medium text-gray-700 leading-5">
                            Item Price (in cents)
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="price" name="price" type="text" required autofocus
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm sm:leading-5 @error('price') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>
                        @error('price')
                        <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/3 px-4 ">
                        <label for="price" class="block font-medium text-gray-700 leading-5">
                            Item SKU
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="sku" name="sku" type="number" required autofocus
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm sm:leading-5 @error('sku') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('sku')
                        <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="flex items-center mt-6">
                    <div class="w-2/3 ">
                        <label for="price" class="block font-medium text-gray-700 leading-5">
                            Item Description
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                        <textarea name="description" id="description" cols="50" rows="6"
                                  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                        </div>

                        @error('description')
                        <p class="mt-2 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center ml-4">
                        <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-800 rounded-lg shadow-lg tracking-wide uppercase border border-gray-300 cursor-pointer hover:bg-orange-400 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select an image</span>
                            <input type='file' name="image" class="hidden" />
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="btn bg-orange-500 hover:bg-orange-400">
                            Create
                        </button>
                    </span>
                </div>
            </form>
        </div>

    </div>
@endsection