<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->toDateTimeString(); //Passo data di oggi per verificare sponsorizzazione
        $sponsored_apartments = Apartment::GetApartmentsWithAd($today)->get(); //Richiamo funzione per ricevere 6 appartamenti sponsorizzati

        return view('public-home',
        [
            'sponsored_apartments' => $sponsored_apartments    
        ]);
    }
}
