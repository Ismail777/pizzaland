 <div class="flex items-center"  x-data="{isOpen: true}"
             @click.away="isOpen = false"
             @keydown.escape.window="isOpen = false"
             @keydown="isOpen = true"
             @keydown.shift.tab="isOpen = false">
        <div class="relative sm:mt-4">
            <input class="border-2 border-gray-300 bg-white text-gray-800 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                   type="search"
                   wire:model="search"
                   name="search"
                   placeholder="Search"
                   @focus="isOpen = true">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                     width="512px" height="512px">
            <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
            </button>
        </div>
        @if(strlen($search) > 2)
        <div class="absolute top-20 bg-white rounded text-gray-800 text-sm w-64 mt-4 shadow-md"
             x-show.transition.opacity="isOpen">
            @if($searchResults->count() > 0)
            <ul class="z-50">
                @foreach($searchResults as $result)
                <li class="border-b border-gray-200">
                    <a 
                        href="{{route('items.show', $result->title)}}"
                        class="block hover:bg-gray-200 transition ease-in-out duration-150 px-4 py-1 flex items-center"
                        @if($loop->last) @keydown.tab="isOpen = false" @endif
                       >

                        @if($result->image)
                        <img src="{{asset('images/'.$result->image)}}"
                             class="w-8 rounded-lg" alt="poster">
                        @else
                            <img src="https://via.placeholder.com/50*75" alt="poster" class="w-8">
                        @endif

                        <span class="ml-4">{{$result->title}}</span>

                    </a>
                </li>
                @endforeach
            </ul>
                @else
                <span class="border-b border-gray-700">No results founds..</span>
                @endif
        </div>
        @endif
    </div>

