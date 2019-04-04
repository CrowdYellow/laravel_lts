<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedConfigsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $configs = [
            'title'     => 'The title of laravel chat',
            'key'       => 'The key of laravel chat',
            'desc'      => 'The desc of laravel chat',
            'logo'      => '/resources/images/logo.jpg',
            'chat_bg'   => '/resources/images/theme/12_mh.jpg',
            'ban_msg'   => '爸|妈|爷|奶|逼|操|日|干|搞',
            'copyright' => 'laravel.chat',
        ];

        \Illuminate\Support\Facades\DB::table('configs')->insert($configs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::table('configs')->truncate();
    }
}
