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
        $apartments = Apartment::all();
        $today = Carbon::now()->toDateTimeString(); //Passo data di oggi per verificare sponsorizzazione
        return view('public-home',['apartments' => $apartments, 'today' => $today]);
    }
}
