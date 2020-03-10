<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{


    protected $fillable = ['id', 'user_id', 'sommary_title', 'room_number', 'guest_number',
        'wc_number', 'square_meters', 'latitude', 'longitude', 'cover_image' ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
