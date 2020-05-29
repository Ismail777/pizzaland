@extends ('layouts.auth')
@section('content')
    @if (session()->has('message'))
        <x-alert :message="session('message')"/>
    @endif

        <div class="flex justify-between">
            <h1 class="text-4xl text-gray-800">Menu Items</h1>
            <span class="block rounded-md shadow-sm">
                <a href="{{route('items.create')}}" class="btn bg-blue-400 hover:bg-blue-300">
                    Create a Menu Item
                </a>
            </span>
        </div>

        @if($items->count() == 0)
            <span>You have no menu items yet. <a class="font-semibold hover:underline"
                        href="{{route('items.create')}}">Add one here</a>
            </span>
        @else
        <!-- component -->
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                <tr class="bg-orange-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    <th class="p-3 text-left"></th>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">SKU</th>
                    <th class="p-3 text-left">Description</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Created on</th>
                    <th class="p-3 text-left" width="110px">Actions</th>
                </tr>

                </thead>
                <tbody class="flex-1 sm:flex-none">
                @foreach($items as $item)
                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3">
                        <img src="{{asset('images/'.$item->image)}}" alt="image" class="h-8 rounded-full">
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3"><a href="{{route('items.show', $item->title)}}">{{$item->title}}</a></td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$item->asDollars()}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$item->sku}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{\Illuminate\Support\Str::limit($item->description, 50)}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$item->category->name}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{ Carbon\Carbon::parse($item->created_at)->format('d, M, Y')}}</td>
                    <form action="{{route('items.destroy', $item->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                            <button type="submit">
                                Delete
                            </button>
                        </td>
                    </form>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
@endsection
