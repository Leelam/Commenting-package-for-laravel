<?php
/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 28/10/15
 * Time: 3:05 AM
 */

namespace Leelam\Comments\Facades;


use Illuminate\Support\Facades\Facade;

class Comment extends Facade
{
    protected static function getFacadeAccessor() {
        return 'leelam-comment';
    }
}