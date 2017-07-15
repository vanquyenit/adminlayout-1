<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Publisher;
use App\Http\Requests\PublihserAddRequest;
class PublisherController extends Controller
{
    public function getPublisherAdd(){
        return view('admin.module.publisher.add');
    }
    public function getPublisherList(){
        $publisher = Publisher::all();
        return view('admin.module.publisher.list', compact('publisher'));
    }
    public function postPublisherAdd(PublihserAddRequest $request){
        $author = new Publisher;
        $author->name = $request->txtPublisher;
        $author->slug = str_slug($request->txtPublisher);
        $author->description = $request->txtDescription;
        $author->save();
        return redirect()->route('getPublisherList')->with('thongbao', 'Thêm Tác Giả Thành Công');
    }
}
