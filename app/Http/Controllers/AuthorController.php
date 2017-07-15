<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AuthorAddRequest;
class AuthorController extends Controller
{
    public function getAuthorAdd(){
        return view('admin.module.author.add');
    }
    public function getAuthorList(){
        $author = Author::all();
        return view('admin.module.author.list', compact('author'));
    }

    public function postAuthorAdd(AuthorAddRequest $request){
//        $file = $request->author_avatar;
        $author = new Author;
        $author->name = $request->txtAuthor;
        $author->slug = str_slug($request->txtAuthor);
        $author->description = $request->txtDescription;
//        if(strlen($file) > 0){
//            $filename = time() . "." . $file->getClientOriginalName();
//            $path = ('public/admin/images/');
//            $file->move($path, $filename);
//            $author->avatar = $filename;
//        }
        $author->save();
        return redirect()->route('getAuthorList')->with('thongbao', 'Thêm Tác Giả Thành Công');
    }
}
