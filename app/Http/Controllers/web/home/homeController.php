<?php

namespace App\Http\Controllers\web\home;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        $courses=Courses::paginate(8);
        return view('home.index',compact('courses'));
    }

    public function userCourses()
    {
        $courses=Courses::where('user_id',Auth::user()->id)->get();
        return view('courses.UserCourses',compact('courses'));
    }

    public function profile()
    {
        $courses=Courses::where('user_id',Auth::user()->id)->get();
        return view('home.profile',compact('courses'));
    }

    public function notification()
    {
        return view('home.notification');
    }

}
