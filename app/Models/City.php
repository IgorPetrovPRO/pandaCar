<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    protected $fillable = [
        'name',
        'country_id',
        'additional_cost',
    ];
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
