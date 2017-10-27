<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 11:42
 */
namespace Nero\Http\Controllers\V1;

use Illuminate\Routing\Controller;
use Nero\Http\Models\BorrowRecordModel;

class BorrowController extends Controller
{
    public function borrowRecords()
    {
        $borrowRecordId = 1;
        $borrowRecord = BorrowRecordModel::find($borrowRecordId);

        $borrowable = $borrowRecord->borrowable;
        echo "<pre>";
        echo $borrowable->name;
        echo "<br>";
        echo "借阅时间：".$borrowRecord->created_at;
        echo "<br>";
        echo "</pre>";
        //sql:select * from `borrow_records` where `borrow_records`.`borrowable_id` = 1 and `borrow_records`.`borrowable_id` is not null and `borrow_records`.`borrowable_type` = Nero\Http\Models\BookModel
    }
}