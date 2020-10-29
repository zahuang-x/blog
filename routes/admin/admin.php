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
        //用户添加显示
        Route::get('user/add','UserController@create')->name('admin.user.create');
        //用户添加处理
        Route::post('user/add','UserController@store')->name('admin.user.store');
        // 删除用户
        Route::delete('user/del/{id}', 'UserController@del')->name('admin.user.del');
        //用户还原
        Route::get('user/restore/{id}','UserController@restore')->name('admin.user.restore');
        //全选删除
        Route::delete('user/delall','UserController@delall')->name('admin.user.delall');
        //修改用户展示
        Route::get('user/edit/{id}','UserController@edit')->name('admin.user.edit');
        //修改用户处理
        Route::put('user/edit/{id}','UserController@update')->name('admin.user.edit');

    });
});