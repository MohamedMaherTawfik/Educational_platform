<nav class="bg-white shadow-sm py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="Teachio Logo" class="h-8" style="height: 80px; border-radius: 50px;">
                <span class="text-2xl font-bold text-gray-800 ml-2">e-learning</span>
            </a>
            <div class="ml-10 space-x-6">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-800">HOME</a>
                <a href="{{ route('user.courses') }}" class="text-gray-500 hover:text-gray-800">MY COURSES</a>
                <a href="/wishlist" class="text-gray-500 hover:text-gray-800">WISHLIST</a>
                <a href="{{ route('user.profile') }}" class="text-gray-500 hover:text-gray-800">PROFILE</a>
                <a href="/contact" class="text-gray-500 hover:text-gray-800">CONTACT</a>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search your course..."
                    class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:border-blue-500">
                <button class="absolute right-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('user.notification') }}" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 bg-yellow-400 rounded-full w-4 h-4 text-xs flex items-center justify-center">1</span>
                </a>
                @if (Auth::check())
                    <div class="relative group">
                        <button class="text-black hover:text-blue-700 focus:outline-none mr-4">
                            {{ Auth::user()->username }}
                        </button>

                        <!-- Fix: Use group-hover to show the dropdown -->
                        <div
                            class="hidden group-focus-within:block absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <form class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="">Logout</button>
                            </form>
                            <a href="{{ route('user.profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700">Sign In</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700">Sign
                        Up</a>
                @endif

            </div>
        </div>
    </div>
</nav>