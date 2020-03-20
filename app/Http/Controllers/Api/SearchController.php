<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index() {
        $apartments = Apartment::all();
//        $serivces = Service::all();

        return response()->json(
            [
            'success' => true,
            'results' => $apartments
            ]);
    }
}
