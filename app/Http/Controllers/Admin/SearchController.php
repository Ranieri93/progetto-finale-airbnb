<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Apartment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $apartments = Apartment::all();
        return view('admin.search', ['services' => $services , 'apartments'=> $apartments ]);
    }
}
