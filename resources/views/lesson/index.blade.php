<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Course lesons</title>
</head>

<body>

    <x-navbar />

    {{-- Course name --}}
    <div class="container mx-auto px-4 my-10">
        <h1 class="text-2xl font-bold">Course Name: {{ $course->title }}</h1>
    </div>

    <div class="container mx-auto px-4 my-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-10">
            @foreach ($lessons as $lesson)
                <div class="rounded-2xl overflow-hidden shadow-lg bg-white flex flex-col h-full">
                    <div class="w-full h-64 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('images/laravelImage.jpg') }}"
                            alt="Lesson Image">
                    </div>
                    <div class="p-4 flex-grow">
                        <h2 class="text-xl font-semibold mb-2">{{ $lesson->title }}</h2>
                        <p class="text-gray-600">{{ $lesson->description }}</p>
                    </div>
                    <div class="p-4 flex justify-end">
                        <a href=""
                            class="bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                            View Lesson
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $lessons->links() }}
    </div>







    <x-footer />

    {{-- tailwind css --}}
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>

</html>
