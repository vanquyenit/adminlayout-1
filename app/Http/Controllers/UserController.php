<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Requests\UserAddRequest;
use DateTime, File;
class UserController extends Controller
{
    public function getUserAdd(){
        return view('admin.module.user.add');
    }

    public function postUserAdd(UserAddRequest $request){
        $user = new User;
        $file			= $request->avatar_file;
        $user->username = $request->txtUser;
        $user->password = Hash::make($request->txtPass);
        $user->email = $request->txtEmail;
        $user->fullname = $request->txtFullname;
        $user->registration_date = new DateTime;
        $user->phone = $request->txtPhone;
        $user->address = $request->txtAddress;
//        $user->avatar = $request->avatar_file;

        if(strlen($file) > 0){
            $filename = time() . "." . $file->getClientOriginalName();
            $path = ('public/admin/upload_avatar/');
            $file->move($path, $filename);
            $user->image = $filename;
//            echo $path;
        }

        $user->level_id = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('getUserList')->with('thongbao', 'Thêm Người dùng thành công');

    }

    public function getUserList(){
        $users = User::all();
        return view('admin.module.user.list', compact('users'));
    }

    public function getUserEdit($id){
        $user = User::find($id);
        return view('admin.module.user.edit', compact('user'));
    }




}
