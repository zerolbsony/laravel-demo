<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 17:30
 */
namespace Nero\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $table = 'books';

    public function borrowRecords()
    {
        return $this->morphMany(BorrowRecordModel::class, 'borrowable');
    }

    public function tags()
    {
        return $this->morphToMany(TagModel::class, 'taggable','taggables','taggable_id','tag_id');
        //select `tags`.*, `taggables`.`taggable_id` as `pivot_taggable_id`, `taggables`.`tag_model_id` as `pivot_tag_model_id` from `tags` inner join `taggables` on `tags`.`id` = `taggables`.`tag_model_id` where `taggables`.`taggable_id` = 1 and `taggables`.`taggable_type` = books
    }

    public function comments()
    {
        return $this->morphMany(CommentModel::class,'commentable');
    }
}