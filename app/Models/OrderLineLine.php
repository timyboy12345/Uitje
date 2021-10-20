<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderLineLine
 * 
 * @property string id
 * @property string order_line_id
 * @property string reservation_type_line_id
 * @property string value
 * @property object data
 * @package App\Models
 */
class OrderLineLine extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ['value', 'data'];

    public function reservationTypeLine()
    {
        return $this->belongsTo(ReservationTypeLine::class);
    }

    protected $casts = [
        'data' => 'object'
    ];
}
