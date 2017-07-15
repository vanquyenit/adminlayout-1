<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Book;
// use App\Http\Requests;
class CommentController extends Controller
{
    public function postComment(Request $request, $id){
        $book_id = $id;
        $book = Book::find($id);
        $comment = new Comment;
        $comment->book_id = $book_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content_cm;
        $comment->save();
        return redirect('sach/'. $book_id .'/'. $book->slug);
    }
    // public function postCommentAjax(){
    //      if(Request::ajax()){
    //         $book_id = Request::post('id');
    //         $content = Request::post('content');
    //         $userId = Request::post('userId');

    //         $book = Book::find($book_id);
    //         $comment = new Comment;
    //         $comment->book_id = $book;
    //         $comment->user_id = $userId;
    //         $comment->content = $content
    //         $comment->save();
    //         echo "lol";
    //     }

    // }

}
