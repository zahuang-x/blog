<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;
//软删除类
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends AuthUser
{
    //调用trait类 与继承效果相同
    use SoftDeletes;
    //软删除标识字段
    protected  $dates = ['deleted_at'];
    //设计添加字段(不允许的为空)
    protected $guarded = [];
    //隐藏密码
    protected $hidden = ['password'];
}
