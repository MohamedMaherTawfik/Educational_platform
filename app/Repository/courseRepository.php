<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\CoursesInterface;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class CourseRepository implements CoursesInterface{
    public function allCourses()
    {
        return Courses::all();
    }

    public function getCourse($id)
    {
        $data=Courses::find($id);
        return $data;
    }

    public function createCourse($data)
    {
        $data= Courses::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'image'=>$data['image'],
            'price'=>$data['price'],
            'user_id'=>Auth::user()->id
        ]);
        Event::dispatch(new NewDataEvent($data));
        return $data;
    }

    public function updateCourse($id, $data)
    {
        $data=Courses::find($id);
        $data->update($data);
        return $data;
    }

    public function deleteCourse($id)
    {
        $data=Courses::find($id);
        $data->delete();
        return $data;
    }
}
