<?php
/**
 * Created by Leelam Consultancy Services Pvt. Ltd.
 * User: leelam
 * Date: 28/11/15
 * Time: 5:53 AM
 */

function Recursivifer($input, $key = 0)
{
    $result = collect();

    $input->each(function ($item) use ($result, $key) {
        if ($item->parent_id === $key) $result->push($item);
    });
    $result->map(function ($item) use ($input) {

        $temp = Recursivifer($input, $item->id);
        if (!$temp->isEmpty())
            $item->childs = $temp;
    });
    //dd($result);run
    return $result;
}

/**
 * @param $commentCollection
 * @return array
 */
function NestifyComments($commentCollection)
{


    $recursiveCommentCollection['comments'] = $commentCollection['comments'];
    unset($commentCollection['comments']);

    $recursiveCommentCollection['comments'] = Recursivifer($recursiveCommentCollection['comments']);


    $commentCollection = collect($commentCollection)->toArray();
    return array_merge($commentCollection, $recursiveCommentCollection);


}