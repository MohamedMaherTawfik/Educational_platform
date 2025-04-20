<x-dashboard title="Courses">
    <!-- Your page content goes here -->
    <div class="p-6 bg-white shadow-md flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">All Courses</h1>
        <form action="{{route('admin.lessons.create', $course->id)}}" method="get">
            <button type="submit" class="bg-green-600 hover:bg-green-900 text-white px-4 py-2 rounded-lg shadow">
                <i class="fas fa-plus mr-2"></i>Add New Lesson
            </button>
        </form>
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-6 text-gray-500 font-medium text-sm mb-2 p-4">
        <div class="col-span-2">Name</div>
        <div>Owner</div>
        <div>Last Modified</div>
        <div class="text-center col-span-2">Actions</div>
    </div>

    <!-- File Row Template -->
    <div class="space-y-2">
        <!-- File Row -->

        @foreach ($lessons as $lesson)
            <div class="grid grid-cols-6 items-center bg-gray-100 hover:bg-gray-200 rounded-md px-4 py-2 transition">
                <div class="col-span-2 flex items-center space-x-2 font-bold">
                    <span class="text-sm text-gray-800"> {{$lesson->title}} </span>
                </div>
                <div class="text-sm">{{Auth::user()->username}}</div>
                <div class="text-sm">{{$lesson->created_at->format('d M Y')}}</div>
                <div class="flex justify-center space-x-3 text-white text-sm bg-blue-500 rounded-md px-4 py-2 ml-11 " style="width: 45%">
                    <a href="{{route('admin.lessons.show', [$course->id, $lesson->id])}}">
                        Show More
                    </a>
                </div>
                <div class="flex justify-center space-x-3 text-white text-sm bg-red-500 rounded-md px-4 py-2 ml-11 " style="width: 45%">
                    <form action="{{route('admin.lessons.destroy', [$course->id, $lesson->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor-pointer">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

</x-dashboard>
