<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;

class CateController extends Controller
{
    public function getCateAdd(){
        $parent = Category::all();
        return view('admin.module.category.add', compact('parent'));
    }

    public function postCateAdd(CateAddRequest $request){
        $cate = new Category;
        $cate->name = $request->txtCateName;
        $cate->alias = str_slug($request->txtCateName);
        $cate->parent_id = $request->sltParent;
        $cate->save();
        return redirect()->route('getCateList')->with('thongbao', 'Thêm Thể Loại Thành Công');
    }

    public function getCateList(){
        $cate = Category::all();
        return view('admin.module.category.list', compact('cate'));
    }
    public function getCateDelete($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('getCateList')->with('thongbao', 'Xóa Thể Loại Thành Công');
    }

    public  function getCateEdit($id){
        $cate = Category::findOrFail($id)->toArray();
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('admin.module.category.edit',['dataCate' => $cate, 'parent' => $parent]);
    }

    public  function postCateEdit(CateEditRequest $request, $id){
        $cate = Category::find($id);
        $cate->name = $request->txtCateName;
        $cate->alias = str_slug($request->txtCateName);
        $cate->parent_id = $request->sltParent;
        $cate->save();
        return redirect()->route('getCateList')->with('thongbao', 'Sửa Thể Loại Thành Công');

    }
}
