<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 *
 * @package App\Models
 * @property string id
 * @property string name
 * @property string subdomain
 * @property string domain
 * @property string phonenumber
 */
class Organization extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reservationTypes()
    {
        return $this->hasMany(ReservationType::class);
    }

    public function frequentlyAskedQuestions()
    {
        return $this->hasMany(FrequentlyAskedQuestion::class);
    }
}
