<div>
    <div class="flex items-center justify-between py-4 px-32">
        {{-- Left Side of NAV --}}

        <div class="flex items-center">
            <x-logo />
            <div class="ml-4 flex items-center">
                <a href="/"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Home
                </a>
                <a href="/shop"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    Order Now
                </a>
                                <a href="#"
                   class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 hover:bg-orange-500 hover:text-white">
                    FAQ
                </a>

                <a href="/cart"
                   class="lg:inline-flex lg:w-auto w-full p-2 relative">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9401 11.2085C31.6809 10.7594 31.3097 10.3852 30.8628 10.1223C30.4159 9.85944 29.9085 9.71687 29.3901 9.70852H10.1901L9.32007 6.31852C9.23217 5.99128 9.03606 5.70344 8.76368 5.50188C8.49131 5.30032 8.15871 5.19692 7.82007 5.20852H4.82007C4.42224 5.20852 4.04071 5.36656 3.75941 5.64786C3.4781 5.92917 3.32007 6.3107 3.32007 6.70852C3.32007 7.10635 3.4781 7.48788 3.75941 7.76918C4.04071 8.05049 4.42224 8.20852 4.82007 8.20852H6.68007L10.8201 23.5985C10.908 23.9258 11.1041 24.2136 11.3765 24.4152C11.6488 24.6167 11.9814 24.7201 12.3201 24.7085H25.8201C26.0971 24.7077 26.3684 24.6302 26.6041 24.4845C26.8397 24.3389 27.0304 24.1309 27.1551 23.8835L32.0751 14.0435C32.2883 13.5965 32.3876 13.1037 32.364 12.609C32.3405 12.1144 32.1948 11.6332 31.9401 11.2085Z" fill="#FC4C4C"/>
                    <path d="M11.5701 32.2084C12.8127 32.2084 13.8201 31.201 13.8201 29.9584C13.8201 28.7157 12.8127 27.7084 11.5701 27.7084C10.3274 27.7084 9.32007 28.7157 9.32007 29.9584C9.32007 31.201 10.3274 32.2084 11.5701 32.2084Z" fill="#FC4C4C"/>
                    <path d="M26.5701 32.2084C27.8127 32.2084 28.8201 31.201 28.8201 29.9584C28.8201 28.7157 27.8127 27.7084 26.5701 27.7084C25.3274 27.7084 24.3201 28.7157 24.3201 29.9584C24.3201 31.201 25.3274 32.2084 26.5701 32.2084Z" fill="#FC4C4C"/>
                    </svg>
                    <span class="bg-red-500 text-sm text-white rounded-full absolute top-0 left-10 px-2">{{Cart::count()}}</span>
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