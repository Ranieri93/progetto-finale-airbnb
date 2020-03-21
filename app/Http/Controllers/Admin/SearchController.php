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
        $request->session()->put('searchedAddresLon', $data["longitude"]);
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

    public function matchesFilters($apartment, $numOfRooms, $numOfBeds, $services) {
        // se l'appartamento ha lo stesso numero di stanze e letti passati in input
        if ($apartment->rooms == $numOfRooms && $apartment->beds == $numOfBeds) {
            /* si controlla anche che abbia come servizi gli stessi passati in input */
            $servicesMatch = false;
            // se il numero di servizi passati in input è lo stesso numero di servizi dell'appartamento
            if (count($services) === count($apartment->services)) {
                $numOfMatches = 0;
                // per ogni servizio tra quelli passati in input
                foreach ($services as $service) {
                    // se il servizio è presente tra servizi dell'appartamento
                    foreach($apartment->services as $aptmService) {
                        if ($service === $aptmService->type) {
                            $numOfMatches++;
                            break;
                        }
                    }
                }
                if ($numOfMatches === count($services)) $servicesMatch = true;
            }

            return $servicesMatch;
        }
    }

    public function AdvancedAptSearch(Request $request) {

        $data = $request -> all();
        dd($data);

        $numOfRooms = $data["rooms"];
        $numOfBeds = $data["beds"];
        $radius = $data["radius"];
        if (isset($data["services"])) {
            $services = $data["services"];
        }
        else {
            $services = [];
        }

        $aptsAndDists = [];
        $filteredAptsAndDists = [];


        if ($radius != 50) {
            $aptsAndDists = $this->getApartmentsAndDistances(
                $request->session()->get("searchedAddressLat"),
                $request->session()->get("searchedAddressLon"),
                $radius,
                Apartment::all()
            );
            foreach($aptsAndDists as $aptAndDist) {
                if($this->matchesFilters($aptAndDist["apartment"], $numOfRooms, $numOfBeds, $services)) {
                    $filteredAptsAndDists[] = $aptAndDist;
                }
            }
        }
        else
        {
            foreach($request->session()->get('apartmentsAndDistances') as $aptAndDist) {
                if($this->matchesFilters($aptAndDist["apartment"], $numOfRooms, $numOfBeds, $services)) {
                    $filteredAptsAndDists[] = $aptAndDist;
                }
            }
        }

        return response()->json(compact("filteredAptsAndDists"));
    }


    public function show(Apartment $apartment)
    {
        return view('admin.search-show-apartment', ['apartment' => $apartment]);
    }

}
