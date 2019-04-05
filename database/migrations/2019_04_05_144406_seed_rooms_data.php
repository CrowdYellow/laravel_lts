<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SeedRoomsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rooms = [
            'room_id'            => 8001,
            'room_name'          => 'The master room',
            'room_key'           => 'The master room',
            'room_desc'          => 'The master room',
            'room_logo'          => '/resources/images/logo.jpg',
            'room_ban'           => '爸|妈|爷|奶|逼|操|日|干|搞',
            'logged_img_pop_up'  => 'resources/images/rooms/1.jpg',
            'visited_img_pop_up' => 'resources/images/rooms/2.jpg',
        ];

        DB::table('rooms')->insert($rooms);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('rooms')->truncate();
    }
}
