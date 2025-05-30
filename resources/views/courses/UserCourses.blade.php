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



    <header class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center mt-6">My Courses</h1>
    </header>

    <!-- Courses Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

        <!-- Course Card -->
        @foreach ($courses as $course)
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition mb-5">
                <img src="{{ asset('courses/' . $course->image) }}" alt="Course Image"
                    class="w-full h-48 object-cover rounded-t-2xl">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $course->description }}</p>

                <!-- Align button to the right -->
                <div class="flex justify-end">
                    <a href="{{route('course.show',[$course->id])}}" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700">Show Course</a>
                </div>
            </div>
        @endforeach
    </section>


    <!-- Footer -->
    <x-footer/>

</body>

</html>
