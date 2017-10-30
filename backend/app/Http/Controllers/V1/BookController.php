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
        //多个模型时用这种写法
        return BookResource::collection(BookModel::with('comments')->get());
        //这种写法只接收单个模型
//        return new BookResource(BookModel::find(1));
    }
}