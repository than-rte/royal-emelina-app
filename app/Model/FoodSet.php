<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FoodSet extends Model
{
    protected $fillable = [
        'name', 
        'per_head_price'
    ];
}
