<x-dashboard title="Create Course">
    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Create New Course</h2>

            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Course Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
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

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                    <input type="number" name="price" id="price" min="0" step="0.01" value="{{ old('price') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('price')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Upload Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Course Image</label>
                    <input type="file" name="image" id="image" accept="image/*" value="{{ old('image') }}" required
                        class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
                        style="width: 20%">
                        Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard>
