<?php

namespace App\Services;

use App\Interfaces\QuizesInterface;
use App\Models\quizes;

class QuizServices
{
    private $quizRepository;
    public function __construct(QuizesInterface $quizRepository)
    {
        $this->quizRepository=$quizRepository;
    }

    public function index($id){
        $data=$this->quizRepository->getQuizes($id);
        return $data;
    }

    public function show($id){
        $data=$this->quizRepository->getQuiz($id);
        return $data;
    }

    public function store($data,$id){
        $data=$this->quizRepository->createQuizes($data,$id);
        return $data;
    }

    public function update($data,$id){
        $data=$this->quizRepository->updateQuizes($data,$id);
        return $data;
    }

    public function destroy($id){
        $data=$this->quizRepository->deleteQuizes($id);
        return $data;
    }

}
