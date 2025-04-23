<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Interfaces\CoursesInterface;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class courseController extends Controller
{

    private $courseRepository;

    public function __construct(CoursesInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function courses()
    {
        $courses = Courses::where('user_id', Auth::user()->id)->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {
        $fields = $request->validated();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('courses'), $imageName);
        $fields['image'] = $imageName;
        $this->courseRepository->createCourse($fields);
        return redirect()->route('admin.courses')->with('success', 'Course created successfully');
    }

    public function show()
    {
        $course = $this->courseRepository->getCourse(request('id'));
        if(Auth::check() && Auth::user()->id == $course->user_id){
            $lessons = lesson::where('course_id', $course->id)->get();
            return view('admin.lessons.index', compact('lessons','course'));
        }else{
            return view('courses.courseDetail', compact('course'));
        }
    }

    public function destroy()
    {
        $this->courseRepository->deleteCourse(request('id'));
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully');
    }

    public function showUser()
    {
        $course = $this->courseRepository->getCourse(request('id'));
        $enrollments=Enrollments::where('courses_id',$course->id)->where('user_id',Auth::user()->id)->get();
        // dd($enrollments);
        if($enrollments->count()>0 && $enrollments->toArray()[0]['enrolled']=='yes'){
            $lessons=lesson::where('courses_id',$course->id)->paginate(3);
            return view('lesson.index', compact('lessons','course'));
        }else{
            return view('courses.courseDetail', compact('course'));
        }
    }

}
