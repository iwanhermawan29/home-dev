<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesProperty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function homeProperties()
    {
        return $this->belongsTo(HomeProperty::class, 'home_property_id');
    }
}
