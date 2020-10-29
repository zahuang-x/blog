<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends BaseController
{
    public function index(){
        $data = User::Orderby('id','asc')->withTrashed()->paginate($this->pagesize);
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
    public function del(int $id){
        User::find($id)->delete();
        return ['status'=>0,'msg'=>'削除しました'];
    }
    public function restore(int $id){
        User::onlyTrashed()->where('id',$id)->restore();
        return redirect(route('admin.user.index'))->with('success','ユーザーは還元しました');
    }
    public function delall(Request $request){
        $ids = $request->get('id');
        User::destroy($ids);
        return ['status'=>0,'msg'=>'ロート削除しました'];
    }
    public function edit(int $id){
        $model = User::find($id);
        return view('admin.user.edit',compact('model'));
    }
    public function update(Request $request,int $id) {
        $model = User::find($id);

        // 原密码  明文
        $pass = $request->get('spassword');
        // 原密码 密文
        $spass = $model->password;

        // 检查明文和密码是否一致
        $bool = Hash::check($pass,$spass);

        if($bool){
            // 修改
            $data = $request->only([
                'truename',
                'password',
                'phone',
                'sex',
                'email'
            ]);
            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }
            $model->update($data);
            return redirect(route('admin.user.index'))->with('success','更新しました');
        }
        return redirect(route('admin.user.edit',$model))->withErrors(['error'=>'古パスワードは一致してません']);
    }
}
