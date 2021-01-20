<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venue extends Model
{
    protected $fillable = [
        'name',
        'content',
        'min_people',
        'max_people',
        'user_id'
    ];

    static public function allWithUserDetails($user_id)
    {
        $query = DB::table('venues')
            ->join('users', 'venues.user_id', '=', 'users.id')
            ->select('venues.*')->where('venues.user_id', '=', $user_id);
        return $query;
    }

    static public function allOfUser($user_id)
    {
        $query = DB::table('venues')
            ->select('venues.*')->where('venues.user_id', '=', $user_id);
        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(VenueImage::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
