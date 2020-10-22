<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index.index');
    }

    public function welcome(){
        return view('admin.index.welcome');
    }

    public function logout(){
        auth()->logout();
        return redirect(route('admin.login'))->with('success','再登録してください');
    }
}
