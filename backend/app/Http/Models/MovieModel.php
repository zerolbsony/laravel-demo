<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 17:21
 */
namespace Nero\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    protected $table = 'movies';

    public function borrowRecords()
    {
        return $this->morphMany(BorrowRecordModel::class, 'borrowable');
    }

    public function tags()
    {
        return $this->morphToMany(TagModel::class, 'taggable','taggables','taggable_id','tag_id');
    }
}