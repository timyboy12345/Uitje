<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationType extends Model
{
    public $incrementing = false;

    use HasFactory;

    public static $reservationTypesEnum = [
        'reservation',
        'extra'
    ];

    protected $fillable = ['title', 'description', 'type', 'slug'];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderLine::class);
    }

    public function reservationTypeLines() {
        return $this->hasMany(ReservationTypeLine::class);
    }
}
