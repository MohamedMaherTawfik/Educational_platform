<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignmentRequest;
use App\Services\AssignmentService;

class AssignmentController extends Controller
{
    use apiResponse;
    private $assignmentServices;

    public function __construct(AssignmentService $assignmentServices)
    {
        $this->assignmentServices = $assignmentServices;
    }

    public function index()
    {
        $assignments = $this->assignmentServices->getAssignments(request('id'));
        if(count($assignments)==0){
            return $this->sendError('No Assignments Available');
        }
        return $this->apiResponse($assignments,'Assignments Fetched Successfully');
    }

    public function find()
    {
        $assignment = $this->assignmentServices->getAssignment(request('id'));
        if(!$assignment){
            return $this->sendError('Assignment Not Found');
        }
        return $this->apiResponse($assignment,'Assignment Fetched Successfully');
    }

    public function store(AssignmentRequest $request)
    {
        $fields=$request->validated();
        $assignment = $this->assignmentServices->createAssignment($fields,request('id'));
        if(!$assignment){
            return $this->sendError('Assignment Not Created');
        }
        return $this->apiResponse($assignment,'Assignment Created Successfully');
    }

    public function update(AssignmentRequest $request)
    {
        $fields=$request->validated();
        $assignment = $this->assignmentServices->updateAssignment($fields,request('id'));
        if(!$assignment){
            return $this->sendError('Assignment Not Updated');
        }
        return $this->apiResponse($assignment,'Assignment Updated Successfully');
    }

    public function destroy()
    {
        $assignment = $this->assignmentServices->deleteAssignment(request('id'));
        if(!$assignment){
            return $this->sendError('Assignment Not Deleted');
        }
        return $this->apiResponse($assignment,'Assignment Deleted Successfully');
    }

}
