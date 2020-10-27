<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//引入对应命名空间
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //自定义验证规则（参数1：规则名，）
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            $reg = '/(\+?81|0)\d{1,4}[ \-]?\d{1,4}[ \-]?\d{4}$/';
            return preg_match($reg,$value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
