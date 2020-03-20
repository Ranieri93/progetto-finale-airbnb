@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form>
                    <div class="form-group">
                        <label for="">Dove vorresti soggiornare?</label>
                        <input type="text" class="form-control" id="" placeholder="Ovunque">
                    </div>
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <form  action="" id="searchByFiltersForm" class="d-flex flex-row justify-content-between" method="post">
                @csrf
                @method("POST")
                <div class="col-4">
                    <h2>filtri</h2>
                    @if($services->count())
                        <div class="form-group">
                            @foreach($services as $service)
                                <label for="service_{{ $service->id }}">
                                    <input type="checkbox" id="service_{{ $service->id }}" name="services[]" value="{{$service->id}}">
                                    {{$service->name}}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-3">
                    <h4>Raggio di ricerca:</h4>
                    <input id="radius" name="radius" type="range" class="form-control-range"
                           min="1" max="200" value="50" onchange="updateRangeInput(this.value);">
                    <input type="text" id="val-radius-input" value="">

                </div>
                <div class="col-2" >
                    <div class="form-group">
                        <label for="">Seleziona numero stanze:</label>
                        <input type="number" id="rooms" name="rooms" min="1" max="10">
                    </div>
                </div>
                <div class="col-2" >
                    <div class="form-group">
                        <label for="">Seleziona numero letti:</label>
                        <input type="number" id="beds" name="beds" min="1" max="10">
                    </div>
                </div>
            </form>
    </div>
    <hr>
    <div class="apartment-search-results container">
        <h2 class="text-center">Ecco gli appartamenti disponibili nella zona che hai scelto.</h2>
        <br>
        @foreach ($filteredApartments as $spcificFilter)
            <div class="row medium-spacer">
                <div class="single-apartment d-flex flex-row">
                    <div class="img-apartment">
                        <img class="fix-img-search" src=@if(strpos($spcificFilter["apartment"] ->cover_image, 'https') !== false)
                            "{{$spcificFilter["apartment"] ->cover_image}}"
                        @else
                            "{{asset('storage/' . $spcificFilter["apartment"] ->cover_image)}}"
                        @endif alt="">
                    </div>
                    <div class="content-apartment">
                        <h3>{{$spcificFilter["apartment"] -> sommary_title}}</h3><a class="btn btn-secondary "
                            href="{{ route('admin.search.show', ['apartment' => $spcificFilter["apartment"] -> id])}}">Details</a>
                        <p>{{$spcificFilter["apartment"] ->guest_number}} ospiti</p>
                        <p>{{$spcificFilter["apartment"] ->room_number}} stanze</p>
                        <p>{{$spcificFilter["apartment"] ->square_meters}} metri quadrati</p>
                        <p>{{$spcificFilter["apartment"] ->description }}</p>
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
