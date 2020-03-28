<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Service;
use App\Ad;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Braintree;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userApartments = Apartment::all()->where('user_id', '=', Auth::user()->id);
        $today = Carbon::now()->toDateTimeString(); //Passo data di oggi per verificare sponsorizzazione
        return view('admin.apartments.index', ['apartments' => $userApartments, 'today' => $today]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', [
            'services' => $services
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sommary_title' => 'required|max:255',
            'description' => 'required',
            'room_number' => 'required|numeric|min:1|max:10',
            'guest_number' => 'required|numeric|min:1|max:10',
            'wc_number' => 'required|numeric|min:1|max:3',
            'square_meters' => 'required|numeric|min:30|max:250',
            'address' => 'required|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'cover_image' => 'image'
        ]);

        $data = $request->all();
        $apartment = new Apartment();


        if (!empty($data['cover_image'])) {
            $cover_image = $data['cover_image'];
            $cover_image_path = Storage::put('uploads', $cover_image);
            $apartment->cover_image = $cover_image_path;
        }

        $apartment->fill($data);
        $apartment->slug = Str::slug($data['sommary_title']);
        $apartment->user_id = Auth::user()->id;
        $apartment->save();

        if (!empty($data['service_id'])) {
            $apartment->services()->sync($data['service_id']);
        }

        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', ['apartment' => $apartment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.edit', [
            'apartment' => $apartment,
            'services' => $services

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'sommary_title' => 'required|max:255',
            'description' => 'required',
            'room_number' => 'required|numeric|min:1|max:10',
            'guest_number' => 'required|numeric|min:1|max:10',
            'wc_number' => 'required|numeric|min:1|max:5',
            'square_meters' => 'required|numeric|min:30|max:250',
           'address' => 'required|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'cover_image' => 'image',
        ]);

        $data = $request->all();



        if (!empty($data['cover_image'])) {
            $cover_image = $data['cover_image'];

            $cover_image_path = Storage::put('uploads', $cover_image);
            $apartment->cover_image = $cover_image_path;

        }

        $apartment->update($data);

        if (!empty($data['service_id'])) {
            $apartment->services()->sync($data['service_id']);
        }

        return redirect()->route('admin.apartments.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {

        $apartment_image = $apartment->cover_image;
        if (!empty($apartment_image)) {
            Storage::delete($apartment_image);
        }

        if ($apartment->services->isNotEmpty()) {
            $apartment->services()->sync([]);
        }

        if ($apartment->ads->isNotEmpty()) {
            $apartment->ads()->sync([]);
        }

        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }

    public function adIndex(Apartment $apartment) {

        $gateway = new Braintree\Gateway ([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $today = Carbon::now()->toDateTimeString();
        //$today = Ad::getToday();

        $token = $gateway->clientToken()->generate(); //Genero token client
        return view('admin.apartments.sponsor', [
            'apartment' => $apartment,
            'token' => $token,
            'today' => $today ]);
    }

    public function adCheckout(Request $request, User $user, Apartment $apartment) {

        $data = $request->all(); //Recupero dati form

        $user_id = $data['user_id']; //Prendo user id passato dal form
        $apartment_id = $data['apartment_id']; //Prendo apartment id passato dal form

        $user_object = User::getUserData($user_id,$apartment_id)->first(); //Chiamo funzione da model User

        $ad = new Ad();

        $ad->amount = $data['amount']; //Prendo amount dal form

        if($data['amount'] == 2.99) { //Se è stata scelta l'offerta a 2.99
            $ad_end_calc = Carbon::now()->addDay()->toDateTimeString(); //Un giorno di sponsorizzazione
        } elseif($data['amount'] == 5.99) { //Se è stata scelta l'offerta a 5.99
            $ad_end_calc = Carbon::now()->addDays(3)->toDateTimeString(); //3 giorni di sponsorizzazione
        } elseif($data['amount'] == 9.99) { //Se è stata scelta l'offerta a 9.99
            $ad_end_calc = Carbon::now()->addDays(6)->toDateTimeString(); //6 giorni di sponsorizzazione
        }

        $gateway = new Braintree\Gateway ([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' =>  $user_object->name,
                'lastName' =>  $user_object->lastname,
                'email' =>  $user_object->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            $ad->ad_end = $ad_end_calc; //Salvo data di fine sponsorizzazione
            $ad->save(); //Salvo dati della sponsorizzazione nella tabella ads
            $ad->apartments()->sync($data['apartment_id']); //Collego dati tramite tabella ponte

            return redirect()->route('admin.apartments.index')->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return redirect()->route('admin.apartments.index')->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}
