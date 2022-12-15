<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveBrief extends Model
{
    protected $fillable = [
        'chat_id',
        'brief',
    ];
}
