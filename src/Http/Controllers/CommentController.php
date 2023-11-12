<?php

namespace fabienlk\mypov\Http\Controllers;

use fabienlk\mypov\services\comments\CommentService;
use fabienlk\mypov\Http\Requests\RequestComment;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class CommentController{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(protected CommentService $comment_service)
    {
        //
    }

    public function create(RequestComment $request, $id)
    {
        $this->comment_service->execute($request, $id);
        return redirect()->back()->with('success', 'Comment successfully submitted.');
    }

}
