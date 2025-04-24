<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show lesson</title>
    {{-- tailwind css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>

    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Lesson: {{ $lesson->title }}</h1>
        <p class="text-lg mb-4">Description: {{ $lesson->description }}</p>
    </div>

    <div class="container mx-auto mt-4 mb-5 flex items-center justify-center min-h-screen">
        <video
            src="{{ asset('storage/videos/' . $lesson->video) }}"
            controls
            class="shadow-2xl rounded-xl max-w-full h-auto">
        </video>
    </div>



    <x-footer />
</body>
</html>
