<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Services\QuizServices;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    use apiResponse;
    private $quizServices;

    public function __construct(QuizServices $quizServices)
    {
        $this->quizServices = $quizServices;
    }

    public function index()
    {
        $quizes = $this->quizServices->index(request('id'));
        if (count($quizes) == 0)
        {
            return $this->sendError('No Quizes Available');
        }
        return $this->apiResponse($quizes, 'Quizes Fetched Successfully');
    }

    public function find()
    {
        $quiz = $this->quizServices->show(request('id'));
        if (!$quiz) {
            return $this->sendError('Quiz Not Found');
        }
        return $this->apiResponse($quiz, 'Quizes Fetched Successfully');
    }

    public function store(QuizRequest $request)
    {
        $fields=$request->validated();
        $quiz = $this->quizServices->store($fields,request('id'));
        if (!$quiz) {
            return $this->sendError('No Quizes Available');
        }
        return $this->apiResponse($quiz, 'Quiz Created Successfully');
    }

    public function update(QuizRequest $request)
    {
        $fields=$request->validated();
        $quiz = $this->quizServices->update($fields,request('id'));
        if (!$quiz) {
            return $this->sendError('No Quizes Available');
        }
        return $this->apiResponse($quiz, 'Quiz Updated Successfully');
    }

    public function delete()
    {
        $quiz = $this->quizServices->destroy(request('id'));
        if (!$quiz) {
            return $this->sendError('No Quizes Available');
        }
        return $this->apiResponse($quiz, 'Quiz Deleted Successfully');
    }
}
