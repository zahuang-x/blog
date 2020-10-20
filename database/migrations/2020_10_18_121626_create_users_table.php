<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * ユーザー一覧
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50)->comment('ユーザー');
            $table->string('truename',50)->default('不明')->comment('名前');
            $table->string('password',255)->comment('パスワード');
            $table->string('email',50)->default('')->comment('メール');
            $table->string('phone',50)->default('')->comment('携帯');
            $table->enum('sex',['男性','女性'])->default('男性')->comment('性別');
            $table->char('last_ip',15)->default('')->comment('ログインIP');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
