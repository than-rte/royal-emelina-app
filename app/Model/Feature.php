<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name, venue_id'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
