<?php

namespace App\Services;

use App\Interfaces\AssignmentInterface;
use App\Models\assignment;

class AssignmentService
{
    private $assignmentRepository;
    public function __construct(AssignmentInterface $assignmentRepository)
    {
        $this->assignmentRepository = $assignmentRepository;
    }
    public function getAssignments($id)
    {
        $assignments= $this->assignmentRepository->allAssignment($id);
        return $assignments;
    }

    public function getAssignment($id)
    {
        $assignment= $this->assignmentRepository->getAssignment($id);
        return $assignment;
    }
    public function createAssignment($data,$id){
        $data=$this->assignmentRepository->createAssignment($data,$id);
        return $data;
    }

    public function updateAssignment($data,$id){
        $data=$this->assignmentRepository->updateAssignment($data,$id);
        return $data;
    }

    public function deleteAssignment($id){
        $data=$this->assignmentRepository->deleteAssignment($id);
        return $data;
    }


}
