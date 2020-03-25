@extends('layouts.admin')

@section('content')
    <div class="back">
        <a class="show-back-button btn" href="{{route('admin.apartments.index')}}">Torna indietro</a>
    </div>

    <h2 class="text-center mt-5 mb-5">Scegli per quale dei tuoi appartamenti vuoi controllare i messaggi ricevuti</h2>

    <div class="container d-flex flex-wrap justify-content-around">
        @forelse ($apartments as $apartment)
            <div class="card mb-3" style="width: 18rem;">
              <img src=@if(strpos($apartment->cover_image, 'https') !== false)
                  "{{$apartment->cover_image}}"
              @else
                  "{{asset('storage/' . $apartment->cover_image)}}"
              @endif class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$apartment->sommary_title}}</h5>
                <p class="card-text">Numero Stanze: {{ $apartment->room_number }}</p>
                <p class="card-text">Numero Ospiti: {{ $apartment->guest_number }}</p>
                <p class="card-text">Metratura: {{ $apartment->square_meters}}</p>
                <a href="{{route('admin.messages.show', ['apartment' => $apartment->id] )}}" class="btn btn-primary">Vedi messaggi </a>
              </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p class="card-text">Al momento non hai registrato nessun appartamento.</p>
                </div>
            </div>
        @endforelse
    </div>


        @include('layouts.partials.footer')
@endsection
