<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'company', 'game_title', 'game_bio', 'images_id', 'videos_url', 'remark', 'description'
    ];
    protected $hidden = [
        ''
    ];
}
