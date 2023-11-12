<?php

namespace fabienlk\mypov\services\comments;

use fabienlk\mypov\Http\Requests\RequestComment;
use fabienlk\mypov\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService{

    public function addOn($param){
        return $param;
    }

    public function display($target){
        $data = Comment::where('target_Key', $target)->get();
        return $data;
    }

    public function execute(RequestComment $request, $target){
        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::user() ? $this->getLoggedUserId() : 'null',
            'target_Key' => $this->addOn($target),
            'avatar' => 'xxx.png'
        ]);
    }

    private function getLoggedUserId(){
        return Auth::user()->id;
    }
}
