<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 11:41
 */
namespace Nero\Http\Controllers\V1;

use Illuminate\Routing\Controller;
use Nero\Http\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        echo "User";
        return ;
    }

    public function getUserRole()
    {
        $uid = 1;
        $user = UserModel::find($uid);

        foreach($user->roles as $role){
            echo "<pre>";
            echo $role->name;
            echo "<br>";
            echo $user->name;
            echo "<br>";
            echo $role->pivot->created_at;
            echo "<br>";
            echo $role->pivot->updated_at;
            echo "<br>";
            echo "</pre>";
        }
    }

    public function comments()
    {
        //这种筛选只能取得主模型的结果，关联模型的数据不能取得
        $users = UserModel::whereHas('comments', function ($query){
            $query->where('title', 'like', '%哈哈%');
//        })->get();
        });
        echo "<pre>";
        echo "至少一条评论标题带哈哈的人:";
        echo "<br>";
        foreach($users as $user){
            echo $user['name'];
            echo "<br>";
        }
        echo "</pre>";
    }
}