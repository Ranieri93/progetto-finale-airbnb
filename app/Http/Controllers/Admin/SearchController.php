<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Apartment;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function searchApartment (Request $request)
    {
        $data = $request -> all();
        $services = Service::all();
        $filteredAptsAndDists = $this->getApartmentsAndDistances($data["latitude"], $data["longitude"], 50, Apartment::all());
        $request->session()->put('searchedAddressLat', $data["latitude"]);
        $request->session()->put('searchedAddressLon', $data["longitude"]);
        $request->session()->put('apartmentsAndDistances', $filteredAptsAndDists);
        $request->session()->save();
        return view('admin.search', [
            'services' => $services,
            'filteredApartments' => $filteredAptsAndDists
        ]);

    }

    public function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius) {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
        $angle = atan2(sqrt($a), $b);

        return $angle * $earthRadius;
    }

    public function getApartmentsAndDistances($startTimeLat, $startTimeLon, $radius, $apartments) {
        $filteredAptsAndDists = [];
        foreach($apartments as $apartment) {
            $distance = $this->distance($startTimeLat, $startTimeLon, $apartment->latitude, $apartment->longitude, 6371);
            if ($distance < $radius) {
                $filteredAptsAndDists[]  = array(
                    "apartment" => $apartment,
                    "distance" => $distance
                );
            }
        }
        return $filteredAptsAndDists;
    }


    public function AdvancedSearch(Request $request)
    {
        $AllApartments = Apartment::all();
        $data = $request->all();

        $numOfRooms = $data["rooms"];
        $numOfGuests = $data["guests"];
        $radius = $data["radius"];
        if (isset($data["services"])) {
            $services = $data["services"];
        } else {
            $services = [];
        }

        $geoFiltApt = [];
        $finalApts =[];
        if ($radius != 50) {
            $geoFiltApt = $this->getApartmentsAndDistances(
                $request->session()->get("searchedAddressLat"),
                $request->session()->get("searchedAddressLon"),
                $radius,
                Apartment::all()
            );

            foreach ($geoFiltApt as $singelFileterdApt) {
                if($singelFileterdApt["apartment"]->room_number == $numOfRooms &
                    $singelFileterdApt["apartment"]->guest_number == $numOfGuests)
                {
                    $finalApts[] = $singelFileterdApt;
                }

            }
        } else {
            foreach ($request->session()->get('apartmentsAndDistances') as $singelFileterdApt) {
                if($singelFileterdApt["apartment"]->room_number == $numOfRooms &
                    $singelFileterdApt["apartment"]->guest_number == $numOfGuests)
                {
                    $finalApts[] = $singelFileterdApt;
                }
            }
        }

        return response()->json(compact("finalApts"));
    }


    public function show(Apartment $apartment)
    {
        return view('admin.search-show-apartment', ['apartment' => $apartment]);
    }

}
