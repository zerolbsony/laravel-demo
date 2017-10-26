<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/26
 * Time: 11:12
 */

namespace Nero\Http\Models;


use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'citys';

    //远程一对多
    public function comments()
    {
        return $this->hasManyThrough(CommentModel::class,UserModel::class,'city_id','user_id');
    }
}