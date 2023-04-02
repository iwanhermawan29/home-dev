<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function homeProperties()
    {
        return $this->belongsTo(HomeProperty::class, 'home_property_id');
    }
}
