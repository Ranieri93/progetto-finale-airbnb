@extends('layouts.admin')

@section('content')
    <div class="back">
        <a class="show-back-button btn" href="{{route('admin.apartments.index')}}">Torna indietro</a>
    </div>

    {{-- image section --}}
    <div class="show-picture">
        <img src="{{$apartment->cover_image}}"
        alt="{{$apartment->sommary_title}}" class="card-img-top" alt="...">
        <h3 class="title">{{$apartment->sommary_title}}</h3>
    </div>
    <br>
    <br>
    <h2 class="text-center">Ecco i messaggi che hai ricevuto per questo appartamento</h2>
    <br>
    <br>
    <div class="container">

        @forelse ($messaggi_appartamento as $messaggio)
            @if ($messaggio->apartment_id == $apartment->id)
                <div class="row">
                    <div class="media">
                      <img src="https://media.wponlinesupport.com/wp-content/uploads/2015/02/how-to-change-wordpress-from-email-header.jpg" class="align-self-start mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0">{{$messaggio->email}}</h5>
                        <p>{{$messaggio->text_message}}</p>
                      </div>
                    </div>
                </div>
                <hr>
            @endif



        @empty


                <div class="row">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body">
                        <p class="card-text">Non hai ricevuto messaggi. Se vuoi che il tuo appartamento sia in evidenza rispetto agli altri nei risultati di ricerca, sponsorizzalo!</p>
                      </div>
                    </div>
                </div>


        @endforelse
    </div>

        @include('layouts.partials.footer')
@endsection
