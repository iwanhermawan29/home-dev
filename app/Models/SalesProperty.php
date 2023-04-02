<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesProperty extends Model
{
    use HasFactory;


    protected $table = 'sales';


    protected $guarded = ['id'];
}
