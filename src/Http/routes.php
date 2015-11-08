<?php
Route::post (
    config ( 'comments.base_dir' . '/store' ),
    [
        'as'   => 'commentStore',
        'uses' => 'Leelam\Comments\Http\CommentController@store'
    ]
);