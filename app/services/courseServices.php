<?php

namespace App\Services;

use App\Interfaces\CoursesInterface;

class CourseServices{
    private $courseRepository;

    public function __construct(CoursesInterface $coursesRepository)
    {
        $this->courseRepository=$coursesRepository;
    }

    public function index()
    {
        $data=$this->courseRepository->allCourses();
        return $data;
    }

    public function find($id)
    {
        $data=$this->courseRepository->getCourse($id);
        return $data;
    }

    public function store($data)
    {
        $data=$this->courseRepository->createCourse($data);
        return $data;
    }

    public function update($id,$data)
    {
        $data=$this->courseRepository->updateCourse($id,$data);
        return $data;
    }

    public function destroy($id)
    {
        $data=$this->courseRepository->deleteCourse($id);
        return $data;
    }
}
