<?php
/**
 * Created by PhpStorm.
 * User: didi
 * Date: 2017/10/25
 * Time: 11:42
 */
namespace Nero\Http\Controllers\V1;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Nero\Http\Models\BookModel;
use Nero\Http\Collections\BookCollection;
use Nero\Http\Resources\BookResource;

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

    public function tags()
    {
        $bookId = 1;
        $book = BookModel::find($bookId);

        echo $book->name;
        echo "<br>";
        echo "<pre>";
        echo "标签名称：";
        echo "<br>";
        foreach ($book->tags as $tag){
            echo $tag->name;
            echo "<br>";
        }
        echo "</pre>";

        $books = BookModel::has('tags', '>=', 3)->get();
        echo "<pre>";
        echo "三个以上标签的书：";
        echo "<br>";
        foreach($books as $book){
            echo $book['name'];
            echo "<br>";
        }
        echo "</pre>";
    }

    public function count()
    {
        $books = BookModel::withCount(['borrowRecords', 'comments'])->get();

        echo "borrow records count is:";
        echo $books[0]->borrow_records_count;
        echo "<br>";


        echo "comments count is:";
        echo $books[0]->comments_count;
        echo "<br>";
    }

    public function comments()
    {
        //嵌套预加载
        $book = BookModel::with('comments.user')->get();
        //预加载关联多个模型
//        $book = BookModel::with(['borrowRecords','comments'])->get();

        foreach ($book as $_book){
            echo "<pre>";
            echo $_book->name;
            echo "<br>";
            echo $_book->created_at;
            echo "<br>";
            foreach ($_book->comments as $comment){
                echo "<pre>";
                echo $comment->title;
                echo "<br>";
                echo $comment->body;
                echo "<br>";
                echo "</pre>";
            }
            echo "</pre>";
        }
    }

    public function commentInfo()
    {
        //延迟加载并且与data同级别的meta参数
//        return new BookCollection(BookModel::all()->load('comments'));
        //多个模型时用这种写法
        return BookResource::collection(BookModel::with('comments')->get());
        //这种写法只接收单个模型
//        return new BookResource(BookModel::find(1));
    }

    public function info()
    {
        $model = BookModel::find(1);
        print_r($model->history());exit;
        BookModel::create([
            'name' => '安徒生的童话',
            'author' => '安徒生',
        ]);
        return BookModel::where('name', 'lucy')->firstOrFail();
        return BookModel::where('name', '安徒生的童话')->firstOrFail();
        return BookModel::find(1)->first();
    }

    public function lock()
    {
        DB::transaction(function(){
            $book = BookModel::sharedLock()->find(1);
//            $book = BookModel::lockForUpdate()->find(1);
            $book->author = '张三';
            sleep(5);
            $book->save();
        },100);//此时由于可以100次失败，那么先执行lock，在执行lock1，最后结果作者是张三，这里死锁重试次数将结果出人意料，其实就是谁先更新是谁的，死锁的只要等到不死锁就能更新成功，等不到就抛异常结束了
        $book = BookModel::find(1)->first();
        print_r($book);
    }

    //SQLSTATE[40001]: Serialization failure: 1213 Deadlock found when trying to get lock; try restarting transaction (SQL: update `books` set `author` = 李四, `updated_at` = 2017-11-01 06:49:03 where `id` = 1)
    public function lock1()
    {
        DB::transaction(function(){
            $book = BookModel::sharedLock()->find(1);
//            $book = BookModel::lockForUpdate()->find(1);
            $book->author = '李四';
//            sleep(5);
            $book->save();
        },50);
        $book = BookModel::find(1)->first();
        print_r($book);
    }
}