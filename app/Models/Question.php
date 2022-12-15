<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'brief',
        'message',
        'position',
        'keyboard',
        'properties',
    ];
}
