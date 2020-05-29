
                <div class="flex w-2/5 bg-white items-center mx-3 px-6 mb-4 border border-gray-100 hover:border-orange-500">
                {{--Image to left--}}
                <a href="{{route('items.show', $item->title)}}">
                    <img src="{{asset('images/'.$item->image)}}"
                         alt="{{$item->title}}"
                         class="w-32 rounded-lg shadow-md">
                </a>
                {{--Details to the right--}}
                <div class="flex flex-col px-4 py-3 w-full">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-lg"><a href="{{route('items.show', $item->title)}}">{{$item->title}}</a></h3>
                        <span class="text-orange-500 text-sm">{{$item->asDollars()}}</span>
                    </div>
                    <p class="mt-4 text-left">{{$item->description}}</p>
                    <div class="flex mt-2">
                        <form action="/cart" method="post" class="flex items-center">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="title" value="{{$item->title}}">
                            <input type="hidden" name="price" value="{{$item->price}}">
                            <input type="number" name="quantity" value="1"
                                   class="w-12 border border-gray-300 pl-2 rounded-lg bg-gray-100 py-2">
                            <button type="submit" class="btn bg-orange-500 hover:bg-orange-400 ml-3">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
