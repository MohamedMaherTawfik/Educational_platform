<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachio - Educational Platform</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS -->
    <style>
        .hero-pattern {
            background-image: radial-gradient(#3b82f6 0.5px, transparent 0.5px);
            background-size: 10px 10px;
            opacity: 0.1;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Teachio Logo" class="h-8">
                    <span class="text-2xl font-bold text-blue-600 ml-2">e-learning</span>
                </a>
                <div class="ml-10 space-x-6">
                    <a href="/" class="text-gray-700 hover:text-blue-600">HOME</a>
                    <a href="/courses" class="text-gray-700 hover:text-blue-600">MY COURSES</a>
                    <a href="/wishlist" class="text-gray-700 hover:text-blue-600">WISHLIST</a>
                    <a href="/profile" class="text-gray-700 hover:text-blue-600">PROFILE</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600">CONTACT</a>
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
                    <a href="/notifications" class="relative">
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
                                <form class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="">Logout</button>
                                </form>
                                <a href="/profile"
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

    <!-- Hero Section -->
    <div class="relative bg-gray-50">
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-2 gap-8 items-center">
                <div class="relative z-10">
                    <h1 class="text-5xl font-bold mb-2">
                        Never Stop <span class="text-yellow-500">Learning</span>
                    </h1>
                    <h2 class="text-4xl font-bold mb-6">
                        Life Never Stop Teaching
                    </h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Every teaching and learning journey is unique. Following We'll help guide your way.
                    </p>
                    <a href="/get-started"
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 inline-block">
                        Get Started
                    </a>
                </div>
                <div class="relative">
                    <div class="hero-pattern absolute inset-0 z-0"></div>
                    <img src="{{ asset('images/student.png') }}" alt="Student" class="relative z-10 w-full">
                </div>
            </div>
        </div>
    </div>

    <!-- Live Courses Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Live Courses</h2>
            <div class="grid grid-cols-4 gap-6">
                <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
                    <img class="w-full h-48 object-cover" src="https://source.unsplash.com/600x400/?education,book" alt="Course Image">

                    <div class="p-6">
                      <h2 class="text-xl font-bold text-gray-800 mb-2">Mastering Web Development</h2>
                      <p class="text-gray-600 text-sm mb-4">Learn HTML, CSS, JavaScript, and modern frameworks to build responsive websites.</p>

                      <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">$49.99</span>
                        <a href="/course/1" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">Enroll Now</a>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 gap-8">
                <div>
                    <a href="/" class="flex items-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Teachio Logo" class="h-8">
                        <span class="text-2xl font-bold text-blue-600 ml-2">Teachio</span>
                    </a>
                    <p class="text-gray-600">Empowering education through technology</p>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/about" class="text-gray-600 hover:text-blue-600">About Us</a></li>
                        <li><a href="/contact" class="text-gray-600 hover:text-blue-600">Contact</a></li>
                        <li><a href="/courses" class="text-gray-600 hover:text-blue-600">Courses</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="/help" class="text-gray-600 hover:text-blue-600">Help Center</a></li>
                        <li><a href="/terms" class="text-gray-600 hover:text-blue-600">Terms of Service</a></li>
                        <li><a href="/privacy" class="text-gray-600 hover:text-blue-600">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
