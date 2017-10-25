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
}