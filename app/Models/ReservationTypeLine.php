<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class ReservationTypeLine
 *
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
    use HasFactory, HasTranslations;

    public $incrementing = false;

    protected $fillable = [
        'label',
        'description',
        'placeholder',
        'is_required',
    ];

    public static $reservationTypeLineEnum = [
        'string',
        'number',
        'text',
        'address',
    ];

    public $translatable = [
        'label',
        'description',
        'placeholder',
    ];

    public function reservationType()
    {
        return $this->belongsTo(ReservationType::class);
    }

    protected $casts = [
        'is_required' => 'boolean',
    ];
}
