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
    <x-navbar />

    <!-- Hero Section -->
    <div class="relative bg-gray-50 bg-cover bg-center"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="bg-white bg-opacity-80">
            <div class="container mx-auto px-4 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="relative z-10">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">
                            Never Stop <span class="text-yellow-500">Learning</span>
                        </h1>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6">
                            Life Never Stop Teaching
                        </h2>
                        <p class="text-gray-600 mb-8 text-base sm:text-lg">
                            Every teaching and learning journey is unique. Following We'll help guide your way.
                        </p>
                        <a href="/get-started"
                            class="bg-blue-600 text-white px-6 py-2 sm:px-8 sm:py-3 rounded-lg hover:bg-blue-700 inline-block">
                            Get Started
                        </a>
                    </div>
                    <div class="hidden md:block"></div> <!-- Empty column for larger screens -->
                </div>
            </div>
        </div>
    </div>

    {{-- about us --}}
    <section class="py-12 md:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10 items-center">
            <!-- Left: Images -->
            <div class="relative">
                <!-- Main Image -->
                <img src="{{ asset('images/about_main.webp') }}" alt="Main hoodie"
                    class="rounded-lg w-full object-cover h-64 sm:h-80 md:h-96" style="height: 50%;">

                <!-- Overlay Image -->
                <img src="{{ asset('images/about.png') }}" alt="Clothes rack"
                    class="absolute -bottom-8 right-1/2 translate-x-1/2 md:-right-10 lg:-right-20 md:translate-x-0 w-40 sm:w-48 md:w-64 h-24 sm:h-32 md:h-40 object-cover rounded-md opacity-30 shadow-lg border-4 border-gray-900">
            </div>

            <!-- Right: Text Content -->
            <div class="text-center md:text-left mt-8 md:mt-0">
                <h4 class="text-blue-500 font-medium text-lg mb-2">About us</h4>
                <h2 class="text-3xl sm:text-4xl font-bold leading-tight mb-4">
                    Effective Strategy<br>
                    For Growth
                </h2>
                <p class="text-gray-600 mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptas consequuntur quam, eum nisi natus quia debitis.
                </p>
                <a href="#"
                    class="inline-block bg-blue-600 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded transition">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    {{-- end about us --}}

    <!-- Live Courses Section -->
    <div class="bg-white py-12 md:py-16 px-4 sm:px-6 mt-10">
        <div class="container mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Live Courses</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @foreach ($courses as $course)
                    <div
                        class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('courses/' . $course->image) }}"
                            alt="Course Image">

                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $course->name }}</h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $course->description }}</p>

                            <div class="flex justify-between items-center">
                                <span class="text-blue-600 font-semibold">${{ $course->price }}</span>
                                <a href="{{ route('course.show', $course->id) }}"
                                    class="text-sm bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">Show
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $courses->links() }}
        </div>
    </div>
    {{-- End live Courses Section --}}

    <section class="py-16 md:py-24 px-4 sm:px-6 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-white via-gray-50 to-indigo-50 opacity-90"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-transparent via-transparent to-indigo-100/30">
            </div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8 md:gap-16">
            <!-- Text Content -->
            <div class="md:w-1/2 text-center md:text-left space-y-6">
                <h2
                    class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Elevate Your Brand <br>With Premium Solutions
                </h2>
                <p class="text-lg sm:text-xl text-gray-700 leading-relaxed">
                    Transform your digital presence with our cutting-edge marketing strategies designed to maximize your
                    visibility and engagement.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="#"
                        class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-8 py-3.5 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        Start Your Journey
                    </a>
                    <a href="#"
                        class="inline-block border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 font-medium px-8 py-3.5 rounded-lg transition-all duration-300">
                        Learn More
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="md:w-1/2 mt-10 md:mt-0 relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/advertising.jpg') }}" alt="Modern advertising solutions"
                        class="w-full h-auto object-cover transition-transform duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
                <div
                    class="absolute -bottom-6 -left-6 w-32 h-32 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20">
                </div>
                <div
                    class="absolute -top-6 -right-6 w-32 h-32 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20">
                </div>
            </div>
        </div>
    </section>

    {{-- latest Courses --}}
    <div class="bg-white py-12 md:py-16 px-4 sm:px-6 mt-10">
        <div class="container mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center">Live Courses</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @foreach ($latestCourses as $latest)
                    <div
                        class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('courses/' . $latest->image) }}"
                            alt="latest Image">

                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $latest->name }}</h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $latest->description }}</p>

                            <div class="flex justify-between items-center">
                                <span class="text-blue-600 font-semibold">${{ $latest->price }}</span>
                                <a href="{{ route('course.show', $latest->id) }}"
                                    class="text-sm bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">Show
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- {{ $latestCourses->links() }} --}}
        </div>
    </div>
    {{-- End  latest Courses --}}

    {{-- Comments Section --}}
    <div class="container mx-auto px-4 mb-10">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-4 sm:p-6 space-y-6">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 text-center">Student Comments</h2>

            <!-- Comment Form -->
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text"
                        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Your name" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Comment</label>
                    <textarea rows="3" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Your comment..."></textarea>
                </div>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">Post
                    Comment</button>
            </form>

            <!-- Comments List -->
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-semibold text-gray-800">Alice Johnson</span>
                        <span class="text-xs text-gray-500">2 hours ago</span>
                    </div>
                    <p class="text-gray-700">This lesson was really helpful. Thank you!</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-semibold text-gray-800">Mark Lee</span>
                        <span class="text-xs text-gray-500">1 day ago</span>
                    </div>
                    <p class="text-gray-700">I loved the interactive examples, great job!</p>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Footer -->
    <x-footer />
</body>

</html>
