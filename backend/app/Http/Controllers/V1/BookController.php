<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 11:42
 */
namespace Nero\Http\Controllers\V1;

use Illuminate\Routing\Controller;
use Nero\Http\Models\BookModel;

class BookController extends Controller
{
    public function borrowRecords()
    {
        $bookId = 1;
        $book = BookModel::find($bookId);

        foreach ($book->borrowRecords as $record){
            echo "<pre>";
            echo $book->name;
            echo "<br>";
            echo "借阅时间：".$record->created_at;
            echo "<br>";
            echo "</pre>";
        }
        //sql:select * from `borrow_records` where `borrow_records`.`borrowable_id` = 1 and `borrow_records`.`borrowable_id` is not null and `borrow_records`.`borrowable_type` = Nero\Http\Models\BookModel
    }
}