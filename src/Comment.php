<?php namespace Leelam\Comments;

class Comment extends \Eloquent
{
    /**
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }


    /**
     * The fields that are fillable
     *
     * @var array
     */
    protected $fillable = array(
        'commentable_type',
        'commentable_id',
        'comment',
        'user_id',
        'ip'
    );

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['commentable_type', 'created_at', 'updated_at','pivot'];


    /**
     * Owner of the comment
     *
     * @return mixed
     */
    public function author(){
        return $this->belongsTo( config('comments.user_model'), 'user_id' )->select('full_name','id','avatar');
    }

    public static function NestedComments($input, $key=0)
    {
        $result = collect();
        $input->get()->each(function($item) use ($result, $key){ if($item->parent_id===$key)$result->push($item);});
        $result->map(function($item) use ($input){$item->childs=Comment::NestedComments($input, $item->id);} );
        return $result;
    }
}