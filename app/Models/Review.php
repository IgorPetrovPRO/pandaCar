<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'description',
        'media',
        'media_type',
        'author_link',
        'city',
    ];

}
