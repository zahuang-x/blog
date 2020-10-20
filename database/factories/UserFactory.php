<?php

use Faker\Generator as Faker;
//生成模拟数据的工厂格式
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker -> userName,
        'truename' => $faker -> name(),
        'password' => bcrypt('admin666'),
        'email' => $faker -> email,
        'phone' => $faker -> phoneNumber,
        'sex' => ['男性','女性'][rand(0,1)]
    ];
});
