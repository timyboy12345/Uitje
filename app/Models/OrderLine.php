<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    public $incrementing = false;

    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function reservationType() {
        return $this->belongsTo(ReservationType::class);
    }
}
