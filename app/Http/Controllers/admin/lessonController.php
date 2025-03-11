<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\lessonRequest;
use App\Services\lessonServices;

class lessonController extends Controller
{
    use apiResponse;

    private $lessonServices;

    public function __construct(lessonServices $lessonServices)
    {
        $this->lessonServices=$lessonServices;
    }

    public function allLessons()
    {
        $course = $this->lessonServices->allLessons(request('id'));
        if(!$course){
            return $this->sendError('No course found');
        }
        return $this->apiResponse($course,'Lessons Fetched Successfully');
    }

    public function findLesson()
    {
        $course = $this->lessonServices->getLesson(request('id'));
        if(!$course){
            return $this->sendError('course not found');
        }
        return $this->apiResponse($course,'Lessons Fetched Successfully');
    }

    public function storeLesson(lessonRequest $request)
    {
        $fields=$request->validated();
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $path = $video->store('videos', 'public');
            $fields['video'] = $path;
        }
        $lesson = $this->lessonServices->createLesson($fields,request('id'));
        if(!$lesson){
            return $this->sendError('Lesson Not Created');
        }
        return $this->apiResponse($lesson,'Lesson Created Successfully');
    }

    public function updateLesson(lessonRequest $request)
    {
        $fields=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('lessons'),$name);
            $fields['image']=$name;
        }
        if($request->hasFile('video')){
            $file=$request->file('video');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('lessons'),$name);
            $fields['video']=$name;
        }
        $lesson = $this->lessonServices->updateLesson($fields,request('id'));
        if(!$lesson){
            return $this->sendError('Lesson Not Updated');
        }
        return $this->apiResponse($lesson,'Lesson Updated Successfully');
    }

    public function deleteLesson()
    {
        $lesson = $this->lessonServices->deleteLesson(request('id'));
        if(!$lesson){
            return $this->sendError('Lesson Not Deleted');
        }
        return $this->apiResponse($lesson,'Lesson Deleted Successfully');
    }
}
