<?php namespace Leelam\Comments\Facades;


use Illuminate\Support\Facades\Facade;

class Comment extends Facade
{
    protected static function getFacadeAccessor() {
        return 'comments';
    }
}