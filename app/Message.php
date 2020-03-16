<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email', 'text_message',
    ];
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
