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
}
