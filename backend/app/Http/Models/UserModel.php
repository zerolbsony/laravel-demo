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

    //多对多模型关联
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'role_user','user_id','role_id')->withPivot('created_at', 'updated_at');
    }
}