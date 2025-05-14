<?php

namespace App\Http\Controllers\web\home;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CoursesInterface;

class homeController extends Controller
{
    private $courseRepository;
    public function __construct(CoursesInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function index()
    {
        $courses=$this->courseRepository->allCourses();
        $latestCourses=$this->courseRepository->newCourses();
        return view('home.index',compact('courses','latestCourses'));
    }

    public function userCourses()
    {
        $enrollments=Enrollments::where('user_id',request('id'))->where('enrolled','yes')->get();
        $courses=Courses::whereIn('id',$enrollments->pluck('courses_id'))->get();
        if($courses->count()>0){
            return view('courses.UserCourses',compact('courses'));
        }else{
            return view('courses.UserCourses',compact('courses'));
        }
    }

    public function profile()
    {
        $enrollments=Enrollments::where('user_id',Auth::user()->id)->where('enrolled','yes')->get();
        $courses=Courses::whereIn('id',$enrollments->pluck('courses_id'))->get();
        return view('home.profile',compact('courses'));
    }

    public function notification()
    {
        return view('home.notification');
    }

    public function contact()
    {
        return view('home.contact');
    }

}