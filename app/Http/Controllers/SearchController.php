<?php

namespace App\Http\Controllers;

use App\Service;
use App\Apartment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $services= Service::all();
        $apartments = Apartment::all();
        return view('public-search', ['services' => $services, 'apartments'=> $apartments]);
    }
    public function show(Apartment $apartment)
    {
        return view('public-search-show-apartment', ['apartment' => $apartment]);
    }
}
