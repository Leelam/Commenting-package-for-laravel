<?php
/**
 * Created by PhpStorm.
 * User: leelam
 * Date: 8/11/15
 * Time: 2:25 AM
 */

namespace Leelam\Comment;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('websaanova_demo_items')->insert([
            'commentable_id' => '1',
            'commentable_type' => 'App\User',
            'user_id' => 1,
            'comment' => 'This is simple comment',
            'description' => 'My first item test.',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}