<?php

namespace App\Services;

use App\Interfaces\LessonInterface;

class lessonServices{

    private $lessonRepository;
    public function __construct(LessonInterface $lessonRepository){
        $this->lessonRepository=$lessonRepository;
    }

    public function allLessons($id){
        return $this->lessonRepository->allLessons($id);
    }

    public function getLesson($id){
        return $this->lessonRepository->getLesson($id);
    }

    public function createLesson($data, $id){
        return $this->lessonRepository->createLesson($data, $id);
    }

    public function updateLesson($data, $id){
        return $this->lessonRepository->updateLesson($data, $id);
    }

    public function deleteLesson($id){
        return $this->lessonRepository->deleteLesson($id);
    }
}
