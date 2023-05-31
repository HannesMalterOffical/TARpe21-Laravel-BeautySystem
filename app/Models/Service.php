<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'basePrice_cents',
        'duration_minutes',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    use HasFactory;
}