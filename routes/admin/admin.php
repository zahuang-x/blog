<?php
//后台路由
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    //登陆显示
    Route::get('login','LoginController@index')->name('admin.login');
    //登陆处理
    Route::post('login','LoginController@login')->name('admin.login');

    Route::group(['middleware' => ['ckadmin']],function(){
        //首页展示
        Route::get('index','IndexController@index')->name('admin.index');
        //欢迎页面
        Route::get('welcome','IndexController@welcome')->name('admin.welcome');
        //用户退出
        Route::get('logout','IndexController@logout')->name('admin.logout');
        //用户列表
        Route::get('user/index','UserController@index')->name('admin.user.index');
    });
});