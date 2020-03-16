@extends('layouts.public')
@section('content')

    <div class="back">
        <a class="show-back-button btn" href="{{route('search')}}">Torna indietro</a>
    </div>

    {{-- image section --}}
    <div class="show-picture">
        <img src="{{$apartment->cover_image}}"
        alt="{{$apartment->sommary_title}}" class="card-img-top" alt="...">
        <h3 class="title">{{$apartment->sommary_title}}</h3>
    </div>



    <div class="row details">
        <div class="description col-sm-8 col-xs-6">
            {{ $apartment->description }}
        </div>

        <div class="options col-sm-4 col-xs-6">
            <div class="card">
                <div class="card-body">


                    <ul class="list-group list-group-flush">
                        {{-- <li class="list-group-item">Slug: <br> {{ $apartment->slug }}</li> --}}
                        <li class="list-group-item">Numero Stanze: <br> {{ $apartment->room_number }}</li>
                        <li class="list-group-item">Numero Ospiti: <br> {{ $apartment->guest_number }}</li>
                        <li class="list-group-item">Numero Bagni: <br> {{ $apartment->wc_number}}</li>
                        <li class="list-group-item">Metratura: <br> {{ $apartment->square_meters}}</li>
                        <li class="list-group-item">
                            @forelse($apartment->services as $service)
                                {{$service->name}} {{$loop->last ? '' : '-'}}
                            @empty
                                -
                            @endforelse

                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- MAP SECTION --}}
    <div class="row details">
        <div class="map-content col-sm-8 col-xs-6">
            <div class="map"></div>
        </div>

        <div class="messages col-sm-4 col-xs-6">
            <div class="card">
                <div class="card-body">
                    <h5>Scrivi un messaggio al proprietario</h5>
                    <form class="" action="{{route('message.store', ['apartment' => $apartment->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"
                                   name="email" id="email"  placeholder="Scrivi qui la tua mail.." value="">
                        </div>
                        <div class="form-group">
                            <label for="text_message">Messaggio</label>
                            <textarea class="form-control" name="text_message" placeholder="Scrivi un messaggio.." id="text_message" cols="80" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" value='Invia messaggio'>Invia messaggio</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')

@endsection