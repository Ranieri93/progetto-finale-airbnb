@extends('layouts.admin')
@section('content')

    <div class="back">
        <a class="show-back-button btn" href="{{route('admin.apartments.index')}}">Torna indietro</a>
    </div>

    {{-- image section --}}
    <div class="show-picture">
        <img src="{{$apartment->cover_image ? asset('storage/' . $apartment->cover_image) : asset('storage/uploads/404.png') }}"
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
                    <h5>Messaggi al proprietario</h5>

                    <ul>
                      <li>Messaggio 1</li>
                      <li>Messaggio 2</li>
                      <li>Messaggio 3</li>
                      <li>Messaggio 4</li>
                      <li>Messaggio 5</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')

@endsection
