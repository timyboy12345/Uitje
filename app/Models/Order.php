<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @property OrderLine[] orderLines
 * @property string id The UUID of this order
 * @property string user_id The UUID of the user attached to this order
 * @property string confirmation_code The confirmation code of this order
 * @property User user
 * @property string organization_id The organisation UUID
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

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Returns the name of this reservation, defaults to the name of the user
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        /** @var ?OrderLine $upperOrderLine */
        $upperOrderLine = $this->orderLines()->whereHas('reservationType', function ($query) {
            $query->where('type', 'reservation');
        })->first();

        if (isset($upperOrderLine)) {
            return $upperOrderLine->reservationType->title;
        }

        $date = $this->getDateAttribute();
        if (isset($date)) {
            return $date;
        }

        return isset($this->user) ? $this->user->name : $this->id;
    }

    /**
     * @return string|null
     */
    public function getDateAttribute(): ?string
    {
        /** @var OrderLine $upperOrderLine */
        $upperOrderLine = $this->orderLines()->whereHas('reservationType', function ($query) {
            $query->where('type', 'reservation')
                ->whereNotNull('date');
        })->first();

        if (isset($upperOrderLine)) {
            return $upperOrderLine->date;
        }

        return null;
    }


    /**
     * Returns the main reservation of this order
     *
     * @return OrderLine|null
     */
    private function getMainReservation(): ?OrderLine
    {
        return $this->orderLines()->whereHas('reservationType', function ($query) {
            $query->where('type', 'reservation')
                ->whereNotNull('date');
        })->first();
    }

    public function getMainReservationAttribute(): ?OrderLine
    {
        return $this->getMainReservation();
    }
}
