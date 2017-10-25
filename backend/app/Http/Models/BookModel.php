<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 17:30
 */
namespace Nero\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $table = 'books';

    public function borrow()
    {
        return $this->belongsTo(UserModel::class, 'borrow_user_id', 'id');
    }
}