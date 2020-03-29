@extends('layouts.admin')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <button class="btn btn-danger"><a href="{{route('admin.home')}}">TORNA ALLA RICERCA!</a></button>
        </div>
    </div> --}}

    <div class="container filters">
        <form  action="{{route('advancedSearch')}}" id="searchByFiltersForm" method="post">
            @csrf
            @method("POST")
            <div class="row">
                <div class="col-12">
                    <h2>Filtri<a class="float-right home-but" href="{{route('home')}}"><i class="fas fa-home"></i></a></h2>
                    @if($services->count())
                        <div class="form-group">
                            @foreach($services as $service)
                                <label class="control control-checkbox" for="service_{{ $service->id }}">
                                    <input class="checkbox-filt" type="checkbox" id="service_{{ $service->id }}" name="services[]" value="{{$service->name}}">
                                    {{$service->name}}
                                </label>
                                <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <h4>Raggio di ricerca</h4>
                    <input id="radius" name="radius" type="range" class="form-control-range"
                        min="1" max="200" value="50" onchange="updateRangeInput(this.value);" required>
                    <input type="text" class="input-style" id="val-radius-input" value="50">

                </div>
                <div class="col-12" >
                    <div class="form-group">
                        <label for="">Stanze:</label>
                        <input class="input-style"  type="number" id="rooms" name="rooms" min="1" max="10" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ospiti:</label>
                        <input class="input-style"  type="number" id="guests" name="guests" min="1" max="10" required>
                    </div>
                </div>
                <div class="col-12">
                    <button id="btn-adv-search" type="submit" class="btn btn-primary">Inserisci</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </div>
        </form>
        <div class="filter-chev">
            <i class="fas fa-chevron-left close-bt"></i>
            <i class="fas fa-chevron-right open-bt"></i>
        </div>
    </div>

    <div class="apartment-search-results container">
        <h2  class="text-center">Ecco gli appartamenti disponibili nella zona che hai scelto.</h2>
        <br>

        <div id="sponsored-searched-apts">
            <div class="row">
                @foreach ($filteredApartments as $specificFilter)
                    @if (isset($specificFilter['apartment']->ads->last()->ad_end))
                        @php
                            $end_ad = ($specificFilter['apartment']->ads->last()->ad_end)
                        @endphp

                        @if ($today < $end_ad)
                        <div class="col-xs-12 col-md-6 col-lg-6 single-apartment prew-apartment-card search-apartment-st search-tbl sponsored-searched-img">
                            <div class="img-apartment single-apartment-img search-apartment-img sponsored-searched-img">
                                <img class="search" src=@if(strpos($specificFilter["apartment"] ->cover_image, 'https') !== false)
                                    "{{$specificFilter["apartment"] ->cover_image}}"
                                @else
                                    "{{asset('storage/' . $specificFilter["apartment"] ->cover_image)}}"
                                @endif alt="">
                                <span class="ad-alert">Sponsorizzato</span>
                            </div>
                            <i class="far fa-question-circle"></i>
                            <div class="single-apartment-body search-apartment-body">
                                <h3>{{$specificFilter["apartment"] -> sommary_title}}</h3>
                                <p>{{$specificFilter["apartment"] -> address }}</p>
                            </div>
                            <div class="search-apartment-info">
                                <p>{{$specificFilter["apartment"] ->guest_number}} Ospiti</p>
                                <p>{{$specificFilter["apartment"] ->room_number}} Stanze</p>
                                <p>{{$specificFilter["apartment"] ->square_meters}} Metri quadrati</p>
                                <a class="btn btn-secondary "  href="{{ route('search.show', ['apartment' => $specificFilter["apartment"] -> id])}}">Details</a>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>

        <div id="searched-apts"></div>
            <div class="row searched-all">
                @foreach ($filteredApartments as $specificFilter)
                <div class="col-xs-12 col-md-6 col-lg-6 single-apartment prew-apartment-card search-apartment-st search-tbl">
                    <div class="img-apartment single-apartment-img search-apartment-img">
                        <img class="search" src=@if(strpos($specificFilter["apartment"] ->cover_image, 'https') !== false)
                            "{{$specificFilter["apartment"] ->cover_image}}"
                        @else
                            "{{asset('storage/' . $specificFilter["apartment"] ->cover_image)}}"
                        @endif alt="">
                    </div>
                    <i class="far fa-question-circle"></i>
                    <div class="single-apartment-body search-apartment-body">
                        <h3>{{$specificFilter["apartment"] ->sommary_title}}</h3>
                        <p>{{$specificFilter["apartment"] ->address }}</p>
                    </div>
                    <div class="search-apartment-info">
                        <p>{{$specificFilter["apartment"] ->guest_number}} Ospiti</p>
                        <p>{{$specificFilter["apartment"] ->room_number}} Stanze</p>
                        <p>{{$specificFilter["apartment"] ->square_meters}} Metri quadrati</p>
                        <a class="btn btn-secondary "  href="{{ route('search.show', ['apartment' => $specificFilter["apartment"] -> id])}}">Details</a>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
@endsection

<script>
    function updateRangeInput(val) {
        document.getElementById('val-radius-input').value = val;
    }
</script>
