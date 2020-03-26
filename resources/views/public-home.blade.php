
@extends('layouts.public')

@section('content')
        <div id="main-public">
            <div id="search-home-public">

                <div class="show-picture">
                    <img src="https://cdn.wallpapersafari.com/58/87/8Dq5YV.jpg"
                    alt="" class="card-img-top">

                    <div class="content">
                        <h2 class="text">Apartments everywhere</h2>

                        <div class="search-bar-content">
                            <form id="search-addresses-form-public"  action=" {{ route('search') }}" method="get">
                                @csrf
                                <div class="form-group my-form w-100">
                                    <input id="input-search-address-public" type="text" class="form-control fluid" placeholder="Inserisci Indirizzo">
                                    <button type="button" class="btn btn-info search-button"> Cerca </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="sponsored-apartments pt-4" >
            <div class="container">
                <h2>Appartamenti in Evidenza</h2>
                <div class="row">
                    @if($sponsored_apartments->count() > 0)
                        @foreach ($sponsored_apartments as $sponsored_apartment)
                            <div class="col-xs-12 col-md-6 col-lg-4 sponsored-apartment">
                                <i class="far fa-question-circle"></i>
                                <div class="sponsored-apartment-img">
                                    <img class="img-fluid" src="{{asset('storage/' . $sponsored_apartment->cover_image)}}" alt="Card image cap">
                                </div>
                                <div class="sponsored-apartment-body">
                                    <h3 class="card-title">{{ $sponsored_apartment->sommary_title }}</h3>
                                    <p class="card-text">{{ $sponsored_apartment->address }}</p>
                                    <a href="{{ route('search.show', ['apartment' => $sponsored_apartment->id])}}" class="btn-details">Dettagli</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col col-sm-12 ml-3 mr-3">
                            <h3>Non sono presenti appartamenti in evidenza</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>


@endsection
