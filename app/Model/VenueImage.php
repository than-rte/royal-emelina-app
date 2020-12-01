<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VenueImage extends Model
{
    protected $fillable = [
        'image_url', 'venue_id'
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
