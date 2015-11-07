<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 28/10/15
 * Time: 9:59 AM
 */
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
        });
    }

    public function down()
    {
        Schema::drop('comments');
    }

}