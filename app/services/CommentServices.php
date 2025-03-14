<?php

namespace App\Services;

use App\Interfaces\CommentInterface;

class CommentServices
{
    private $commentRepository;
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getComments($id)
    {
        $data= $this->commentRepository->getComments($id);
        return $data;
    }

    public function getComment($id)
    {
        $data= $this->commentRepository->getComment($id);
        return $data;
    }

    public function storeComment(array $data,$id)
    {
        $data= $this->commentRepository->storeComment($data,$id);
        return $data;
    }

    public function updateComment(array $data,$id)
    {
        $data= $this->commentRepository->updateComment($data,$id);
        return $data;
    }

    public function deleteComment($id)
    {
        $data= $this->commentRepository->deleteComment($id);
        return $data;
    }
}
