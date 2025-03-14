<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\admin\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\CommentServices;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use apiResponse;
    private $commentServices;
    public function __construct(CommentServices $commentServices)
    {
        $this->commentServices = $commentServices;
    }

    public function index()
    {
        $data = $this->commentServices->getComments(request('id'));
        if (count($data) == 0) {
            return $this->sendError('No comments found');
        }
        return $this->apiResponse($data, 'Comments Fetched Successfully');
    }

    public function show()
    {
        $comment = $this->commentServices->getComment(request('id'));
        if (!$comment) {
            return $this->sendError('Comment not found');
        }
        return $this->apiResponse($comment, 'Comment Fetched Successfully');
    }

    public function store(CommentRequest $request)
    {
        $fields=$request->validated();
        $comment = $this->commentServices->storeComment($fields, request('id'));
        return $this->apiResponse($comment, 'Comment Added Successfully');
    }

    public function update(CommentRequest $request, $id)
    {
        $fields=$request->validated();
        $comment = $this->commentServices->updateComment($fields, $id);
        return $this->apiResponse($comment, 'Comment Updated Successfully');
    }

    public function destroy($id)
    {
        $comment = $this->commentServices->deleteComment($id);
        if (!$comment) {
            return $this->sendError('Comment not found');
        }
        return $this->apiResponse($comment, 'Comment Deleted Successfully');
    }
}
