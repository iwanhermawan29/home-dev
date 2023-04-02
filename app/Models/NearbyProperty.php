<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NearbyProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'home_property_id',
        'type',
        'name',
        'distance',
        'rating',
    ];

    // public function nearby()
    // {
    //     return $this->hasMany(NearbyProperty::class);
    // }
    public function homeProperties()
    {
        return $this->belongsTo(HomeProperty::class, 'home_property_id');
    }
}
