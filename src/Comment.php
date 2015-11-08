<?php namespace Leelam\Comments;

/**
 * User: leelam
 * Date: 28/10/15
 * Time: 2:59 AM
 */
class Comment extends \Eloquent
{
    /**
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function hello()
    {
        return 'Hello Leelam';
    }

}