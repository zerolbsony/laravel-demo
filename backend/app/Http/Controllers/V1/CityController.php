<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/26
 * Time: 11:16
 */

namespace Nero\Http\Controllers\V1;


use Illuminate\Routing\Controller;
use Nero\Http\Models\CityModel;

class CityController extends Controller
{
    public function comments()
    {
        $cityId = 1;
        $city = CityModel::find($cityId);

        foreach($city->comments as $comment){
            echo "<pre>";
            echo $city->name;
            echo "<br>";
            echo $comment->title;
            echo "<br>";
            echo $comment->body;
            echo "<br>";
            echo "</pre>";
        }
    }
}