<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderLine
 * @property Order order
 * @property ReservationType reservationType
 * @property OrderLineLine[] orderLineLines
 * @property DateTime date
 * @property integer participants
 * @property integer accompanists
 * @package App\Models
 */
class OrderLine extends Model
{
    public $incrementing = false;

    use HasFactory, SoftDeletes;

    protected $fillable = ['date', 'participants', 'accompanists'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function reservationType() {
        return $this->belongsTo(ReservationType::class);
    }

    public function orderLineLines() {
        return $this->hasMany(OrderLineLine::class);
    }

    protected $casts = [
        'date' => 'datetime'
    ];
}
