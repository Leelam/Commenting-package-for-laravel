<?php

Route::get('comment/test', function () {
    return config('leelam-comment-comment.hello') .
    config('leelam-comment-comment.world');
});

Route::get('comment/hello', function () {

    return  \Comment::hello();
});

Route::get('comment/controller', 'Leelam\Comment\Http\CommentController@hello');