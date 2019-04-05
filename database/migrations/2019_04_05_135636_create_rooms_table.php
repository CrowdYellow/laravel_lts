<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_id')->unique();
            $table->string('room_name')->unique();
            $table->string('room_key');
            $table->string('room_desc');
            $table->string('room_logo');
            $table->text('room_ban');
            $table->string('room_bg')->default('resources/images/login_bg.jpg');
            $table->string('status')->default('T');
            $table->integer('visited_time')->default(5)->comment('观看时间');
            $table->string('logged_img_pop_up')->nullable()->comment('登陆后的弹窗');
            $table->string('visited_img_pop_up')->nullable()->comment('登陆前的弹窗');
            $table->string('banned')->default('F');
            $table->integer('time_interval')->default(5)->comment('发言间隔');
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
        Schema::dropIfExists('rooms');
    }
}
