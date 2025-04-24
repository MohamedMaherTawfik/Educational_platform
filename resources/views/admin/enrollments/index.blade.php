<x-dashboard title="Courses">
    <!-- Your page content goes here -->
    <div class="p-6 bg-white shadow-md flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">All Enrollments</h1>
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-6 text-gray-500 font-medium text-sm mb-2 p-4">
        <div class="col-span-2">Name</div>
        <div>Student Name</div>
        <div class="ml-10">Last Modified</div>
        <div></div>
        <div class="ml-8">Actions</div>
    </div>
    <!-- File Row Template -->
    <div class="space-y-2">
        <!-- File Row -->
        @foreach ($enrollments as $enroll)
            @foreach ($courses as $course)
                @if ($enroll->courses_id == $course->id)
                    <div
                        class="grid grid-cols-6 items-center bg-gray-100 hover:bg-gray-200 rounded-md px-4 py-2 transition">
                        <div class="col-span-2 flex items-center space-x-2 font-bold">
                            <span class="text-sm text-gray-800">{{ $course->title }}</span>
                        </div>
                        <div class="text-sm">
                            {{ $enroll->user->username }}
                        </div>

                        <div class="text-sm ml-10">
                            {{ $enroll->created_at->format('d M Y') }}
                        </div>
                        <div></div>
                        <div class="flex justify-center space-x-3 text-white text-sm bg-blue-500 rounded-md px-4 py-2"
                            style="width: 40%">
                            <a href="{{ route('admin.lessons', $course->id) }}">
                                Show More
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</x-dashboard>
