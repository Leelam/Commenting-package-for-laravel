<?php
/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 28/10/15
 * Time: 3:05 AM
 */

namespace Leelam\Comment;


use Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'leelam-comment';
    }
}