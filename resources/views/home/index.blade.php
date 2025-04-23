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
                </div>
            </div>
        </div>
    </div>

    {{-- about us --}}

    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <!-- Left: Images -->
            <div class="relative">
                <!-- Main Image -->
                <img src="{{ asset('images/about_main.webp') }}" alt="Main hoodie"
                    class="rounded-lg w-full object-cover">

                <!-- Overlay Image -->
                <img src="{{ asset('images/about.png') }}" alt="Clothes rack"
                    class="absolute -bottom-10 right-1/2 translate-x-1/2 md:-right-20 md:translate-x-0 w-64 h-40 object-cover rounded-md opacity-30 shadow-lg border-4 border-gray-900">
            </div>

            <!-- Right: Text Content -->
            <div class="text-left">
                <h4 class="text-blue-500 font-medium text-lg mb-2">About us</h4>
                <h2 class="text-4xl font-bold leading-tight mb-4">
                    Effective Strategy<br>
                    For Growth
                </h2>
                <p class="text-gray-300 mb-6">
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
    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Live Courses</h2>

            <div class="grid grid-cols-4 gap-6 mb-6">
                @foreach ($courses as $course)
                    <div
                        class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset('courses/' . $course->image) }}"
                            alt="Course Image">

                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $course->name }}</h2>
                            <p class="text-gray-600 text-sm mb-4">{{ $course->description }}</p>

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

    {{-- <hr> --}}

    <section class="bg-gradient-to-r from-grey-100 to-indigo-700 text-black py-16 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">

            <!-- Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 leading-tight text-black">
                    Boost Your Brand<br>With Our Services
                </h2>
                <p class="text-lg text-black mb-6">
                    Get the visibility your business deserves with our tailored advertising strategies and innovative
                    campaigns.
                </p>
                <a href="#"
                    class="inline-block bg-gray-100 text-black font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-400 transition">
                    Get Started Now
                </a>
            </div>

            <!-- Image -->
            <div class="md:w-1/2">
                <img src="{{ asset('images/advertising.jpg') }}" alt="Advertising"
                    class="rounded-xl shadow-lg w-full h-64">
            </div>

        </div>
    </section>

    {{-- Comments Section --}}
    <div class="container mx-auto px-4 mb-10">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-6 space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Student Comments</h2>

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
