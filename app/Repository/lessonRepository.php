<?php

namespace App\Repository;

use App\Interfaces\LessonInterface;
use App\Mail\createMail;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Support\Facades\Mail;

class lessonRepository implements LessonInterface
{
    public function allLessons($id)
    {
        return Courses::with('lessons')->find($id);
    }

    public function getLesson($id)
    {
        return Lesson::find($id);
    }

    public function createLesson($data, $id)
    {
        $lesson= Lesson::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'video' => $data['video'],
            'courses_id' => $id,
            'user_id' => auth()->user()->id
        ]);
        Mail::to(auth()->user()->email)->send(new createMail($lesson));
        return $lesson;
    }

    public function updateLesson($data, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->update($data);
        return $lesson;
    }

    public function deleteLesson($id)
    {
        return Lesson::destroy($id);
    }


}
