<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'from',
    ];
}
