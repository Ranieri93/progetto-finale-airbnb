
@extends('layouts.public')

@section('content')
        <div id="main-public">
            <div id="search-home-public">
                <h1>Apartments everywhere</h1>
                <div class="form-group my-form form-inline">
                    <input type="text" class="form-control" placeholder="Everywhere">
                    <button type="button" class="btn btn-success ml-5 mr-2 ">Search</button>
                    <button type="button" class="btn btn-info"><a href="{{route('search')}}">TEST</a> </button>
                </div>
            </div>
        </div>
        <div id="sponsored-apartments">
            <div class="container">
                <h2>Appartamenti Sponsorizzati</h2>
                <div class="row">
                    @php 
                        $i = 1
                    @endphp
                    @foreach ($apartments as $apartment)
                        @if (isset(($apartment->ads)->last()->ad_end) && $today < $apartment->ads->last()->ad_end && $i <= 6)
                            <div class="col-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('storage/' . $apartment->cover_image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $apartment->sommary_title }}</h3>
                                        <p class="card-text">{{ $apartment->description }}</p>
                                        <a href="{{ route('search.show', ['apartment' => $apartment->id])}}" class="btn btn-primary">Dettagli</a>
                                    </div>
                                </div>
                            </div>
                            @php 
                                $i++
                            @endphp
                        @endif
                    @endforeach
                    @if ($i == 1)
                        <p id="no-sponsor">Non ci sono appartamenti sponsorizzati al momento</p>
                    @endif
                </div>
            </div>
        </div>


@endsection
