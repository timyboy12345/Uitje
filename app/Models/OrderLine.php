<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderLine
 *
 * @property string id
 * @property string order_id
 * @property Order order
 * @property string reservation_type_id
 * @property ReservationType reservationType
 * @property string organization_id
 * @property Organization organization
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

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function reservationType()
    {
        return $this->belongsTo(ReservationType::class)->withTrashed();
    }

    public function orderLineLines()
    {
        return $this->hasMany(OrderLineLine::class);
    }

    protected $casts = [
        'date' => 'datetime',
    ];
}
