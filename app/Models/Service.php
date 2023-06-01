<?php

namespace App\Models;
use App\Events\ServiceCreated;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected $dispatchesEvents = [
        'created' => ServiceCreated::class,
    ];

   /**
    * Get all of the bookings for the Service
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function bookings(): HasMany
   {
       return $this->hasMany(Booking::class);
   }

    use HasFactory;
}
