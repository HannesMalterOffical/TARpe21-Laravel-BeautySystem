<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = [
        'booking_time',
    ];

    use HasFactory;
    /**
     * Get the service associated with the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service(): HasOne
    {
        return $this->hasOne(service::class);
    }
    /**
     * Get the client associated with the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class);
    }
    /**
     * Get the server associated with the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function server(): HasOne
    {
        return $this->hasOne(server::class);
    }
}
