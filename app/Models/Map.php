<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Map
 *
 * @property string id
 * @property string organization_id
 * @property string name
 * @property string image
 * @property Organization organization
 */
class Map extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'image',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
