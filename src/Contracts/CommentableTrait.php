<?php
namespace Leelam\Comments\Contracts;

use Leelam\Comments\Comment;

trait CommentableTrait {

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function comments()
    {
        return Comment::NestedComments($this->morphMany('Leelam\Comments\Comment', 'commentable'));
    }
}