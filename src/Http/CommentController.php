<?php namespace Leelam\Comments\Http;

use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function hello()
    {
        $hello = \Comment::hello() . " from views :)";
        return view('comments::index', compact('hello') );
    }

}