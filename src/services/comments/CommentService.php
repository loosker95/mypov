<?php

namespace fabienlk\mypov\services\comments;

use fabienlk\mypov\Http\Requests\RequestComment;
use fabienlk\mypov\Models\Comment;
use fabienlk\mypov\Contracts\CommentTrait;
use Illuminate\Support\Facades\Auth;

class CommentService{

    use CommentTrait;

    public function getComment(){

        if(isset($this->execute()['targetParamId'])){
            $data = Comment::where('target_Key', $this->execute()['targetParamId'])->get();
            return $data;
        }

    }

    public function addComment(RequestComment $request){
        // dd($this->avatar()['avatar']);
        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::user() ? $this->execute()['currentUser'] : 'null',
            'target_Key' => $this->execute()['targetParamId'],
            'avatar' => $this->avatar()['avatar'] ? $this->avatar()['avatar'] : 'null'
        ]);
    }
}
