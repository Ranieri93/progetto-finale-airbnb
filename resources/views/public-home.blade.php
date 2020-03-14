
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



@endsection
