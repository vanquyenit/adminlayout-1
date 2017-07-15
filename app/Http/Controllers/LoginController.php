<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use DateTime, File;
class LoginController extends Controller
{
    public function redirect_login(){
        return redirect('admin/login');
    }
    //-- ADMIN LOGIN
    public function getlogin(){
        if (Auth::check()) {
            if(Auth::user()->level_id == 1)
            {
                return redirect('admin');
            }else{
                return view('admin.module.login.login');
            }
        }else{
            return view('admin.module.login.login');
        }
    }
    public function postlogin(Request $request){
        $data = [ 'email' => $request->email,
                'password' => $request->password,
                'level_id' => 1];
        if (Auth::attempt($data)) {
            return redirect('admin');
        }else{
            return redirect()->back()->with('thongbao', 'Đăng nhập sai, vui lòng nhập chính xác thông tin');
        }
    }
    public function getlogout(){
        Auth::logout();
        return redirect()->route('getlogin');
    }


    //---- USER LOGIN
    public function getUserlogin(){
        return view('frontend.pages.login');
    }

    public function getUserRegister(){
        return view('frontend.pages.register');
    }

    public function postUserReg(Request $request){
        $user           = new User;
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

        $user->level_id = 2;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('getuserlogin');
    }

    public function postUserlogin(Request $request){
        $data = [ 'email' => $request->email,
            'password' => $request->password,
            'level_id' => 2];
        if (Auth::attempt($data)) {
            return redirect()->route('getIndex');
        }else{
            return redirect()->back();
        }
    }

    public function getUserlogout(){
        Auth::logout();
        return redirect()->route('getuserlogin');
    }

}
