<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FaqCategory extends Model
{
    protected $fillable = [
        'name',
        'position',
    ];
    public function faqs(): BelongsToMany
    {
        return $this->belongsToMany(Faq::class);
    }
}
