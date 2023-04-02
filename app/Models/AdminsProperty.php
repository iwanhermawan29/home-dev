<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminsProperty extends Model
{
    use HasFactory;

    protected $table = 'admins';


    protected $guarded = ['id'];
}
