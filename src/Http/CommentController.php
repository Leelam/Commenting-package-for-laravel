<?php
/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 28/10/15
 * Time: 3:32 AM
 */

namespace Leelam\Comment\Http;




use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function hello()
    {
        $hello = \Comment::hello() . " from views :)";
        return view('leelam-comment::index', compact('hello') );
    }

}