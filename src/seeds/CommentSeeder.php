<?php namespace Leelam\Comments;

use Illuminate\Database\Seeder;


// We actually dont need this for testing
class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
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