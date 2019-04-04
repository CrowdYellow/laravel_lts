<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'title', 'key', 'desc', 'logo', 'chat_bg', 'ban_msg', 'copyright',
    ];
}
