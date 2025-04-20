<x-dashboard title="Show lesson">
    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Show lesson</h2>
            <div class="mb-4">
                <video src="{{ asset('storage/videos/' . $lesson->video) }}" controls></video>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-800">Title: <span class="text-gray-600">{{ $lesson->title }}</span></h3>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-800">Description: <span class="text-gray-600">{{ $lesson->description }}</span></h3>
            </div>
        </div>
    </div>
</x-dashboard>
