<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['venue_name', 'start_time', 'end_time', 'reservation_id'];

    public function reservation()
    {
    }
}
