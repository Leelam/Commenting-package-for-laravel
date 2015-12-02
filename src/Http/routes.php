<?php
use App\User;
use Illuminate\Http\Response;

include_once 'helpers.php';
Route::get(
    'comments/user/{id}',
    [
        'as'   => 'comment.show',
        'uses' => 'Leelam\Comments\Http\CommentController@show'
    ]
);
Route::get(
    'api/users/{id}',
    function($id){

        $parentAndCommentData = NestifyComments(User::with('comments.author')->find($id));
        return collect($parentAndCommentData['comments']);

    }
);
Route::post (
    config ( 'comments.base_dir' ).'/store',
    [
        'as'   => 'commentStore',
        'uses' => 'Leelam\Comments\Http\CommentController@store'
    ]
);

Route::put(
    'comments/put/vote/{id}/{one}/{two}',
    [
        'as'   => 'commentVote',
        'uses' => 'Leelam\Comments\Http\CommentController@vote'
    ]
);