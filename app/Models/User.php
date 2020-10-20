<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //设计添加字段
    protected $guarded = [];
    //隐藏密码
    protected $hidden = ['password'];
}
