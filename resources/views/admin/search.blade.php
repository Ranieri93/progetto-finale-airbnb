@extends('layouts.admin')

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
            <div class="col-8 offset-2">
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
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 offset-2" >
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


@endsection
