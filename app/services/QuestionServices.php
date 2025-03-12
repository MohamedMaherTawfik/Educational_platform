<?php

namespace App\Services;

use App\Models\questions;
use App\Models\quizes;
use App\Models\lesson;
use App\Repository\QuestionRepository;

class QuestionServices {
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function storeQuestion(array $data, $id)
    {
        return $this->questionRepository->storeQuestion($data, $id);
    }

    public function updateQuestion(array $data, $id)
    {
        $question= $this->questionRepository->updateQuestion($data, $id);
        return $question;
    }

    public function deleteQuestion($id)
    {
        return $this->questionRepository->deleteQuestion($id);
    }

    public function allQuestions($id)
    {
        return $this->questionRepository->allQuestions($id);
    }

    public function getQuestion($id)
    {
        return $this->questionRepository->getQuestion($id);
    }

}
