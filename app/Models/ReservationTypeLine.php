<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservationTypeLine
 * @property string id
 * @property string reservation_type_id
 * @property string label
 * @property string description
 * @property string placeholder
 * @property string type
 * @property boolean is_required
 * @package App\Models
 */
class ReservationTypeLine extends Model
{
    public $incrementing = false;

    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'placeholder',
        'is_required'
    ];

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
