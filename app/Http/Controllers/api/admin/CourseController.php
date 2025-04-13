<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\CourseServices;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use apiResponse;
    private $courseServices;
    public function __construct(CourseServices $courseServices)
    {
        $this->courseServices=$courseServices;
    }

    public function index()
    {
        $data=$this->courseServices->index();
        if(count($data)==0){
            return $this->sendError('No Courses Available');
        }
        return $this->apiResponse($data,'Courses Fetched Successfully');
    }

    public function find()
    {
        $data=$this->courseServices->find(request('id'));
        if(!$data)
        {
            return $this->sendError('course Not Found');
        }
        return $this->apiResponse($data,'Course Fetched Successfully');
    }

    public function store(CourseRequest $request)
    {
        $fields=$request->validated();
        if($fields['image']){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('courses'),$name);
            $fields['image']=$name;
        }
        $course= $this->courseServices->store($fields);
        if(!$course)
        {
            return $this->sendError('Course Not Created');
        }
        return $this->apiResponse($course,'Course Created Successfully','email Sent to Current User');
    }

    public function update(courseRequest $request)
    {
        $fields=$request->validated();
        $data=$this->courseServices->update(request('id'),$fields);
        if(!$data){
            return $this->sendError('Course Not Updated');
        }
        return $this->apiResponse('course updated Successfully');
    }

    public function destroy()
    {
        $data=$this->courseServices->destroy(request('id'));
        if(!$data)
        {
            return $this->sendError('Course Not found');
        }
        return $this->apiResponse($data,'course deleted successfully');
    }
}
