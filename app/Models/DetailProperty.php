<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function homeProperties()
    {
        return $this->belongsTo(HomeProperty::class, 'home_property_id');
    }

    // protected $fillable = [
    //     'home_property_id',
    //     'type',
    //     'bedroom',
    //     'bathroom',
    //     'garage',
    //     'area',
    //     'price',
    //     'status',
    //     'video',
    //     'map',
    //     'lat',
    //     'lng',
    //     'year',
    //     'roof',
    //     'floor',
    //     'heating',
    //     'image_plan',
    //     'land_area',
    //     'building_area',
    // ];
}
