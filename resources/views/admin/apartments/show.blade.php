@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title"> {{$apartment->sommary_title}}</h4>
                        <a class="btn btn-dark" href="{{route('admin.apartments.index')}}">Torna indietro</a>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Slug: <br> {{ $apartment->slug }}</li>
                            <li class="list-group-item">Descrizione: <br> {{ $apartment->description }}</li>
                            <li class="list-group-item">Numero Stanze: <br> {{ $apartment->room_number }}</li>
                            <li class="list-group-item">Numero Ospiti: <br> {{ $apartment->guest_number }}</li>
                            <li class="list-group-item">Numero Bagni: <br> {{ $apartment->wc_number}}</li>
                            <li class="list-group-item">Metratura: <br> {{ $apartment->square_meters}}</li>
                            {{--<img src="{{$post->cover_image ?
                             asset('storage/' . $post->cover_image) : asset('storage/uploads/404.png') }}" alt="{{$post->title}}">--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection