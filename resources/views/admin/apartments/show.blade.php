@extends('layouts.admin')
@section('content')
    {{-- image section --}}
    <div class="card apt-img">
        <img src="{{$apartment->cover_image ? asset('storage/' . $apartment->cover_image) : asset('storage/uploads/404.png') }}"
        alt="{{$apartment->sommary_title}}" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text apt-title"> {{$apartment->sommary_title}}</p>
        </div>
    </div>

    <div class="container" style="width:100%">
        <div class="d-flex" style="">
            <div class="p-2 flex-grow-* bd-highlight">
                <p>Descrizione
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos minus debitis officiis delectus, reprehenderit voluptas! Architecto nam laborum ab voluptatem, repudiandae, ratione consequuntur ullam illum, consequatur accusantium aspernatur assumenda ipsam.
                </p>
            <p>{{ $apartment->description }}</p>
            </div>
            <div class="p-2 flex-grow-* bd-highlight" style="width:40vw;">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title"> {{$apartment->sommary_title}}</h4> --}}
                        <a class="btn btn-dark" href="{{route('admin.apartments.index')}}">Torna indietro</a>
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item">Slug: <br> {{ $apartment->slug }}</li> --}}
                            {{-- <li class="list-group-item">Descrizione: <br> {{ $apartment->description }}</li> --}}
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
                            {{-- </li>
                            <li class="list-group-item"><img
                                    src="{{$apartment->cover_image ? asset('storage/' . $apartment->cover_image) : asset('storage/uploads/404.png') }}"
                                                             alt="{{$apartment->sommary_title}}">
                            </li> --}}

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- MAP SECTION --}}


@endsection
