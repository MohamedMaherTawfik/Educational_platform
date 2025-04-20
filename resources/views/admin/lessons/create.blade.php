<x-dashboard title="Create lesson">
    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Create New lesson</h2>

            <form action="{{ route('admin.lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- lesson Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">lesson Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" value="{{ old('description') }}" id="description" rows="4" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Upload Image -->
                <div>
                    <label for="video" class="block text-sm font-medium text-gray-700">lesson video</label>
                    <input type="file" name="video" value="{{ old('video') }}" id="video" accept="video/*" required
                        class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    @error('video')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
                        style="width: 20%">
                        Create lesson
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard>
