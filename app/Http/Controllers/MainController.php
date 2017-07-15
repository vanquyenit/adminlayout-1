<?php

namespace App\Http\Controllers;


use DB;
use App\Http\Requests;
use App\Category;
use App\Book;
use App\Author;
use Request;
use Cart, DateTime;
use App\Comment;
use Auth;
use App\Province;
use App\Book_Like;

class MainController extends Controller
{
    public function getIndex(){
        $book = Book::getAllBook();
        $cart = Cart::total(0,0,0);
        $author = Author::all();
        return view('frontend.index', compact('book', 'cart'));
    }

    public function getBook_detail($id){
        $book = Book::find($id);
        $parent_book = $book->cate->parent_id;
        $cate_parent = DB::table('categories')->select('name')->where('id', $parent_book)->get()->toArray();
        $cart = Cart::total(0,0,0);

        $book_cate_parent = $book->cate->id;
        $book_cate = DB::table('books')->select('id', 'name', 'slug', 'image', 'price', 'cate_id', 'author_id')->where('cate_id', $book_cate_parent)->where('id', '<>', $id)->take(4)->get()->toArray();

        $comment = Comment::select(DB::raw('count(*) as qty_cmt'))->where('book_id', $id)->first();
        $countLike = Book_Like::where('book_id', $id)->count();
        return view('frontend.pages.book_detail', compact('book','cart', 'cate_parent','book_cate','comment','countLike'));
        // return view('frontend.pages.test_cm_ajax', compact('book','cart', 'cate_parent','book_cate','comment'));
    }

    public function getAuthor($id){
        $author = Author::find($id);
        $book = Book::select('id', 'name', 'slug', 'image', 'price', 'cate_id', 'author_id')->where('author_id', $id)->get();
        return view('frontend.pages.author', compact('author', 'book'));
    }

    public function getProduct($id){
        $book_info = Book::where('id',$id)->first();
        Cart::add(array('id'=> $id, 'name' => $book_info->name, 'qty' => 1, 'price' => $book_info->price, 'slug' => $book_info->slug, 'options' => array('img' => $book_info->image)));
        return redirect()->route('getCart');
    }

    public function getCart(){
        $content = Cart::content();
        $cart = Cart::total(0,0,0);
        return view('frontend.pages.shopping_cart', compact('content', 'cart', 'province'));
    }
    public function delProduct($id){
        Cart::remove($id);
        return redirect()->route('getCart');
    }

    public function delAllProduct(){
        Cart::destroy();
        return redirect()->route('getCart');
    }

    public function getBookCate($id){
        $book_cate = Book::select('id', 'name', 'slug', 'image', 'price', 'cate_id', 'author_id')->where('cate_id', $id)->get();
        $brecum = Category::find($id);
        return view('frontend.pages.category', compact('book_cate','brecum'));
    }

    public function getBookLike(Request $request,$id){

    }

    public function getUpdate(){
        if(Request::ajax()){
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id, $qty);
            echo "lol";
        }
    }

    public function getCheckOut(){
        $content = Cart::content();
        $cart = Cart::total(0,0,0);
        $province = Province::all();
        return view('frontend.pages.checkout', compact('content', 'cart', 'province'));
    }


    public function UserLikeBook(){
        if(Request::ajax()){
            $bookid = Request::get('id');

            $arLike = [
                'book_id' => $bookid,
                'user_id' => Auth::user()->id,
            ];

            if(Book_Like::where($arLike)->count()){
              Book_Like::where($arLike)->delete();
              return response()->json([
                        'status' => true,
                        'countLike' => Book_Like::where('book_id', $bookid)->count(),
                    ]); 
            } else {
                if(Book_Like::create($arLike)){
                    return response()->json([
                        'status' => true,
                        'countLike' => Book_Like::where('book_id', $bookid)->count(),
                    ]);     
                }
                else {
                     return response()->json([
                        'status' => false,
                    ]);
                }
                
            }
            
        }
    }




}
