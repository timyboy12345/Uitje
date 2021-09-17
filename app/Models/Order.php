<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;

    protected $fillable = ['user_id'];

    use HasFactory;

    public function reservations() {
        return $this->hasMany(OrderLine::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
