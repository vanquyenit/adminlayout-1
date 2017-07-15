<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\Category;
use App\Author;
use App\Publisher;
use App\Http\Requests\BookAddRequest;
use App\Http\Requests\BookEditRequest;
use DateTime;
class BookController extends Controller
{
    public function getBookAdd(){
        $parent = Category::all();
        $publisher = Publisher::all();
        $author = Author::all();
        return view('admin.module.book.add', compact('parent', 'publisher', 'author'));
    }
    
    public function getBookList(){
        $book = Book::all();
        return view('admin.module.book.list',compact('book'));
    }

    public function postBookAdd(BookAddRequest $request){
        $file = $request->content_img;

        $book = new Book;
        $book->name = $request->txtBookName;
        $book->slug = str_slug($request->txtBookName);
//        if(strlen($request->txtAuthorName) > 0) {
//            $author = new Author;
//            $author->name = $request->txtAuthorName;
//            $author->slug = str_slug($request->txtAuthorName);
//            $author->save();
//            $lastInserted_AuthorId = $author->id;
//        }
        $book->description = $request->txtDescription;
        $book->time = new DateTime;
        $book->public = $request->rdoLevel;

        if(strlen($file) > 0){
            $filename = time() . "." . $file->getClientOriginalName();
            $path = ('public/admin/image_book/');
            $file->move($path, $filename);
            $book->image = $filename;
        }
        $book->price = $request->txtPrice;
//        if(strlen($request->txtPublisher) > 0) {
//            $publish = new Publisher;
//            $publish->name = $request->txtPublisher;
//            $publish->slug = str_slug($request->txtPublisher);
//            $publish->save();
//            $lastInserted_PublishId = $publish->id;
//        }
        $book->publish_id = $request->publisher;
        $book->cate_id = $request->sltParent;
        $book->author_id = $request->txtAuthorName;
        $book->public = $request->rdoLevel;
        $book->qty = $request->number_book;
        $book->qty_remaining = $request->number_book;
        $book->page_number = $request->pages_number;
        $book->save();
        return redirect()->route('getBookList')->with('thongbao', 'Thêm Sách Thành Công');
    }

    public function getBookDelete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('getBookList')->with('thongbao', 'Xóa Sách Thành Công');
    }

    public  function getBookEdit($id){
        $cate = Book::find($id);
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('admin.module.book.edit',['dataCate' => $cate, 'parent' => $parent]);
    }

    public  function postBookEdit(BookEditRequest $request, $id){
        $book = Book::find($id);
        $book->name = $request->txtBookName;
        $book->slug = str_slug($request->txtBookName);
        $book->cate_id = $request->sltParent;
        $book->public = $request->rdoLevel;
        $book->save();
        return redirect()->route('getBookList')->with('thongbao', 'Sửa Sách Thành Công');

    }

    public function postSearch(Request $request){
        $keyword = $request->search_book;
        $book = Book::where('name','like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhere('price', 'like', "%$keyword%")
            ->orWhere('page_number', 'like', "%$keyword%")
            ->take(5)->paginate(5);
        return view('frontend.pages.search', compact('book', 'keyword'));
    }



}
