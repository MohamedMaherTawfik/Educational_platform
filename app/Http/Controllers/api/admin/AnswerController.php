<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\answerRequest;
use App\Services\AnswerServices;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    use apiResponse;

    private $answerServices;

    public function __construct(AnswerServices $answerServices)
    {
        $this->answerServices = $answerServices;
    }

    public function index()
    {
        $answers=$this->answerServices->getAnswer(request('id'));
        if(count($answers)==0){
            return $this->senderror('No answers found');
        }
        return $this->apiResponse($answers,'Answers Fetched Successfully');
    }

    public function findAnswer()
    {
        $answer=$this->answerServices->getAnswer(request('id'));
        if(!$answer)
        {
            return $this->senderror('Answer Not Found');
        }
        return $this->apiResponse($answer,'Answer Fetched Successfully');
    }

    public function store(answerRequest $request)
    {
        $fields=$request->validated();
        $answer=$this->answerServices->createAnswer($fields,request('id'));
        if(!$answer)
        {
            return $this->senderror('Answer Not Created');
        }
        return $this->apiResponse($answer,'Answer Created Successfully');
    }

    public function update(answerRequest $request)
    {
        $fields=$request->validated();
        $answer=$this->answerServices->updateAnswer($fields,request('id'));
        if(!$answer)
        {
            return $this->senderror('Answer Not Updated');
        }
        return $this->apiResponse($answer,'Answer Updated Successfully');
    }

    public function destroy()
    {
        $answer=$this->answerServices->deleteAnswer(request('id'));
        if(!$answer)
        {
            return $this->senderror('Answer Not Deleted');
        }
        return $this->apiResponse($answer,'Answer Deleted Successfully');
    }


}
