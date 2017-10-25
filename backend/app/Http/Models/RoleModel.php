<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 18:26
 */

namespace Nero\Http\Models;


use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(UserModel::class);
    }
}