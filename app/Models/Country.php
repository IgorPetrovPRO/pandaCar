<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    protected $fillable = [
        'name',
        'position',
        'category',
        'properties',
    ];

    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

}
