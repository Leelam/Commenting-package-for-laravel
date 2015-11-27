<?php
/*Route::post('comments/store', function(){
   return "reached";
});*/
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