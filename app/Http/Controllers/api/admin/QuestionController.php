<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\questionRequest;
use App\Services\QuestionServices;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use apiResponse;

    private $questionServices;

    public function __construct(QuestionServices $questionServices)
    {
        $this->questionServices = $questionServices;
    }

    public function allQuestions()
    {
        $questions=$this->questionServices->allQuestions(request('id'));
        if(count($questions)==0)
        {
            return $this->senderror('No questions found');
        }
        return $this->apiResponse($questions,'All Questions Fetched Successfully');
    }

    public function findQuestion()
    {
        $question=$this->questionServices->getQuestion(request('id'));
        if(!$question)
        {
            return $this->senderror('Question Not Found');
        }
        return $this->apiResponse($question,'Question Fetched Successfully');
    }

    public function storeQuestion(questionRequest $request)
    {
        $fields=$request->validated();
        $question=$this->questionServices->storeQuestion($fields,request('id'));
        if(!$question)
        {
            return $this->senderror('Question Not Created');
        }
        return $this->apiResponse($question,'Question Created Successfully');
    }

    public function updateQuestion(questionRequest $request)
    {
        $fields=$request->validated();
        $question=$this->questionServices->updateQuestion($fields,request('id'));
        if(!$question)
        {
            return $this->senderror('Question Not Updated');
        }
        return $this->apiResponse($question,'Question Updated Successfully');
    }

    public function deleteQuestion()
    {
        $question=$this->questionServices->deleteQuestion(request('id'));
        if(!$question)
        {
            return $this->senderror('Question Not Deleted');
        }
        return $this->apiResponse($question,'Question Deleted Successfully');
    }
}
