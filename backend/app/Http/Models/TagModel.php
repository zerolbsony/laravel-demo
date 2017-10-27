<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/27
 * Time: 17:00
 */

namespace Nero\Http\Models;


use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    protected $table = 'tags';

    public function books()
    {
        return $this->morphedByMany(BookModel::class, 'taggable');
    }

    public function movies()
    {
        return $this->morphedByMany(MovieModel::class, 'taggable');
    }
}