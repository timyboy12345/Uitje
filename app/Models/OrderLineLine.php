<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLineLine extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ['value', 'data'];

    public function reservationTypeLine() {
        return $this->belongsTo(ReservationTypeLine::class);
    }
}
