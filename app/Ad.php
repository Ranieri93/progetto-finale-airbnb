<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ad extends Model
{
    protected $fillable = ['id', 'amount','ad_end'];

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
