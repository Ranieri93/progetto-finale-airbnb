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
            <div class="col-4 offset-2">
                <h2>filtri</h2>
                @if($services->count())
                    <div class="form-group">
                        @foreach($services as $service)
                            <label for="service_{{ $service->id }}">
                                <input type="checkbox" id="service_{{ $service->id }}" value="{{$service->id}}">
                                {{$service->name}}
                            </label>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-1" >
                <div class="form-group">
                    <label for="">Seleziona numero ospiti</label>
                    <select class="form-control" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="col-1 offset-1" >
                <div class="form-group">
                    <label for="">Seleziona numero stanze</label>
                    <select class="form-control" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="apartment-search-results container">
        <h2 class="text-center">Ecco gli appartamenti disponibili nella zona che hai scelto.</h2>
        <br>
        @foreach ($apartments as $apartment)
            <div class="row medium-spacer">
                <div class="single-apartment d-flex flex-row">
                    <div class="img-apartment">
                        <img class="fix-img-search" src="{{ $apartment->cover_image}}" alt="">
                    </div>
                    <div class="content-apartment">
                        <h3>{{$apartment->sommary_title}}</h3><a class="btn btn-secondary " href="{{ route('admin.search.show', ['apartment' => $apartment->id])}}">Details</a>
                        <p>{{$apartment->guest_number}} ospiti</p>
                        <p>{{$apartment->room_number}} stanze</p>
                        <p>{{$apartment->square_meters}} metri quadrati</p>
                        <p>{{ $apartment->description }}</p>

                    </div>
                </div>
            </div>
            <hr>
        @endforeach


    </div>

@endsection
