<?php
namespace fabienlk\mypov\Contracts;

use Illuminate\Support\Facades\Auth;
use fabienlk\mypov\services\comments\CommentService;

trait CommentTrait{

    public function __construct(protected CommentService $comments)
    {
        //
    }

    public function execute($paramId){
        $comments = $this->comments->display($paramId);
        $this->comments->addOn($paramId);
        return $comments;
    }

}
