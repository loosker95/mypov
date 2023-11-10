<?php
namespace fabienlk\mypov\Contracts;

use Illuminate\Support\Facades\Auth;

trait CommentTrait{

    public function execute(mixed $AuthUserId=null, mixed $targetId=null){
        if($AuthUserId or $targetId){
            return [
                'currentUser' => $this->loggedInUserId(),
                'targetParamId' => $targetId,
            ];
        }
    }

    public function avatar(bool $showAvatar= true, string $avatar = null){
        return [
            'showAvatar' => $showAvatar,
            'avatar' => $avatar
        ];
    }

    private function loggedInUserId()
    {
        return Auth::user() ? Auth::user()->id : 'null';
    }

}
