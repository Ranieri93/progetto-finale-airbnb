<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname', 'birthdate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function apartments() {
        return $this->hasMany('App\Apartment');
    }

    public function scopeGetUserData($query,$user,$apartment) {
        return $user_apartment_data = DB::table('users') //Recupero dati dell'appartamento e del proprietario
                    ->join('apartments','users.id','=','apartments.user_id') //Join tra tabella user e apartments
                    ->where(function($query) use ($user){ $query->where('apartments.user_id', '=', $user);}) //Cerco tutti gli appartamenti dell'user loggato
                    ->where(function($query) use ($apartment){ $query->where('apartments.id', '=', $apartment);}) //Cerco appartamento da sponsorizzare
                    ->select('name','lastname','email');
    }
}
