<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerReservation extends Model
{
    protected $fillable = [
        'no_of_people',
        'from',
        'to',
    ];
}
