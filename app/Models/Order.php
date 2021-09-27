<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property OrderLine[] orderLines
 * @property User user
 */
class Order extends Model
{
    public $incrementing = false;

    use HasFactory, SoftDeletes;

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the name of this reservation, defaults to the name of the user
     * @return string
     */
    public function getNameAttribute(): string
    {
        $upperOrderLine = $this->orderLines()->whereHas('reservationType', function($query) {
            $query->where('type', 'reservation');
        })->first();

        if (isset($upperOrderLine)) {
            return $upperOrderLine->reservationType->title;
        }

        return $this->getDateAttribute() ?? $this->user->name;
    }

    public function getDateAttribute()
    {
        $this->orderLines()->each(function($line) {
            if (isset($line->date)) {
                return $line->date;
            }
        });

        return 'geen datum';
    }
}
