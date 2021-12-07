<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Poi
 *
 * @property string id
 * @property string organization_id
 * @property string name
 * @property string shortname
 * @property string description
 * @property string content
 * @property float lat
 * @property float lng
 * @property float entrance_lat
 * @property float entrance_lng
 * @property boolean is_enabled
 * @package App\Models
 */
class Poi extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'shortname',
        'description',
        'content',
        'lat',
        'lng',
        'entrance_lat',
        'entrance_lng',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];
}
