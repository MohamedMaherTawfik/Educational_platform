<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\lessonRequest;
use App\Interfaces\LessonInterface;
use App\Models\Courses;
use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lessonController extends Controller
{
    private $lessonRepository;
    public function __construct(LessonInterface $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }
    public function index()
    {
        $course = Courses::find(request('id'));
        $lessons = lesson::where('courses_id', request('id'))->get();
        return view('admin.lessons.index', compact('lessons', 'course'));
    }

    public function create()
    {
        $course = Courses::find(request('id'));
        return view('admin.lessons.create', compact('course'));
    }

    public function store(lessonRequest $request)
    {
        $fields = $request->validated();
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $file = $request->file('video');
            $name = time() . '.' . $file->getClientOriginalName();
            $file->storeAs('videos', $name, 'public');
            $fields['video'] = $name;
            try {
                $this->lessonRepository->createLesson($fields, request('id'));
                return redirect()->back()->with('success', 'Lesson created successfully');
            } catch (\Throwable $th) {

            }
        }
    }

    public function show()
    {
        $lesson = lesson::find(request('lesson_id'));
        return view('admin.lessons.show', compact('lesson'));
    }

    public function destroy()
    {
        $lesson = lesson::find(request('lesson_id'));
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully');
    }
}
