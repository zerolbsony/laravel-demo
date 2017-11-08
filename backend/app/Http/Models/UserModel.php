<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 17:29
 */
namespace Nero\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function books()
    {
        return $this->hasMany(BookModel::class, 'id');
    }

    public function movies()
    {
        return $this->hasMany(MovieModel::class, 'id', '');
    }

    //多对多模型关联,表明是按字母顺序排列命名的
    public function roles()
    {
        //需要额外返回中间表的2个字段及自动维护中间表的时间字段
        return $this->belongsToMany(RoleModel::class, 'role_user','user_id','role_id')->withPivot('created_at', 'updated_at')->withTimestamps();
//        return $this->belongsToMany(RoleModel::class, 'role_user','user_id','role_id')->wherePivot('created_at', '<=', new Carbon(time())->toDateTimeString());//中间表过滤结果
    }

    public function comments()
    {
        return $this->hasMany(CommentModel::class,'user_id','id');
    }

    public function account()
    {
        return $this->belongsTo(AccountModel::class);
    }
}