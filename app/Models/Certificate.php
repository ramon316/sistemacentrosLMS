<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'unique_code',
        'issued_at',
        'final_score',
        'pdf_url',
        'is_valid',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'final_score' => 'decimal:2',
        'is_valid' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
