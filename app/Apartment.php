<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{


    protected $fillable = ['id', 'user_id', 'sommary_title', 'description', 'slug', 'room_number', 'guest_number',
        'wc_number', 'square_meters', 'latitude', 'longitude' ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function services() {
        return $this->belongsToMany('App\Service');
    }
    public function messages() {
        return $this->hasMany('App\Message');
    }
}
