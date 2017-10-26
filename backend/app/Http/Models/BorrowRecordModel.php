<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/26
 * Time: 11:49
 */

namespace Nero\Http\Models;


use Illuminate\Database\Eloquent\Model;

class BorrowRecordModel extends Model
{
    protected $table = 'borrow_records';

    public function borrowable()
    {
        return $this->morphTo();
    }
}