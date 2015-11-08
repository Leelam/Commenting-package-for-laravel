<?php namespace Leelam\Comments;

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