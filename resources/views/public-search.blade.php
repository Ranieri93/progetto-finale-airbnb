@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <button class="btn btn-danger"><a href="{{route('home')}}">TORNA ALLA RICERCA!</a></button>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <form  action="{{route('advancedSearch')}}" id="searchByFiltersFormPublic" class="d-flex flex-row justify-content-between" method="post">
                @csrf
                @method("POST")
                <div class="col-4">
                    <h2>filtri</h2>
                    @if($services->count())
                        <div class="form-group">
                            @foreach($services as $service)
                                <label for="service_{{ $service->id }}">
                                    <input type="checkbox" id="service_{{ $service->id }}" name="services[]" value="{{$service->name}}">
                                    {{$service->name}}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-3">
                    <h4>Raggio di ricerca:</h4>
                    <input id="radius" name="radius" type="range" class="form-control-range"
                           min="1" max="200" value="50" onchange="updateRangeInput(this.value);" required>
                    <input type="text" id="val-radius-input" value="50">

                </div>
                <div class="col-2" >
                    <div class="form-group">
                        <label for="">Seleziona numero stanze:</label>
                        <input type="number" id="rooms" name="rooms" min="1" max="10" required>
                    </div>
                </div>
                <div class="col-2" >
                    <div class="form-group">
                        <label for="">Seleziona numero ospiti:</label>
                        <input type="number" id="guests" name="guests" min="1" max="10" required>
                    </div>
                </div>
                <button id="btn-adv-search-Public" type="submit" class="btn btn-primary">Inserisci</button>
            </form>
        </div>
        <hr>
        <div class="apartment-search-results container">
            <h2  class="text-center">Ecco gli appartamenti disponibili nella zona che hai scelto.</h2>

            <br>

            <div id="sponsored-searched-apts">
                <h3>In Evidenza</h3>
            @foreach ($filteredApartments as $specificFilter)
                @if (isset($specificFilter['apartment']->ads->last()->ad_end))
                    @php  
                        $end_ad = ($specificFilter['apartment']->ads->last()->ad_end)
                    @endphp

                    @if ($today < $end_ad)
                        <div class="row medium-spacer">
                            <div class="single-apartment d-flex flex-row">
                                <div class="img-apartment">
                                    <img class="fix-img-search" src=@if(strpos($specificFilter["apartment"] ->cover_image, 'https') !== false)
                                        "{{$specificFilter["apartment"] ->cover_image}}"
                                    @else
                                        "{{asset('storage/' . $specificFilter["apartment"] ->cover_image)}}"
                                    @endif alt="">
                                </div>
                                <div class="content-apartment">
                                    <h3>{{$specificFilter["apartment"] -> sommary_title}}</h3><a class="btn btn-secondary " href="{{ route('admin.search.show', ['apartment' => $specificFilter["apartment"] -> id])}}">Details</a>
                                    <p>{{$specificFilter["apartment"] ->guest_number}} ospiti</p>
                                    <p>{{$specificFilter["apartment"] ->room_number}} stanze</p>
                                    <p>{{$specificFilter["apartment"] ->square_meters}} metri quadrati</p>
                                    <p>{{$specificFilter["apartment"] ->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            </div>

            <div id="searched-apts-Public"></div>
            @foreach ($filteredApartments as $specificFilter)
                <div class="row medium-spacer">
                    <div class="single-apartment d-flex flex-row">
                        <div class="img-apartment">
                            <img class="fix-img-search" src=@if(strpos($specificFilter["apartment"] ->cover_image, 'https') !== false)
                                "{{$specificFilter["apartment"] ->cover_image}}"
                            @else
                                "{{asset('storage/' . $specificFilter["apartment"] ->cover_image)}}"
                            @endif alt="">
                        </div>
                        <div class="content-apartment">
                            <h3>{{$specificFilter["apartment"] -> sommary_title}}</h3><a class="btn btn-secondary "
                                                                                         href="{{ route('admin.search.show', ['apartment' => $specificFilter["apartment"] -> id])}}">Details</a>
                            <p>{{$specificFilter["apartment"] ->guest_number}} ospiti</p>
                            <p>{{$specificFilter["apartment"] ->room_number}} stanze</p>
                            <p>{{$specificFilter["apartment"] ->square_meters}} metri quadrati</p>
                            <p>{{$specificFilter["apartment"] ->description }}</p>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        @endsection

        <script>
            function updateRangeInput(val) {
                document.getElementById('val-radius-input').value = val;
            }
        </script>
