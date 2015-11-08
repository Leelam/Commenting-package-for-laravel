<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments',function(Blueprint $table){
            $table->increments('id');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->integer('user_id');
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();

            // Uncomment this if you want to link user ids to your users table
            //$table->foreign ( 'user_id' )->references ( 'id' )->on ( 'users' );
        });
    }

    public function down()
    {
        // Uncomment this when you linked to user id to users table
        /*Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign ( 'comments_user_id_foreign' );
        });*/

        Schema::drop('comments');
    }

}