<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Single Course</title>
</head>

<body class="bg-gradient-to-r from-blue-50 to-white text-gray-800 font-sans">
    <!-- Navbar -->
    <x-navbar />

    <!-- Course Content -->
    <section class="py-10 px-6 md:px-12 max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center gap-8 mb-5">

            <!-- Image (Left Side) -->
            <div class="md:w-1/2 w-full">
                <img src="{{ asset('courses/' . $course->image) }}" alt="Course Cover"
                    class="w-full h-auto rounded-xl shadow-lg">
            </div>

            <!-- Text (Right Side, Vertically Centered with Image) -->
            <div class="md:w-1/2 w-full flex flex-col justify-center h-full">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">
                        {{ $course->title }}
                    </h1>
                    <p class="text-lg text-gray-700 font-semibold">
                        Instructor:
                        <a href="#" class="text-blue-600 hover:underline">
                            {{ Auth::user()->username }}
                        </a>
                    </p>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-xl shadow-md p-6 grid md:grid-cols-2 gap-10 mb-10">
            <div>
                <form action="" method="POST">
                    @csrf
                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                        style="width: 30%;">Enroll for ${{ $course->price }}</button>
                </form>
                <p class="mt-4 text-gray-600"><span class="font-bold text-gray-900">12,133</span> already enrolled</p>
                <div class="flex items-center space-x-2 mt-3 text-sm">
                    <span>Included with</span>
                    <span class="font-semibold text-blue-600">Coursera Plus</span>
                    <a href="#" class="text-blue-600 hover:underline">Learn more</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <h3 class="font-semibold text-lg mb-1">4 modules</h3>
                    <p class="text-gray-600">Gain insight into a topic and learn the fundamentals.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-1">4.3 Rating</h3>
                    <p class="text-yellow-500">★★★★☆</p>
                    <p class="text-gray-600">(152 reviews) | Intermediate level</p>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-1">14 hours</h3>
                    <p class="text-gray-600">3 weeks at 4 hrs/week</p>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-1">Flexible schedule</h3>
                    <p class="text-gray-600">Learn at your own pace</p>
                </div>
            </div>
        </div>

        <!-- Tab Buttons -->
        <div class="flex space-x-2 mb-6 border-b border-gray-700">
            <button class="tab-button px-4 py-2 rounded-t-md bg-gray-800 text-gray-300" data-tab="about"
                onclick="switchTab('about')">About</button>
            <button class="tab-button px-4 py-2 rounded-t-md bg-gray-800 text-gray-300" data-tab="recommendations"
                onclick="switchTab('recommendations')">Recommendations</button>
        </div>

        <!-- Posts Content (Initially Hidden) -->
        <div id="about" class="tab-content hidden">
            <div class="bg-white text-black p-6 rounded-md shadow-md">
                <h2 class="text-xl font-bold mb-2">About: </h2>
                <p>We believe education should be accessible, practical, and empowering. That’s why we’ve created a
                    space
                    where anyone can explore high-quality courses,
                    learn from industry experts, and gain real-world skills that make a difference.</p>
            </div>
        </div>

        <!-- Orders Content (Initially Hidden) -->
        <div id="recommendations" class="tab-content hidden">
            <!-- Order Card -->
            <div class="bg-white text-black p-6 rounded-md shadow-md mb-4">
                <h2 class="text-xl font-bold">Recommendations: </h2>
                <p>Join thousands of learners who have already transformed their futures with our expert-led courses.
                    Whether you're starting from scratch or looking to sharpen your edge,
                    we've got a course for you.</p>
            </div>
        </div>


        <div>
            <h2 class="text-2xl font-bold mb-4">What you'll learn</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-start"><svg class="w-6 h-6 text-green-500 mt-1 mr-3" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Explore how PHP fits into the web development landscape.</li>
                    <li class="flex items-start"><svg class="w-6 h-6 text-green-500 mt-1 mr-3" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Discover advanced Laravel concepts such as middleware and authentication.</li>
                    <li class="flex items-start"><svg class="w-6 h-6 text-green-500 mt-1 mr-3" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Explore key topics such as CSRF protection, session security, user validation.</li>
                    <li class="flex items-start"><svg class="w-6 h-6 text-green-500 mt-1 mr-3" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Apply database structures, migration, and Eloquent relationships.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    {{-- Tabbed Content --}}
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
