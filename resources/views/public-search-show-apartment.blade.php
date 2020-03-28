@extends('layouts.public')
@section('content')
{{-- image section --}}
<div class="show-picture">
    <img src=@if(strpos($apartment->cover_image, 'https') !== false)
    "{{$apartment->cover_image}}"
    @else
    "{{asset('storage/' . $apartment->cover_image)}}"
    @endif
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
        <div id="map" class="map"></div>
    </div>
    <script>
        var myCoordinates = [{{$apartment-> longitude}}, {{$apartment->latitude}}];
        var myAddress = ['{{$apartment->address}}'];

        var map = tt.map({
            key: 'bFSI4kMwJMdayytGsYArg3lzUM1wsCjG',
            container: 'map',
            style: 'tomtom://vector/1/basic-main',
            center: myCoordinates,
            zoom: 12
        });
        var marker = new tt.Marker().setLngLat(myCoordinates).setPopup(new tt.Popup({
                offset: 35
            })
            .setHTML(myAddress)).addTo(map);
    </script>
    <script>
        function ConfermaOperazione() {
            var richiesta = window.confirm("Il tuo messaggio è stato inviato con successo, ti risponderemo il prima possibile! clicca 'OK' per proseguire");
            return richiesta;
        }
    </script>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["email"].value;
            var y = document.forms["myForm"]["text_message"].value;
            if (x == "" || x == null || y == "" || y == null) {
                alert("Controlla i tuoi dati");
                return false;
            } else {
                ConfermaOperazione();
            }
        }
    </script>
    <div class="messages col-sm-4 col-xs-6">
        <div class="card">
            <div class="card-body">
                <h5>Scrivi un messaggio al proprietario</h5>
                <form name="myForm" onsubmit="return validateForm()" action="{{route('message.store', ['apartment' => $apartment->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="prova form-control" name="email" id="email" placeholder="Scrivi qui la tua mail.." value="">
                    </div>
                    <div class="form-group">
                        <label for="text_message">Messaggio</label>
                        <textarea class="prova form-control" name="text_message" placeholder="Scrivi un messaggio.." id="text_message" cols="80"></textarea>

                    </div>
                    <div class="form-group">
                    </div>
                    <button id="myElement" type="submit" class="btn btn-primary" value='Invia messaggio'>Invia messaggio</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.footer')
@endsection
