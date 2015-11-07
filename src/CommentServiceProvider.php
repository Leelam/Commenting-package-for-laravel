<?php
/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 28/10/15
 * Time: 3:03 AM
 */

namespace Leelam\Comment;


use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('leelam-comment', function() {
        return new Comment;
    });

        $this->mergeConfigFrom(
            __DIR__ . '/config/comment.php', 'leelam-comment-comment'
        );
    }

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'leelam-comment');

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/leelam-comment'),
            __DIR__ . '/config' => config_path('leelam-comment'),
        ]);

        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');


    }
}