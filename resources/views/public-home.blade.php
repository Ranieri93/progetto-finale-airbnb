
@extends('layouts.public')

@section('content')
        <div id="main-public">
            <div id="search-home-public">
                <h1>Apartments everywhere</h1>
                <form id="search-addresses-form-public"  action=" {{ route('search') }}" method="get">
                    @csrf
                    <div class="form-group my-form">
                        <input id="input-search-address-public" type="text" class="form-control fluid" placeholder="Inserisci Indirizzo">
                        <div id="listAddresses" style="position: relative"></div>
                        <button type="button" class="btn btn-info"> Cerca </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="sponsored-apartments" >
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
                        <h3>Non sono presenti appartamenti in evidenza</h3>
                    @endif
                </div>
            </div>
        </div>


@endsection
