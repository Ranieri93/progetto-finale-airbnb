@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form>
                    <div class="form-group">
                        <label for="">Search Apartments</label>
                        <input type="text" class="form-control" id="" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
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
    <div class="apartment-search-results container">
        <div class="row medium-spacer">
            <div class="single-apartment d-flex flex-row">
                <div class="img-apartment col-4">
                    <img class="img-fluid fix-img-search" src="https://images.pexels.com/photos/3265511/pexels-photo-3265511.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
                <div class="content-apartment col-6">
                    <h1>lorem ipsum bla bla bla bla</h1>
                    <p>oijwenoijwnx xowiexnowijexnow xowijexnowaijxewa </p>
                </div>
            </div>
        </div>
        <div class="row medium-spacer">
            <div class="single-apartment d-flex flex-row">
                <div class="img-apartment col-4">
                    <img class="img-fluid fix-img-search" src="https://images.pexels.com/photos/3265511/pexels-photo-3265511.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
                <div class="content-apartment col-6">
                    <h1>lorem ipsum bla bla bla bla</h1>
                    <p>oijwenoijwnx xowiexnowijexnow xowijexnowaijxewa </p>
                </div>
            </div>
        </div>
        <div class="row medium-spacer">
            <div class="single-apartment d-flex flex-row">
                <div class="img-apartment col-4">
                    <img class="img-fluid fix-img-search" src="https://images.pexels.com/photos/3265511/pexels-photo-3265511.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
                <div class="content-apartment col-6">
                    <h1>lorem ipsum bla bla bla bla</h1>
                    <p>oijwenoijwnx xowiexnowijexnow xowijexnowaijxewa </p>
                </div>
            </div>
        </div>
        <div class="row medium-spacer">
            <div class="single-apartment d-flex flex-row">
                <div class="img-apartment col-4">
                    <img class="img-fluid fix-img-search" src="https://images.pexels.com/photos/3265511/pexels-photo-3265511.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                </div>
                <div class="content-apartment col-6">
                    <h1>lorem ipsum bla bla bla bla</h1>
                    <p>oijwenoijwnx xowiexnowijexnow xowijexnowaijxewa </p>
                </div>
            </div>
        </div>
    </div>

@endsection
