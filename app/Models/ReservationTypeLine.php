<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTypeLine extends Model
{
    public $incrementing = false;

    use HasFactory;

    public static $reservationTypeLineEnum = [
        'string',
        'number',
        'text',
        'address',
    ];

    public function reservationType() {
        return $this->belongsTo(ReservationType::class);
    }

    protected $casts = [
        'is_required' => 'boolean'
    ];
}
