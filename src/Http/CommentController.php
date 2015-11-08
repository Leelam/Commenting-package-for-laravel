<?php namespace Leelam\Comments\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;
use Leelam\Comments\Comment;


class CommentController extends BaseController
{
    /**
     * @type \Leelam\Comments\Comment
     */
    private $comment;

    public function __construct ( Comment $comment )
    {

        $this->comment = $comment;
    }

    public function store ( Request $request)
    {

        $modelAndFindValueArray = explode(":", Crypt::decrypt($request->modelAndValue));

        $modelInstance = $modelAndFindValueArray[0]::find($modelAndFindValueArray[1]);

        $commentData = [
            'user_id' => 1,
            'comment' => $request->comment,
            // 'ip'        =>  $request->getClientIp(),
        ];
        $commentInstance = new Comment($commentData);

        $modelInstance->comments()->save($commentInstance);

        //flash can be used here
        return redirect(\URL::previous());
    }

}