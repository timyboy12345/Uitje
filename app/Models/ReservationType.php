<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReservationType
 * @property string id
 * @property string title
 * @property string description
 * @property string type
 * @property string slug
 * @property string date_type
 * @property boolean has_participants
 * @property boolean has_accompanists
 * @package App\Models
 */
class ReservationType extends Model
{
    public $incrementing = false;

    use HasFactory, SoftDeletes;

    public static $reservationTypesEnum = [
        'reservation',
        'extra'
    ];

    protected $fillable = ['title', 'description', 'type', 'slug', 'date_type', 'has_participants', 'has_accompanists'];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderLine::class);
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function reservationTypeLines()
    {
        return $this->hasMany(ReservationTypeLine::class);
    }

    protected $casts = [
        'has_participants' => 'boolean',
        'has_accompanists' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(ReservationType::class);
    }

    public function children()
    {
        return $this->hasMany(ReservationType::class);
    }
}
