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

    public function create(RequestComment $request)
    {
        $this->comment_service->addComment($request);
        return redirect()->back()->with('success', 'comment submit succesfully');
    }


    public function show()
    {
        $data = $this->comment_service->getComment();
        return view('comments::comments.index')->with('data', $data);
    }

}
