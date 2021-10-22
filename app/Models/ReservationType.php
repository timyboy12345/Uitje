<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReservationType
 *
 * @property string id
 * @property string title
 * @property string description
 * @property string type
 * @property string slug
 * @property string date_type
 * @property boolean has_participants
 * @property boolean has_accompanists
 * @property double price
 * @property string organization_id
 * @property string image
 * @package App\Models
 */
class ReservationType extends Model
{
    public $incrementing = false;

    use HasFactory, SoftDeletes;

    public static $reservationTypesEnum = [
        'reservation',
        'extra',
    ];

    protected $fillable = [
        'title',
        'description',
        'type',
        'slug',
        'date_type',
        'has_participants',
        'has_accompanists',
        'price',
        'min_accompanists',
        'max_accompanists',
        'min_participants',
        'max_participants',
    ];

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
        'has_accompanists' => 'boolean',
    ];

    public function associated()
    {
        return $this->belongsToMany(ReservationType::class, null, 'parent_id', 'child_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
