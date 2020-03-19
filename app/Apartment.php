<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Apartment extends Model
{


    protected $fillable = ['id', 'user_id', 'sommary_title', 'description', 'slug', 'room_number', 'guest_number',
        'wc_number', 'square_meters', 'address', 'latitude', 'longitude' ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function services() {
        return $this->belongsToMany('App\Service');
    }
    public function messages() {
        return $this->hasMany('App\Message');
    }
    public function ads() {
        return $this->belongsToMany('App\Ad');
    }

    public function scopeGetApartmentsWithAd($query,$today) { //Query che prende appartamenti sponsorizzati
        return $apartments_ads = DB::table('apartments') //Recupero dati degli appartamenti
                                ->join('ad_apartment','apartments.id', '=', 'ad_apartment.apartment_id') //Join su tabella ponte
                                ->join('ads','ad_apartment.ad_id', '=', 'ads.id') //Join su tabella Ads
                                ->where(function($query) use ($today){ $query->where('ads.ad_end', '>', $today);})
                                ->take(6) //Prendo al massimo sei risultati
                                ->select('apartments.id','sommary_title','description','address','cover_image');
    }
}
