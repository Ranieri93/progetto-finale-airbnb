<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showCards()
     {

         $userApartments = Apartment::all()->where('user_id', '=', Auth::user()->id);
         // dd($apartments);
         return view('admin.cards-apartments', ['apartments' => $userApartments]);
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request, Apartment $apartment)
     {
         $dati = $request->all();
         // dd($dati);
         $new_message = new Message();
         $new_message->apartment_id = $apartment->id;
         $new_message->email = $dati['email'];
         $new_message->text_message = $dati['text_message'];
         // $new_message = fill($dati);
         // dd($new_message);
         $new_message->save();
         return redirect()->route('admin.search.show', ['apartment' => $apartment->id] );
         // return response()->json(
         //     [
         //         'success' => true,
         //         'results' => $new_message,
         //     ]
         //     );
     }

     // public function showCards()
     // {
     //
     //     $apartments = Apartment::all();
     //     dd($apartments);
     //     return view('admin.cards-apartments', ['apartments' => $apartments]);
     // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message, Apartment $apartment)
    {
        $messaggi_appartamento = Message::orderBy('id', 'DESC')->get();



        return view('admin.messages-show', ['apartment' => $apartment, 'messaggi_appartamento' => $messaggi_appartamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, Apartment $apartment )
    {
        // dd($message);
        $message->delete();
        return redirect()->route('admin.messages.show', ['apartment' => $apartment->id]);
    }
}
