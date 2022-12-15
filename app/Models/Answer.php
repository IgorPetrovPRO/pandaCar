<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'chat_id',
        'brief',
        'status',
        'data',
        'position',
        'statistic_id',
    ];

}
