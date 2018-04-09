<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->default("");
            $table->text('content');
            $table->integer('user_id')->default(0);
            $table->timestamps(); //默认创建create_at update_at
        });
    }

    /**
     * Reverse the migrations.
     *回滚
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('users');
    }
}
