<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $fillable = [
        'faq_category_id',
        'question',
        'answer',
    ];
    public function categories(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class);
    }
}
