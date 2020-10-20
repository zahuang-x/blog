<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(){
        //判断用户是否已登陆
        if(auth()->check()){
            return redirect(route('admin.index'));
        }
        return view('admin.login.login');
    }

    public function login(Request $request){
        $post = $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'ユーザーは　必ず指定してください',
            'password.required' => 'パスワードは　必ず指定してください'
        ]);
        //登陆
        $bool = auth() -> attempt($post);
        if($bool){
            return redirect(route('admin.index'));
        }
        return redirect(route('admin.login')) -> withErrors(['error'=> '認証失敗']);
    }
}