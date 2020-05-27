<div>
    <div class="flex items-center justify-between py-4 px-32">
        {{-- Left Side of NAV --}}

        <div class="flex items-center">
            <x-logo />
            <div class="ml-4">
                <a href="#"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Order Now
                </a>
                <a href="#"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Cart
                </a>
                <a href="#"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Checkout
                </a>
                <a href="#"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Contact
                </a>
            </div>

        </div>
        {{-- Right Side of NAV --}}
        <div class="flex items-center" id="user-details">
            @auth
                @if(Route::has('login'))
                    {{-- user avatar --}}
                    <div>
                        <img src="https://gravatar.com/avatar/{{ md5(Auth::user()->email) }} " alt="avatar"
                             class="w-8 rounded-full">
                    </div>
                    <div @click.away="open = false" @keydown.escape="open = false"
                         class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex flex-row items-center w-full float-right px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Hello, {{ Auth::user()->name }}</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                 class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"

                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 top-10 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="#">Account Details</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="#">Orders History</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="" {{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endauth
                        @else
                            <a href="{{ route('login') }}"
                               class="mr-4 font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log
                                in</a>

                            @if(Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                            @endif

                    </div>
                @endif
        </div>
    </div>
</div>
{{-- End of Nav --}}
</div>