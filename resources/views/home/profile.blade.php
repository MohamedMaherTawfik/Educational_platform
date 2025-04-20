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
    <x-navbar/>

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-8 mt-10 mb-8">
        <!-- Top Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <!-- Name -->
            <h1 class="text-3xl font-bold text-gray-800">John Doe</h1>
            <!-- Edit Button -->
            <button
                class="mt-4 md:mt-0 bg-gray-200 hover:bg-gray-400 text-black font-semibold px-6 py-3 rounded-lg shadow-md transition">
                Edit Profile
            </button>

        </div>
        <!-- Divider -->
        <hr class="my-6">
        <!-- Course Summary -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">My Courses</h2>

            <!-- Course Progress -->
            <div class="space-y-4">
                <div>
                    <p class="font-medium text-gray-700">Web Development Bootcamp</p>
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-1">
                        <div class="bg-blue-600 h-4 rounded-full" style="width: 75%"></div>
                    </div>
                </div>

                <div>
                    <p class="font-medium text-gray-700">Python for Beginners</p>
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-1">
                        <div class="bg-green-700 h-4 rounded-full" style="width: 50%"></div>
                    </div>
                </div>

                <div>
                    <p class="font-medium text-gray-700">UI/UX Design</p>
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-1">
                        <div class="bg-purple-500 h-4 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced About Me Section -->
    <div class="container mx-auto px-4 py-10">

        <section class="bg-white rounded-2xl shadow-lg p-8">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-8">

                <!-- Bio Text -->
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">About Me</h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        Hello! I'm <strong>John Doe</strong>, a passionate learner focused on full-stack web development
                        and
                        data science. I love turning ideas into real applications and constantly strive to learn new
                        technologies and best practices.
                        Currently enrolled in multiple online programs, I aim to become a full-time developer and help
                        others grow in tech.
                    </p>
                    <button
                        class="bg-gray-500 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                        Update Bio
                    </button>
                </div>

                <!-- Quick Stats -->
                <div class="w-full lg:w-1/3 bg-gray-100 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Stats</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex justify-between">
                            <span>Courses Enrolled:</span>
                            <span class="font-bold">12</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Courses Completed:</span>
                            <span class="font-bold">8</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Certificates Earned:</span>
                            <span class="font-bold">5</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Active Streak:</span>
                            <span class="font-bold">14 days</span>
                        </li>
                    </ul>
                </div>

            </div>
        </section>

    </div>
    {{-- End About Me Section --}}

    {{-- Start My Courses and My Certificates Section --}}
    <!-- Wrapper Container -->
    <div class="container mx-auto px-4 py-10">

        <!-- Tabs Navigation -->
        <div class="flex space-x-2 mb-6 border-b border-gray-700">
            <button class="tab-button px-4 py-2 rounded-t-md bg-gray-800 text-gray-300" data-tab="about"
                onclick="switchTab('about')">My Courses</button>
            <button class="tab-button px-4 py-2 rounded-t-md bg-gray-800 text-gray-300" data-tab="recommendations"
                onclick="switchTab('recommendations')">My Certificates</button>
        </div>

        <!-- My Courses Content -->
        <div id="about" class="tab-content hidden">
            <div class="bg-white text-black p-6 rounded-2xl shadow-md">
                <h2 class="text-2xl font-bold mb-6">My Courses</h2>

                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($courses as $course)
                        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                            <img src="{{ asset('courses/' . $course->image) }}" alt="Course Image"
                                class="w-full h-48 object-cover rounded-xl mb-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $course->description }}</p>

                            <div class="flex justify-center">
                                <a href="{{ route('course.show', $course->id) }}"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">
                                    Continue
                                </a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>

        <!-- My Certificates Content -->
        <div id="recommendations" class="tab-content hidden">
            <div class="bg-white text-black p-6 rounded-2xl shadow-md">
                <h2 class="text-2xl font-bold mb-4">My Certificates</h2>
                <p class="text-gray-700 leading-relaxed">
                    Join thousands of learners who have already transformed their futures with our expert-led courses.
                    Whether you're starting from scratch or looking to sharpen your edge, we've got a course for you.
                </p>
            </div>
        </div>

    </div>

    {{-- End My Courses and My Certificates Section --}}

    <hr>
    <!-- Footer -->
    <x-footer

    <script>
        function switchTab(tabId) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });

            // Remove active style from all buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('bg-black', 'text-white');
                btn.classList.add('bg-gray-800', 'text-gray-300');
            });

            // Show selected tab content
            document.getElementById(tabId).classList.remove('hidden');

            // Set active button
            document.querySelector(`[data-tab="${tabId}"]`).classList.add('bg-black', 'text-white');
        }
    </script>

</body>

</html>
