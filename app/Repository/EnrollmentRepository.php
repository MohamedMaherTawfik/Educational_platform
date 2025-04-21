<?php


namespace App\Repository;

use App\Interfaces\EnrollmentsInterface;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;

class EnrollmentRepository implements EnrollmentsInterface
{
    public function index($course_id)
    {
        $enrollments = Enrollments::where('courses_id', $course_id)->get();
        return $enrollments;
    }
    public function store($course_id,$price)
    {
        return Enrollments::create([
            'courses_id' => $course_id,
            'user_id' => Auth::user()->id,
            'price' => $price,
        ]);
    }

}
