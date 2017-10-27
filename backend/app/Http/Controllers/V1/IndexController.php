<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/26
 * Time: 11:37
 */

namespace Nero\Http\Controllers\V1;


use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo "<pre>";
        echo "<a href='http://laravel.local/api/v1/user/role' target='_blank'>多对多</a>";
        echo "<br>";
        echo "<a href='http://laravel.local/api/v1/city/comments' target='_blank'>远程一对多</a>";
        echo "<br>";
        echo "<a href='http://laravel.local/api/v1/book/borrowRecords' target='_blank'>多态关联</a>";
        echo "<br>";
        echo "<a href='http://laravel.local/api/v1/book/tags' target='_blank'>多对多多态关联</a>";
        echo "<br>";
        echo "</pre>";
    }
}