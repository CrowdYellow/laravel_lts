<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32)->unique();
            $table->bigInteger('phone')->unique();
            $table->string('nickname', 32)->nullable()->unique();
            $table->string('remarks')->nullable()->comment('备注');
            $table->string('password');
            $table->string('register_ip');
            $table->string('avatar');
            $table->integer('group_id')->default(1);
            $table->integer('integral')->default(0)->comment('积分');
            $table->integer('room_id')->default(8001)->comment('房间号');
            $table->integer('banned')->default(0)->comment('禁言状态');
            $table->integer('status')->default(0)->comment('用户状态');
            $table->timestamp('last_active_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
