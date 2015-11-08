<?php  namespace Leelam\Comments;

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
        $this->app->bind('comments', function() {
        return new Comment;
    });

        $this->mergeConfigFrom(
            __DIR__ . '/config/comments.php', 'comments'
        );
    }

    public function boot()
    {
        // Configuring with main route file
        // Loading package view files directly from vendor directory as
        require __DIR__ . '/Http/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'comments');

        // Publishing packages views to /views
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/comments'),
        ]);

        // Publishing config file to /config
        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ]);

        // Publishing Migration File
        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');

        // Publishing seeds file
        $this->publishes([
            __DIR__ . '/seeds' => $this->app->databasePath() . '/seeds'
        ], 'seeds');


    }
}