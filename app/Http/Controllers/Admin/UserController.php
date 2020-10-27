<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(){
        $data = User::paginate($this->pagesize);
        return view('admin.user.index',compact('data'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $this->validate($request,[
           'username' => 'required|unique:users,username',
           'truename' => 'required',
           'password' => 'required|confirmed',
            'phone' => 'nullable|phone',
        ],[
            'phone.phone' => '正しく携帯番号を入力してください'
        ]);
        //获取表单并添加用户入库
        User::create($request->except(['_token','password_confirmation']));
        return redirect(route('admin.user.index'))->with('success','新ユーザーは追加しました');
    }
}
