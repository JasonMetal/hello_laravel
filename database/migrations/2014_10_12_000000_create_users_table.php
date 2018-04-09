<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**当我们运行迁移时，up 方法会被调用
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
//            $table->string('email')->unique();
            $table->string('email')->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**当我们回滚迁移时，down 方法会被调用。
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
