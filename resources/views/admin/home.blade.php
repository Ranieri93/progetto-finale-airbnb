@extends('layouts.admin')

@section('content')
    <div class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div id="main-admin">
            <div id="search-home-admin">

                <h2>Cerchiamo insieme l'appartamento dei tuoi sogni!</h2>
                <form id="search-addresses-form-admin"  action=" {{ route('admin.search') }}" method="get">
                    @csrf
                    <div class="form-group my-form form-inline">
                        <input id="input-search-address-admin" type="text" class="form-control fluid" placeholder="Inserisci Indirizzo">
                        <div id="listAddresses" style="position: relative"></div>
                        <button type="button" class="btn btn-info">TEST </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="sponsored-apartments">
            <div class="container">
                <h2>Appartamenti in Evidenza</h2>
                <div class="row">
                @if($sponsored_apartments->count() > 0)
                    @foreach ($sponsored_apartments as $sponsored_apartment)
                        <div class="col-xs-12 col-md-6 col-lg-4 sponsored-apartment">
                            <div class="sponsored-apartment-img">
                                <img class="card-img-top" src="{{asset('storage/' . $sponsored_apartment->cover_image)}}" alt="Card image cap">
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

        @include('layouts.partials.footer')
@endsection
