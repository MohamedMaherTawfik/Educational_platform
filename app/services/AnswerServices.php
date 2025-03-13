<?php

namespace App\Services;

use App\interfaces\AnsewerInterface;
use App\Repository\AnswerRepository;

class AnswerServices{
    private $ansewerRepository;
    public function __construct(AnsewerInterface $ansewerRepository){
        $this->ansewerRepository = $ansewerRepository;
    }

    public function allAnswer($id){
        return $this->ansewerRepository->allAnsewer($id);
    }

    public function getAnswer($id){
        return $this->ansewerRepository->getAnsewer($id);
    }

    public function createAnswer(array $data,$id){
        return $this->ansewerRepository->createAnsewer($data,$id);
    }

    public function updateAnswer(array $data,$id){
        return $this->ansewerRepository->updateAnsewer($data,$id);
    }

    public function deleteAnswer($id){
        return $this->ansewerRepository->deleteAnsewer($id);
    }
}
