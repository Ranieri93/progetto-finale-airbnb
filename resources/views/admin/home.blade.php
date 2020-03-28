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

                <div class="show-picture">
                    <img src="https://external-preview.redd.it/pHkCRkzD1_nLb2ik7v9U0HA12l_Hr1JSh4auGrFPiXY.jpg?auto=webp&s=3635fb966f38721f9c6c3e4a8cd380d8f3515755"
                    alt="" class="card-img-top">

                    <div class="content">
                        <h2 class="text">Cerchiamo insieme l'appartamento dei tuoi sogni!</h2>

                        <div class="search-bar-content">
                            <form id="search-addresses-form-admin" action=" {{ route('admin.search') }}" method="get">
                                @csrf
                                <div class="form-group my-form w-100">
                                    <input id="input-search-address-admin" type="text" class="form-control fluid" placeholder="Inserisci Indirizzo">
                                    <div id="listAddresses" class="list-admin"></div>
                                    <button type="button" class="btn btn-info search-button"> Cerca </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="sponsored-apartments pt-4">
            <div class="container">
                <h2 class="pl-3 pr-3">Appartamenti in Evidenza</h2>
                <div class="row">
                @if($sponsored_apartments->count() > 0)
                    @foreach ($sponsored_apartments as $sponsored_apartment)
                        <div class="col-xs-12 col-md-6 col-lg-4 sponsored-apartment prew-apartment-card">
                                <div class="sponsored-img single-apartment-img">
                                    <img class="img-fluid" src="{{asset('storage/' . $sponsored_apartment->cover_image)}}" alt="Card image cap">
                                </div>
                                <i class="far fa-question-circle"></i>
                                <div class="sponsored-body single-apartment-body">
                                    <h3 class="card-title">{{ $sponsored_apartment->sommary_title }}</h3>
                                    <p class="card-text">{{ $sponsored_apartment->address }}</p>
                                    <a href="{{ route('admin.search.show', ['apartment' => $sponsored_apartment->id])}}" class="btn-details">Dettagli</a>
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

        @include('layouts.partials.footer')
@endsection
